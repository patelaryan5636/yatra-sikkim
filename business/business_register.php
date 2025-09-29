<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../Logo_Title.png">
    <title>Yatra - Business Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      .scroll-container::-webkit-scrollbar {
        width: 6px;
      }
      .scroll-container::-webkit-scrollbar-thumb {
        background: #c4dfdf;
        border-radius: 10px;
      }
      .cp,
      .cp *{
        cursor: pointer;
      }
    </style>
  </head>
  <body class="flex items-center justify-center min-h-screen bg-[#C4DFDF]">
    <div
      class="flex flex-col md:flex-row w-[80%] md:w-[80%] h-[80vh] bg-white shadow-lg rounded-lg overflow-hidden"
    >
      <div
        class="w-full md:w-1/2 flex flex-col justify-center p-6 md:p-10 bg-[#F8F6F4]"
      >
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
          Become a Business Owner on Yatra 🚀
        </h2>
        <p class="text-gray-600 mt-1">
          Join and manage your business with ease
        </p>
        <br>
        <?php
        if (isset($_SESSION['error_messages'])):
        ?>
        <br>
          <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 rounded-lg shadow-md mb-4">
            
            <strong class="block font-semibold">⚠️ Oops! Something went wrong.</strong>
            <ul class="mt-2 list-disc list-inside text-sm">              
                <li><?php echo $_SESSION['error_messages']; ?></li>
              
            </ul>
          </div>
        <?php
        endif;
        unset($_SESSION['error_messages']); // Clear errors after displaying
        ?>

        <form class="mt-6 space-y-4 h-[50vh] md:h-[55vh] overflow-y-auto pr-2 scroll-container" action="business_process_register" method="POST">
          <div> <div>
            <label for="block text-gray-600">Choose Your Role: Business Owner or Guide</label>
            <div class="w-full px-4 py-2 rounded-lg mt-1 bg-transperent gap-4" style="display: flex; align-items: center; justify-content: space-evenly; ">
              <div class="cp"><input type="radio" name="Business" id="hotel" value="hotel_owner">&nbsp;<label for="hotel">HOTEL OWNER</label></div>
              <div class="cp"><input type="radio" name="Business" id="stall" value="stall_owner">&nbsp;<label for="stall">STALL OWNER</label></div>
              <div class="cp"><input type="radio" name="Business" id="guide" value="guide">&nbsp;<label for="guide">GUIDE</label></div>
             
            </div>
          </div>
            <label class="block text-gray-700">Full Name</label>
            <input
              type="text"
              name= "username"
              class="w-full px-4 py-2 border rounded-lg mt-1"
              placeholder="Enter your full name"
            />
          </div>
        
          <div>
            <label class="block text-gray-700">Email Address</label>
            <input
              type="email"
              name="email"
              class="w-full px-4 py-2 border rounded-lg mt-1"
              placeholder="Enter your email address"
            />
          </div>

          <div>
            <label class="block text-gray-700">Mobile No</label>
            <input
              type="text"
              name="mobile"
              class="w-full px-4 py-2 border rounded-lg mt-1"
              placeholder="Enter your mobile number"
            />
          </div>

          <div>
            <label class="block text-gray-700">Gender</label>
            <select class="w-full px-4 py-2 border rounded-lg mt-1" name="gender">
              <option value="">Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
          </div>

          <div>
            <label class="block text-gray-700">Password</label>
            <input
              type="password"
              name="password"
              class="w-full px-4 py-2 border rounded-lg mt-1"
              placeholder="Enter your password"
            />
          </div>

          <div>
            <label class="block text-gray-700">Confirm Password</label>
            <input
              type="password"
              name="confirm_password"
              class="w-full px-4 py-2 border rounded-lg mt-1"
              placeholder="Re-enter your password"
            />
          </div>

          <button
            class="w-full bg-[#C4DFDF] text-white py-2 rounded-lg text-sm md:text-base mt-2"
          >
            Register Now  ➔
          </button>
        </form>

        <p class="text-sm text-gray-600 mt-4">
          Already have an account?
          <a href="business_login" class="text-blue-500">Sign in here</a>
        </p>
      </div>

      <div
        class="w-full md:w-1/2 bg-white p-6 md:p-10 flex flex-col justify-center"
      >
        <img src="../gandiv.png" alt="Yatra Logo" class="h-10 w-28 mb-4" />
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
          Welcome to Yatra
        </h2>
        <p class="text-gray-600 mt-2">
          Manage your business through Yatra effortlessly
        </p>

        <div class="grid grid-cols-2 gap-4 mt-6">
          <div class="bg-blue-50 p-4 rounded-lg flex flex-col items-center">
            <h3 class="font-semibold mt-2">🏨 Hotels Management</h3>
            <p class="text-xs md:text-sm text-gray-600 text-center">
              Manage bookings and availability.
            </p>
          </div>
          <div class="bg-green-50 p-4 rounded-lg flex flex-col items-center">
            <h3 class="font-semibold mt-2">🗺️ Local Guides</h3>
            <p class="text-xs md:text-sm text-gray-600 text-center">
              Connect with tourists easily.
            </p>
          </div>
          <div class="bg-yellow-50 p-4 rounded-lg flex flex-col items-center">
            <h3 class="font-semibold mt-2">🛍️ Handicrafts</h3>
            <p class="text-xs md:text-sm text-gray-600 text-center">
              Showcase and sell products.
            </p>
          </div>
          <div class="bg-red-50 p-4 rounded-lg flex flex-col items-center">
            <h3 class="font-semibold mt-2">🏛️ Museums</h3>
            <p class="text-xs md:text-sm text-gray-600 text-center">
              Manage visitor tickets.
            </p>
          </div>
        </div>

        <div class="flex justify-between mt-6 w-full gap-2">
          <div class="bg-[#E3F4F4] p-3 rounded-lg text-center w-1/4">
            <p class="text-lg md:text-xl font-bold text-red-500">123+</p>
            <p class="text-xs md:text-sm text-gray-600">Guides</p>
          </div>
          <div class="bg-[#E3F4F4] p-3 rounded-lg text-center w-1/4">
            <p class="text-lg md:text-xl font-bold text-blue-500">87+</p>
            <p class="text-xs md:text-sm text-gray-600">Hotels</p>
          </div>
          <div class="bg-[#E3F4F4] p-3 rounded-lg text-center w-1/4">
            <p class="text-lg md:text-xl font-bold text-green-500">4+</p>
            <p class="text-xs md:text-sm text-gray-600">Museums</p>
          </div>
          <div class="bg-[#E3F4F4] p-3 rounded-lg text-center w-1/4">
            <p class="text-lg md:text-xl font-bold text-yellow-500">246+</p>
            <p class="text-xs md:text-sm text-gray-600">Shops</p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>