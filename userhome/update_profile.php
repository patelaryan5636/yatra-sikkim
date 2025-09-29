<?php 
session_start();
require_once '../includes/scripts/connection.php';

if (!isset($_SESSION['Yatra_logedin_user_id'])) {
    header("location: /gandiv/userregister.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("location: /gandiv/index.php");
    exit;
}

$encryptedId = $_GET['id'];
function decrypt($data) {
    $key = "Yatra@5636";
    $iv  = "1234567891011121";
    return openssl_decrypt(urldecode($data), "AES-256-CBC", $key, 0, $iv);
}
$id = (int) decrypt($encryptedId);


$name = $_POST['name'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];

 $sql_update_master = "UPDATE user_master SET user_name = ?,phone = ?, gender = ? WHERE user_id = ?";
        $stmt_update = $conn->prepare($sql_update_master);
        $stmt_update->bind_param("sisi",$name,$phone,$gender,$id);

if($stmt_update->execute()){
    header("Location: /gandiv/index.php");
    exit;
}

?>