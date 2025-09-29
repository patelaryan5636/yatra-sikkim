<?php
require_once 'google-config.php';
require_once 'includes/scripts/connection.php'; // Your database connection file

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    $oauth = new Google\Service\Oauth2($client);
    $userInfo = $oauth->userinfo->get();

    $google_id = $userInfo->id;
    $email = $userInfo->email;
    $name = $userInfo->name;

    // Check if user already exists in `user_master`
    $stmt = $conn->prepare("SELECT * FROM user_master WHERE google_id = ?");
    $stmt->bind_param("s", $google_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $existingUser = $result->fetch_assoc();

    if ($existingUser) {
        $_SESSION['user_id'] = $existingUser['user_id'];
    } else {
        // If new user, insert into `user_master`
        $stmt = $conn->prepare("INSERT INTO user_master (google_id, email, username, is_verified) VALUES (?, ?, ?, 0)");
        $stmt->bind_param("sss", $google_id, $email, $name);
        $stmt->execute();
        $_SESSION['user_id'] = $conn->insert_id;
    }

    header("Location: userlogin"); // Redirect to user dashboard
    exit();
} else {
    echo "Google Authentication Failed.";
}
?>
