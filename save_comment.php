<?php
    // require_once 'includes/scripts/connection.php';

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $comment_text = trim($_POST['comment_input']);
    //     $user_id = 1; // Replace with the actual logged-in user's ID

    //     if (!empty($comment_text)) {
    //         $sql = "INSERT INTO feedback_master (user_id, comment, created_at) VALUES (1, ?, NOW())";
    //         $stmt = $conn->prepare($sql);
    //         $stmt->bind_param("s", $comment_text);

    //         if ($stmt->execute()) {
    //             header("Location: index.php"); // Redirect to avoid form resubmission
    //             exit();
    //         } else {
    //             echo "Error: " . $stmt->error;
    //         }

    //         $stmt->close();
    //     } else {
    //         echo "Comment cannot be empty!";
    //     }
    // }

    // $conn->close();
    session_start(); // Start session to get user details
    require_once 'includes/scripts/connection.php'; // Ensure this connects to your database

    // Get user input
    // $user_id = $_SESSION['user_id']; // Logged-in user's ID
    $user_id = 15;
    $comment_text = trim($_POST['comment_text'] ?? '');

    // Validate input
    if (empty($comment_text)) {
        $_SESSION['error'] = "Comment cannot be empty!";
        header("Location: usermsg.php"); // Redirect back to feedback page
        exit();
    }

    // Insert the comment into the database
    $sql = "INSERT INTO feedback_master (user_id, comment, created_at) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $comment_text);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Your feedback has been posted!";
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
    }

    // Redirect back to the feedback page
    header("Location: usermsg.php");
    exit();
?>
