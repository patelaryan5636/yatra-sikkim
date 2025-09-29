<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Business Opportunities & Job Cards</title>
    <link rel="icon" type="image/png" href="Logo_Title.png">
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
      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      }
    </style>
  </head>
  <body class="bg-gray-50 font-sans">
    <?php 
        include("includes/header.php");
    ?>
    <div class="max-w-7xl mx-auto px-6 py-12">
      <h1 class="title font-bold text-gray-700 mb-2 text-5xl text-center">
        💼 Build & Thrive: Business Opportunities in Rajpipla
      </h1>
      <p class="text-gray-600 text-xl font-serif px-20 text-center">
        Empowering local talent and entrepreneurs. Explore new paths to growth
        through curated business opportunities, job openings, and skill-based
        initiatives that uplift communities and celebrate the spirit of
        Rajpipla's heritage and innovation.
      </p>

      <div class="flex justify-center items-center gap-5 mb-16 font-serif">
        <div
          class="px-3 py-4 mt-3 bg-orange-100 h-6 text-gray-600 font-medium rounded-lg flex items-center"
        >
          ✨ Support Local Talent
        </div>
        <div
          class="px-3 py-4 mt-3 bg-purple-100 h-6 text-gray-600 font-medium rounded-lg flex items-center"
        >
          🌱 Create Opportunities
        </div>
        <div
          class="px-3 py-4 mt-3 bg-green-100 h-6 text-gray-600 font-medium rounded-lg flex items-center"
        >
          🚀 Drive Growth
        </div>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 card"
        >
          <div class="p-6">
            <span
              class="text-xs font-bold px-3 py-1 bg-[#92c4c4] text-white rounded-full"
              ><i class="fas fa-landmark mr-1"></i>Government</span
            >
            <h2 class="text-xl font-bold text-gray-800 mt-4 mb-2">
              Software Engineer - Ministry of IT
            </h2>
            <p class="text-sm text-gray-500 mb-4">
              <i class="fas fa-building mr-1"></i>Organization: Ministry of IT
            </p>
            <p class="text-sm text-gray-600 line-clamp-3 mb-6 text-justify">
              Join the Ministry of IT as a software engineer to contribute to
              national digital transformation projects. Be a part of
              cutting-edge government initiatives.
            </p>
            <div class="flex flex-wrap gap-2 mb-6">
              <span
                class="px-3 py-1 text-xs font-bold bg-orange-100 text-gray-700 rounded-full"
                >Job</span
              >
              <span
                class="px-3 py-1 text-xs font-bold bg-purple-100 text-gray-700 rounded-full"
                >Full-Time</span
              >
              <span
                class="px-3 py-1 text-xs font-bold bg-green-100 text-gray-700 rounded-full"
                >Government</span
              >
            </div>
            <a
              href="img/jobpdf.pdf"
              target="_blank"
              class="block text-center bg-[#92c4c4] text-white text-sm font-bold py-2 rounded-md hover:bg-[#c4dfdf] hover:text-gray-600"
            >
              <i class="fas fa-file-pdf mr-1"></i> Show More Details
            </a>
          </div>
        </div>

        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 card"
        >
          <div class="p-6">
            <span
              class="text-xs font-bold px-3 py-1 bg-[#92c4c4] text-white rounded-full"
              ><i class="fas fa-landmark mr-1"></i>Private</span
            >
            <h2 class="text-xl font-bold text-gray-800 mt-4 mb-2">
              Marketing Manager - ABC Corp
            </h2>
            <p class="text-sm text-gray-500 mb-4">
              <i class="fas fa-building mr-1"></i>Organization: ABC Corporation
            </p>
            <p class="text-sm text-gray-600 line-clamp-3 text-justify mb-6">
              ABC Corp is hiring a Marketing Manager to lead campaign
              strategies, manage a team of professionals, and drive growth in
              the competitive market.
            </p>
            <div class="flex flex-wrap gap-2 mb-6">
              <span
                class="px-3 py-1 text-xs font-bold bg-orange-100 text-gray-700 rounded-full"
                >Job</span
              >
              <span
                class="px-3 py-1 text-xs font-bold bg-purple-100 text-gray-700 rounded-full"
                >Full-Time</span
              >
              <span
                class="px-3 py-1 text-xs font-bold bg-green-100 text-gray-700 rounded-full"
                >Private</span
              >
            </div>

            <a
              href="img/jobpdf.pdf"
              target="_blank"
              class="block text-center bg-[#92c4c4] text-white text-sm font-bold py-2 rounded-md hover:bg-[#c4dfdf] hover:text-gray-600"
            >
              <i class="fas fa-file-pdf mr-1"></i> Show More Details
            </a>
          </div>
        </div>

        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 card"
        >
          <div class="p-6">
            <span
              class="text-xs font-bold px-3 py-1 bg-[#92c4c4] text-white rounded-full"
              ><i class="fas fa-landmark mr-1"></i>Private</span
            >
            <h2 class="text-xl font-bold text-gray-800 mt-4 mb-2">
              UX/UI Designer - Startup Hub
            </h2>
            <p class="text-sm text-gray-500 mb-4">
              <i class="fas fa-building mr-1"></i> Organization: Startup Hub
              Inc.
            </p>
            <p class="text-sm text-gray-600 line-clamp-3 text-justify mb-6">
              We are looking for a talented UX/UI Designer to create seamless
              user experiences and beautiful interfaces for our innovative
              startup products.
            </p>
            <div class="flex flex-wrap gap-2 mb-6">
              <span
                class="px-3 py-1 text-xs font-bold bg-orange-100 text-gray-700 rounded-full"
                >Contract</span
              >
              <span
                class="px-3 py-1 text-xs font-bold bg-purple-100 text-gray-700 rounded-full"
                >Design</span
              >
              <span
                class="px-3 py-1 text-xs font-bold bg-green-100 text-gray-700 rounded-full"
                >Private</span
              >
            </div>
            <a
              href="img/jobpdf.pdf"
              target="_blank"
              class="block text-center bg-[#92c4c4] text-white text-sm font-bold py-2 rounded-md hover:bg-[#c4dfdf] hover:text-gray-600"
            >
              <i class="fas fa-file-pdf mr-1"></i> Show More Details
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
