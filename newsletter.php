<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <title>News Updates Subscription</title>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");
      body {
        font-family: "Poppins", sans-serif;
        background: linear-gradient(135deg, #c4dfdf, #94cfcf);
        min-height: 100vh;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .hello{
        background-color: #94cfcf;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23f8f6f4' fill-opacity='0.4'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
      }
    </style>
  </head>
  <body class="flex flex-col justify-start w-full min-h-screen bg-[#C4DFDF]">
    <?php 
      include("includes/header.php");
    ?>
    <div
      class="flex flex-col mt-10 mb-10 md:flex-row w-[90%] md:w-[85%] h-auto bg-white shadow-2xl rounded-lg overflow-hidden"
    >
      
      <div
        class="hello w-full md:w-1/2  p-4 md:p-12 flex flex-col justify-center text-white"
      >
      <div class="flex space-x-4 -mt-10 mb-4">
        <img src="gandiv.png" alt="gandiv" class="w-36 h-auto" />
      </div>

        <h2 class="text-4xl font-bold flex items-center gap-3">
          <i class="fas fa-newspaper text-6xl mr-1 text-gray-500"></i>
          Stay Updated with Our News</span>
        </h2>
        <p class="mt-4 text-lg leading-relaxed">
          Get the latest news and updates directly in your inbox. Subscribe now
          to stay informed about the latest trends, events, and announcements!
        </p>

        <div class="mt-8">
          <div class="flex items-center gap-4 mb-4">
            <i class="fas fa-check-circle text-2xl text-orange-500"></i>
            <p class="text-lg">Exclusive News Updates</p>
          </div>
          <div class="flex items-center gap-4 mb-4">
            <i class="fas fa-bell text-2xl text-gray-500"></i>
            <p class="text-lg">Breaking News Alerts</p>
          </div>
          <div class="flex items-center gap-4">
            <i class="fas fa-user-edit text-2xl text-green-500"></i>
            <p class="text-lg">Personalized Content</p>
          </div>
        </div>
      </div>
      
      <div
        class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-[#F8F6F4]"
      >
        <h2 class="text-4xl font-bold text-gray-800 flex items-center gap-3">
          <i class="fas fa-envelope-open-text text-5xl text-[#94cfcf] mr-2"></i>
          Subscribe to Our Newsletter
        </h2>
        <p class="text-gray-600 mt-2">
          Enter your details below to start receiving updates from us.
        </p>

        <form id="subscription-form" class="mt-6">
          <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">
              <i class="fas fa-user text-gray-500 mr-2"></i> Name
            </label>
            <div class="relative">
              <input
                type="text"
                name="name"
                class="w-full px-4 py-3 border rounded-lg focus:border-[#94cfcf] focus:ring-2 focus:ring-[#94cfcf] outline-none"
                placeholder="Enter your full name"
                required
              />
            </div>
          </div>

          <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">
              <i class="fas fa-envelope text-gray-500 mr-2"></i> Email Address
            </label>
            <div class="relative">
              <input
                type="email"
                name="email"
                class="w-full px-4 py-3 border rounded-lg focus:border-[#94cfcf] focus:ring-2 focus:ring-[#94cfcf] outline-none"
                placeholder="Enter your email address"
                required
              />
             
            </div>
          </div>

          <button
            type="submit"
            class="hello w-full py-3  text-white rounded-lg font-semibold hover:bg-[#94cfcf]/80 hover:text-gray-700 transition-all duration-300 flex items-center justify-center gap-2"
          >
            <i class="fas fa-paper-plane"></i> Subscribe Now 
          </button>
        </form>

        <p class="text-sm text-gray-600 mt-4 text-center">
          By subscribing, you agree to our
          <a href="/terms.html" class="text-blue-500 font-semibold">Terms of Service</a>
          and
          <a href="privacy.html" class="text-blue-500 font-semibold">Privacy Policy</a>.
        </p>
      </div>
    </div>
    <?php
      include("includes/footer.php");
    ?>
    <script>
      const form = document.getElementById("subscription-form");

      form.addEventListener("submit", (e) => {
        e.preventDefault();
        alert("Thank you for subscribing! We'll keep you updated.");
        form.reset();
      });
    </script>
    <script src="https://kit.fontawesome.com/2f64f3b789.js" crossorigin="anonymous"></script>
  </body>
</html>
