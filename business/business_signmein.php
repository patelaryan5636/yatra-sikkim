<?php
session_start();
require_once '../includes/scripts/connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php'; // Include PHPMailer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_email = $_POST["Yatra_login_email"];
    $loginPassword = $_POST["Yatra_login_password"];

    // Validate input
    if (empty($login_email) || empty($loginPassword)) {
        $_SESSION['Yatra_error_message'] = "Email and password are required.";
        header("Location: userlogin");
        exit();
    }

    // Check user in database
    $selectQuery = "SELECT * FROM user_master WHERE email = ?";
    $stmt = $conn->prepare($selectQuery);
    $stmt->bind_param("s", $login_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPasswordFromDB = $row["password"];
        $isVerified = $row["is_verified"];
        $userId = $row["user_id"];
        $username = $row["user_name"]; // Get username for email
        $userRole = $row["user_role"]; // Fetch user role
        $is_confirmed = $row['is_confirmed'];

        // Check user role
        if ($userRole != 4 && $userRole != 5 && $userRole != 2 && $userRole != 6) {
          $_SESSION['Yatra_error_message'] = "You are not eligible for this access. Please contact support.";
          header("Location: business_login"); // Redirect to login page
          exit();
        }

        // Verify the provided password
        if (password_verify($loginPassword, $hashedPasswordFromDB)) {
            if ($isVerified == 0) {
                // First-time login → Send welcome email and update is_verified to 1
                if (sendWelcomeEmail($login_email, $username)) {
                    $updateQuery = "UPDATE user_master SET is_verified = 1 WHERE user_id = ?";
                    $updateStmt = $conn->prepare($updateQuery);
                    $updateStmt->bind_param("i", $userId);
                    $updateStmt->execute();

                    $_SESSION['Yatra_success_message'] = "🎉 Welcome, $username! Your account is now verified.";
                }
            }

            // Set session and redirect to dashboard
            if($userRole == 4 ){
              $_SESSION['Yatra_logedin_user_id'] = $userId;
              header("Location: ../hotel/hotelform");
              exit();
            }
            else if($userRole == 2){
              $_SESSION['Yatra_logedin_user_id'] = $userId;
              header("Location: ../guide/guide_form");
              exit();
            }
            else if($userRole == 5){
              $_SESSION['Yatra_logedin_user_id'] = $userId;
              header("Location: ../stall/stallform");
              exit();
            }else{
              $_SESSION['Yatra_logedin_user_id'] = $userId;
              header("Location: ../musuem/index");
              exit();
            }
        } else {
            $_SESSION['Yatra_error_message'] = "Incorrect password.";
            header("Location: business_login");
            exit();
        }
    } else {
        $_SESSION['Yatra_error_message'] = "Email not found.";
        header("Location: business_login");
        exit();
    }
    $stmt->close();
}
$conn->close();

// Function to send welcome email
function sendWelcomeEmail($email, $username) {
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Change this to your SMTP provider
    $mail->SMTPAuth = true;
    $mail->Username = 'patelaryan5636@gmail.com'; // Your email
    $mail->Password = 'xarq luyb tkix qwey'; // Your email password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('patelaryan5636@gmail.com', 'Yatra Support');
    $mail->addAddress($email);
    $mail->isHTML(true);

    $mail->Subject = '🎉 Welcome to Yatra!';
    $mail->Body = "
        <h2 style='color: #2c7865;'>🎉 Welcome to Yatra, $username!</h2>
        <p>We're excited to have you on board. Now you can explore amazing travel experiences with Yatra.</p>
        <p><strong>Your account has been successfully verified.</strong></p>
        <p>Start your journey today!</p>
        <a href='https://yourwebsite.com/login' style='background: #2c7865; color: #fff; padding: 10px 15px; border-radius: 5px; text-decoration: none;'>Login to Your Account</a>
        <br><br>
        <p>If you have any questions, feel free to reach out to our support team.</p>
        <p>Happy Travelling! 🌍✨</p>
    ";

    return $mail->send();
}
?>
