<?php
require 'includes/scripts/connection.php';

  


$Query = "SELECT * FROM places_master where place_name = 'Rajpipla Heritage Museum' or  place_name = 'Jungle Safari Park' or place_name = 'Rajvant Palace' ";
$PlaceResult = mysqli_query($conn, $Query);
$placedata = [];
while ($row = mysqli_fetch_assoc($PlaceResult)) {
    $placedata[$row['place_name']] = $row['entry_fee'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Tourism Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      .bg-image {
        background: url("img/htlbg.jpg") no-repeat center center/cover;
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
      class="bg-[#F8F6F4] shadow-lg rounded-lg flex flex-col md:flex-row overflow-hidden w-full max-w-5xl"
    >
      <div
        class="hidden md:flex w-1/2 bg-[#D2E9E9] flex-col justify-center items-center p-6 text-center"
      >
        <h2 class="text-black font-bold text-2xl text-gray-700 font-serif">
          Book Your Perfect Tour
        </h2>
        <p class="text-black mt-2 text-gray-600">
          Experience the beauty and culture with seamless booking and
          personalized tours for an unforgettable experience.
        </p>

        <div class="flex justify-center items-center w-full mt-4">
          <script
            src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
            type="module"
          ></script>
          <dotlottie-player
            src="https://lottie.host/fbd299b4-fd36-47b2-8d33-a65f6d8188a7/Qrgf2w9Psh.lottie"
            background="transparent"
            speed="1"
            class="w-80 h-80"
            loop
            autoplay
          ></dotlottie-player>
        </div>
      </div>

      <div class="w-full md:w-3/5 relative p-6 md:p-10 form-scrollable">
        <div class="absolute top-6 left-1/2 transform -translate-x-1/2">
          <img src="gandiv.png" alt="Logo" class="h-10 md:h-12" />
        </div>

        <h2
          class="text-xl md:text-3xl mt-8 font-bold text-center mt-4 text-gray-700 font-serif"
        >
          Book Your Tour! 🎫
        </h2>
        <p class="text-gray-600 text-2xl md:text-sm text-center">
          Fill in the details to book your tickets
        </p>

        <form class="mt-6" id="bookingForm">
          <label class="block mb-2 text-sm">Select Destination</label>
          <div class="relative">
          <select class="w-full px-3 py-2 border rounded-lg text-sm" id="selectRoomType">

              <?php foreach ($placedata as $place => $price) : ?>
                <option value="<?php echo $place; ?> - ₹<?php echo $price; ?>">
                  <?php echo $place; ?> - ₹<?php echo $price; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <label class="block mt-4 mb-2 text-sm">Visit Date and Time</label>
          <div class="relative flex space-x-2">
            <input
              type="date"
              class="w-1/2 px-3 py-2 border rounded-lg text-sm"
              id="checkinDate"
            />
            <!-- <input
              type="time"
              class="w-1/2 px-3 py-2 border rounded-lg text-sm"
              id="checkinTime"
            /> -->
          </div>

          <label class="block mt-4 mb-2 text-sm">Number of Tickets</label>
          <div class="relative">
            <input
              type="number"
              class="w-full px-3 py-2 border rounded-lg text-sm"
              placeholder="Enter number of tickets"
              id="ticketCount"
              min="1"
              value="1"
            />
          </div>

          <label class="block mt-4 mb-2 text-sm">First Name</label>
          <div class="relative">
            <input
              type="text"
              class="w-full px-3 py-2 border rounded-lg text-sm"
              placeholder="Enter your First Name"
              id="firstName"
            />
          </div>

          <label class="block mt-4 mb-2 text-sm">Last Name</label>
          <div class="relative">
            <input
              type="text"
              class="w-full px-3 py-2 border rounded-lg text-sm"
              placeholder="Enter your Last Name"
              id="lastName"
            />
          </div>

          <label class="block mt-4 mb-2 text-sm">Email</label>
          <div class="relative">
            <input
              type="email"
              class="w-full px-3 py-2 border rounded-lg text-sm"
              placeholder="Enter your Email"
              id="email"
            />
          </div>  

          <label class="block mt-4 mb-2 text-sm">Mobile Number</label>
          <div class="relative">
            <input
              type="tel"
              class="w-full px-3 py-2 border rounded-lg text-sm"
              placeholder="Enter your Mobile Number"
              id="mobileNumber"
            />
          </div>

          <button
            type="button"
            class="w-full mt-4 bg-[#C4DFDF] text-white py-2 rounded-lg text-sm md:text-base"
            onclick="showReceipt()"
          >
            Continue →
          </button>
        </form>
      </div>
    </div>

    <div id="receiptModal" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2 class="text-2xl font-bold text-center mb-4">Booking Receipt</h2>

        <form method="POST" id="receiptForm" action="tourismbook_process.php"  >
          <table class="receipt-table">
            <tr>
              <th>Item</th>
              <th>Details</th>
            </tr>
            <tr>
              <td>Destination</td>
              <td id="receiptRoomType">
                <input type="text" name="roomType" id="receiptRoomTypeInput" readonly>
              </td>
            </tr>
            <tr>
              <td>Visit Date</td>
              <td id="receiptCheckin">
                <input type="text" name="checkinDate" id="r_checkinDate" readonly>
              </td>
            </tr>
            <tr>
              <td>Number of Tickets</td>
              <td id="receiptTicketCount">
                <input type="number" name="ticketCount" id="r_ticketCount" readonly>
              </td>
            </tr>
            <tr>
              <td>First Name</td>
              <td id="receiptFirstName">
                <input type="text" name="firstName" id="r_firstName" readonly>
              </td>
            </tr>
            <tr>
              <td>Last Name</td>
              <td id="receiptLastName">
                <input type="text" name="lastName" id="r_lastName" readonly>
              </td>
            </tr>
            <tr>
              <td>Email</td>
              <td id="receiptEmail">
                <input type="email" name="email" id="r_email" readonly>
              </td>
            </tr>
            <tr>
              <td>Mobile Number</td>
              <td id="receiptMobileNumber">
                <input type="text" name="mobileNumber" id="r_mobileNumber" readonly>
              </td>
            </tr>
            <tr>
              <td>Price per Ticket</td>
              <td id="receiptPricePerTicket">
                <input type="number" name="pricePerTicket" id="pricePerTicket" readonly>
              </td>
            </tr>
            <tr>
              <td>Total Amount</td>
              <td id="receiptTotal">
                <input type="number" name="totalAmount" id="totalAmount" readonly>
              </td>
            </tr>
          </table>
          <button
            type="submit"
            class="w-full mt-4 bg-[#C4DFDF] text-white py-2 rounded-lg text-sm md:text-base"
          >
            Confirm Payment →
          </button>
        </form>

      </div>
    </div>

    <script>
      function showReceipt() {
        const destination = document.getElementById("selectRoomType").value;
        const checkinDate = document.getElementById("checkinDate").value;
        const ticketCount = parseInt(document.getElementById("ticketCount").value);
        const firstName = document.getElementById("firstName").value;
        const lastName = document.getElementById("lastName").value;
        const email = document.getElementById("email").value;
        const mobileNumber = document.getElementById("mobileNumber").value;

        const pricePerTicket = parseInt(destination.split("₹")[1]);
        const total = pricePerTicket * ticketCount;

        document.getElementById("receiptRoomTypeInput").value = destination;

        document.getElementById("r_checkinDate").value = checkinDate;
        
        document.getElementById("r_ticketCount").value = ticketCount;
        document.getElementById("r_firstName").value = firstName;
        document.getElementById("r_lastName").value = lastName;
        document.getElementById("r_email").value = email;
        document.getElementById("r_mobileNumber").value = mobileNumber;

        document.getElementById("pricePerTicket").value = pricePerTicket;
        document.getElementById("totalAmount").value = total;

        document.getElementById("receiptModal").style.display = "block";
}

      
      function closeModal() {
        document.getElementById("receiptModal").style.display = "none";
      }
    </script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  </body>
</html>
