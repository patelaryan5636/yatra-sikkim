<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sikkim Tourism Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <style>
    body {
      margin: 0;
      padding: 0;
      overflow: hidden;
    }

    .content-wrapper {
      height: 100%;
      overflow-y: auto;
    }
  </style>
</head>

<body class="bg-gray-50 font-sans text-gray-800 mt-8">
  <div class="content-wrapper p-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
      <div class="bg-orange-100 rounded-xl p-6 shadow-md transition duration-300 hover:scale-105">
        <div class="flex items-center justify-between mb-3">
          <span class="text-sm bg-orange-50 text-orange-600 px-3 py-1 rounded-full font-semibold">● Monasteries &
            Culture</span>
          <i class="fa-solid fa-place-of-worship text-orange-600 text-2xl"></i>
        </div>
        <h3 class="text-lg font-bold mb-2">
          Namgyal Institute of Tibetology
        </h3>
        <p class="text-sm text-gray-700 mb-3">
          Explore a vast collection of rare Buddhist manuscripts, statues, and thangkas. Dive deep into Tibetan culture and Mahayana Buddhism in the heart of the Himalayas.
        </p>
        <p class="text-sm text-gray-800 mb-2">👥 100,000+ scholars & tourists visited
        </p>
        <a href="#" class="text-orange-700 font-semibold hover:underline">Learn more →</a>
      </div>

      <div class="bg-green-100 rounded-xl p-6 shadow-md transition duration-300 hover:scale-105">
        <div class="flex items-center justify-between mb-3">
          <span class="text-sm bg-green-50 text-green-600 px-3 py-1 rounded-full font-semibold">● Adventure & Trekking</span>
          <i class="fa-solid fa-person-hiking text-green-600 text-2xl"></i>
        </div>
        <h3 class="text-lg font-bold mb-2">Himalayan Trekking Adventures</h3>
        <p class="text-sm text-gray-700 mb-3">
          Embark on breathtaking treks through rhododendron forests and high-altitude trails. Witness stunning views of Kanchenjunga and discover Sikkim's pristine natural beauty.
        </p>
        <p class="text-sm text-gray-800 mb-2">
          👥 50,000+ trekkers explored the trails
        </p>
        <a href="#" class="text-green-700 font-semibold hover:underline">Learn more →</a>
      </div>

      <div class="bg-blue-100 rounded-xl p-6 shadow-md transition duration-300 hover:scale-105">
        <div class="flex items-center justify-between mb-3">
          <span class="text-sm bg-blue-50 text-blue-600 px-3 py-1 rounded-full font-semibold">● Permits &
            Passes</span><i class="fa-solid fa-id-card text-blue-600 text-2xl"></i>
        </div>
        <h3 class="text-lg font-bold mb-2">Protected Area Permits</h3>
        <p class="text-sm text-gray-700 mb-3">
          Easily obtain permits online for visiting protected areas like Tsomgo Lake, Nathula Pass, and North Sikkim. Enjoy a seamless and hassle-free travel planning experience.
        </p>
        <p class="text-sm text-gray-800 mb-2">
          👥 200,000+ permits issued annually
        </p>
        <a href="#" class="text-blue-700 font-semibold hover:underline">Learn more →</a>
      </div>
    </div>

    <div class="grid grid-cols-1 mt-8 md:grid-cols-2 lg:grid-cols-4 gap-6 px-1 py-1">
      <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-center w-16 h-16 rounded-full bg-yellow-100 mb-4">
          <i class="fas fa-bolt text-2xl text-yellow-500"></i>
        </div>
        <h3 class="text-xl font-semibold mb-2">Seamless Exploration</h3>
        <p class="text-gray-600">
          Discover ancient monasteries, Himalayan vistas, and local experiences with an intuitive map and interactive interface.
        </p>
      </div>

      <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 mb-4">
          <i class="fas fa-sync-alt text-2xl text-blue-500"></i>
        </div>
        <h3 class="text-xl font-semibold mb-2">Smart Trip Planner</h3>
        <p class="text-gray-600">
          Plan your high-altitude journeys with AI-driven recommendations, custom routes, and personalized trip packages.
        </p>
      </div>

      <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-center w-16 h-16 rounded-full bg-purple-100 mb-4">
          <i class="fas fa-file-download text-2xl text-purple-500"></i>
        </div>
        <h3 class="text-xl font-semibold mb-2">Instant Bookings</h3>
        <p class="text-gray-600">
          Easily book guided tours, homestays, and transport options with secure,
          real-time confirmations.
        </p>
      </div>

      <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-center w-16 h-16 rounded-full bg-green-100 mb-4">
          <i class="fa-solid fa-microphone text-2xl text-green-500"></i>
        </div>
        <h3 class="text-xl font-semibold mb-2">Voice & Chat Assistant</h3>
        <p class="text-gray-600">
          Get instant help from our integrated voice assistant and
          chatbot—available 24/7 for travelers.
        </p>
      </div>
    </div>
  </div>
</body>

</html>
