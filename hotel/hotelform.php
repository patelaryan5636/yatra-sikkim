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
    if($user_role != 4){
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
    <title>Hotel Registration</title>
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
  <body style="background-image: url('hotelbg.jpg')" class="overflow-x-auto">
    <div
      class="max-w-5xl mx-auto bg-[#f8f6f4] shadow-lg p-8 rounded-lg relative my-16"
    >
      <h2 class="text-3xl font-bold text-gray-800 text-center mt-3">
        List Your Hotel on Our Portal ✨
      </h2>
      <p class="text-gray-600 text-center mt-2 mb-4">
        Register your hotel and reach thousands of travelers looking for the
        best stay options. Join us today!
      </p>

      <div class="flex space-x-2 mt-2 justify-center">
        <span class="bg-[#C4DFDF] px-2 py-1 rounded text-xs md:text-sm"
          >🏨 Verified Hotel Listings</span
        >
        <span class="bg-[#C4DFDF] px-2 py-1 rounded text-xs md:text-sm">
          📋 Flexible Pricing Plans
        </span>
        <span class="bg-[#C4DFDF] px-2 py-1 rounded text-xs md:text-sm">
          💼 Secure & Trusted Platform</span
        >
      </div>

      <div class="container flex flex-col lg:flex-row">
        <div class="w-full lg:w-2/3 p-6">
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
          <form action="process_hotel" method="post" enctype="multipart/form-data">
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <input
              type="text"
              placeholder="Hotel Name"
              name="hotel_name"
              class="p-3 border rounded-md"
              required
            />
            <input
              type="text"
              placeholder="Owner Name"
              class="p-3 border rounded-md"
              name="owner_name"
              required
            />
            <input
              type="number"
              placeholder="Number of Rooms"
              name="num_rooms"
              class="p-3 border rounded-md"
              required
            />
            <input
              type="tel"
              placeholder="Contact Number"
              name="contact_number"
              class="p-3 border rounded-md"
              required
            />
            <input
              type="email"
              placeholder="Email ID"
              name="email"
              class="p-3 border rounded-md"
              required
            />
            <input
              type="text"
              placeholder="Hotel Address"
              name="hotel_address"
              class="p-3 border rounded-md"
              required
            />
            <input
              type="text"
              placeholder="Hotel License Number"
              name="license_number"
              class="p-3 border rounded-md"
              required
            />
            <input
              type="text"
              name="owner_aadhar"
              placeholder="Owner Aadhar Number"
              class="p-3 border rounded-md"
              required
            />
            <input
              type="text"
              placeholder="Owner PAN Number"
               name="owner_pan"
              class="p-3 border rounded-md"
              required
            />
</div>

          <h3 class="mt-6 text-lg font-semibold mb-3 text-center uppercase">
            Available Room Types
          </h3>
          <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <label><input type="checkbox" name="room_types[]" value="Single"/> Single Room</label>
            <label><input type="checkbox" name="room_types[]" value="Couple"/> Couple Room</label>
            <label><input type="checkbox" name="room_types[]" value="AC"/> AC Room</label>
            <label><input type="checkbox" name="room_types[]" value="VIP"/> VIP Room</label>
            <label><input type="checkbox" name="room_types[]" value="Luxury"/> Luxury Room</label>
            <label><input type="checkbox" name="room_types[]" value="Deluxe"/> Deluxe double room.</label>
          </div>

          <h3 class="mt-6 text-lg font-semibold mb-3 text-center uppercase">
            Facilities Provided
          </h3>
          <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <label><input type="checkbox" name="facilities[]" value="WiFi"/> WiFi</label>
            <label><input type="checkbox" name="facilities[]" value="Parking"/> Parking</label>
            <label><input type="checkbox" name="facilities[]" value="Restaurant"/> Restaurant</label>
            <label><input type="checkbox" name="facilities[]" value="Air Conditioning"/> Air Conditioning</label>
            <label><input type="checkbox" name="facilities[]" value="Swimming Pool"/> Swimming Pool</label>
            <label><input type="checkbox" name="facilities[]" value="24/7 Security"/> 24/7 Security</label>
            <label><input type="checkbox" name="facilities[]" value="Room Service"/> Room Service</label>
            <label><input type="checkbox" name="facilities[]" value="Conference Hall"/> Conference Hall</label>
          </div>

          <h3 class="mt-6 text-lg font-semibold mb-3 text-center uppercase">
            Payment Accepted in
          </h3>
          <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
    <label><input type="checkbox" name="payment_methods[]" value="UPI"> UPI</label>
    <label><input type="checkbox" name="payment_methods[]" value="Cash"> Cash</label>
    <label><input type="checkbox" name="payment_methods[]" value="Online Banking"> Online Banking</label>
    <label><input type="checkbox" name="payment_methods[]" value="Credit or Debit Card"> Credit or Debit Card</label>
</div>


          <h3 class="mt-6 text-lg font-semibold mb-3 text-center uppercase">
            Room Pricing (Per Night)
          </h3>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <input
              type="text"
              name="single_room_price"
              placeholder="Single Room Price"
              class="p-3 border rounded-md"
            />
            <input
              type="text"
              name="couple_room_price"
              placeholder="Couple Room Price"
              class="p-3 border rounded-md"
            />
            <input
              type="text"
              name="ac_room_price"
              placeholder="AC Room Price"
              class="p-3 border rounded-md"
            />
            <input
              type="text"
              name="vip_room_price"
              placeholder="VIP Room Price"
              class="p-3 border rounded-md"
            />
            <input
              type="text"
              name="luxury_room_price"
              placeholder="Luxury Room Price"
              class="p-3 border rounded-md"
            />
            <input
              type="text"
              name="deluxe_room_price"
              placeholder="Deluxe double room."
              class="p-3 border rounded-md"
            />
          </div>

          <h3 class="mt-6 mb-3 text-lg font-semibold text-center uppercase">
            Upload Documents
          </h3>
          <div class="grid grid-cols-1 gap-4">
            <label
              >Upload Hotel License
              <input type="file" name="hotel_license_doc" class="p-2 border rounded-md"
            /></label>
            <label
              >Upload Owner Aadhar
              <input type="file" name="owner_aadhar_doc" class="p-2 border rounded-md"
            /></label>
            <label
              >Upload Owner PAN
              <input type="file" name="owner_pan_doc" class="p-2 border rounded-md"
            /></label>
            <label
              >Upload Owner Photo
              <input type="file" name="owner_photo" class="p-2 border rounded-md"
            /></label>
          </div>

          <h3 class="mt-6 mb-3 text-lg font-semibold text-center uppercase">
            Upload Hotel Images
          </h3>
          <div class="grid grid-cols-1 gap-4">
            <label
              >Upload Image 1 <input type="file" name="hotel_images[]" class="p-2 border rounded-md"
            /></label>
            <label
              >Upload Image 2 <input type="file" name="hotel_images[]" class="p-2 border rounded-md"
            /></label>
            <label
              >Upload Image 3 <input type="file" name="hotel_images[]" class="p-2 border rounded-md"
            /></label>
            <label
              >Upload Image 4 <input type="file" name="hotel_images[]"  class="p-2 border rounded-md"
            /></label>
            <label
              >Upload Image 5 <input type="file" name="hotel_images[]" class="p-2 border rounded-md"
            /></label>
          </div>

          <button name="submit"
            class="mt-6 bg-[#C4DFDF] text-black uppercase p-3 rounded-md w-full hover:bg-[#E3F4F4]"
          >
            Submit →
          </button>
        </div>
      </form>
        <div class="w-full lg:w-1/3 p-6 flex flex-col items-center space-y-4">
            <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
            <dotlottie-player src="https://lottie.host/631374b1-3186-427f-87a3-bc262f3fc994/KavloAwKSB.lottie" background="transparent" speed="1" style="width: 200px; height: 200px" loop autoplay></dotlottie-player>
            <dotlottie-player  src="https://lottie.host/95e07591-e253-4271-85ae-9aaf84d83e6b/jXxeywsl5Y.lottie" background="transparent" speed="1" style="width: 200px; height: 200px" loop autoplay></dotlottie-player>
            <dotlottie-player  src="https://lottie.host/046382b4-0390-4c3e-9868-e2f5ff745778/bD13oOofOX.lottie" background="transparent  speed="1" style="width: 200px; height: 200px" loop autoplay></dotlottie-player>
            <dotlottie-player src="https://lottie.host/4e15bbaa-277b-4da0-a543-a5ff6f9be7d0/191vMGdiW8.lottie" background="transparent" speed="1" style="width: 200px; height: 200px" loop autoplay></dotlottie-player>
            <dotlottie-player src="https://lottie.host/f37cc523-2be5-4dda-887e-81a71b1afb94/Q7aKKoyCEN.lottie" background="transparent" speed="1" style="width: 200px; height: 200px" loop autoplay></dotlottie-player>
            <dotlottie-player src="https://lottie.host/180268a0-957f-43d2-b627-1a7236fc85df/wnaCNerebg.lottie" background="transparent" speed="1" style="width: 200px; height: 200px" loop autoplay></dotlottie-player>
        </div>
      </div>
      <div
        class="max-w-7xl mx-auto mt-1 mb-2 grid grid-cols-1 gap-3 md:grid-cols-3 text-black"
      >
        <div class="bg-red-100 p-6 rounded-lg text-center">
          🌍
          <h3 class="font-bold text-lg">Wider Audience Reach</h3>
          <p>Showcase your hotel to thousands of travelers.</p>
        </div>
        <div class="bg-green-100 rounded-lg p-6 shadow-md text-center">
          📅
          <h3 class="font-bold text-lg">Flexible Bookings</h3>
          <p>Manage your availability and pricing with ease.</p>
        </div>
        <div class="bg-blue-100 p-6 rounded-lg shadow-md text-center">
          💰
          <h3 class="font-bold text-lg">Maximize Earnings</h3>
          <p>Attract more guests and increase your revenue.</p>
        </div>
      </div>
    </div>
  </body>
</html>
