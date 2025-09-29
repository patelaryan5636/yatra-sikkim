<?php
session_start();
require_once '../includes/scripts/connection.php'; // Include your database connection

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $username = $_POST['username'];
    $business = $_POST['Business'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // ✅ Check if any field is empty
    if (empty($email) || empty($mobile) || empty($gender) ||empty($username) || empty($business) || empty($password) || empty($confirm_password)) {
        $_SESSION['error_messages'] = "Please fill all fields.";
        header("location: business_register");
        exit();
    }

    // ✅ Check if password and confirm password match
    if ($password !== $confirm_password) {
        $_SESSION['error_messages'] = "Password and Confirm Password do not match.";
        header("location: business_register");
        exit();
    }
    
    // ✅ Check if the email format is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_messages'] = "Please enter a valid email address.";
        header("location: business_register");
        exit();
    }

    // ✅ Check if the email already exists in the database
    $sql = "SELECT * FROM user_master WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error_messages'] = "This email address is already registered.";
        header("location: business_register");
        exit();
    }

    // ✅ Check if the mobile number is exactly 10 digits long
    if (strlen($mobile) != 10 || !is_numeric($mobile)) {
        $_SESSION['error_messages'] = "Mobile number must be 10 digits.";
        header("location: business_register");
        exit();
    }

    // ✅ Check if the password length is between 8 and 14 characters
    if (strlen($password) < 8 || strlen($password) > 14) {
    $_SESSION['error_messages'] = "Password must be between 8 and 14 characters.";
    header("location: business_register");
    exit();
    }

    // ✅ Check if the username length is more than 16 characters
    if (strlen($username) > 16) {
        $_SESSION['error_messages'] = "Username must be a maximum of 16 characters.";
        header("location: business_register");
        exit();
    }
    
    // ✅ Check if the mobile number already exists in the database
    $sql = "SELECT * FROM user_master WHERE phone = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $mobile);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error_messages'] = "This mobile number is already registered.";
        header("location: business_register");
        exit();
    }
    // Generate a 4-character OTP
    $otp = strtoupper(substr(str_shuffle('123456789'), 0, 4));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Store temporary data in session
    $_SESSION['temp_data'] = [
        'email' => $email,
        'mobile' => $mobile,
        'username' => $username,
        'gender' => $gender,
        'business' => $business,
        'password' => $password
    ];
    
    // Mark user as registered to access OTP page
    $_SESSION['business_registered'] = true;

    // Delete any existing OTP for the email before inserting a new one
    $deleteStmt = $conn->prepare("DELETE FROM otp_verifications WHERE email = ?");
    $deleteStmt->bind_param("s", $email);
    $deleteStmt->execute();

    // Store OTP in the otp_verifications table
    $stmt = $conn->prepare("INSERT INTO otp_verifications (email, otp) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $otp);
    
    if ($stmt->execute()) {
        // Send OTP via Email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // SMTP host
            $mail->SMTPAuth = true;
            $mail->Username = 'patelaryan5636@gmail.com'; // Your email
            $mail->Password = 'xarq luyb tkix qwey'; // Your email app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('patelaryan5636@gmail.com', 'Your Website');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Your OTP Code';
            $mail->Body = "Your OTP Code is <b>$otp</b>";

            $mail->send();

            // Redirect user to OTP verification page
            $_SESSION['otp_success'] = 'Your OTP has been sent successfully. Please check your email.';
            header("Location: business_otppage");
            exit();
        } catch (Exception $e) {
            die("OTP Email could not be sent. Error: " . $mail->ErrorInfo);
        }
    } else {
        die("Failed to store OTP in database.");
    }
}else{
    header("location: business_register");
}
?>
