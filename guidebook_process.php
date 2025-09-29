<!-- no need of this code all done makeGuidePayment -->

<?php
require 'includes/scripts/connection.php';

if(!isset($_GET['id'])){
    header("location: Guidecard");
}

$encryptedId = $_GET['id'];
function decrypt($data) {
  $key = "Yatra@5636";
  $iv = "1234567891011121";
  return openssl_decrypt(urldecode($data), "AES-256-CBC", $key, 0, $iv);
}
$id = decrypt($encryptedId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "<pre>";
    print_r($_POST); // Optional: Debugging output
    echo "</pre>";

    // Validate required fields
    if (isset(
        $_POST['receiptRoomType'],
        $_POST['receiptLanguage'],
        $_POST['receiptFirstName'],
        $_POST['receiptLastName'],
        $_POST['receiptEmail'],
        $_POST['receiptMobileNumber'],
        $_POST['receiptCheckin']
    ) &&
    !empty($_POST['receiptRoomType']) &&
    !empty($_POST['receiptLanguage']) &&
    !empty($_POST['receiptFirstName']) &&
    !empty($_POST['receiptLastName']) &&
    !empty($_POST['receiptEmail']) &&
    !empty($_POST['receiptMobileNumber'])) {

        // Assign POST data to variables
        $tour_type   = $_POST['receiptRoomType'];
        $firstName   = $_POST['receiptFirstName'];
        $lastName   = $_POST['receiptLastName'];
        $email     = $_POST['receiptEmail'];
        $mobile      = $_POST['receiptMobileNumber'];
        $date = $_POST['receiptCheckin'];
        $total = $_POST['receiptTotal'];

        $Availability_query = "SELECT COUNT(*) AS num FROM guide_booking where guide_id = '$id' AND booking_date = '$date'   ";
        $result = mysqli_query($conn,$Availability_query);
        $result_data = mysqli_fetch_assoc($result);
        $data = $result_data['num'];

        if($data > 0){
            echo  "<script>
            alert('Guide Not Available At Selected Date');
            setTimeout(function() {
                window.location.href = 'Guidecard.php';
            }, 1000); // delay in milliseconds (1000ms = 1 second)
        </script>";
        }else{
            echo "$total";
            $sql = "INSERT INTO guide_booking 
            (user_id, user_email, guide_id, f_name, l_name, mobile_no, booking_date, tour_type, price,is_confirm)
            VALUES 
            ('', '$email', '$id', '$firstName', '$lastName', '$mobile', '$date', '$tour_type', '$total',0)";

            $result = mysqli_execute_query($conn,$sql);
            if($result){
                echo "<script>alert('Booking saved successfully!');</script>";
            }
        }

    }
}
?>