<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trip Planner Cards</title>
  <link rel="icon" type="image/png" href="Logo_Title.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

    body {
      font-family: "Poppins", sans-serif;
      min-height: 100vh;
      margin: 0;
    }

    .cards-container {
      display: grid;
      gap: 2rem;
      width: 100%;
      margin: 0 auto;
      padding: 1.5rem;
    }

    /* Mobile devices (1 card per row) */
    @media (min-width: 320px) {
      .cards-container {
        grid-template-columns: 1fr;
      }

      .card {
        max-width: 100%;
        min-width: 280px;
      }
    }

    /* Tablets (1 card per row but larger) */
    @media (min-width: 640px) {
      .cards-container {
        grid-template-columns: 1fr;
      }

      .card {
        max-width: 540px;
        margin: 0 auto;
        width: 100%;
      }
    }

    /* Large tablets/Small laptops (2 cards per row) */
    @media (min-width: 1024px) {
      .cards-container {
        grid-template-columns: repeat(2, 1fr);
      }

      .card {
        max-width: 100%;
      }
    }

    /* Large screens (2 cards per row but with maximum width) */
    @media (min-width: 1280px) {
      .cards-container {
        grid-template-columns: repeat(2, minmax(auto, 600px));
        justify-content: center;
      }
    }

    .card {
      height: 100%;
      background: white;
      border-radius: 0.75rem;
      overflow: hidden;
    }

    .rating {
      color: #ff7700;
    }

    .badge {
      background: linear-gradient(135deg, #94cfcf, #2c3e50);
    }

    .stat-card {
      transition: all 0.3s ease;
    }

    .stat-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .expertise-tag {
      transition: all 0.3s ease;
    }

    .expertise-tag:hover {
      background-color: #94cfcf;
      color: white;
      transform: scale(1.05);
    }

    .current-time {
      position: absolute;
      top: 0.75rem;
      right: 0.75rem;
      background: rgba(255, 255, 255, 0.9);
      padding: 0.25rem 0.75rem;
      border-radius: 0.5rem;
      font-size: 0.75rem;
      color: #2c3e50;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    @import url("https://fonts.cdnfonts.com/css/samarkan");

    .title {
      font-family: "Samarkan";
    }
  </style>
</head>

<body class="bg-gray-100">
  <?php
        include("includes/header.php");
      ?>
  <div class="mt-16 mb-[-0.7rem] max-w-7xl mx-auto">
    <h1 class="title font-bold text-gray-700 mb-2 text-5xl text-center">
      🌏 Discover & Explore: Travel Experiences in Sikkim    </h1>
    <p class="text-gray-600 text-xl font-serif px-20 text-center">
      Unlock the hidden gems of Sikkim – from ancient temples and lush forests
      to vibrant festivals and adventure trails. Plan unforgettable journeys with
      expert-curated itineraries, local insights, and experiences that celebrate
      the rich culture and natural beauty of the state.
    </p>

    <div class="flex justify-center items-center gap-5 mb-16 font-serif">
      <div class="px-3 py-4 mt-3 bg-orange-100 h-6 text-gray-600 font-medium rounded-lg flex items-center">
        🏞️ Explore Hidden Gems
      </div>
      <div class="px-3 py-4 mt-3 bg-purple-100 h-6 text-gray-600 font-medium rounded-lg flex items-center">
        🎭 Celebrate Culture
      </div>
      <div class="px-3 py-4 mt-3 bg-green-100 h-6 text-gray-600 font-medium rounded-lg flex items-center">
        🛶 Adventure Awaits
      </div>

    </div>
  </div>
  <div class="cards-container mb-10">
    <!-- First Card -->
    <div class="card shadow-lg">
      <div class="p-4 bg-[#94cfcf]">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start gap-4">
          <div class="flex flex-col md:flex-row items-center gap-4">
            <div class="relative">
              <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-white shadow-lg">
                <img src="assets/img/TP1.jpeg" alt="Trip Planner" class="w-full h-full object-cover" />
              </div>
              <div
                class="absolute bottom-1 right-0.5 bg-green-500 w-5 h-5 rounded-full border-2 border-white flex items-center justify-center">
                <i class="fas fa-check text-white text-xs"></i>
              </div>
            </div>
            <div class="text-center md:text-left">
              <h1 class="text-2xl font-bold text-white flex items-center gap-2">
                Krishna Patel
                <i class="fas fa-medal text-[#ff7700] text-sm"></i>
              </h1>
              <p class="text-white/90 text-sm flex items-center justify-center md:justify-start gap-2">
                <i class="fas fa-compass text-sm"></i>
                Professional Trip Planner
              </p>
              <div class="flex items-center justify-center md:justify-start mt-1">
                <div class="rating flex gap-0.5 text-sm">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
                <span class="text-white ml-2 text-sm">(4.8/5)</span>
              </div>
            </div>
          </div>
          <div class="flex flex-col items-center md:items-end gap-1 text-sm">
            <span class="badge px-3 py-1 rounded-full text-white font-medium flex items-center gap-1">
              <i class="fas fa-shield-alt text-xs"></i>
              Verified Expert
            </span>
            <p class="text-white flex items-center gap-1">
              <i class="fas fa-clock text-xs"></i>
              Member since 2023
            </p>
            <p class="text-white flex items-center gap-1">
              <i class="fas fa-user-circle text-xs"></i>
              @krish_travel_guru
            </p>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-3 p-3 bg-white">
        <div class="stat-card bg-red-300/60 p-2 rounded-lg shadow-md text-center">
          <i class="fas fa-route text-2xl text-gray-600 mb-1"></i>
          <p class="text-xl font-bold text-gray-800">230+</p>
          <p class="text-xs text-gray-600">Trips Planned</p>
        </div>
        <div class="stat-card bg-blue-300/60 p-2 rounded-lg shadow-md text-center">
          <i class="fas fa-chart-line text-2xl text-gray-600 mb-1"></i>
          <p class="text-xl font-bold text-gray-800">98%</p>
          <p class="text-xs text-gray-600">Success Rate</p>
        </div>
        <div class="stat-card bg-teal-300/60 p-2 rounded-lg shadow-md text-center">
          <i class="fas fa-globe-americas text-2xl text-gray-600 mb-1"></i>
          <p class="text-xl font-bold text-gray-800">15+</p>
          <p class="text-xs text-gray-600">Countries</p>
        </div>
        <div class="stat-card bg-purple-300/60 p-2 rounded-lg shadow-md text-center">
          <i class="fas fa-smile-beam text-2xl text-gray-600 mb-1"></i>
          <p class="text-xl font-bold text-gray-800">500+</p>
          <p class="text-xs text-gray-600">Happy Clients</p>
        </div>
      </div>

      <div class="p-3">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
          <div class="bg-gray-50 p-3 rounded-lg shadow-md">
            <h3 class="text-base font-semibold text-gray-800 mb-2 flex items-center gap-2">
              <i class="fas fa-certificate text-[#94cfcf] text-sm"></i>Expertise
            </h3>
            <div class="flex flex-wrap gap-1.5">
              <span
                class="expertise-tag px-2 py-0.5 bg-[#c4dfdf] text-gray-700 rounded-full text-xs flex items-center gap-1">
                <i class="fas fa-mountain text-xs"></i>Adventure Tours
              </span>
              <span
                class="expertise-tag px-2 py-0.5 bg-[#c4dfdf] text-gray-700 rounded-full text-xs flex items-center gap-1">
                <i class="fas fa-users text-xs"></i>Family Vacations
              </span>
            </div>
          </div>

          <div class="bg-gray-50 p-3 rounded-lg shadow-md">
            <h3 class="text-base font-semibold text-gray-800 mb-2 flex items-center gap-2">
              <i class="fas fa-address-card text-[#94cfcf] text-sm"></i>Contact
            </h3>
            <div class="grid gap-2">
              <div class="flex items-center bg-white p-2 rounded-lg text-sm">
                <i class="fas fa-envelope text-[#94cfcf] mr-2 text-xs"></i>
                <span class="text-gray-600 text-xs">krishna.patel@gmail.com</span>
              </div>
              <div class="flex items-center bg-white p-2 rounded-lg text-sm">
                <i class="fas fa-phone text-[#94cfcf] mr-2 text-xs"></i>
                <span class="text-gray-600 text-xs">+91 98765 43210</span>
              </div>
            </div>
          </div>
        </div>

        <div class="flex flex-col md:flex-row gap-2 mt-3">
          <button
            class="flex-1 bg-[#94cfcf] text-white py-2 px-4 rounded-lg font-medium hover:bg-[#c4dfdf] hover:text-gray-600 transition-all duration-300 flex items-center justify-center gap-2 text-sm">
            <i class="fas fa-calendar-alt text-xs"></i>
            Book a Consultation
          </button>
          <button
            class="flex-1 border-2 border-[#94cfcf] text-[#2c3e50] py-2 px-4 rounded-lg font-medium hover:bg-[#94cfcf] hover:text-white transition-all duration-300 flex items-center justify-center gap-2 text-sm">
            <i class="fas fa-paper-plane text-xs"></i>
            Send Message
          </button>
        </div>
      </div>
    </div>

    <!-- Second Card (Same structure as first card, different content) -->
    <!-- Add your second card here with the same structure but different content -->
    <div class="card shadow-lg">
      <div class="p-4 bg-[#94cfcf]">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start gap-4">
          <div class="flex flex-col md:flex-row items-center gap-4">
            <div class="relative">
              <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-white shadow-lg">
                <img src="assets/img/TP2.jpeg" alt="Trip Planner" class="w-full h-full object-cover" />
              </div>
              <div
                class="absolute bottom-1 right-0.5 bg-green-500 w-5 h-5 rounded-full border-2 border-white flex items-center justify-center">
                <i class="fas fa-check text-white text-xs"></i>
              </div>
            </div>
            <div class="text-center md:text-left">
              <h1 class="text-2xl font-bold text-white flex items-center gap-2">
                Aditi Sharma
                <i class="fas fa-medal text-[#ff7700] text-sm"></i>
              </h1>
              <p class="text-white/90 text-sm flex items-center justify-center md:justify-start gap-2">
                <i class="fas fa-compass text-sm"></i>
                Luxury Travel Expert
              </p>
              <div class="flex items-center justify-center md:justify-start mt-1">
                <div class="rating flex gap-0.5 text-sm">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
                <span class="text-white ml-2 text-sm">(4.8/5)</span>
              </div>
            </div>
          </div>
          <div class="flex flex-col items-center md:items-end gap-1 text-sm">
            <span class="badge px-3 py-1 rounded-full text-white font-medium flex items-center gap-1">
              <i class="fas fa-shield-alt text-xs"></i>
              Verified Expert
            </span>
            <p class="text-white flex items-center gap-1">
              <i class="fas fa-clock text-xs"></i>
              Member since 2020
            </p>
            <p class="text-white flex items-center gap-1">
              <i class="fas fa-user-circle text-xs"></i>
              @aditi_sharma
            </p>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-3 p-3 bg-white">
        <div class="stat-card bg-red-300/60 p-2 rounded-lg shadow-md text-center">
          <i class="fas fa-route text-2xl text-gray-600 mb-1"></i>
          <p class="text-xl font-bold text-gray-800">150+</p>
          <p class="text-xs text-gray-600">Trips Planned</p>
        </div>
        <div class="stat-card bg-blue-300/60 p-2 rounded-lg shadow-md text-center">
          <i class="fas fa-chart-line text-2xl text-gray-600 mb-1"></i>
          <p class="text-xl font-bold text-gray-800">95%</p>
          <p class="text-xs text-gray-600">Success Rate</p>
        </div>
        <div class="stat-card bg-teal-300/60 p-2 rounded-lg shadow-md text-center">
          <i class="fas fa-globe-americas text-2xl text-gray-600 mb-1"></i>
          <p class="text-xl font-bold text-gray-800">9+</p>
          <p class="text-xs text-gray-600">Countries</p>
        </div>
        <div class="stat-card bg-purple-300/60 p-2 rounded-lg shadow-md text-center">
          <i class="fas fa-smile-beam text-2xl text-gray-600 mb-1"></i>
          <p class="text-xl font-bold text-gray-800">180+</p>
          <p class="text-xs text-gray-600">Happy Clients</p>
        </div>
      </div>

      <div class="p-3">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
          <div class="bg-gray-50 p-3 rounded-lg shadow-md">
            <h3 class="text-base font-semibold text-gray-800 mb-2 flex items-center gap-2">
              <i class="fas fa-certificate text-[#94cfcf] text-sm"></i>Expertise
            </h3>
            <div class="flex flex-wrap gap-1.5">
              <span
                class="expertise-tag px-2 py-0.5 bg-[#c4dfdf] text-gray-700 rounded-full text-xs flex items-center gap-1">
                <i class="fas fa-landmark text-xs"></i>Cultural Trips
              </span>
              <span
                class="expertise-tag px-2 py-0.5 bg-[#c4dfdf] text-gray-700 rounded-full text-xs flex items-center gap-1">
                <i class="fas fa-crown text-xs"></i>Luxury Travel
              </span>
              <span
                class="expertise-tag px-2 py-0.5 bg-[#c4dfdf] text-gray-700 rounded-full text-xs flex items-center gap-1">
                <i class="fas fa-users text-xs"></i>Family Vacations
              </span>
            </div>
          </div>

          <div class="bg-gray-50 p-3 rounded-lg shadow-md">
            <h3 class="text-base font-semibold text-gray-800 mb-2 flex items-center gap-2">
              <i class="fas fa-address-card text-[#94cfcf] text-sm"></i>Contact
            </h3>
            <div class="grid gap-2">
              <div class="flex items-center bg-white p-2 rounded-lg text-sm">
                <i class="fas fa-envelope text-[#94cfcf] mr-2 text-xs"></i>
                <span class="text-gray-600 text-xs">aditi.sharma@gmail.com</span>
              </div>
              <div class="flex items-center bg-white p-2 rounded-lg text-sm">
                <i class="fas fa-phone text-[#94cfcf] mr-2 text-xs"></i>
                <span class="text-gray-600 text-xs">+91 99888 77665</span>
              </div>
            </div>
          </div>
        </div>

        <div class="flex flex-col md:flex-row gap-2 mt-3">
          <button
            class="flex-1 bg-[#94cfcf] text-white py-2 px-4 rounded-lg font-medium hover:bg-[#c4dfdf] hover:text-gray-600 transition-all duration-300 flex items-center justify-center gap-2 text-sm">
            <i class="fas fa-calendar-alt text-xs"></i>
            Book a Consultation
          </button>
          <button
            class="flex-1 border-2 border-[#94cfcf] text-[#2c3e50] py-2 px-4 rounded-lg font-medium hover:bg-[#94cfcf] hover:text-white transition-all duration-300 flex items-center justify-center gap-2 text-sm">
            <i class="fas fa-paper-plane text-xs"></i>
            Send Message
          </button>
        </div>
      </div>
    </div>


  </div>
  <?php
        include("includes/footer.php");
      ?>
</body>

</html>