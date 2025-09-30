<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Route Explorer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script
      src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
      type="module"
    ></script>
    <style>
      @import url("https://fonts.cdnfonts.com/css/samarkan");

      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
      }

      .slogan {
        font-family: "Samarkan";
      }

      .feature-item {
        transition: all 0.3s ease;
      }

      .feature-item:hover {
        transform: translateY(-5px);
      }

      .content-wrapper {
        height: 100vh;
        overflow: hidden;
      }
    </style>
  </head>
  <body class="dot-pattern bg-gray-50">
    <div class="absolute inset-0">
      <img
        src="img/worldmap.jpg"
        alt="Background"
        class="w-full h-[630px] object-cover"
      />
      <div class="absolute inset-0 h-[630px] bg-white/80"></div>
    </div>
    <div class="content-wrapper flex items-center justify-center p-6 mt-6">
      <div class="max-w-6xl w-full">
        <div
          class="text-center mb-1"
          data-aos="fade-down"
          data-aos-duration="1000"
        >
          <h1 class="slogan text-6xl font-bold text-gray-600 mb-1">
            Find Your Route
          </h1>
          <p class="text-gray-600 text-lg leading-relaxed max-w-2xl mx-auto">
            Easily discover the best way to reach Sikkim from your current
            location. Real-time updates, scenic suggestions, and safety tips
            included!
          </p>
        </div>

        <div class="flex flex-col md:flex-row gap-8 items-center">
          <div class="w-full md:w-[45%] space-y-6">
            <div class="grid grid-cols-2 gap-4">
              <div
                class="feature-item bg-pink-100 backdrop-blur-sm rounded-xl p-4 shadow-sm"
                data-aos="fade-up"
                data-aos-delay="100"
              >
                <div
                  class="w-12 h-12 rounded-full bg-pink-200 flex items-center justify-center mb-2"
                >
                  <i class="fas fa-location-dot text-2xl text-pink-700"></i>
                </div>
                <h3 class="font-semibold text-gray-600">
                  Choose your starting point
                </h3>
              </div>

              <div
                class="feature-item bg-blue-100 backdrop-blur-sm rounded-xl p-4 shadow-sm"
                data-aos="fade-up"
                data-aos-delay="200"
              >
                <div
                  class="w-12 h-12 rounded-full bg-blue-200 flex items-center justify-center mb-2"
                >
                  <i class="fas fa-route text-2xl text-blue-700"></i>
                </div>
                <h3 class="font-semibold text-gray-600">
                  View smart route suggestions
                </h3>
              </div>

              <div
                class="feature-item bg-green-100/60 backdrop-blur-sm rounded-xl p-4 shadow-sm"
                data-aos="fade-up"
                data-aos-delay="300"
              >
                <div
                  class="w-12 h-12 rounded-full bg-green-200 flex items-center justify-center mb-2"
                >
                  <i
                    class="fas fa-triangle-exclamation text-2xl text-green-700"
                  ></i>
                </div>
                <h3 class="font-semibold text-gray-600">
                  Get live traffic + weather info
                </h3>
              </div>

              <div
                class="feature-item bg-orange-100 backdrop-blur-sm rounded-xl p-4 shadow-sm"
                data-aos="fade-up"
                data-aos-delay="400"
              >
                <div
                  class="w-12 h-12 rounded-full bg-orange-200 flex items-center justify-center mb-2"
                >
                  <i class="fas fa-map text-2xl text-orange-700"></i>
                </div>
                <h3 class="font-semibold text-gray-600">
                  Navigate via voice & smart map
                </h3>
              </div>
            </div>

            <a href="map.html"
              onclick="window.location.href='find-route.html'"
              class="w-full py-4 bg-[#06C2C2] hover:bg-[#06C4C4] text-white rounded-xl text-lg font-bold shadow-lg transition-all duration-300 flex items-center justify-center gap-3"
              data-aos="fade-up"
              data-aos-delay="500"
            >
              <i class="fas fa-compass text-2xl"></i>
              Start Navigation
            </a>
          </div>

          <div
            class="w-full md:w-[55%] flex justify-center items-center"
            data-aos="fade-left"
            data-aos-duration="1000"
          >
            <dotlottie-player
              src="https://lottie.host/c4b43b12-6116-43ab-aa58-31560eb86bcd/SV3xCkYkBP.lottie"
              background="transparent"
              speed="1"
              style="width: 800px; height: 500px"
              loop
              autoplay
            >
            </dotlottie-player>
          </div>
        </div>
      </div>
    </div>

    <script>
      AOS.init({
        once: true,
        offset: 50,
        duration: 1000,
      });
    </script>
  </body>
</html>
