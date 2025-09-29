<?php
session_start();
require_once './includes/scripts/connection.php';

// ✅ Check for encrypted guide_id
if (!isset($_GET['id'])) {
    header("location: Guidecard");
    exit;
}

$encryptedId = $_GET['id'];
function decrypt($data) {
    $key = "Yatra@5636";
    $iv  = "1234567891011121";
    return openssl_decrypt(urldecode($data), "AES-256-CBC", $key, 0, $iv);
}
$guide_id = (int) decrypt($encryptedId);

$allowPayment = false;

// --- Booking data from form (guidebookform.php)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tourType     = $_POST['receiptRoomType'] ?? null;
    $language     = $_POST['receiptLanguage'] ?? null;
    $date         = $_POST['receiptCheckin'] ?? null;
    $firstName    = $_POST['receiptFirstName'] ?? null;
    $lastName     = $_POST['receiptLastName'] ?? null;
    $email        = $_POST['receiptEmail'] ?? null;
    $mobileNumber = $_POST['receiptMobileNumber'] ?? null;
    $total        = (float) ($_POST['receiptTotal'] ?? 0);
    $paymentMethod= $_POST['payment_method'] ?? null;

    $check_sql = "SELECT COUNT(*) as num FROM guide_booking 
                  WHERE guide_id = ? AND booking_date = ? AND is_confirm = 1";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("is", $guide_id, $date);
    $stmt->execute();
    $check = $stmt->get_result()->fetch_assoc();

    if ($check['num'] > 0) {
        // Guide already busy on this date
        $errorMessage = "We Apologize to Say that <br> Guide Not Available On $date";
    } else {
        // Free → proceed with payment
        $_SESSION['guide_data'] = [
            'guide_id'      => $guide_id,
            'tourType'      => $tourType,
            'language'      => $language,
            'date'          => $date,
            'firstName'     => $firstName,
            'lastName'      => $lastName,
            'email'         => $email,
            'mobileNumber'  => $mobileNumber,
            'total'         => $total,
            'paymentMethod' => $paymentMethod
        ];
        $allowPayment = true;
    }
    // Store in session until payment success  --->  prev. version 
    // $_SESSION['guide_data'] = [
    //     'guide_id'      => $guide_id,
    //     'tourType'      => $tourType,
    //     'language'      => $language,
    //     'date'          => $date,
    //     'firstName'     => $firstName,
    //     'lastName'      => $lastName,
    //     'email'         => $email,
    //     'mobileNumber'  => $mobileNumber,
    //     'total'         => $total,
    //     'paymentMethod' => $paymentMethod
    // ];
    // $allowPayment = true;

}



// --- After payment success
if (isset($_GET['payment_id']) && isset($_SESSION['guide_data'])) {
    $guideData = $_SESSION['guide_data'];
    $paymentId = $_GET['payment_id'];

    // TODO: replace with logged-in user id
    $user_id = $_SESSION['user_id'] ?? 1;

    $sql = "INSERT INTO guide_booking 
            (user_id, user_email, guide_id, f_name, l_name, mobile_no, booking_date, tour_type, price, is_confirm) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "isisssssd",
        $user_id,
        $guideData['email'],
        $guide_id,
        $guideData['firstName'],
        $guideData['lastName'],
        $guideData['mobileNumber'],
        $guideData['date'],
        $guideData['tourType'],
        $guideData['total']
    );

    if ($stmt->execute()) {
        $_SESSION['booking_status'] = "Guide Booking Confirmed!";
        unset($_SESSION['guide_data']);
        header("Location: http://localhost/gandiv/Guidecard");
        exit();
    } else {
        die("❌ Error in booking. Please contact support.");
    }
}
?>

<!--                Show error for UNavailability -->


<!-- Razorpay Script -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
window.onload = function () {
    let allowPayment = <?= json_encode($allowPayment) ?>;
    if (!allowPayment) {
        console.warn("Payment initiation blocked");
        return;
    }

    let totalAmount = <?= isset($_SESSION['guide_data']['total']) ? (int)$_SESSION['guide_data']['total'] : 0 ?>;
    let paymentAmount = totalAmount * 100; // convert to paise

    var options = {
        "key": "rzp_test_CgBpn0xsoJ6C79",  // 🔑 Razorpay key
        "amount": paymentAmount,
        "currency": "INR",
        "name": "Guide Booking",
        "description": "Complete your guide booking payment",
        "prefill": {
            "name": "<?= isset($_SESSION['guide_data']['firstName']) ? $_SESSION['guide_data']['firstName'] . ' ' . $_SESSION['guide_data']['lastName'] : '' ?>",
            "email": "<?= $_SESSION['guide_data']['email'] ?? '' ?>",
            "contact": "<?= $_SESSION['guide_data']['mobileNumber'] ?? '' ?>"
        },
        "theme": {"color": "#3399cc"},
        "handler": function (response) {
            alert("Payment successful! Payment ID: " + response.razorpay_payment_id);
            window.location.href = "?id=<?= urlencode($encryptedId) ?>&payment_id=" + response.razorpay_payment_id;
        }
    };

    var rzp1 = new Razorpay(options);
    rzp1.open();
};
</script>
