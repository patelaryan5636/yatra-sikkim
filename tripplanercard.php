<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <title>Narmada Trip Planner</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <style>
      @import url("https://fonts.cdnfonts.com/css/samarkan");

      .title {
        font-family: "Samarkan";
      }
      .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      }
      .tag {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: #92c4c4;
        opacity: 0.9;
        color: white;
        font-size: 0.8rem;
        font-weight: bold;
        padding: 0.3rem 0.8rem;
        border-radius: 10px;
        display: flex;
        align-items: center;
        gap: 0.3rem;
      }
      .tag i {
        font-size: 1rem;
      }
    </style>
  </head>
  <body class="bg-gray-50 font-serif">
    <?php
        include("includes/header.php");
    ?>
    <div class="max-w-7xl mx-auto px-6 py-12">
      <h1 class="title font-bold text-gray-700 mb-2 text-5xl text-center">
        Discover Jharkhand: Your Gateway to Incredible Trips
      </h1>
      <p class="text-gray-600 text-xl font-serif px-20 text-center">
        Embark on a journey of a lifetime in the picturesque Narmada district.
        Whether you're seeking adventure, culture, or relaxation, our curated
        trips offer unforgettable experiences in Jharkhand and beyond.
      </p>

      <div class="flex justify-center items-center gap-5 mb-16 font-serif">
        <div
          class="px-3 py-4 mt-3 bg-pink-100 h-6 text-gray-600 font-medium rounded-lg flex items-center"
        >
          🏞 Immerse in Nature
        </div>
        <div
          class="px-3 py-4 mt-3 bg-sky-100 h-6 text-gray-600 font-medium rounded-lg flex items-center"
        >
          🕍 Rich Heritage
        </div>
        <div
          class="px-3 py-4 mt-3 bg-purple-100 h-6 text-gray-600 font-medium rounded-lg flex items-center"
        >
          🚤 Adventure Awaits
        </div>
        <div
          class="px-3 py-4 mt-3 bg-blue-100 h-6 text-gray-600 font-medium rounded-lg flex items-center"
        >
          🌱 Eco-Tourism
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 card relative"
        >
          <div class="tag"><i class="fas fa-tree"></i> Nature</div>
          <img
            src="assets/img/places/Patratu_Valley.png"
            alt="Statue of Unity"
            class="w-full h-48 object-cover"
          />

          <div class="p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-2 uppercase">
              BETLA NATIONAL PARK TOUR
            </h2>
            <p class="text-sm text-gray-500 mb-2">
              <i class="fas fa-clock text-[#92c4c4] mr-1"></i>
              2 Days, 1 Night
            </p>

            <p class="text-sm text-gray-500 mb-2">
              <i class="fas fa-plane-departure text-[#92c4c4] mr-1"></i>
              Start: <b>Ranchi</b> | End: <b>Ranchi</b>
            </p>
            <p class="text-sm text-gray-500 mb-4">
              <i class="fas fa-map-marker-alt text-[#92c4c4] mr-1"></i>
              Famous Places: Betla National Park ● Palamu Fort ● Wildlife Safari
            </p>
            <p class="text-lg font-bold text-gray-800 mb-4">
              Price: <span class="text-[#92c4c4]">₹700</span> per person
            </p>
            <a
              href="#"
              class="block text-center bg-[#92c4c4] text-white text-sm font-bold py-2 rounded-md hover:bg-[#c4dfdf] hover:text-gray-500"
            >
              View Details <i class="fa-solid fa-right-to-bracket ml-1"></i>
            </a>
          </div>
        </div>

        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 card relative"
        >
          <div class="tag"><i class="fas fa-tree"></i> Nature</div>
          <img
            src="assets/img/places/Parasnath_Hill.png"
            alt="Narmada River"
            class="w-full h-48 object-cover"
          />

          <div class="p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-2 uppercase">
              DEOGHAR TEMPLE & TRIKUT TOUR
            </h2>
            <p class="text-sm text-gray-500 mb-2">
              <i class="fas fa-clock text-[#92c4c4] mr-1"></i>
              3 Days, 2 Nights
            </p>
            <p class="text-sm text-gray-500 mb-2">
              <i class="fas fa-plane-departure text-[#92c4c4] mr-1"></i>
              Start: <b>Deoghar</b> | End: <b>Deoghar</b>
            </p>
            <p class="text-sm text-gray-500 mb-4">
              <i class="fas fa-map-marker-alt text-[#92c4c4] mr-1"></i>
              Famous Places: Baidyanath Jyotirlinga Temple ● Trikut Pahar ● Tapovan Caves
            </p>
            <p class="text-lg font-bold text-gray-800 mb-4">
              Price: <span class="text-[#92c4c4]">₹950</span> per person
            </p>
            <a
              href="#"
              class="block text-center bg-[#92c4c4] text-white text-sm font-bold py-2 rounded-md hover:bg-[#c4dfdf] hover:text-gray-500"
            >
              View Details <i class="fa-solid fa-right-to-bracket ml-1"></i>
            </a>
          </div>
        </div>

        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 card relative"
        >
          <div class="tag"><i class="fas fa-tree"></i> Heritage</div>

          <img
            src="assets/img/places/NETARHAT HILL STATION TOUR.jpeg"
            alt="Rajpipla Palace"
            class="w-full h-48 object-cover"
          />

          <div class="p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-2 uppercase">
              NETARHAT HILL STATION TOUR
            </h2>
            <p class="text-sm text-gray-500 mb-2">
              <i class="fas fa-clock text-[#92c4c4] mr-1"></i>
              4 Days, 3 Nights
            </p>
            <p class="text-sm text-gray-500 mb-2">
              <i class="fas fa-plane-departure text-[#92c4c4] mr-1"></i>
              Start: <b>Ranchi</b> | End: <b>Ranchi</b>
            </p>
            <p class="text-sm text-gray-500 mb-4">
              <i class="fas fa-map-marker-alt text-[#92c4c4] mr-1"></i>
              Famous Places: Netarhat Hills ● Magnolia Sunset Point ● Upper Ghaghri Falls ● Koel View Point
            </p>
            <p class="text-lg font-bold text-gray-800 mb-4">
              Price: <span class="text-[#92c4c4]">₹1,300</span> per person
            </p>
            <a
              href="#"
              class="block text-center bg-[#92c4c4] text-white text-sm font-bold py-2 rounded-md hover:bg-[#c4dfdf] hover:text-gray-500"
            >
              View Details <i class="fa-solid fa-right-to-bracket ml-1"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
      <?php 
      include("includes/footer.php");
?>
  </body>
</html>
