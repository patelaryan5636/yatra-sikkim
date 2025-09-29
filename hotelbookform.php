<?php
  require_once './includes/scripts/connection.php';

  //                     Login required
    if (!isset($_SESSION['Yatra_logedin_user_id'])){
    header("location: /gandiv/userregister.php");
    exit;
}

  $encryptedId = $_GET['id'];

  function decrypt($data) {
      $key = "Yatra@5636";
      $iv = "1234567891011121";
      return openssl_decrypt(urldecode($data), "AES-256-CBC", $key, 0, $iv);
  }

  $id = decrypt($encryptedId);

  $sql = "SELECT * FROM hotel_master where hotel_id = $id";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="Logo_Title.png">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <title>Hotel Booking</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .bg-image {
      background: url("htlbg.jpg") no-repeat center center/cover;
      height: 100vh;
    }

    .form-scrollable {
      max-height: 80vh;
      overflow-y: auto;
    }

    .form-scrollable::-webkit-scrollbar {
      width: 6px;
    }

    .form-scrollable::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 10px;
    }

    .form-scrollable::-webkit-scrollbar-thumb {
      background: #c4dfdf;
      border-radius: 10px;
    }

    .form-scrollable::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0, 0, 0);
      background-color: rgba(0, 0, 0, 0.4);
      padding-top: 60px;
    }

    .modal-content {
      background-color: #f8f6f4;
      margin: 5% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      border-radius: 10px;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    .receipt-table {
      width: 100%;
      border-collapse: collapse;
    }

    .receipt-table th,
    .receipt-table td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .receipt-table th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body class="bg-image flex items-center justify-center p-4">
  <div
    class="bg-[#F8F6F4] shadow-lg rounded-lg flex flex-col md:flex-row overflow-hidden w-full max-w-5xl">
    <div
      class="hidden md:flex w-1/2 bg-[#D2E9E9] flex-col justify-center items-center p-6 text-center">
      <h2 class="text-black font-bold text-2xl">Book Your Perfect Stay</h2>
      <p class="text-black mt-2">
        Experience comfort and luxury with seamless booking, premium
        amenities, and personalized hospitality for an unforgettable stay.
      </p>

      <div class="flex justify-center items-center w-full mt-4">
        <script
          src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
          type="module"></script>
        <dotlottie-player
          src="https://lottie.host/fbd299b4-fd36-47b2-8d33-a65f6d8188a7/Qrgf2w9Psh.lottie"
          background="transparent"
          speed="1"
          class="w-80 h-80"
          loop
          autoplay></dotlottie-player>
      </div>
    </div>

    <div class="w-full md:w-3/5 relative p-6 md:p-10 form-scrollable">
      <div class="absolute top-6 left-1/2 transform -translate-x-1/2">
        <img src="gandiv.png" alt="Logo" class="h-10 md:h-12" />
      </div>

      <h2 class="text-xl md:text-2xl font-bold text-center mt-12 md:mt-10">
        Book Your Stay at Yatra! 🏨
      </h2>
      <p class="text-gray-600 text-xs md:text-sm text-center">
        Fill in the details to book your room
      </p>

      <form class="mt-6" id="bookingForm">
        <label class="block mb-2 text-sm">Room Type</label>
        <div class="relative">
          <select
            class="w-full px-3 py-2 border rounded-lg text-sm"
            id="roomType">
            <option value="Single Room - ₹<?php echo $row['single_room_price']; ?>">Single Room - ₹<?php echo $row['single_room_price']; ?></option>
            <?php if($row['couple_room_price'] != 0){?>
              <option value="Couple Room - ₹<?php echo $row['couple_room_price']; ?>">Couple Room - ₹<?php echo $row['couple_room_price']; ?></option>
            <?php } ?>
            <?php if($row['ac_room_price'] != 0){?>
              <option value="AC Room - ₹<?php echo $row['ac_room_price']; ?>">AC Room - ₹<?php echo $row['ac_room_price']; ?></option>
            <?php } ?>
            <?php if($row['vip_room_price'] != 0){?>
              <option value="VIP Room - ₹<?php echo $row['vip_room_price']; ?>">VIP Room - ₹<?php echo $row['vip_room_price']; ?></option>
            <?php }?>
            <?php if($row['luxury_room_price'] != 0){?>
              <option value="Luxury Room - ₹<?php echo $row['luxury_room_price']; ?>">Luxury Room - ₹<?php echo $row['luxury_room_price']; ?></option>
            <?php }?>
            <?php if($row['deluxe_room_price'] != 0){?>
              <option value="Deluxe Room - ₹<?php echo $row['deluxe_room_price']; ?>">
                Deluxe Room - ₹<?php echo $row['deluxe_room_price']; ?>
              </option>
            <?php }?>
          </select>
        </div>

        <label class="block mt-4 mb-2 text-sm">Number of Rooms</label>
        <div class="relative">
          <input type="number"
            class="w-full px-3 py-2 border rounded-lg text-sm"
            id="numRooms" placeholder="Enter number of rooms">
        </div>

        <label class="block mt-4 mb-2 text-sm">Check-in Date and Time</label>
        <div class="relative flex space-x-2">
          <input
            type="date"
            class="w-full px-3 py-2 border rounded-lg text-sm"
            id="checkinDate" />
          <!-- <input
              type="time"
              class="w-1/2 px-3 py-2 border rounded-lg text-sm"
              id="checkinTime"
            /> -->
        </div>

        <label class="block mt-4 mb-2 text-sm">Check-out Date and Time</label>
        <div class="relative flex space-x-2">
          <input
            type="date"
            class="w-full px-3 py-2 border rounded-lg text-sm"
            id="checkoutDate" />
          <!-- <input
              type="time"
              class="w-1/2 px-3 py-2 border rounded-lg text-sm"
              id="checkoutTime"
            /> -->
        </div>

        <label class="block mt-4 mb-2 text-sm">Payment Method</label>
        <div class="relative">
          <select
            class="w-full px-3 py-2 border rounded-lg text-sm"
            id="paymentMethod">
            <?php
              $methods = explode(',', $row['payment_method']);
              foreach($methods as $method){
                if($method == 'Cash'){
                ?>
                <!-- <option value='<?php //echo $method; ?>' selected><?php //echo $method; ?></option> -->
            <?php
                }else{
                  echo "<option value='$method'>$method</option>";
                }
              }
            ?>
          </select>
        </div>

        <label class="block mt-4 mb-2 text-sm">First Name</label>
        <div class="relative">
          <input
            type="text"
            class="w-full px-3 py-2 border rounded-lg text-sm"
            placeholder="Enter your First Name"
            id="firstName" />
        </div>

        <label class="block mt-4 mb-2 text-sm">Last Name</label>
        <div class="relative">
          <input
            type="text"
            class="w-full px-3 py-2 border rounded-lg text-sm"
            placeholder="Enter your Last Name"
            id="lastName" />
        </div>

        <label class="block mt-4 mb-2 text-sm">Email</label>
        <div class="relative">
          <input
            type="email"
            class="w-full px-3 py-2 border rounded-lg text-sm"
            placeholder="Enter your Email"
            id="email" />
        </div>

        <label class="block mt-4 mb-2 text-sm">Mobile Number</label>
        <div class="relative">
          <input
            type="tel"
            class="w-full px-3 py-2 border rounded-lg text-sm"
            placeholder="Enter your Mobile Number"
            id="mobileNumber" />
        </div>

        <button
          type="button"
          class="w-full mt-4 bg-[#C4DFDF] text-white py-2 rounded-lg text-sm md:text-base"
          onclick="showReceipt()">
          Continue →
        </button>
      </form>
    </div>
  </div>

  <div id="receiptModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <h2 class="text-2xl font-bold text-center mb-4">Booking Receipt</h2>

      <form action="makePayment.php?id=<?php echo $encryptedId?>" method="post" id="receiptForm">
        <table class="receipt-table">
          <tr>
            <th>Item</th>
            <th>Details</th>
          </tr>
          <tr>
            <td>Room Type</td>
            <td id="receiptRoomType"></td>
            <input type="hidden" name="room_type" id="hiddenRoomType">
          </tr>
          <tr>
            <td>Number of Rooms</td>
            <td id="receiptNumberOfRooms"></td>
            <input type="hidden" name="number_of_rooms" id="hiddenNumberOfRooms">
            <input type="hidden" name="avail_rooms" id="hiddenAvailRooms" value="<?php echo $row['avail_rooms']; ?>">
          </tr>
          <tr>
            <td>Check-in Date and Time</td>
            <td id="receiptCheckin"></td>
            <input type="hidden" name="checkin" id="hiddenCheckin">
          </tr>
          <tr>
            <td>Check-out Date and Time</td>
            <td id="receiptCheckout"></td>
            <input type="hidden" name="checkout" id="hiddenCheckout">
          </tr>
          <tr>
            <td>First Name</td>
            <td id="receiptFirstName"></td>
            <input type="hidden" name="first_name" id="hiddenFirstName">
          </tr>
          <tr>
            <td>Last Name</td>
            <td id="receiptLastName"></td>
            <input type="hidden" name="last_name" id="hiddenLastName">
          </tr>
          <tr>
            <td>Email</td>
            <td id="receiptEmail"></td>
            <input type="hidden" name="email" id="hiddenEmail">
          </tr>
          <tr>
            <td>Mobile Number</td>
            <td id="receiptMobileNumber"></td>
            <input type="hidden" name="mobile_number" id="hiddenMobileNumber">
          </tr>
          <tr>
            <td>Taxes</td>
            <td>₹2000+Deposite</td>
          </tr>
          <tr>
            <td>Payment Method</td>
            <td id="receiptPaymentMethod"></td>
            <input type="hidden" name="payment_method" id="hiddenPaymentMethod">
          </tr>
          <tr>
            <td>Total</td>
            <td id="receiptTotal"></td>
            <input type="hidden" name="total" id="hiddenTotal">
          </tr>
        </table>
        <button type="submit" class="w-full mt-4 bg-[#C4DFDF] text-white py-2 rounded-lg text-sm md:text-base">
          Confirm Payment →
        </button>
      </form>
    </div>
  </div>

  <script>
    function countDays(checkin, checkout) {
    // Convert to Date objects
    let checkinDate = new Date(checkin);
    let checkoutDate = new Date(checkout);

    // Calculate difference in time (milliseconds)
    let timeDifference = checkoutDate - checkinDate;

    // Convert milliseconds to days
    let countDays = timeDifference / (1000 * 60 * 60 * 24);

    return countDays;
  }
      function showReceipt() {
        const roomType = document.getElementById("roomType").value;
        const roomTypeName = roomType.split(" ")[0].toLowerCase();
        const numRooms = document.getElementById("numRooms").value;
        const checkinDate = document.getElementById("checkinDate").value;
        // const checkinTime = document.getElementById("checkinTime").value;
        const checkoutDate = document.getElementById("checkoutDate").value;
        // const checkoutTime = document.getElementById("checkoutTime").value;
        const firstName = document.getElementById("firstName").value;
        const lastName = document.getElementById("lastName").value;
        const email = document.getElementById("email").value;
        const mobileNumber = document.getElementById("mobileNumber").value;
        const paymentMethod = document.getElementById("paymentMethod").value;
        const roomPrice = parseInt(roomType.split("₹")[1]);
        const total = (roomPrice * countDays(checkinDate, checkoutDate)) + 2000;
        console.log(total);

        // document.getElementById("receiptRoomType").innerText = roomType;
        // Now roomTypeName will contain just "Single", "Couple", "AC", etc.
        document.getElementById("receiptRoomType").innerText = roomType;
        document.getElementById("receiptNumberOfRooms").innerText = numRooms;
        document.getElementById(
          "receiptCheckin"
        ).innerText = `${checkinDate}`;
        document.getElementById(
          "receiptCheckout"
        ).innerText = `${checkoutDate}`;


        document.getElementById("receiptFirstName").innerText = firstName;
        document.getElementById("receiptLastName").innerText = lastName;
        document.getElementById("receiptEmail").innerText = email;
        document.getElementById("receiptMobileNumber").innerText = mobileNumber;
        document.getElementById("receiptTotal").innerText = `₹${total*numRooms}`;
        document.getElementById("receiptPaymentMethod").innerText = paymentMethod;


        // Set hidden inputs
        // document.getElementById("hiddenRoomType").value = roomType;
        document.getElementById("hiddenRoomType").value = roomTypeName;
        document.getElementById("hiddenNumberOfRooms").value = numRooms;
        document.getElementById("hiddenCheckin").value = checkinDate;
        document.getElementById("hiddenCheckout").value = checkoutDate;
        document.getElementById("hiddenFirstName").value = firstName;
        document.getElementById("hiddenLastName").value = lastName;
        document.getElementById("hiddenEmail").value = email;
        document.getElementById("hiddenMobileNumber").value = mobileNumber;
        document.getElementById("hiddenTotal").value = total*numRooms;
        document.getElementById("hiddenPaymentMethod").value = paymentMethod;

        document.getElementById("receiptModal").style.display = "block";
      }

      function closeModal() {
        document.getElementById("receiptModal").style.display = "none";
      }

    </script>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>

</html>