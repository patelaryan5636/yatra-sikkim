<?php
  require '../includes/scripts/connection.php';  
  // include 'includes/scripts/config.php';
  session_start();

  function encrypt($data) {
                    $key = "Yatra@5636"; // Use a strong key
                    $iv = "1234567891011121"; // 16-byte IV (same during encryption & decryption)
                    return urlencode(openssl_encrypt($data, "AES-256-CBC", $key, 0, $iv));
                }

  if(isset($_SESSION['Yatra_logedin_user_id']) && (trim ($_SESSION['Yatra_logedin_user_id']) !== '')){
      $user_id = $_SESSION['Yatra_logedin_user_id'];
      $query = "SELECT * FROM user_master WHERE user_id = $user_id";
      $result = mysqli_query($conn, $query);
      $userdata = mysqli_fetch_assoc($result);
      $user_role = $userdata["user_role"];
      $user_name = $userdata['user_name'];
      $user_email = $userdata['email'];
      $user_gender = $userdata['gender'];
      $user_phone = $userdata['phone'];

      $encrypt_id = encrypt($user_id);
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="Logo_Title.png">
  <title>Yatra</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url("https://fonts.cdnfonts.com/css/samarkan");

    .slogan {
      font-family: "Samarkan";
    }

    .hover-underline {
      position: relative;
    }

    .hover-underline::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: -3px;
      width: 100%;
      height: 2px;
      background-color: #f8f6f4;
      transform: scaleX(0);
      transition: transform 0.3s ease-in-out;
    }

    .hover-underline:hover::after {
      transform: scaleX(1);
    }

    .ticker-container {
      position: relative;
      overflow: hidden;
      white-space: nowrap;
    }

    .ticker-content {
      display: inline-block;
      animation: tickerMove 20s linear infinite;
    }

    @keyframes tickerMove {
      from {
        transform: translateX(100%);
      }

      to {
        transform: translateX(-100%);
      }
    }

    .ticker-container:hover .ticker-content {
      animation-play-state: paused;
    }

    /* Mobile Menu Styles */
    .mobile-menu {
      transform: translateX(100%);
      transition: transform 0.3s ease-in-out;
    }

    .mobile-menu.open {
      transform: translateX(0);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .slogan {
        font-size: 1.5rem;
        line-height: 1.3;
      }
    }

    @media (max-width: 640px) {
      .slogan {
        font-size: 1.25rem;
        text-align: center;
      }

      .logo-container {
        gap: 0.5rem;
      }

      .logo-container img {
        height: 2.5rem;
      }
    }

    /* Navigation fixes for proper alignment */
    .nav-container {
      min-height: 50px;
      display: flex;
      align-items: center;
    }

    /* Ensure navigation items stay in single line */
    .nav-items {
      white-space: nowrap;
      /* overflow-x: auto; */
      scrollbar-width: none;
      /* Firefox */
      -ms-overflow-style: none;
      /* Internet Explorer 10+ */
    }

    /* Hide scrollbar for webkit browsers */
    .nav-items::-webkit-scrollbar {
      display: none;
    }

    .scrollbar-hide {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    .scrollbar-hide::-webkit-scrollbar {
      display: none;
    }

    /* Responsive navigation spacing */
    @media (min-width: 768px) and (max-width: 1024px) {
      .nav-items li {
        margin: 0 0.25rem;
      }

      .nav-items a {
        padding: 0.5rem 0.5rem;
        font-size: 0.8rem;
      }
    }

    @media (min-width: 1024px) and (max-width: 1200px) {
      .nav-items li {
        margin: 0 0.3rem;
      }

      .nav-items a {
        padding: 0.5rem 0.7rem;
        font-size: 0.85rem;
      }
    }

    @media (min-width: 1200px) and (max-width: 1400px) {
      .nav-items li {
        margin: 0 0.4rem;
      }

      .nav-items a {
        padding: 0.5rem 0.9rem;
        font-size: 0.9rem;
      }
    }

    @media (min-width: 1400px) {
      .nav-items li {
        margin: 0 0.5rem;
      }

      .nav-items a {
        padding: 0.5rem 1rem;
        font-size: 1rem;
      }
    }

    /* Ensure proper flex behavior */
    .nav-container {
      max-width: 100%;
    }
  </style>
  <style>
  body {
    scrollbar-width: thin;
    scrollbar-color: #8ebebe #c4dfdf;
  }

  /* For Chrome, Safari, and other WebKit browsers */
  ::-webkit-scrollbar {
    width: 8px; /* Adjust the width as you like */
  }

  ::-webkit-scrollbar-track {
    background: #c4dfdf;
  }

  ::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #8ebebe 0%, #527277 100%);
    border-radius: 8px;
    transition: background 0.3s;
  }

  ::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #a1dcdc 0%, #628a8f 100%);
  }
</style>
</head>

<body class="bg-gray-100">
  <header class="bg-[#F8F6F4] shadow-md">
    <!-- Main Header -->
    <div class="container mx-auto flex items-center justify-between py-4 px-4 sm:px-6">
      <!-- Left Logos -->
      <div class="flex items-center gap-2 sm:gap-4 logo-container">

        <a href="/gandiv">

          <img src="gandiv.png" alt="Logo 1" class="h-10 ml-[-10px] sm:h-12 md:h-14" />
        </a>
        <a href="/gandiv">

          <img src="yatra.png" alt="Logo 2" class="h-10 sm:h-12 md:h-14" />
        </a>
      </div>

      <!-- Center Slogan -->
      <h1
        class="slogan text-lg sm:text-xl md:text-2xl lg:text-3xl text-gray-600 hidden sm:block text-center flex-1 mx-4">
        Yatra by Gandiv – Where History Meets Innovation!
      </h1>

      <!-- Right Logos -->
      <div class="flex items-center gap-2 sm:gap-4 logo-container">
        <img src="./assets/img/sikkimtourism-logo.png" alt="Logo 4" class="h-10 sm:h-12 md:h-14" />
        <img src="./assets/img/sunawlo-sikkim-logo.jpg" alt="Logo 4" class="h-10 sm:h-12 md:h-14" />
        <img src="userhome/sih-logo.png" alt="SIH" class="h-10 mr-[-10px] sm:h-12 md:h-14" />
      </div>

      <!-- Mobile Menu Button -->
      <button id="mobile-menu-btn" class="md:hidden ml-4 p-2 text-gray-600 hover:text-gray-800 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>

    <!-- Mobile Slogan (visible on small screens) -->
    <div class="sm:hidden bg-[#F8F6F4] py-2 px-4 text-center border-t border-gray-200">
      <h1 class="slogan text-base text-gray-600">
        Yatra by Gandiv – Where History Meets Innovation!
      </h1>
    </div>

    <!-- Desktop Navigation -->
    <nav class="bg-[#C4DFDF] text-gray-600 hidden md:block">
    <div class="nav-container container mx-auto flex justify-between items-center gap-4 px-4 py-2 uppercase font-medium">

        <div class="flex-1 min-w-0 overflow-x-auto scrollbar-hide pb-40 -mb-40">
            <ul class="nav-items flex items-center">
                <li class="relative group hover-underline">
                    <a href="./index.php" class="block hover:text-gray-800 transition-colors">Home</a>
                </li>
                <li class="relative group hover-underline">
                    <a href="./jobcards" class="block hover:text-gray-800 transition-colors">Job & Opp</a>
                </li>
                <li class="relative group hover-underline">
                    <a href="#" class="block hover:text-gray-800 transition-colors">Bookings ▼</a>
                    <ul class="absolute left-0 w-auto pb-2 bg-[#C4DFDF] text-gray-600 rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-2 transition-all duration-300 shadow-lg z-50">
                        <li>
                            <a href="./Guidecard" class="block px-4 py-2 rounded-lg hover:bg-[#E3F4F4] transition-colors">Guide Booking</a>
                        </li>
                        <li>
                            <a href="./hotellist" class="block px-4 py-2 rounded-lg hover:bg-[#E3F4F4] transition-colors">Hotel Booking</a>
                        </li>
                        <li>
                            <a href="./stallcard" class="block px-4 py-2 rounded-lg hover:bg-[#E3F4F4] transition-colors">Explore Other Business</a>
                        </li>
                    </ul>
                </li>
                <li class="relative group hover-underline">
                    <a href="./business/business_login" class="block hover:text-gray-800 transition-colors">Business</a>
                </li>
                <li class="relative group hover-underline">
                    <a href="./userpost" class="block hover:text-gray-800 transition-colors">Posts</a>
                </li>
                <li class="relative group hover-underline">
                    <a href="#" class="block hover:text-gray-800 transition-colors">AI GUIDE ▼</a>
                    <ul class="absolute left-0 w-auto pb-2 bg-[#C4DFDF] text-gray-600 rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-2 transition-all duration-300 shadow-lg z-50">
                        <li>
                            <a href="./chatbot" class="block px-4 py-2 rounded-lg hover:bg-[#E3F4F4] transition-colors">AI Guide</a>
                        </li>
                        <li>
                            <a href="./aitrip-planner" class="block px-4 py-2 rounded-lg hover:bg-[#E3F4F4] transition-colors">AI Trip-Planner</a>
                        </li>
                    </ul>
                </li>
                <li class="relative group hover-underline">
                    <a href="#" class="block hover:text-gray-800 transition-colors">Explore Packages ▼</a>
                    <ul class="absolute left-0 w-auto pb-2 bg-[#C4DFDF] text-gray-600 rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-2 transition-all duration-300 shadow-lg z-50">
                        <li>
                            <a href="tripplanercard" class="block px-4 py-2 rounded-lg hover:bg-[#E3F4F4] transition-colors">Tour & Packages</a>
                        </li>
                        <li>
                            <a href="ourtripplanner" class="block px-4 py-2 rounded-lg hover:bg-[#E3F4F4] transition-colors">Travel Experts</a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="relative group hover-underline">
                    <a href="./chatbot" class="block hover:text-gray-800 transition-colors">AI Guide</a>
                </li>
                <li class="relative group hover-underline">
                    <a href="./aitrip-planner" class="block hover:text-gray-800 transition-colors">AI Trip-Planner</a>
                </li> -->
                <!-- <li class="relative group hover-underline">
                    <a href="tripplanercard" class="block hover:text-gray-800 transition-colors">Tour & Packages</a>
                </li> -->
                <li class="relative group hover-underline">
                    <a href="#" class="block hover:text-gray-800 transition-colors">Plan Your Visit ▼</a>
                    <ul class="absolute left-0 w-auto pb-2 bg-[#C4DFDF] text-gray-600 rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-2 transition-all duration-300 shadow-lg z-50">
                        <li>
                            <a href="./map" class="block px-4 py-2 rounded-lg hover:bg-[#E3F4F4] transition-colors">MAP</a>
                        </li>
                        <li>
                            <a href="./busdetails" class="block px-4 py-2 rounded-lg hover:bg-[#E3F4F4] transition-colors">Find Routes</a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="relative group hover-underline">
                    <a href="./map" class="block hover:text-gray-800 transition-colors">Map</a>
                </li>
                <li class="relative group hover-underline">
                    <a href="./busdetails" class="block hover:text-gray-800 transition-colors">Find Routes</a>
                </li> -->
                <!-- <li class="relative group hover-underline">
                    <a href="ourtripplanner" class="block hover:text-gray-800 transition-colors">Travel Experts</a>
                </li> -->
                <li class="relative group hover-underline">
                    <a href="contact-us" class="block hover:text-gray-800 transition-colors">Contact Us</a>
                </li>
            </ul>
        </div>

        <div class="relative group flex-shrink-0">
            <?php
            // for check user login or not 
            $currentURL = $_SERVER['PHP_SELF'];
            $currentPage = basename($currentURL);
            if (isset($_SESSION['Yatra_logedin_user_id'])) {
                if ($user_role == 3) {
            ?>
                    <img src="userhome/user_icon.png" alt="Avatar" onclick="openModal()" class="h-10 w-10 rounded-lg cursor-pointer border-2 border-white hover:border-gray-300 transition-colors" />
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></div>
                    <ul class="absolute right-0 w-48 bg-[#C4DFDF] text-gray-600 rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 shadow-lg z-50">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-[#E3F4F4] transition-colors">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-[#E3F4F4] transition-colors">My Bookings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-[#E3F4F4] transition-colors">Payment History</a>
                        </li>
                        <li>
                            <a href="./logout" class="block px-4 py-2 hover:bg-red-100 text-red-600 transition-colors">Logout →</a>
                        </li>
                    </ul>
                <?php
                }
            } else {
                ?>
                <a href="userlogin" class="flex items-center justify-center gap-2 hover:text-gray-800 transition-colors hover-underline">Login<img style="height:21px;" src="userhome/img/login.svg" alt="Login"></a>
            <?php
            }
            ?>
        </div>
    </div>
</nav>

    <!-- Mobile Navigation -->
    <nav id="mobile-menu"
      class="mobile-menu md:hidden fixed inset-y-0 right-0 w-80 max-w-full bg-white shadow-2xl z-50">
      <div class="flex flex-col h-full">
        <!-- Mobile Header -->
        <div class="flex items-center justify-between p-4 bg-[#F8F6F4] border-b">
          <h2 class="text-lg font-semibold text-gray-700">Menu</h2>
          <button id="close-menu" class="p-2 text-gray-600 hover:text-gray-800">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>

        <!-- Mobile User Info -->
        <div class="p-4 bg-[#C4DFDF] border-b">
          <div class="flex items-center gap-3" onclick="openModal()">
            <div class="relative">
              <img src="userhome/user_icon.png" alt="Avatar" class="h-12 w-12 rounded-lg border-2 border-white" />
              <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></div>
            </div>
            <div>
              <p class="font-medium text-gray-700"><?php echo $user_name; ?></p>
              <p class="text-sm text-gray-600">Online</p>
            </div>
          </div>
        </div>

        <!-- Mobile Menu Items -->
        <div class="flex-1 overflow-y-auto p-4">
          <ul class="space-y-2">
            <li>
              <a href="./index.php"
                class="block px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                🏠 Home
              </a>
            </li>
            <li>
              <a href="./jobcards" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                🔍 Explore
              </a>
            </li>
            <li>
              <button
                class="booking-toggle w-full text-left px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors flex items-center justify-between">
                📅 Bookings
                <svg class="w-4 h-4 transition-transform booking-arrow" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
                </svg>
              </button>
              <ul class="booking-submenu ml-6 mt-1 space-y-1 max-h-0 overflow-hidden transition-all duration-300">
                <li>
                  <a href="./Guidecard"
                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">Guide
                    Booking</a>
                </li>
                <li>
                  <a href="./hotellist"
                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">Hotel
                    Booking</a>
                </li>
                <li>
                  <a href="./stallcard"
                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">Explore
                    Other Business</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="./business/business_login" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                🏭 BUSINESS
              </a>
            </li>
            <li>
              <a href="./userpost" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                📽️ POSTS
              </a>
            </li>
            <li>
              <a href="../chatbot" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                📱 AI Guide
              </a>
            </li>
            <li>
              <a href="./aitrip-planner"
                class="block px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                🎉 AI Trip-planner
              </a>
            </li>
            <li>
              <a href="./tripplanercard"
                class="block px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                🖼️ Tour & Packages
              </a>
            </li>
            <li>
              <a href="./map" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                📚 map
              </a>
            </li>
            <li>
              <a href="./busdetails"
                class="block px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                🛣️ Find Routes
              </a>
            </li>
            <li>
              <a href="contact-us" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                📞 Contact Us
              </a>
            </li>
          </ul>

          <!-- Mobile User Actions -->
          <div class="mt-6 pt-4 border-t border-gray-200">
            <h3 class="text-sm font-medium text-gray-500 mb-3 px-4">
              Account
            </h3>
            <ul class="space-y-1">
              <li>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">📊
                  Dashboard</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">📋 My
                  Bookings</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">💳
                  Payment History</a>
              </li>
              <li>
                <a href="#"
                  class="block px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors font-medium">🚪
                  Logout →</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-overlay"
      class="md:hidden fixed inset-0 bg-black bg-opacity-50 z-40 opacity-0 invisible transition-all duration-300"></div>

    <!-- Ticker -->
    <div class="ticker-container bg-[#E3F4F4] text-gray-800 py-2 px-4 overflow-hidden">
      <div class="ticker-content whitespace-nowrap">
        <span class="inline-block mr-8">🚀 Special Offer! Get 20% off on all bookings this week!</span>
        <span class="inline-block mr-8">🎉 New destinations added! Explore now.</span>
        <span class="inline-block mr-8">📢 Customer support available 24/7 for any assistance.</span>
      </div>
    </div>
  </header>






  <div id="profileModal"
    class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50">
    <!-- Modal Card -->
    <div class="bg-white w-full max-w-2xl rounded-2xl shadow-xl animate-fadeIn m-3">
      <!-- Header -->
      <div class="flex justify-between items-center p-5 border-b">
        <h2 class="text-xl font-semibold text-gray-700">Profile Settings</h2>
        <button onclick="closeModal()" class="text-gray-500 hover:text-red-500">
          <i class="fas fa-times text-xl"></i>
        </button>
      </div>

      <!-- Body -->
      <form action="userhome/update_profile.php?id=<?php echo $encrypt_id; ?>" method="post" class="p-6 space-y-6">
        <!-- Profile Photo + Name/Email -->
        <div class="flex items-center space-x-4">
          <div class="relative">
            <img id="profileImage" src="userhome/user_icon.png" alt="Profile"
              class="w-24 h-24 rounded-full object-cover cursor-pointer border-4 border-[#57a1a1] shadow-md hover:opacity-80"
              onclick="triggerFileInput()">
            <input type="file" id="fileInput" class="hidden" accept="image/*" onchange="handleImageUpload(event)">
          </div>
          <div>
            <h3 id="displayName" class="text-lg font-bold text-gray-800"><?php echo $user_name; ?></h3>
            <p id="displayEmail" class="text-sm text-gray-500"><?php echo $user_email; ?></p>
            <a href="forget_password" class="text-sm text-blue-500">Change Password</a>
          </div>
        </div>

        <!-- Form -->
        <div id="profileForm" class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Name -->
          <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Name</label>
            <input id="fullName" value=<?php echo $user_name; ?> name="name"
              class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none"
              >
          </div>

          <!-- Email -->
          <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
            <input id="email" value="<?php echo $user_email; ?>" disabled
              class="w-full border rounded-lg px-3 py-2 bg-gray-100 text-gray-500 cursor-not-allowed">
          </div>

          <!-- Phone -->
          <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Phone Number</label>
            <input id="phone" value="<?php echo $user_phone; ?>" name="phone" type="number"
              class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
          </div>

          <!-- Gender (Custom Dropdown) -->
          <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Gender</label>
            <div class="relative">
              <select
                name="gender"
                class="w-full appearance-none flex items-center justify-between border rounded-lg px-3 py-2 text-gray-700 bg-white shadow-sm hover:border-blue-500 focus:ring-2 focus:ring-blue-400 transition cursor-pointer">
                <option value="Male" class="flex items-center">
                  <i class="fa-solid fa-mars" style="color: #74C0FC;"></i> Male
                </option>
                <option value="Female" class="flex items-center">
                  <i class="fa-solid fa-venus" style="color: #dd62df;"></i> Female
                </option>
                <option value="Other" class="flex items-center">
                  <i class="fa-regular fa-circle" style="color: #5f4d93;"></i> Other
                </option>
              </select>
              <!-- Dropdown arrow icon -->
              <i
                class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 pointer-events-none"></i>
            </div>
          </div>
          <button onclick="closeModal()"
            class="px-4 py-2 border rounded-lg hover:bg-gray-100 transition">Cancel</button>
          <input type="submit"
            class="px-6 py-2 bg-[#a4d8d8] text-white rounded-lg shadow hover:bg-[#6bbcbc] transition-all duration-150 cursor-pointer"
            value="Update"></input>
        </div>
      </form>
    </div>
  </div>

  <script>
    function openModal() {
      document.getElementById("profileModal").classList.remove("hidden");
    }
    function closeModal() {
      document.getElementById("profileModal").classList.add("hidden");
    }

    // Profile photo change
    function triggerFileInput() {
      document.getElementById("fileInput").click();
    }
    function handleImageUpload(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = e => document.getElementById("profileImage").src = e.target.result;
        reader.readAsDataURL(file);
      }
    }

    // Update live name display
    function updateName() {
      document.getElementById("displayName").textContent = document.getElementById("fullName").value;
    }

    // Dropdown
    function toggleDropdown() {
      document.getElementById("genderDropdown").classList.toggle("hidden");
    }
    function selectGender(value) {
      let icon = value === "Male" ? '<i class="fas fa-mars mr-2 text-blue-600"></i>' :
        value === "Female" ? '<i class="fas fa-venus mr-2 text-pink-600"></i>' :
          '<i class="fas fa-genderless mr-2 text-purple-600"></i>';
      document.getElementById("genderValue").innerHTML = icon + value;
      document.getElementById("genderDropdown").classList.add("hidden");
    }
  </script>
  <script src="https://kit.fontawesome.com/2f64f3b789.js" crossorigin="anonymous"></script>
  <script>
    // Mobile menu functionality
    const mobileMenuBtn = document.getElementById("mobile-menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");
    const closeMenuBtn = document.getElementById("close-menu");
    const mobileOverlay = document.getElementById("mobile-overlay");

    function openMobileMenu() {
      mobileMenu.classList.add("open");
      mobileOverlay.classList.remove("opacity-0", "invisible");
      document.body.style.overflow = "hidden";
    }

    function closeMobileMenu() {
      mobileMenu.classList.remove("open");
      mobileOverlay.classList.add("opacity-0", "invisible");
      document.body.style.overflow = "";
    }

    mobileMenuBtn.addEventListener("click", openMobileMenu);
    closeMenuBtn.addEventListener("click", closeMobileMenu);
    mobileOverlay.addEventListener("click", closeMobileMenu);

    // Mobile submenu toggle
    const bookingToggle = document.querySelector(".booking-toggle");
    const bookingSubmenu = document.querySelector(".booking-submenu");
    const bookingArrow = document.querySelector(".booking-arrow");

    if (bookingToggle && bookingSubmenu) {
      bookingToggle.addEventListener("click", (e) => {
        e.preventDefault();
        const isOpen =
          bookingSubmenu.style.maxHeight &&
          bookingSubmenu.style.maxHeight !== "0px";

        if (isOpen) {
          bookingSubmenu.style.maxHeight = "0px";
          bookingArrow.style.transform = "rotate(0deg)";
        } else {
          bookingSubmenu.style.maxHeight = bookingSubmenu.scrollHeight + "px";
          bookingArrow.style.transform = "rotate(180deg)";
        }
      });
    }

    // Desktop dropdown functionality
    document.querySelectorAll(".group").forEach((menu) => {
      const dropdown = menu.querySelector("ul");
      if (dropdown) {
        menu.addEventListener("mouseenter", () => {
          dropdown.classList.remove("opacity-0", "invisible");
        });
        menu.addEventListener("mouseleave", () => {
          dropdown.classList.add("opacity-0", "invisible");
        });
      }
    });

    // Ticker functionality
    const ticker = document.querySelector(".ticker-content");
    const tickerContainer = document.querySelector(".ticker-container");

    if (ticker && tickerContainer) {
      tickerContainer.addEventListener("mouseenter", () => {
        ticker.style.animationPlayState = "paused";
      });

      tickerContainer.addEventListener("mouseleave", () => {
        ticker.style.animationPlayState = "running";
      });
    }

    // Close mobile menu on escape key
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") {
        closeMobileMenu();
      }
    });

    // Handle window resize
    window.addEventListener("resize", () => {
      if (window.innerWidth >= 768) {
        closeMobileMenu();
      }
    });
  </script>
</body>

</html>