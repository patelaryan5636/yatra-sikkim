<?php 
  
    session_start();
    require_once 'includes/scripts/connection.php';

    //                     Login required
    if (!isset($_SESSION['Yatra_logedin_user_id'])){
    header("location: /gandiv/userregister.php");
    exit;
}

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

    $stmt = $conn->prepare("SELECT * FROM `guide_master` WHERE `guide_id` = ?");
    $stmt->bind_param("i", $id);  // "i" means integer
    $stmt->execute();
    $result = $stmt->get_result();

     // Check if there is a result
     if ($result->num_rows > 0) {
      $guides = $result->fetch_assoc();
  } else {
      header("location: Guidecard");
      exit; // Stop further execution if no guide found
  }

    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Guide Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="icon" type="image/png" href="Logo_Title.png">
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
      class="bg-[#F8F6F4] shadow-lg rounded-lg flex flex-col md:flex-row overflow-hidden w-full max-w-5xl"
    >
      <div
        class="hidden md:flex w-1/2 bg-[#D2E9E9] flex-col justify-center items-center p-6 text-center"
      >
        <h2 class="text-black font-bold text-2xl">Explore with the Best</h2>
        <p class="text-black mt-2">
          Discover the beauty of Narmada Rajpipla with expert guides,
          personalized tours, and unforgettable experiences tailored just for
          you.
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

        <h2 class="text-xl md:text-2xl font-bold text-center mt-12 md:mt-10">
          Book Your Adventure with Yatra! 🌍
        </h2>
        <p class="text-gray-600 text-xs md:text-sm text-center">
          Fill in the details to reserve your guide and explore Narmada Rajpipla
          like never before!
        </p>

        <form class="mt-6" id="bookingForm">
          <label class="block mb-2 text-sm">Tour Type</label>
          <div class="relative">
            <select
              class="w-full px-3 py-2 border rounded-lg text-sm"
              id="roomType"
            >
              
              <option value="Solo Tour - ₹<?php echo $guides['solo_tour_fee'] ?>">Solo Tour - ₹<?php echo $guides['solo_tour_fee'] ?></option>
              <option value="Group Tour - ₹<?php echo $guides['group_tour_fee'] ?>">Group Tour - ₹<?php echo $guides['group_tour_fee'] ?></option>
              <option value="VIP Tour - ₹<?php echo $guides['vip_tour_fee'] ?>">VIP Tour - ₹<?php echo $guides['vip_tour_fee'] ?></option>
            </select>

            <label class="block mb-2 text-sm mt-2">Languages</label>
            <select
              class="w-full px-3 py-2 border rounded-lg text-sm"
              id="languageSelect"
            >
              <option value="Hindi">Hindi</option>
              <option value="English">English</option>
              <option value="Gujrati">Gujrati</option>
            </select>
          </div>

          <label class="block mt-4 mb-2 text-sm">Date and Time</label>
          <div class="relative flex space-x-2">

            <!-- <input
              type="date"
              class="w-1/2 px-3 py-2 border rounded-lg text-sm"
              id="checkinDate"
            /> -->
            <!-- <input
              type="time"
              class="w-1/2 px-3 py-2 border rounded-lg text-sm"
              id="checkinTime"
            /> -->
            <input
              type="text"
              id="checkinDate"
              class="w-full px-3 py-2 border rounded-lg text-sm pl-10"
              placeholder="Select a date"
            />
            <!-- Optional calendar icon (FontAwesome or your own SVG) -->
            <span class="absolute left-3 top-2.5 text-gray-400">
              📅
            </span>
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
        <form method="POST" id="receiptForm" action="makeGuidePayment.php?id=<?php echo $encryptedId;?>"  >
        <h2 class="text-2xl font-bold text-center mb-4">Booking Receipt</h2>
        <table class="receipt-table">
          <tr>
            <th>Item</th>
            <th>Details</th>
          </tr>
          <tr>
            <td>Tour Type</td>
            <td>
              <input id="receiptRoomType" type="text" name="receiptRoomType" readonly>
            </td>
          </tr>
          <tr>
            <td>Language</td>
            <td>
            <input id="receiptLanguage" type="text" name="receiptLanguage" readonly>
            </td>
          </tr>
          <tr>
            <td>Date</td>
            <td>
            <input id="receiptCheckin" type="text" name="receiptCheckin" readonly>
            </td>
          </tr>
          <tr>
            <td>First Name</td>
            <td>
            <input id="receiptFirstName" type="text" name="receiptFirstName" readonly>
            </td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td>
            <input id="receiptLastName" type="text" name="receiptLastName" readonly>
            </td>
          </tr>
          <tr>
            <td>Email</td>
            <td>
            <input id="receiptEmail" type="text" name="receiptEmail" readonly>
            </td>
          </tr>
          <tr>
            <td>Mobile Number</td>
            <td>
            <input id="receiptMobileNumber" type="text" name="receiptMobileNumber" readonly>
            </td>
          </tr>
          <tr>
            <td>Taxes</td>
            <td>₹20</td>
          </tr>
          <tr>
            <td>Total</td>
            <td>
            <input id="receiptTotal" type="text" name="receiptTotal" readonly>
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

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
      //                       Custome Calender
    const availableDaysFromPHP = "<?php echo $guides['available_days']; ?>".split(",");
    const weekdayMap = {
            "Sunday": 0,
            "Monday": 1,
            "Tuesday": 2,
            "Wednesday": 3,
            "Thursday": 4,
            "Friday": 5,
            "Saturday": 6
    };

  const allowedDays = availableDaysFromPHP.map(day => weekdayMap[day.trim()]);

  // Initialize Flatpickr on your date input
  flatpickr("#checkinDate", {
    dateFormat: "Y-m-d",
    disable: [
      function(date) {
        // Only allow if the day is in allowedDays
        return !allowedDays.includes(date.getDay());
      }
    ],
    minDate: "today" // Optional: Prevent selecting past dates
  });


      function showReceipt() {
        const roomType = document.getElementById("roomType").value;
        const checkinDate = document.getElementById("checkinDate").value;
        // const checkinTime = document.getElementById("checkinTime").value;
        const language = document.getElementById("languageSelect").value;
        const firstName = document.getElementById("firstName").value;
        const lastName = document.getElementById("lastName").value;
        const email = document.getElementById("email").value;
        const mobileNumber = document.getElementById("mobileNumber").value;

        const roomPrice = parseInt(roomType.split("₹")[1]);
        const total = roomPrice + 20;

        document.getElementById("receiptRoomType").value = roomType;
        document.getElementById("receiptLanguage").value = language;
        document.getElementById(
          "receiptCheckin"
        ).value = `${checkinDate}`;
        document.getElementById("receiptFirstName").value = firstName;
        document.getElementById("receiptLastName").value = lastName;
        document.getElementById("receiptEmail").value = email;
        document.getElementById("receiptMobileNumber").value = mobileNumber;
        document.getElementById("receiptTotal").value = `${total}`;

        document.getElementById("receiptModal").style.display = "block";
      }

      function closeModal() {
        document.getElementById("receiptModal").style.display = "none";
      }
    </script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    
  </body>
</html>
