<?php
require 'includes/scripts/connection.php';

$Query = "SELECT * FROM places_master where place_name = 'Jungle Safari Park' ";
$PlaceResult = mysqli_query($conn, $Query);
$placedata = [];
while ($row = mysqli_fetch_assoc($PlaceResult)) {
    $placedata['name'] = $row['place_name'];
    $placedata['location'] = $row['location'];
    $placedata['opening_hour'] = $row['opening_hours'];
    $placedata['price'] = $row['entry_fee'];
    $placedata['contact'] = $row['contact_info'];
    $placedata['rating'] = $row['rating'];
    $placedata['longitude'] = $row['longitude'];
    $placedata['latitude'] = $row['latitude'];
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Safari Booking</title>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      @import url("https://fonts.cdnfonts.com/css/samarkan");
      .hello {
        font-family: "Samarkan";
      }

      body {
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M54.627 0l.83.828-1.415 1.415L51.8 0h2.827zM5.373 0l-.83.828L5.96 2.243 8.2 0H5.374zM48.97 0l3.657 3.657-1.414 1.414L46.143 0h2.828zM11.03 0L7.372 3.657 8.787 5.07 13.857 0H11.03zm32.284 0L49.8 6.485 48.384 7.9l-7.9-7.9h2.83zM16.686 0L10.2 6.485 11.616 7.9l7.9-7.9h-2.83zm20.97 0l9.315 9.314-1.414 1.414L34.828 0h2.83zM22.344 0L13.03 9.314l1.414 1.414L25.172 0h-2.83zM32 0l12.142 12.142-1.414 1.414L30 .828 17.272 13.556l-1.414-1.414L28 0h4zM.284 0l28 28-1.414 1.414L0 2.544V0h.284zM0 5.373l25.456 25.455-1.414 1.415L0 8.2V5.374zm0 5.656l22.627 22.627-1.414 1.414L0 13.86v-2.83zm0 5.656l19.8 19.8-1.415 1.413L0 19.514v-2.83zm0 5.657l16.97 16.97-1.414 1.415L0 25.172v-2.83zM0 28l14.142 14.142-1.414 1.414L0 30.828V28zm0 5.657L11.314 44.97 9.9 46.386l-9.9-9.9v-2.828zm0 5.657L8.485 47.8 7.07 49.212 0 42.143v-2.83zm0 5.657l5.657 5.657-1.414 1.415L0 47.8v-2.83zm0 5.657l2.828 2.83-1.414 1.413L0 53.456v-2.83zM54.627 60L30 35.373 5.373 60H8.2L30 38.2 51.8 60h2.827zm-5.656 0L30 41.03 11.03 60h2.828L30 43.858 46.142 60h2.83zm-5.656 0L30 46.686 16.686 60h2.83L30 49.515 40.485 60h2.83zm-5.657 0L30 52.343 22.343 60h2.83L30 55.172 34.828 60h2.83zM32 60l-2-2-2 2h4zM59.716 0l-28 28 1.414 1.414L60 2.544V0h-.284zM60 5.373L34.544 30.828l1.414 1.415L60 8.2V5.374zm0 5.656L37.373 33.656l1.414 1.414L60 13.86v-2.83zm0 5.656l-19.8 19.8 1.415 1.413L60 19.514v-2.83zm0 5.657l-16.97 16.97 1.414 1.415L60 25.172v-2.83zM60 28L45.858 42.142l1.414 1.414L60 30.828V28zm0 5.657L48.686 44.97l1.415 1.415 9.9-9.9v-2.828zm0 5.657L51.515 47.8l1.414 1.413 7.07-7.07v-2.83zm0 5.657l-5.657 5.657 1.414 1.415L60 47.8v-2.83zm0 5.657l-2.828 2.83 1.414 1.413L60 53.456v-2.83zM39.9 16.385l1.414-1.414L30 3.658 18.686 14.97l1.415 1.415 9.9-9.9 9.9 9.9zm-2.83 2.828l1.415-1.414L30 9.313 21.515 17.8l1.414 1.413 7.07-7.07 7.07 7.07zm-2.827 2.83l1.414-1.416L30 14.97l-5.657 5.657 1.414 1.415L30 17.8l4.243 4.242zm-2.83 2.827l1.415-1.414L30 20.626l-2.828 2.83 1.414 1.414L30 23.456l1.414 1.414zM56.87 59.414L58.284 58 30 29.716 1.716 58l1.414 1.414L30 32.544l26.87 26.87z' fill='%23c4dfdf' fill-opacity='0.56' fill-rule='evenodd'/%3E%3C/svg%3E");
      }
    </style>
  </head>
  <body class="bg-[#f8f6f4] flex flex-col items-center font-[Poppins]">
    <div
      class="flex flex-col md:flex-row w-4/5 h-[70vh] mt-24 bg-[#f8f6f4] rounded-2xl overflow-hidden"
    >
      <div
        class="w-full md:w-1/2 flex flex-col justify-center p-10 text-gray-800"
      >
        <h1 class="text-4xl font-[Playfair]">
          Embark on a Thrilling Safari Adventure
        </h1>
        <p class="text-lg text-gray-600 mt-3">
          Book your safari experience today and explore the breathtaking
          wilderness, exotic wildlife, and the untamed beauty of nature up
          close.
        </p>

        <button
          class="mt-5 px-6 py-3 bg-gray-800 text-white text-lg rounded-md hover:bg-gray-700 transition-transform transform hover:scale-105"
        >
          Book Now
        </button>
      </div>
      <div
        class="w-full md:w-1/2 bg-[url('Forest.png')] bg-cover bg-center"
      ></div>
    </div>

    <section class="text-center py-12 w-11/12">
      <h2 class="hello text-6xl font-[Playfair] text-gray-800 mb-10 mt-12">
        Discover More About the Safari
      </h2>
      <div class="flex flex-wrap justify-center gap-5">
        <div
          class="w-72 bg-gradient-to-br from-[#d4efef] to-[#f8f6f4] rounded-xl p-6 text-center shadow-lg backdrop-blur-md transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col items-center"
        >
          <i class="fa-solid fa-tree text-4xl text-gray-600 mb-3"></i>
          <h3 class="text-xl font-semibold text-gray-700">Safari Name</h3>
          <p class="text-gray-600"><?php echo $placedata['name'] ?></p>
        </div>
        <div
          class="w-72 bg-gradient-to-br from-[#d4efef] to-[#f8f6f4] rounded-xl p-6 text-center shadow-lg backdrop-blur-md transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col items-center"
        >
          <i class="fas fa-map-marker-alt text-4xl text-gray-600 mb-3"></i>
          <h3 class="text-xl font-semibold text-gray-700">Location</h3>
          <p class="text-gray-600"><?php echo $placedata['location'] ?></p>
        </div>
        <div
          class="w-72 bg-gradient-to-br from-[#d4efef] to-[#f8f6f4] rounded-xl p-6 text-center shadow-lg backdrop-blur-md transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col items-center"
        >
          <i class="fas fa-clock text-4xl text-gray-600 mb-3"></i>
          <h3 class="text-xl font-semibold text-gray-700">Safari Timings</h3>
          <p class="text-gray-600"><?php echo $placedata['opening_hour'] ?></p>
        </div>
        <div
          class="w-72 bg-gradient-to-br from-[#d4efef] to-[#f8f6f4] rounded-xl p-6 text-center shadow-lg backdrop-blur-md transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col items-center"
        >
          <i class="fas fa-ticket-alt text-4xl text-gray-600 mb-3"></i>
          <h3 class="text-xl font-semibold text-gray-700">Ticket Price</h3>
          <p class="text-gray-600"><?php echo  "₹" . $placedata['price'] ?>per person</p>
        </div>
        <div
          class="w-72 bg-gradient-to-br from-[#d4efef] to-[#f8f6f4] rounded-xl p-6 text-center shadow-lg backdrop-blur-md transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col items-center"
        >
          <i class="fas fa-paw text-4xl text-gray-600 mb-3"></i>
          <h3 class="text-xl font-semibold text-gray-700">Wildlife Spotting</h3>
          <p class="text-gray-600">
            Lions, Tigers, Elephants, Deer, Exotic Birds
          </p>
        </div>
        <div
          class="w-72 bg-gradient-to-br from-[#d4efef] to-[#f8f6f4] rounded-xl p-6 text-center shadow-lg backdrop-blur-md transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col items-center"
        >
          <i class="fas fa-user-tie text-4xl text-gray-600 mb-3"></i>
          <h3 class="text-xl font-semibold text-gray-700">Guided Tours</h3>
          <p class="text-gray-600">Available with Expert Rangers</p>
        </div>
        <div
          class="w-72 bg-gradient-to-br from-[#d4efef] to-[#f8f6f4] rounded-xl p-6 text-center shadow-lg backdrop-blur-md transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col items-center"
        >
          <i class="fas fa-phone text-4xl text-gray-600 mb-3"></i>
          <h3 class="text-xl font-semibold text-gray-700">Contact</h3>
          <p class="text-gray-600"><?php echo $placedata['contact'] ?></p>
        </div>
        <div
          class="w-72 bg-gradient-to-br from-[#d4efef] to-[#f8f6f4] rounded-xl p-6 text-center shadow-lg backdrop-blur-md transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col items-center"
        >
          <i class="fas fa-star text-4xl text-gray-600 mb-3"></i>
          <h3 class="text-xl font-semibold text-gray-700">Ratings & Reviews</h3>
          <p class="text-gray-600"><?php echo $placedata['rating'] ?>/5 (Based on 2,500 reviews)</p>
        </div>
      </div>
    </section>

    <section class="container mx-auto px-6 md:px-12 lg:px-20 py-16">
      <div
        class="bg-white shadow-xl rounded-xl p-8 md:p-12 mb-12 border-l-8 border-[#2c3e50]"
      >
        <h2
          class="text-4xl font-playfair text-gray-900 font-semibold mb-6 border-b-2 pb-2"
        >
          About the Safari
        </h2>
        <p class="text-lg leading-relaxed text-gray-700">
          Experience the thrill of the
          <span class="font-semibold">Jungle Safari</span>, an adventure into
          the heart of nature. Witness the breathtaking beauty of lush
          landscapes and diverse wildlife, including
          <span class="text-[#2c3e50] font-medium"
            >majestic tigers, leopards, elephants, exotic birds, and rare
            flora</span
          >. The safari offers an unforgettable journey through dense forests,
          open grasslands, and serene water bodies, providing an immersive
          experience in the wild.
        </p>
      </div>

      <div
        class="bg-white shadow-lg rounded-xl p-8 md:p-12 mb-12 border-l-8 border-[#d4af37]"
      >
        <h2
          class="text-4xl font-playfair text-gray-900 font-semibold mb-6 border-b-2 pb-2"
        >
          Safari Rules & Guidelines
        </h2>
        <ul class="space-y-4 text-lg leading-relaxed text-gray-700">
          <li class="flex items-center gap-3">
            <i class="fas fa-volume-mute text-xl text-[#d4af37]"></i> Maintain
            silence to avoid disturbing wildlife.
          </li>
          <li class="flex items-center gap-3">
            <i class="fas fa-camera text-xl text-[#d4af37]"></i> Photography is
            allowed but avoid flash usage.
          </li>
          <li class="flex items-center gap-3">
            <i class="fas fa-tree text-xl text-[#d4af37]"></i> Do not
            litter—help keep the jungle clean.
          </li>
          <li class="flex items-center gap-3">
            <i class="fas fa-car text-xl text-[#d4af37]"></i> Stay inside the
            safari vehicle at all times.
          </li>
          <li class="flex items-center gap-3">
            <i class="fas fa-fire text-xl text-[#d4af37]"></i> No smoking or
            open flames inside the forest.
          </li>
          <li class="flex items-center gap-3">
            <i class="fas fa-user-shield text-xl text-[#d4af37]"></i> Follow all
            instructions given by the safari guide.
          </li>
        </ul>
      </div>

      <div
        class="bg-white shadow-xl rounded-xl p-8 md:p-12 border-l-8 border-[#16a085]"
      >
        <h2
          class="text-4xl font-playfair text-gray-900 font-semibold mb-6 border-b-2 pb-2"
        >
          Visitor Facilities
        </h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 text-lg">
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-binoculars text-2xl text-[#16a085]"></i>
            <span>Wildlife Viewing Points</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-car text-2xl text-[#16a085]"></i>
            <span>Jeep & Canter Safari Rides</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-map-marked-alt text-2xl text-[#16a085]"></i>
            <span>Guided Jungle Trails</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-hotel text-2xl text-[#16a085]"></i>
            <span>Eco-Resorts & Stay Options</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-utensils text-2xl text-[#16a085]"></i>
            <span>Jungle Café & Refreshments</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-info-circle text-2xl text-[#16a085]"></i>
            <span>Safari Help & Information Desk</span>
          </div>
        </div>
      </div>
    </section>

    <section class="container mx-auto px-6 md:px-12 lg:px-20 py-16">
      <div class="text-center mb-12">
        <h2 class="text-5xl font-playfair font-semibold text-gray-900">
          📍 Explore the Safari Location
        </h2>
        <p class="text-lg text-gray-700 mt-4">
          Find your way to the thrilling
          <span class="font-semibold">Jungle Safari</span> with ease. Use the
          interactive map below to explore the route, nearby attractions, and
          entry points.
        </p>
      </div>

      <div class="relative bg-gray-100 shadow-xl rounded-xl overflow-hidden">
        <iframe
          class="w-full h-[450px] md:h-[550px] rounded-xl"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1dXXXXX!2dXX.XXXXXX!3dXX.XXXXXX!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xXXXXX!2sJungle+Safari!5e0!3m2!1sen!2sin!4vXXXXXXXXXXXX"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        >
        </iframe>

        <div
          class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-60 text-white py-4 text-center"
        >
          <p class="text-lg font-semibold">📍 Jungle Safari, Statue of Unity</p>
          <p class="text-sm text-gray-300">Tap the map to get directions</p>
        </div>
      </div>
    </section>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <section class="container mx-auto px-6 md:px-12 lg:px-20 py-16">
      <div class="text-center mb-12">
        <h2 class="text-5xl font-playfair font-semibold text-gray-900">
          🌿 Safari Gallery – A Glimpse of the Wild
        </h2>
        <p class="text-lg text-gray-700 mt-4">
          Experience the beauty of nature with stunning wildlife, lush
          landscapes, and unforgettable safari moments.
        </p>
      </div>

      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img
              src="img1.jpg"
              class="w-full h-[400px] object-cover rounded-xl shadow-lg"
            />
          </div>

          <div class="swiper-slide">
            <img
              src="img2.jpg"
              class="w-full h-[400px] object-cover rounded-xl shadow-lg"
            />
          </div>

          <div class="swiper-slide">
            <img
              src="img3.jpg"
              class="w-full h-[400px] object-cover rounded-xl shadow-lg"
            />
          </div>

          <div class="swiper-slide">
            <img
              src="img4.jpg"
              class="w-full h-[400px] object-cover rounded-xl shadow-lg"
            />
          </div>

          <div class="swiper-slide">
            <img
              src="img/Btfly.jpg"
              class="w-full h-[400px] object-cover rounded-xl shadow-lg"
            />
          </div>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var swiper = new Swiper(".mySwiper", {
          slidesPerView: 1,
          spaceBetween: 20,
          loop: true,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          breakpoints: {
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
          },
        });
      });
    </script>
  </body>
</html>
