<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Statue of Unity Trip Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <style>
      @import url("https://fonts.cdnfonts.com/css/samarkan");

      body {
        font-family: "Poppins", sans-serif;
        background-color: #f8f6f4;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3E%3Cg fill='%23c4dfdf' fill-opacity='0.4'%3E%3Cpolygon fill-rule='evenodd' points='8 4 12 6 8 8 6 12 4 8 0 6 4 4 6 0 8 4'/%3E%3C/g%3E%3C/svg%3E");
      }

      .image-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-auto-rows: 200px;
        gap: 1rem;
      }

      .image-container {
        overflow: hidden;
        border-radius: 12px;
        position: relative;
      }

      .image-container img {
        object-fit: cover;
        width: 100%;
        height: 100%;
        transition: transform 0.3s ease;
      }

      .image-container:hover img {
        transform: scale(1.1);
      }

      .title {
        font-family: "Samarkan", serif;
      }
    </style>
  </head>
  <body class="">
    <header class="bg-[#2c3e50] py-6">
      <div class="container mx-auto px-6 md:px-12 lg:px-20">
        <h1
          class="text-white text-4xl font-extrabold title text-center uppercase"
        >
          Statue of Unity Trip Details
        </h1>
      </div>
    </header>

    <main class="container mx-auto px-6 md:px-12 lg:px-20 py-16">
      <div class="image-grid mb-12">
        <div class="image-container">
          <img src="img1.jpg" alt="Statue of Unity" class="shadow-lg" />
        </div>
        <div class="image-container">
          <img src="img2.jpg" alt="Sardar Sarovar Dam" class="shadow-lg" />
        </div>
        <div class="image-container">
          <img src="img3.jpg" alt="Valley of Flowers" class="shadow-lg" />
        </div>
        <div class="image-container">
          <img
            src="img4.jpg"
            alt="Statue of Unity Night View"
            class="shadow-lg"
          />
        </div>
      </div>

      <div
        class="bg-white shadow-xl rounded-xl p-8 md:p-12 mb-12 border-l-8 border-[#2c3e50]"
      >
        <h2
          class="text-4xl font-playfair text-gray-900 font-semibold mb-6 border-b-2 pb-2"
        >
          Trip Overview
        </h2>
        <p class="text-lg leading-relaxed text-gray-700 mb-6">
          Embark on an unforgettable 2-day, 1-night adventure to the
          world-famous <span class="font-bold">Statue of Unity</span>. Explore
          the tallest statue in the world, the breathtaking
          <span class="text-[#2c3e50] font-medium">Valley of Flowers</span>, and
          the marvel of engineering, the Sardar Sarovar Dam.
        </p>
        <ul class="space-y-4 text-lg leading-relaxed text-gray-700">
          <li>
            <i class="fas fa-clock text-[#2c3e50] text-xl mr-2"></i> Duration: 2
            Days, 1 Night
          </li>
          <li>
            <i class="fas fa-plane-departure text-[#2c3e50] text-xl mr-2"></i>
            Start: Ahmedabad | End: Ahmedabad
          </li>
          <li>
            <i class="fas fa-map-marker-alt text-[#2c3e50] text-xl mr-2"></i>
            Famous Places: Statue of Unity, Sardar Sarovar Dam, Valley of
            Flowers
          </li>
          <li>
            <i class="fas fa-tag text-[#2c3e50] text-xl mr-2"></i>
            Price: <span class="font-bold text-[#2c3e50]">$500</span> per person
          </li>
        </ul>
      </div>

      <div
        class="bg-white shadow-xl rounded-xl p-8 md:p-12 mb-12 border-l-8 border-[#d4af37]"
      >
        <h2
          class="text-4xl font-playfair text-gray-900 font-semibold mb-6 border-b-2 pb-2"
        >
          Highlights
        </h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 text-lg">
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-lightbulb text-2xl text-[#d4af37]"></i>
            <span>Light & Sound Show</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-water text-2xl text-[#d4af37]"></i>
            <span>Narmada River Cruise</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-leaf text-2xl text-[#d4af37]"></i>
            <span>Eco-Tourism Camps</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-hiking text-2xl text-[#d4af37]"></i>
            <span>Nature Walks & Trails</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-binoculars text-2xl text-[#d4af37]"></i>
            <span>Bird Watching</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-utensils text-2xl text-[#d4af37]"></i>
            <span>Food & Cultural Events</span>
          </div>
        </div>
      </div>

      <div
        class="bg-white shadow-xl rounded-xl p-8 md:p-12 mb-12 border-l-8 border-[#16a085]"
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
            <i class="fas fa-utensils text-2xl text-[#16a085]"></i>
            <span>Breakfast, Lunch, Dinner</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-hotel text-2xl text-[#16a085]"></i>
            <span>4-Star Hotel Accommodation</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-bus text-2xl text-[#16a085]"></i>
            <span>Air-Conditioned Transportation</span>
          </div>
          <div
            class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg shadow-sm"
          >
            <i class="fas fa-parking text-2xl text-[#16a085]"></i>
            <span>Free Parking Facilities</span>
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

      <div
        class="bg-white shadow-xl rounded-xl p-8 md:p-12 mb-12 border-l-8 border-[#900C3F]"
      >
        <h2
          class="text-4xl font-playfair text-gray-900 font-semibold mb-6 border-b-2 pb-2"
        >
          Contact Details
        </h2>
        <div class="text-lg text-gray-700 space-y-4">
          <p>
            <i class="fas fa-phone-alt text-[#900C3F] text-xl mr-2"></i> Phone:
            <a href="tel:+919876543210" class="text-[#2c3e50] hover:underline"
              >+91 98765 43210</a
            >
          </p>
          <p>
            <i class="fas fa-envelope text-[#900C3F] text-xl mr-2"></i>
            Email:
            <a
              href="mailto:tripplanner@example.com"
              class="text-[#2c3e50] hover:underline"
              >tripplanner@example.com</a
            >
          </p>
          <p>
            <i class="fas fa-map-marker-alt text-[#900C3F] text-xl mr-2"></i>
            Address: 123, Rajpipla Road, Narmada District, Gujarat, India
          </p>
        </div>
      </div>

      <div class="text-center mt-8">
        <a
          href="img/jobpdf.pdf"
          target="_blank"
          class="bg-gradient-to-r from-[#c4dfdf] to-[#92c4c4] text-gray-700 font-bold px-8 py-4 rounded-lg text-lg shadow-lg hover:shadow-xl hover:text-gray-100 transition transform hover:from-[#1f2c40] hover:to-[#2c3e50] flex items-center justify-center gap-3"
        >
          <i class="fas fa-file-pdf text-2xl"></i>
          <span>View Full Details</span>
        </a>
      </div>
    </main>
  </body>
</html>
