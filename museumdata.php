<?php
require 'includes/scripts/connection.php';

$Query = "SELECT * FROM places_master where place_name = 'Rajpipla Heritage Museum' ";
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
    $placedata['image_path'] = $row['image_path'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <title>Museum Booking</title>
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
        background-image: url("data:image/svg+xml,%3Csvg width='80' height='88' viewBox='0 0 80 88' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M22 21.91V26h-2c-9.94 0-18 8.06-18 18 0 9.943 8.058 18 18 18h2v4.09c8.012.722 14.785 5.738 18 12.73 3.212-6.99 9.983-12.008 18-12.73V62h2c9.94 0 18-8.06 18-18 0-9.943-8.058-18-18-18h-2v-4.09c-8.012-.722-14.785-5.738-18-12.73-3.212 6.99-9.983 12.008-18 12.73zM54 58v4.696c-5.574 1.316-10.455 4.428-14 8.69-3.545-4.262-8.426-7.374-14-8.69V58h-5.993C12.27 58 6 51.734 6 44c0-7.732 6.275-14 14.007-14H26v-4.696c5.574-1.316 10.455-4.428 14-8.69 3.545 4.262 8.426 7.374 14 8.69V30h5.993C67.73 30 74 36.266 74 44c0 7.732-6.275 14-14.007 14H54zM42 88c0-9.94 8.06-18 18-18h2v-4.09c8.016-.722 14.787-5.738 18-12.73v7.434c-3.545 4.262-8.426 7.374-14 8.69V74h-5.993C52.275 74 46 80.268 46 88h-4zm-4 0c0-9.943-8.058-18-18-18h-2v-4.09c-8.012-.722-14.785-5.738-18-12.73v7.434c3.545 4.262 8.426 7.374 14 8.69V74h5.993C27.73 74 34 80.266 34 88h4zm4-88c0 9.943 8.058 18 18 18h2v4.09c8.012.722 14.785 5.738 18 12.73v-7.434c-3.545-4.262-8.426-7.374-14-8.69V14h-5.993C52.27 14 46 7.734 46 0h-4zM0 34.82c3.213-6.992 9.984-12.008 18-12.73V18h2c9.94 0 18-8.06 18-18h-4c0 7.732-6.275 14-14.007 14H14v4.696c-5.574 1.316-10.455 4.428-14 8.69v7.433z' fill='%23c4dfdf' fill-opacity='0.49' fill-rule='evenodd'/%3E%3C/svg%3E");
      }
    </style>
  </head>
  <body class="bg-[#f8f6f4] flex flex-col items-center font-[Poppins]">
    <div
      class="flex flex-col md:flex-row w-4/5 h-[70vh] mt-24 bg-gradient-to-br from-[#f8f6f4] to-[#d4efef] rounded-2xl overflow-hidden"
    >
      <div
        class="w-full md:w-1/2 flex flex-col justify-center p-10 text-gray-800"
      >
        <h1 class="text-4xl font-[Playfair]">Explore the Wonders of History</h1>
        <p class="text-lg text-gray-600 mt-3">
          Book your visit today and immerse yourself in the timeless beauty of
          art, culture, and history.
        </p>
        <button class="mt-5 px-6 py-3 bg-gray-800 text-white text-lg rounded-md hover:bg-gray-700 transition-transform transform hover:scale-105">
          <!-- <a href="makePayment.php?action=booking&place={$placedata['name']}">Book Now</a> -->
          <!-- <a href="makePayment.php">Book Now</a> -->
        </button>
        
      </div>
      <div
        class="w-full md:w-1/2 bg-[url('sapiens.png')] bg-cover bg-center"
      ></div>
    </div>

    <section class="text-center py-12 w-11/12">
      <h2 class="hello text-6xl font-[Playfair] text-gray-800 mb-10 mt-12">
        Discover More About the Museum
      </h2>
      <div class="flex flex-wrap justify-center gap-5">
        <div
          class="w-72 bg-gradient-to-br from-[#f8f6f4] to-[#d4efef] rounded-xl p-6 text-center shadow-lg backdrop-blur-md transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col items-center"
        >
          <i class="fa-solid fa-landmark text-4xl text-gray-600 mb-3"></i>
          <h3 class="text-xl font-semibold text-gray-700">Museum Name</h3>
          <p class="text-gray-600"><?php echo $placedata['name'] ?></p>
        </div>
        <div
          class="w-72 bg-gradient-to-br from-[#f8f6f4] to-[#d4efef] rounded-xl p-6 text-center shadow-lg backdrop-blur-md transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col items-center"
        >
          <i class="fas fa-map-marker-alt text-4xl text-gray-600 mb-3"></i>
          <h3 class="text-xl font-semibold text-gray-700">Location</h3>
          <p class="text-gray-600"><?php echo $placedata['location'] ?></p>
        </div>
        <div
          class="w-72 bg-gradient-to-br from-[#f8f6f4] to-[#d4efef] rounded-xl p-6 text-center shadow-lg backdrop-blur-md transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col items-center"
        >
          <i class="fas fa-clock text-4xl text-gray-600 mb-3"></i>
          <h3 class="text-xl font-semibold text-gray-700">Opening Hours</h3>
          <p class="text-gray-600"><?php echo $placedata['opening_hour'] ?></p>
        </div>
        <div
          class="w-72 bg-gradient-to-br from-[#f8f6f4] to-[#d4efef] rounded-xl p-6 text-center shadow-lg backdrop-blur-md transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col items-center"
        >
          <i class="fas fa-ticket-alt text-4xl text-gray-600 mb-3"></i>
          <h3 class="text-xl font-semibold text-gray-700">Ticket Price</h3>
          <p class="text-gray-600"><?php echo  "₹" . $placedata['price'] ?>per person</p>
        </div>
        <div
          class="w-72 bg-gradient-to-br from-[#f8f6f4] to-[#d4efef] rounded-xl p-6 text-center shadow-lg backdrop-blur-md transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col items-center"
        >
          <i class="fas fa-palette text-4xl text-gray-600 mb-3"></i>
          <h3 class="text-xl font-semibold text-gray-700">
            Available Exhibits
          </h3>
          <p class="text-gray-600">Ancient Artifacts, Sculptures, Paintings</p>
        </div>
        <div
          class="w-72 bg-gradient-to-br from-[#f8f6f4] to-[#d4efef] rounded-xl p-6 text-center shadow-lg backdrop-blur-md transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col items-center"
        >
          <i class="fas fa-user-tie text-4xl text-gray-600 mb-3"></i>
          <h3 class="text-xl font-semibold text-gray-700">Guided Tours</h3>
          <p class="text-gray-600">Available (Pre-Booking Required)</p>
        </div>
        <div
          class="w-72 bg-gradient-to-br from-[#f8f6f4] to-[#d4efef] rounded-xl p-6 text-center shadow-lg backdrop-blur-md transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col items-center"
        >
          <i class="fas fa-phone text-4xl text-gray-600 mb-3"></i>
          <h3 class="text-xl font-semibold text-gray-700">Contact</h3>
          <p class="text-gray-600"><?php echo $placedata['contact'] ?></p>
        </div>
        <div
          class="w-72 bg-gradient-to-br from-[#f8f6f4] to-[#d4efef] rounded-xl p-6 text-center shadow-lg backdrop-blur-md transition-transform transform hover:-translate-y-1 hover:shadow-2xl flex flex-col items-center"
        >
          <i class="fas fa-star text-4xl text-gray-600 mb-3"></i>
          <h3 class="text-xl font-semibold text-gray-700">Ratings & Reviews</h3>
          <p class="text-gray-600"><?php echo $placedata['rating'] ?>/5 (Based on 1,200 reviews)</p>
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
          About the Museum
        </h2>
        <p class="text-lg leading-relaxed text-gray-700">
          The <span class="font-semibold">Rajpipla Heritage Museum</span> is a
          testament to the rich cultural heritage and history of the region. It
          features a remarkable collection of
          <span class="text-[#2c3e50] font-medium"
            >ancient artifacts, sculptures, paintings, and historical
            manuscripts</span
          >. The museum provides an immersive experience that takes visitors on
          a journey through time, offering insights into the royal legacy of
          Rajpipla.
        </p>
      </div>

      <div
        class="bg-white shadow-lg rounded-xl p-8 md:p-12 mb-12 border-l-8 border-[#d4af37]"
      >
        <h2
          class="text-4xl font-playfair text-gray-900 font-semibold mb-6 border-b-2 pb-2"
        >
          Museum Rules & Guidelines
        </h2>
        <ul class="space-y-4 text-lg leading-relaxed text-gray-700">
          <li class="flex items-center gap-3">
            <i class="fas fa-volume-mute text-xl text-[#d4af37]"></i> Maintain
            silence inside the museum.
          </li>
          <li class="flex items-center gap-3">
            <i class="fas fa-camera text-xl text-[#d4af37]"></i> Photography is
            allowed only in designated areas.
          </li>
          <li class="flex items-center gap-3">
            <i class="fas fa-utensils text-xl text-[#d4af37]"></i> No food or
            drinks are permitted inside the exhibit halls.
          </li>
          <li class="flex items-center gap-3">
            <i class="fas fa-hands text-xl text-[#d4af37]"></i> Do not touch any
            artifacts or exhibits.
          </li>
          <li class="flex items-center gap-3">
            <i class="fas fa-child text-xl text-[#d4af37]"></i> Children must be
            supervised at all times.
          </li>
          <li class="flex items-center gap-3">
            <i class="fas fa-user-shield text-xl text-[#d4af37]"></i> Follow
            instructions given by museum staff.
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
            <i class="fas fa-coffee text-2xl text-[#16a085]"></i>
            <span>Cafeteria & Refreshments</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-wheelchair text-2xl text-[#16a085]"></i>
            <span>Wheelchair Accessibility</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-gift text-2xl text-[#16a085]"></i>
            <span>Souvenir & Gift Shop</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-parking text-2xl text-[#16a085]"></i>
            <span>Free Parking Available</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-wifi text-2xl text-[#16a085]"></i>
            <span>Free Wi-Fi for Visitors</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-info-circle text-2xl text-[#16a085]"></i>
            <span>24/7 Help & Assistance</span>
          </div>
        </div>
      </div>
    </section>

    <section class="container mx-auto px-6 md:px-12 lg:px-20 py-16">
      <!-- Section Title -->
      <div class="text-center mb-12">
        <h2 class="text-5xl font-playfair font-semibold text-gray-900">
          📍 Explore the Museum’s Location
        </h2>
        <p class="text-lg text-gray-700 mt-4">
          Navigate your way to the
          <span class="font-semibold">Rajpipla Heritage Museum</span> with ease.
          Use the interactive map below to find directions and nearby landmarks.
        </p>
      </div>

      <!-- Map Container -->
      <div class="relative bg-gray-100 shadow-xl rounded-xl overflow-hidden">
        <iframe
          class="w-full h-[450px] md:h-[550px] rounded-xl"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1dXXXXX!2dXX.XXXXXX!3dXX.XXXXXX!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xXXXXX!2sRajpipla+Heritage+Museum!5e0!3m2!1sen!2sin!4vXXXXXXXXXXXX"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        >
        </iframe>

        <div
          class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-60 text-white py-4 text-center"
        >
          <p class="text-lg font-semibold">
            📍 Rajpipla Heritage Museum, Gujarat
          </p>
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
          🎨 Museum Gallery – A Walk Through History
        </h2>
        <p class="text-lg text-gray-700 mt-4">
          Explore breathtaking artifacts, stunning sculptures, and timeless
          paintings from our collection.
        </p>
      </div>

      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img
              src="<?php echo $placedata['image_path'];//name and path: "uploads/places/rajvant_palace.jpg"?>"
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
