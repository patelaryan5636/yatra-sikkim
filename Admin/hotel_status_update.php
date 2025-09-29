<?php
require '../includes/scripts/connection.php';

//          Unconfirm to Confirm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if (isset($_POST['enable'])) {
        $stmt = $conn->prepare("UPDATE hotel_master SET is_confirmed = 1 WHERE hotel_id = ?");
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "hotel status updated successfully!";
    } else {
        $_SESSION['error'] = "Failed to update hotel status.";
    }

    header("Location: hotellist.php");
    exit();
}

//   Unconfirm DELETE
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $id = $_GET['id'] ?? null;

    if ($id) {
        $stmt = $conn->prepare("DELETE FROM `hotel_master` WHERE hotel_id = ? AND is_confirmed = 0");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = "hotel deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to hotel hotel.";
        }

        header("Location: hotelrequest.php");
        exit();
    }
}


// Delete Confirmed
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'con_delete') {
    $id = $_GET['id'] ?? null;

    if ($id) {
        $stmt = $conn->prepare("DELETE FROM `hotel_master` WHERE hotel_id = ? AND is_confirmed = 1");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Hotel deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to delete hotel.";
        }

        header("Location: hotellist.php");
        exit();
    }
}


