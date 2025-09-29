<?php
 session_start();
 require_once '../includes/scripts/connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_username = $_POST["username"];
    $loginPassword = $_POST["password"];

    // Validate input
    if (empty($login_username) || empty($loginPassword)) {
        $_SESSION['Yatra_error_message'] = "Email and password are required.";
        header("Location: adminlogin");
        exit();
    }

    // Check user in database
    $selectQuery = "SELECT * FROM user_master WHERE user_name = ?";
    $stmt = $conn->prepare($selectQuery);
    $stmt->bind_param("s", $login_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPasswordFromDB = $row["password"];
        $isVerified = $row["is_verified"];
        $userId = $row["user_id"];
        $username = $row["user_name"]; // Get username for email
        $userRole = $row["user_role"]; // Fetch user role

        // Check user role
        if ($userRole != 1) {
            $_SESSION['Yatra_error_message'] = "You are not eligible for this access. Please contact support.";
            header("Location: adminlogin"); // Redirect to userregister.php
            exit();
        }

        // Verify the provided password
        if (password_verify($loginPassword, $hashedPasswordFromDB)) { 
           // Set session and redirect to dashboard
            $_SESSION['Yatra_logedin_user_id'] = $userId;
            header("Location: index");
            exit();
        } else {
            $_SESSION['Yatra_error_message'] = "Incorrect password.";
            header("Location: adminlogin");
            exit();
        }
    } else {
        $_SESSION['Yatra_error_message'] = "Username not found.";
        header("Location: adminlogin");
        exit();
    }
    $stmt->close();
}
$conn->close();

?>
