<!-- Last updated by
    Mihir Amin
-->

<?php
require '../includes/scripts/connection.php';

function decryptId($encryptedId) {
    $key = "yatra99"; // Must match encryption key
    $iv = "1234567891011121"; // Must match encryption IV

    return openssl_decrypt(base64_decode($encryptedId), "AES-128-CTR", $key, 0, $iv);
}
//          Unconfirm to Confirm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    if (isset($_POST['enable'])) {
        $stmt = $conn->prepare("UPDATE store_master SET is_confirmed = 1 WHERE store_id = ?");
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Store status updated successfully!";
    } else {
        $_SESSION['error'] = "Failed to update store status.";
    }

    header("Location: storelist.php");
    exit();
}

//   Unconfirm DELETE
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $id = decryptId($_GET['id']) ?? null;

    if ($id) {
        $stmt = $conn->prepare("DELETE FROM `store_master` WHERE store_id = ? AND is_confirmed = 0");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = "store deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to delete store.";
        }

        header("Location: storerequest.php");
        exit();
    }
}


// Delete Confirmed
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'con_delete') {
    $id = decryptId($_GET['id']) ?? null;

    if ($id) {
        $stmt = $conn->prepare("DELETE FROM `store_master` WHERE store_id = ? AND is_confirmed = 1");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = "store deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to delete store.";
        }

        header("Location: storelist.php");
        exit();
    }
}


