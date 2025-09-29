<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yatra By Gandiv</title>
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      .vapi-btn {
        position: fixed !important;
        margin-bottom: 60px;
        margin-right: -6px;
        border: 5px solid white;
      }
      .hello {
        margin: 0;
        padding: 0;
        background: url("userhome/img/rajpipla.jpg") no-repeat center center fixed;
        background-size: cover;
      }

      .scroll-area {
        height: auto;
        overflow-y: hidden;
      }

      ::-webkit-scrollbar {
        width: 8px;
      }

      ::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #8ebebe 0%, #527277 100%);
        border-radius: 8px;
        transition: background 0.3s;
      }

      iframe{
        max-width: 100%;
      }

      body {
        scrollbar-width: thin;
        scrollbar-color: #8ebebe #c4dfdf;
      }

      @media (hover: hover) {
        ::-webkit-scrollbar-thumb {
          opacity: 0.8;
        }
        ::-webkit-scrollbar-thumb:hover {
          opacity: 1;
        }
      }
    </style>
  </head>
  <body>
    <?php
      include("includes/header.php");
    ?>
    <iframe
      src="userhome/userhero.php"
      width="100%"
      height="750px"
      style="border: none"
    ></iframe>

    <iframe
      src="userhome/Map.php"
      width="100%"
      height="950px"
      style="border: none"
    ></iframe>

    <iframe
      src="userhome/imgslider.php"
      width="100%"
      height="750px"
      style="border: none; display: block"
      padding="0"
    ></iframe>

    <?php
      include("userhome/videofeed.php");
    ?> 

    <?php
      include("userhome/mostvisited.php");
    ?>
    
    <iframe
      src="userhome/fest.php"
      width="100%"
      height="750px"
      style="border: none; display: block"
      padding="0"
    ></iframe>


    <iframe
      src="userhome/homecard.php"
      width="100%"
      height="750px"
      style="border: none; display: block"
      padding="0"
    ></iframe>

    <iframe
      src="userhome/newsslider.php"
      width="100%"
      height="700px"
      style="border: none; display: block; margin: 0 auto;"
    ></iframe>

    <div class="hello flex flex-col md:flex-row">
      <div class="w-full md:w-1/2 scroll-area p-8">
        <div class="mb-6">
          <span
            class="bg-green-500 text-white text-sm font-semibold px-4 py-2 rounded-full inline-flex items-center"
          >
            <i class="fas fa-check-circle mr-2"></i> Yatra with Government Trust
          </span>
        </div>

        <h1 class="text-4xl lg:text-5xl font-bold text-white leading-tight">
          Empowering Your Journey with
          <span class="">Subsidized Travel Packages</span>
        </h1>

        <p class="text-xl mt-6 text-gray-100 max-w-4xl">
          Explore India's rich heritage, culture, and natural beauty through
          specially curated travel packages powered by official tourism schemes.
          These affordable and subsidized plans aim to boost tourism and make
          travel accessible to all.
        </p>

        <div class="mt-8 flex space-x-4">
          <button
            class="bg-green-500 text-gray-700 hover:bg-green-600 text-white font-bold py-3 px-6 rounded shadow inline-flex items-center"
          >
            Explore more <i class="fas fa-arrow-right ml-2 mr-2"></i>
          </button>
        </div>

        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
          <div>
            <i class="fas fa-file-alt text-orange-500 text-3xl mb-2"></i>
            <p class="text-xl text-white font-bold">50+</p>
            <p class="text-gray-100">Curated Travel Package</p>
          </div>
          <div>
            <i
              class="fa-solid fa-money-bill-wheat text-yellow-500 text-3xl mb-2"
            ></i>
            <p class="text-xl text-white font-bold">₹3,999</p>
            <p class="text-gray-100">Budget-Friendly Pricing</p>
          </div>
          <div>
            <i class="fas fa-map-marker-alt text-green-600 text-3xl mb-2"></i>
            <p class="text-xl text-white font-bold">3 to 15 Days</p>
            <p class="text-gray-100">Flexible Tour Durations</p>
          </div>
        </div>
      </div>

      <div
        class="hidden md:flex flex-col items-center justify-center w-1/2 relative"
      >
        <div class="relative">
          <img
            src="userhome/img/tripplaner.jpg"
            alt="City"
            class="h-80 w-auto rounded-2xl shadow-2xl"
          />

          <div
            class="absolute -top-10 left-6 bg-white p-4 rounded-xl shadow-lg flex items-center space-x-3 w-[50%]"
          >
            <i class="fas fa-file-signature text-pink-600 text-2xl"></i>
            <div>
              <p class="font-semibold">Easy Booking</p>
              <p class="text-sm text-gray-500">
                Plan your trip in just a few clicks
              </p>
            </div>
          </div>

          <div
            class="absolute -bottom-10 right-6 bg-white p-4 rounded-xl shadow-lg flex items-center space-x-3 w-[50%]"
          >
            <i class="fas fa-tasks text-purple-500 text-2xl"></i>
            <div>
              <p class="font-semibold">Track Progress</p>
              <p class="text-sm text-gray-500">
                Stay updated on your trip status
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <iframe
      src="userhome/jobslider.php"
      width="100%"
      height="630px"
      style="border: none; display: block; margin: 0 auto"
    ></iframe>

    <iframe
      src="userhome/routehome.php"
      width="100%"
      height="630px"
      style="border: none; display: block; margin: 0 auto"
    ></iframe>

    <iframe
      src="userhome/homestats.php"
      width="100%"
      height="630px"
      style="border: none; display: block; margin: 0 auto"
    ></iframe>

    <iframe
      src="userhome/officer.php"
      width="100%"
      height="550px"
      style="border: none; display: block; margin: 0 auto"
    ></iframe>

    <iframe
      src="userhome/CTAhomepage.php"
      width="100%"
      height="400px"
      style="border: none; display: block; margin: 0 auto"
    ></iframe>

    <iframe
      src="userhome/CTAforai.php"
      width="100%"
      height="520px"
      class="bg-gray-50"
      style="border: none; display: block; margin: 0 auto"
      ></iframe>

    <?php 
      include("includes/footer.php");
    ?>

    <script src="https://cdn.botpress.cloud/webchat/v2.2/inject.js"></script>
    <script src="https://files.bpcontent.cloud/2025/04/05/12/20250405123314-RQA8V1B2.js"></script>

    <script>
      var vapiInstance = null;
      const assistant = "48911aee-2879-412e-bb71-7951494f3e32";
      const apiKey = "eaca5422-eca6-4653-92fc-8ec899e6cebf";
      const buttonConfig = {
        position: "bottom-right",
        offset: "40px",
        width: "50px",
        height: "50px",
        idle: {
          color: `#20B2AA`,
          type: "round",
          icon: `https://unpkg.com/lucide-static@0.321.0/icons/phone.svg`,
        },
        loading: {
          color: `rgb(93, 124, 202)`,
          type: "round",
          icon: `https://unpkg.com/lucide-static@0.321.0/icons/loader-2.svg`,
        },
        active: {
          color: `#C40233`,
          type: "round",
          icon: `https://unpkg.com/lucide-static@0.321.0/icons/phone-off.svg`,
        },
      };

      (function (d, t) {
        var g = document.createElement(t),
          s = d.getElementsByTagName(t)[0];
        g.src =
          "https://cdn.jsdelivr.net/gh/VapiAI/html-script-tag@latest/dist/assets/index.js";
        g.defer = true;
        g.async = true;
        s.parentNode.insertBefore(g, s);

        g.onload = function () {
          vapiInstance = window.vapiSDK.run({
            apiKey: apiKey,
            assistant: assistant,
            config: buttonConfig,
          });

          setTimeout(() => {
            const buttonElement = document.querySelector("div[data-vapi]");
            if (buttonElement) {
              buttonElement.style.position = "fixed";
              buttonElement.style.bottom = "50px";
              buttonElement.style.right = "20px";
              buttonElement.style.zIndex = "10000";
            } else {
              console.error(
                "Vapi button not found. Check if the SDK is working correctly."
              );
            }
          }, 1000);
        };
      })(document, "script");
    </script>
  </body>
</html>
