<?php
require '../includes/scripts/connection.php';


//          Unconfirm to Confirm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if (isset($_POST['enable'])) {
        $stmt = $conn->prepare("UPDATE guide_master SET is_confirm = 1 WHERE guide_id = ?");
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Guide status updated successfully!";
    } else {
        $_SESSION['error'] = "Failed to update guide status.";
    }

    header("Location: guidelist.php");
    exit();
}

//   Unconfirm DELETE
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $id = $_GET['id'] ?? null;

    if ($id) {
        $stmt = $conn->prepare("DELETE FROM `guide_master` WHERE guide_id = ? AND is_confirm = 0");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Guide deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to delete guide.";
        }

        header("Location: guiderequest.php");
        exit();
    }
}


// Delete Confirmed
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'con_delete') {
    $id = $_GET['id'] ?? null;

    if ($id) {
        $stmt = $conn->prepare("DELETE FROM `guide_master` WHERE guide_id = ? AND is_confirm = 1");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Guide deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to delete guide.";
        }

        header("Location: guidelist.php");
        exit();
    }
}

// Edit Guide Details
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'con_edit') {
    $id = $_GET['id'] ?? null;

    if ($id) {
        $stmt = $conn->prepare("DELETE FROM `guide_master` WHERE guide_id = ? AND is_confirm = 1");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Guide deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to delete guide.";
        }

        header("Location: guidelist.php");
        exit();
    }
}
?>
