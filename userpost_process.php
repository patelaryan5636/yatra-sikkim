<?php
require 'includes/scripts/connection.php'; 
session_start();

// Optional: force login
// if (!isset($_SESSION['Yatra_logedin_user_id'])){
//     header("location: /gandiv/userregister.php");
//     exit;
// }

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $user_id = $_SESSION['Yatra_logedin_user_id'];
    $post_content = $_POST['post_content'] ?? '';
    $tag1 = $_POST['tag1'] ?? '';
    $tag2 = $_POST['tag2'] ?? '';
    $tag3 = $_POST['tag3'] ?? '';


    $post_image = $_FILES['post_image'] ?? null;

    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);

    if(empty($post_content) && empty($post_image)) {
        die("Post content or image is required.");
    }

    // ---- Upload Handling ----
    $uploadDir = "uploads/user_posts/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $post_image_path = null; // define upfront

    if (isset($_FILES["post_image"]) && $_FILES["post_image"]["error"] == 0) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        $fileType = $_FILES["post_image"]["type"];
        $fileSize = $_FILES["post_image"]["size"];

        if (in_array($fileType, $allowedTypes) && $fileSize <= 5 * 1024 * 1024) { 
            // unique file name: timestamp + random + original extension
            $extension = pathinfo($_FILES["post_image"]["name"], PATHINFO_EXTENSION);
            $fileName = time() . "_" . uniqid() . "." . $extension;

            $image_path = $uploadDir . $fileName;
            $post_image_path = $image_path;

            if (!move_uploaded_file($_FILES["post_image"]["tmp_name"], $image_path)) {
                die("Error moving uploaded file.");
            }
        } else {
            die("Invalid file type or file too large.");
        }
    } else {
        die("Image is required."); // if you want image to be mandatory
        // OR set a default: $post_image_path = "uploads/user_posts/default.png";
    }

    // ---- Insert into Database ----
    $insert_sql = "INSERT INTO post_master 
        (post_img, post_desc, post_tag1, post_tag2, post_tag3, is_verified, post_upload_by, post_like) 
        VALUES (?, ?, ?, ?, ?, 1, ?, 0)";

    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("sssssi", $post_image_path, $post_content, $tag1, $tag2, $tag3, $user_id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Post uploaded successfully.');
            window.location.href = '/gandiv/userpost.php';
        </script>";
    } else {
        echo "<script>
            alert('Error uploading post: " . addslashes($stmt->error) . "');
            window.location.href = '/gandiv/userpost.php';
        </script>";
    }
}
?>
