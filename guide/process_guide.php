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
$check_query = "SELECT * FROM guide_master WHERE added_by = ?";
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

if(isset($_POST['submit'])) {
    // Get form inputs
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $aadhar_card_number = mysqli_real_escape_string($conn, $_POST['aadhar_card_number']);
    $pan_card_number = mysqli_real_escape_string($conn, $_POST['pan_card_number']);
    $mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
    $alternative_mobile = mysqli_real_escape_string($conn, $_POST['alternative_mobile']);
    $guide_license_number = mysqli_real_escape_string($conn, $_POST['guide_license_number']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $birth_date = mysqli_real_escape_string($conn, $_POST['birth_date']);
    $solo_tour_fee = mysqli_real_escape_string($conn, $_POST['solo_tour_fee']);
    $group_tour_fee = mysqli_real_escape_string($conn, $_POST['group_tour_fee']);
    $vip_tour_fee = mysqli_real_escape_string($conn, $_POST['vip_tour_fee']);
    $preferred_time = mysqli_real_escape_string($conn, $_POST['preferred_time']);
    $available_days = isset($_POST['available_days']) ? implode(",", $_POST['available_days']) : "";
    
    
    // check exception
    include 'exception_guides.php';
    
    // Upload directory
    $upload_dir = "../uploads/guides_documents/";

    // Check if the directory exists
    if (!file_exists($upload_dir)) {
        // If it doesn't exist, create it with read-write-execute permissions
        mkdir($upload_dir, 0777, true);
    }

    function uploadFile($file, $upload_dir) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo "File upload error: " . $file['error'] . "<br>";
            return null;
        }

        $target_file = $upload_dir . basename($file["name"]);
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Allowed file types
        $allowed_types = ["jpg", "jpeg", "png", "pdf"];

        if (!in_array($fileType, $allowed_types)) {
            echo "Invalid file type: " . $fileType . "<br>";
            return null;
        }

        if ($file["size"] > 5000000) { // 5MB limit
            echo "File too large: " . $file["size"] . "<br>";
            return null;
        }

        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return basename($file["name"]);
        } else {
            echo "Failed to move file: " . $file["name"] . "<br>";
            return null;
        }
    }

    // Upload files
    $aadhar_card_document = isset($_FILES["aadhar_card_document"]) ? uploadFile($_FILES["aadhar_card_document"], $upload_dir) : null;
    $pan_card_document = isset($_FILES["pan_card_document"]) ? uploadFile($_FILES["pan_card_document"], $upload_dir) : null;
    $passport_photo = isset($_FILES["passport_photo"]) ? uploadFile($_FILES["passport_photo"], $upload_dir) : null;
    $training_certifications = isset($_FILES["training_certifications"]) ? uploadFile($_FILES["training_certifications"], $upload_dir) : null;



   // Prepare SQL Query
   $sql = "INSERT INTO guide_master 
   (full_name, gender, address, nationality, aadhar_card_number, pan_card_number, mobile_number, alternative_mobile, 
    guide_license_number, experience, birth_date, solo_tour_fee, group_tour_fee, vip_tour_fee,
    aadhar_card_document, pan_card_document, passport_photo, training_certifications, is_confirm, added_by) 
   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, ?)";

   $stmt = $conn->prepare($sql);
   
   if(!$stmt) {
       die("SQL Error: " . $conn->error);
   }

   $stmt->bind_param("sssssssssssdddssssi", 
       $full_name, $gender, $address, $nationality, $aadhar_card_number, $pan_card_number, 
       $mobile_number, $alternative_mobile, $guide_license_number, $experience, $birth_date, 
       $solo_tour_fee, $group_tour_fee, $vip_tour_fee,
       $aadhar_card_document, $pan_card_document, $passport_photo, $training_certifications, 
       $added_by
   );

   if ($stmt->execute()) {
       $guide_id = $conn->insert_id;
       $sql = "UPDATE `guide_master` SET `available_days`='$available_days',`preferred_time`='$preferred_time' WHERE `guide_id` = $guide_id"; 
       $result = mysqli_query($conn,$sql);
       if($result){
        // Now update the `user_master` table where user_id matches and set `is_success = 1`
            $update_sql = "UPDATE user_master SET is_sucess = 1 WHERE user_id = ?";
            $update_stmt = $conn->prepare($update_sql);

            // Bind the parameter (the user_id that you already have)
            $update_stmt->bind_param("i", $user_id);
            if ($update_stmt->execute()) {
                echo "Guide registered successfully and user status updated!";
            } else {
                echo "Error updating user status: " . $update_stmt->error;
            }
            $update_stmt->close();
       }else{
           echo "not inserted available days";
       }

   } else {
       echo "Error: " . $stmt->error;
   }

   $stmt->close();
   $conn->close();

}else{
    
    $_SESSION['Yatra_error_message'] = "Fill the form first";
    header("Location: guide_form.php");
    exit();
}
?>
