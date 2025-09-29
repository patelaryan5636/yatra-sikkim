<?php

session_start();
require_once './includes/scripts/connection.php';

$name       = $_POST['name'] ?? '';
$email      = $_POST['email'] ?? '';
$phone      = $_POST['phone'] ?? '';
$subject    = $_POST['subject'] ?? '';
$travelDate = $_POST['travelDate'] ?? '';
$groupSize  = $_POST['groupSize'] ?? '';
$message    = $_POST['message'] ?? '';

if (empty($name) || empty($email) || empty($phone) || empty($subject) || empty($travelDate) || empty($groupSize) || empty($message)) {
    $_SESSION['error'] = "All fields are required.";
    echo "<script>
                alert('❌ Something went wrong. Please try again.');
                window.history.back();
              </script>";
    header("Location: contact-us");
    exit;
}else{
// Use Prepared Statements (prevents SQL injection)
    $sql = "INSERT INTO contact_us 
            (name,email,mobile_no,type,Travel_Date,Group_Size,travel_plans) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssissss", $name, $email, $phone, $subject, $travelDate, $groupSize, $message);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('✅ Thank you $name! Your inquiry has been submitted successfully.');
                window.location.href='contact-us.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Something went wrong. Please try again.');
                window.history.back();
              </script>";
    }
    
    $stmt->close();
}
?>