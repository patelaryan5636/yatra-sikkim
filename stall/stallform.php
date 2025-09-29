<?php
session_start();
require_once '../includes/scripts/connection.php';

if(isset($_SESSION['Yatra_logedin_user_id']) && (trim ($_SESSION['Yatra_logedin_user_id']) !== '')){
    $user_id = $_SESSION['Yatra_logedin_user_id'];
    $query = "SELECT * FROM user_master WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);
    $userdata = mysqli_fetch_assoc($result);
    $user_role = $userdata["user_role"];
    $is_sucess = $userdata["is_sucess"];
    $is_confirmed = $userdata["is_confirmed"];
    if($user_role != 5){
        header("Location: ../404");
        exit();
    }else{
        if($is_confirmed == 1){
            header("location: index");
            exit();
        }else if($is_sucess != 0){
            header("location: ../req");
        }
    }
} else {
    header("Location: ../business/business_register");
} 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Business Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    /* Custom fade-out animation */
    .fade-out {
      animation: fadeOut 10s forwards;
    }

    @keyframes fadeOut {
      0% {
        opacity: 1;
      }

      50% {
        opacity: 1;
      }

      100% {
        opacity: 0;
        display: none;
      }
    }
  </style>
  </head>
  <body style="background-image: url('hotelbg.jpg')">
    <div
      class="max-w-5xl mx-auto bg-[#f8f6f4] shadow-lg p-8 rounded-lg relative my-16"
    >
      <h2 class="text-3xl font-bold text-gray-800 text-center mt-3">
        List Your Business on Our Portal 🏪
      </h2>
      <p class="text-gray-600 text-center mt-2 mb-4">
        Register your business and connect with thousands of customers looking
        for unique products.
      </p>

      <div class="flex space-x-2 mt-2 justify-center">
        <span class="bg-[#C4DFDF] px-2 py-1 rounded text-xs md:text-sm">
          🏬 Showcase Your Business to Tourists
        </span>
        <span class="bg-[#C4DFDF] px-2 py-1 rounded text-xs md:text-sm">
          📅 Flexible Working Hours & Availability
        </span>
        <span class="bg-[#C4DFDF] px-2 py-1 rounded text-xs md:text-sm">
          💼 Verified & Trusted Business Listings
        </span>
      </div>

      <div class="container flex flex-col">
        <div class="w-full p-6">
        <?php if (isset($_SESSION['Yatra_error_message'])): ?>
        <div id="errorAlert"
          class="fade-out bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md mb-4">
          <div class="flex items-center justify-between">
            <div>
              <strong class="font-semibold text-lg">⚠️ Error!</strong>
              <p class="mt-1 text-sm">
                <?php echo $_SESSION['Yatra_error_message']; ?>
              </p>
            </div>
            <button onclick="closeErrorAlert()"
              class="text-red-700 hover:text-red-900 text-lg font-bold">&times;</button>
          </div>
        </div>
        <?php unset($_SESSION['Yatra_error_message']); // Clear message after displaying ?>
        <?php endif; ?>
          <form action="process_stall" method="POST" enctype="multipart/form-data">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input
              type="text"
              name="store_type"
              placeholder="Store Type (Handicrafts, Art, Idols, etc.)"
              class="p-3 border rounded-md"
              required
            />
            
            <input
              type="text"
              name="store_name"
              placeholder="Store Name"
              class="p-3 border rounded-md"
              required
            />
            <input
              type="text"
              name="owner_name"
              placeholder="Owner Name"
              class="p-3 border rounded-md"
              required
            />
            <input
              type="text"
              name="owner_aadhar_number"
              placeholder="Owner Aadhar Number"
              class="p-3 border rounded-md"
              required
            />
            <input
              type="text"
              name="owner_pan_number"
              placeholder="Owner PAN Number"
              class="p-3 border rounded-md"
              required
            />
            <input
              type="tel"
              name="owner_mobile_number"
              placeholder="Owner Mobile Number"
              class="p-3 border rounded-md"
              required
            />
            <input
              type="email"
              name="owner_email"
              placeholder="Email ID"
              class="p-3 border rounded-md"
              required
            />
          </div>

          <h3 class="mt-6 text-lg font-semibold mb-3 text-center uppercase">
            Business Availability
          </h3>
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <label><input type="checkbox" name="business_days[]" value="Monday"/> Monday</label>
            <label><input type="checkbox" name="business_days[]" value="Tuesday"/> Tuesday</label>
            <label><input type="checkbox" name="business_days[]" value="Wednesday"/> Wednesday</label>
            <label><input type="checkbox" name="business_days[]" value="Thursday"/> Thursday</label>
            <label><input type="checkbox" name="business_days[]" value="Friday"/> Friday</label>
            <label><input type="checkbox" name="business_days[]" value="Saturday"/> Saturday</label>
            <label><input type="checkbox" name="business_days[]" value="Sunday"/> Sunday</label>
          </div>

          <h3 class="mt-6 text-lg font-semibold mb-3 text-center uppercase">
            Business Timing
          </h3>
          <div class="grid grid-cols-2 gap-2">
            <input type="time" name="opening_time" class="p-3 border rounded-md" required />
            <input type="time" name="closing_time" class="p-3 border rounded-md" required />
          </div>

          <h3 class="mt-6 mb-3 text-lg font-semibold text-center uppercase">
            Upload Business Documents
          </h3>
          <div class="flex flex-col lg:flex-row gap-6">
            <div class="w-full lg:w-1/2">
              <h3 class="mt-6 mb-3 text-lg font-semibold text-center uppercase">
                Upload Documents
              </h3>
              <div class="grid grid-cols-1 gap-4">
                <label>
                  Upload Store Image 1
                  <input type="file" name="store_image" class="p-2 border rounded-md w-full" required/>
                </label>
                <label>
                  Upload Store Image 2
                  <input type="file" name="store_image2" class="p-2 border rounded-md w-full" required/>
                </label>
                <label>
                  Upload Store Image 3
                  <input type="file" name="store_image3" class="p-2 border rounded-md w-full" required/>
                </label>
                <label>
                  Upload Store Image 4
                  <input type="file" name="store_image4" class="p-2 border rounded-md w-full" required/>
                </label>
                <label>
                  Upload Owner Image 
                  <input type="file" name="owner_image" class="p-2 border rounded-md w-full" required/>
                </label>
                <label>
                  Upload Aadhar Image
                  <input type="file" name="aadhar_image" class="p-2 border rounded-md w-full" required/>
                </label>
                <label>
                  Upload PAN Image
                  <input type="file" name="pan_image" class="p-2 border rounded-md w-full" required/>
                </label>
                <label>
                  Upload Shop License
                  <input type="file" name="shop_license" class="p-2 border rounded-md w-full" required/>
                </label>
              </div>
            </div>

            <div class="w-full grid justify-center items-center">
            <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
            <dotlottie-player src="https://lottie.host/d0f51e0b-6545-4d2e-8d7a-694a32d7a37d/b8QLXk5q9S.lottie" background="transparent" speed="1" style="width: 500px; height: 500px" loop autoplay></dotlottie-player>
          
            </div>
          </div>

          <button
            class="mt-6 bg-[#C4DFDF] text-black uppercase p-3 rounded-md w-full hover:bg-[#E3F4F4]"
          >
            Submit →
          </button>
        </div>
        </form>
      </div>
      <div
        class="max-w-7xl mx-auto mt-1 mb-2 grid grid-cols-1 gap-3 md:grid-cols-3 text-black"
      >
        <div class="bg-red-100 p-6 rounded-lg text-center">
          🏪
          <h3 class="font-bold text-lg">Boost Your Sales</h3>
          <p>Showcase your products to tourists and grow your business.</p>
        </div>
        <div class="bg-green-100 rounded-lg p-6 shadow-md text-center">
          📆
          <h3 class="font-bold text-lg">Flexible Working Hours</h3>
          <p>Set your availability and operate at your convenience.</p>
        </div>
        <div class="bg-blue-100 p-6 rounded-lg shadow-md text-center">
          💰
          <h3 class="font-bold text-lg">Increase Profits</h3>
          <p>Expand your customer base and maximize your earnings.</p>
        </div>
      </div>
    </div>
  </body>
</html>
