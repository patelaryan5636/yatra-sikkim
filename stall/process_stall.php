<?php
session_start();
require_once '../includes/scripts/connection.php';

if (!isset($_SESSION['Yatra_logedin_user_id']) || trim($_SESSION['Yatra_logedin_user_id']) === '') {
    header("Location: ../business/business_register");
    exit();
}

$added_by = $_SESSION['Yatra_logedin_user_id'];

// Check if the user has already submitted a store entry
$check_query = "SELECT * FROM store_master WHERE added_by = ?";
$check_stmt = mysqli_prepare($conn, $check_query);
mysqli_stmt_bind_param($check_stmt, "i", $added_by);
mysqli_stmt_execute($check_stmt);
$check_result = mysqli_stmt_get_result($check_stmt);

if (mysqli_num_rows($check_result) > 0) {
    // If a record already exists for this user, show an error and redirect
    header("location: ../mailsend");
    $_SESSION['Yatra_error_message'] = "You have already registered a store. You can only submit the form once.";
    exit();
}

mysqli_stmt_close($check_stmt);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve & sanitize form data
    $store_type = mysqli_real_escape_string($conn, trim($_POST['store_type']));
    $store_name = mysqli_real_escape_string($conn, trim($_POST['store_name']));
    $owner_name = mysqli_real_escape_string($conn, trim($_POST['owner_name']));
    $owner_aadhar_number = mysqli_real_escape_string($conn, trim($_POST['owner_aadhar_number']));
    $owner_pan_number = mysqli_real_escape_string($conn, trim($_POST['owner_pan_number']));
    $owner_mobile_number = mysqli_real_escape_string($conn, trim($_POST['owner_mobile_number']));
    $owner_email = mysqli_real_escape_string($conn, trim($_POST['owner_email']));
    $business_days = isset($_POST['business_days']) ? implode(',', $_POST['business_days']) : '';
    $opening_time = mysqli_real_escape_string($conn, $_POST['opening_time']);
    $closing_time = mysqli_real_escape_string($conn, $_POST['closing_time']);

    // check exception
    include 'exception_stalls.php';

// File Upload Handling
$uploadDir = "../uploads/stores/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

function uploadFile($file) {
    global $uploadDir;

    // Get the original file name
    $fileName = basename($file["name"]);
    $targetFile = $uploadDir . $fileName;

    // Check if the file already exists, if yes, append timestamp to the name
    if (file_exists($targetFile)) {
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileBaseName = pathinfo($fileName, PATHINFO_FILENAME);
        $targetFile = $uploadDir . $fileBaseName . "_" . time() . "." . $fileExtension;
    }

    // Attempt to move the uploaded file to the target folder
    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        return $targetFile;
    }

    return false; // Return false if upload fails
}

// Upload images and store their paths
$store_image = uploadFile($_FILES["store_image"]);
$store_image2 = uploadFile($_FILES["store_image2"]);
$store_image3 = uploadFile($_FILES["store_image3"]);
$store_image4 = uploadFile($_FILES["store_image4"]);

$owner_image = uploadFile($_FILES["owner_image"]);
$aadhar_image = uploadFile($_FILES["aadhar_image"]);
$pan_image = uploadFile($_FILES["pan_image"]);
$shop_license = uploadFile($_FILES["shop_license"]);


    $query = "INSERT INTO store_master (store_type, store_name, owner_name, owner_aadhar_number, owner_pan_number, owner_mobile_number, owner_email, business_days, opening_time, closing_time, store_image, store_image2, store_image3, store_image4, owner_image, aadhar_image, pan_image, shop_license, added_by, is_confirmed)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0)";

$stmt = mysqli_prepare($conn, $query);

// Binding parameters
mysqli_stmt_bind_param($stmt, "sssssssssssssssssss", 
$store_type, $store_name, $owner_name, $owner_aadhar_number, $owner_pan_number, 
$owner_mobile_number, $owner_email, $business_days, 
$opening_time, $closing_time, $store_image,$store_image2,$store_image3,$store_image4, $owner_image, 
$aadhar_image, $pan_image, $shop_license, $added_by);

// Execute the query
if (mysqli_stmt_execute($stmt)) {
    $update_sql = "UPDATE user_master SET is_sucess = 1 WHERE user_id = ?";
    $update_stmt = $conn->prepare($update_sql);

    // Bind the parameter (the user_id that you already have)
    $update_stmt->bind_param("i", $added_by);
    if ($update_stmt->execute()) {
        echo "stall registered successfully and user status updated!";
    } else {
        echo "Error updating user status: " . $update_stmt->error;
    }
    $update_stmt->close();
    exit();
}
else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

}else{
    
    $_SESSION['Yatra_error_message'] = "Fill the form first";
    header("Location: stallform.php");
    exit();
}
?>
