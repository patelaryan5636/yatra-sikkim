<?php
session_start();
require_once '../includes/scripts/connection.php';

if(isset($_SESSION['Yatra_logedin_user_id']) && (trim ($_SESSION['Yatra_logedin_user_id']) !== '')){
    $user_id = $_SESSION['Yatra_logedin_user_id'];
} else {
    header("Location: ../business/business_register");
    exit();
}

$added_by = $user_id;
// Check if the user has already submitted a store entry
$check_query = "SELECT * FROM hotel_master WHERE added_by = ?";
$check_stmt = mysqli_prepare($conn, $check_query);
mysqli_stmt_bind_param($check_stmt, "i", $added_by);
mysqli_stmt_execute($check_stmt);
$check_result = mysqli_stmt_get_result($check_stmt);

if (mysqli_num_rows($check_result) > 0) {
    // If a record already exists for this user, show an error and redirect
    header("location: ../mailsend");
    // $_SESSION['Yatra_error_message'] = "You have already registered a store. You can only submit the form once.";
    exit();
}

mysqli_stmt_close($check_stmt);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hotel_name = $_POST['hotel_name'];
    $owner_name = $_POST['owner_name'];
    $num_rooms = $_POST['num_rooms'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $hotel_address = $_POST['hotel_address'];
    $license_number = $_POST['license_number'];
    $owner_aadhar = $_POST['owner_aadhar'];
    $owner_pan = $_POST['owner_pan'];
    
    // Convert checkbox arrays to comma-separated strings
    $room_types = isset($_POST['room_types']) ? implode(",", $_POST['room_types']) : "";
    $facilities = isset($_POST['facilities']) ? implode(",", $_POST['facilities']) : "";
    $payment_method = !empty($_POST['payment_methods']) ? implode(",", $_POST['payment_methods']) : "None";

    // Room pricing
    $single_room_price = $_POST['single_room_price'] ?? NULL;
    $couple_room_price = $_POST['couple_room_price'] ?? NULL;
    $ac_room_price = $_POST['ac_room_price'] ?? NULL;
    $vip_room_price = $_POST['vip_room_price'] ?? NULL;
    $luxury_room_price = $_POST['luxury_room_price'] ?? NULL;
    $deluxe_room_price = $_POST['deluxe_room_price'] ?? NULL;
    
    // check exception
    include 'exception_hotels.php';
    
    // File upload function
    function uploadFile($file, $destinationFolder) {
        $targetDir = "../uploads/$destinationFolder/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $fileName = uniqid() . "_" . basename($file["name"]);
        $targetFilePath = $targetDir . $fileName;
        if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
            return $fileName;
        }
        return NULL;
    }

    // Upload documents
    $hotel_license_doc = uploadFile($_FILES["hotel_license_doc"], "documents");
    $owner_aadhar_doc = uploadFile($_FILES["owner_aadhar_doc"], "documents");
    $owner_pan_doc = uploadFile($_FILES["owner_pan_doc"], "documents");
    $owner_photo = uploadFile($_FILES["owner_photo"], "documents");

    // Upload hotel images
    $hotel_images = [];
    foreach ($_FILES["hotel_images"]["tmp_name"] as $key => $tmp_name) {
        if (!empty($_FILES["hotel_images"]["name"][$key])) {
            $imageFile = [
                "name" => $_FILES["hotel_images"]["name"][$key],
                "tmp_name" => $_FILES["hotel_images"]["tmp_name"][$key]
            ];
            $uploadedImage = uploadFile($imageFile, "hotels");
            if ($uploadedImage) {
                $hotel_images[] = $uploadedImage;
            }
        }
    }
    $hotel_images_str = implode(",", $hotel_images);

    // Get user ID (assuming session stores user_id)
    $added_by = $user_id; 


    // Insert data into the database
        $sql = "INSERT INTO hotel_master 
            (hotel_name, owner_name, num_rooms, avail_rooms, contact_number, email, hotel_address, license_number, owner_aadhar, owner_pan, room_types, facilities, payment_method, single_room_price, couple_room_price, ac_room_price, vip_room_price, luxury_room_price, deluxe_room_price, 
            hotel_license_doc, owner_aadhar_doc, owner_pan_doc, owner_photo, 
            hotel_image1, hotel_image2, hotel_image3, hotel_image4, hotel_image5, is_confirmed, added_by)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiisssssssssddddddsssssssssi", 
        $hotel_name, $owner_name, $num_rooms, $num_rooms, $contact_number, $email, 
        $hotel_address, $license_number, $owner_aadhar, $owner_pan, 
        $room_types, $facilities, $payment_method, 
        $single_room_price, $couple_room_price, $ac_room_price, $vip_room_price, 
        $luxury_room_price, $deluxe_room_price, 
        $hotel_license_doc, $owner_aadhar_doc, $owner_pan_doc, $owner_photo, 
        $hotel_images[0], $hotel_images[1], $hotel_images[2], $hotel_images[3], $hotel_images[4],
        $added_by);

    if ($stmt->execute()) {
        $update_sql = "UPDATE user_master SET is_sucess = 1 WHERE user_id = ?";
            $update_stmt = $conn->prepare($update_sql);

            // Bind the parameter (the user_id that you already have)
            $update_stmt->bind_param("i", $user_id);
            if ($update_stmt->execute()) {
                echo "hotel registered successfully and user status updated!";
            } else {
                echo "Error updating user status: " . $update_stmt->error;
            }
            $update_stmt->close();
            exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}else{
    
    $_SESSION['Yatra_error_message'] = "Fill the form first";
    header("Location: hotelform.php");
    exit();
}
?>
