<?php
require_once 'includes/scripts/connection.php'; // Include database connection

// Enable error reporting to catch issues
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set the response header to return JSON
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment_id = $_POST['comment_id'];

    // Fetch current like count
    $query = "SELECT likes FROM feedback_master WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $comment_id);
    $stmt->execute();
    $stmt->bind_result($likes);
    $stmt->fetch();
    $stmt->close();

    // Increase like count
    $new_likes = $likes + 1;

    // Update database
    $update_query = "UPDATE feedback_master SET likes = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("ii", $new_likes, $comment_id);
    if ($update_stmt->execute()) {
        echo json_encode(['success' => true, 'likes' => $new_likes]);
    } else {
        echo json_encode(['success' => false]);
    }
    $update_stmt->close();
    $conn->close();
}
?>
