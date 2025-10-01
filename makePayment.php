<?php

session_start();
require_once './includes/scripts/connection.php';


// ✅ Check for encrypted hotel_id
if (!isset($_GET['id'])) {
    header("location: hotellist");
    exit;
}

$encryptedId = $_GET['id'];
function decrypt($data) {
    $key = "Yatra@5636";
    $iv  = "1234567891011121";
    return openssl_decrypt(urldecode($data), "AES-256-CBC", $key, 0, $iv);
}
$id = (int) decrypt($encryptedId);

// --- Utility function
function generateRandomNumber($min, $max) {
    return rand($min, $max);
}

// --- Get hotel master details
$sql = "SELECT num_rooms, avail_rooms FROM hotel_master WHERE hotel_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$max = $availRooms = 0;
if ($row_master = $result->fetch_assoc()) {
    $max        = $row_master['num_rooms'];
    $availRooms = $row_master['avail_rooms'];
}

// --- Get booked rooms for this hotel only
$sql_select_booking = "SELECT room_number FROM hotel_bookings WHERE booking_status = 'confirmed' AND hotel_id = ?";
$stmt = $conn->prepare($sql_select_booking);
$stmt->bind_param("i", $id);
$stmt->execute();
$res_booking = $stmt->get_result();
$booked_rooms = [];
while ($row_booking = $res_booking->fetch_assoc()) {
    if (strpos($row_booking['room_number'], ',') !== false) {
        $booked_rooms = array_merge($booked_rooms, explode(',', $row_booking['room_number']));
    } else {
        $booked_rooms[] = $row_booking['room_number'];
    }
}

// --- Generate unique room numbers
function generateUniqueRoomNumbers($numberOfRooms, $max, $booked_rooms) {
    $room_numbers = [];
    while (count($room_numbers) < $numberOfRooms) {
        $new_room = (string) generateRandomNumber(1, $max);
        if (!in_array($new_room, $booked_rooms) && !in_array($new_room, $room_numbers)) {
            $room_numbers[] = $new_room;
        }
    }
    return implode(',', $room_numbers);
}

// --- Booking data from form (hotelbookform.php)
$allowPayment = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $roomType      = $_POST['room_type'] ?? null;
    $numberOfRooms = (int) ($_POST['number_of_rooms'] ?? 0);
    $checkin       = $_POST['checkin'] ?? null;
    $checkout      = $_POST['checkout'] ?? null;
    $firstName     = $_POST['first_name'] ?? null;
    $lastName      = $_POST['last_name'] ?? null;
    $email         = $_POST['email'] ?? null;
    $mobileNumber  = $_POST['mobile_number'] ?? null;
    $total         = (float) ($_POST['total'] ?? 0);
    $paymentMethod = $_POST['payment_method'] ?? null;

    if ($availRooms < $numberOfRooms) {
        die("Not enough rooms available!");
    }

    $random_room_number = generateUniqueRoomNumbers($numberOfRooms, $max, $booked_rooms);

    // Store in session until payment success
    $_SESSION['hotel_data'] = [
        'hotelId'         => $id,
        'roomType'        => $roomType,
        'numberOfRooms'   => $numberOfRooms,
        'checkin'         => $checkin,
        'checkout'        => $checkout,
        'firstName'       => $firstName,
        'lastName'        => $lastName,
        'email'           => $email,
        'mobileNumber'    => $mobileNumber,
        'total'           => $total,
        'paymentMethod'   => $paymentMethod,
        'random_room_number' => $random_room_number
    ];
    $allowPayment = true;
}

// --- After payment success
if (isset($_GET['payment_id']) && isset($_SESSION['hotel_data'])) {
    $hotelData = $_SESSION['hotel_data'];
    $paymentId = $_GET['payment_id'];

    // TODO: replace with logged-in user id
    $user_id  = $_SESSION['user_id'] ?? 1;  
    $hotel_id = $hotelData['hotelId'];

    $sql = "INSERT INTO hotel_bookings 
            (user_id, hotel_id, check_in_date, check_out_date, num_rooms, room_types, payment_method, total_amount, booking_status, qr_path, room_number) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $booking_status = 'confirmed';
    $qr_path = '';

    $stmt->bind_param(
        "iississdsss",
        $user_id,
        $hotel_id,
        $hotelData['checkin'],
        $hotelData['checkout'],
        $hotelData['numberOfRooms'],
        $hotelData['roomType'],
        $hotelData['paymentMethod'],
        $hotelData['total'],
        $booking_status,
        $qr_path,
        $hotelData['random_room_number']
    );

    if ($stmt->execute()) {
        // Reduce available rooms
        $sql_update_master = "UPDATE hotel_master SET avail_rooms = avail_rooms - ? WHERE hotel_id = ?";
        $stmt_update = $conn->prepare($sql_update_master);
        $stmt_update->bind_param("ii", $hotelData['numberOfRooms'], $hotel_id);
        $stmt_update->execute();

        $_SESSION['booking_status'] = "Booking Confirmed! Your Room Number(s): " . $hotelData['random_room_number'];
        unset($_SESSION['hotel_data']);
        // echo "✅ Booking Done Successfully";
        header("Location: http://localhost/gandiv/hotellist");
        exit();
    } else {
        die("❌ Error in booking. Please contact support.");
    }
}
?>

<!-- Razorpay Script -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
window.onload = function () {
    let allowPayment = <?= json_encode($allowPayment) ?>;
    if (!allowPayment) {
        console.warn("Payment initiation blocked");
        return;
    }

    let totalAmount = <?= isset($_SESSION['hotel_data']['total']) ? (int)$_SESSION['hotel_data']['total'] : 0 ?>;
    let paymentAmount = totalAmount * 100; // convert to paise (already includes num_rooms)

    var options = {
        "key": "rzp_test_CgBpn0xsoJ6C79", 
        "amount": paymentAmount,
        "currency": "INR",
        "name": "Hotel Booking",
        "description": "Complete your booking payment",
        "prefill": {
            "name": "<?= isset($_SESSION['hotel_data']['firstName']) ? $_SESSION['hotel_data']['firstName'] . ' ' . $_SESSION['hotel_data']['lastName'] : '' ?>",
            "email": "<?= $_SESSION['hotel_data']['email'] ?? '' ?>",
            "contact": "<?= $_SESSION['hotel_data']['mobileNumber'] ?? '' ?>"
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
