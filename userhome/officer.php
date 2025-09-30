<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Narmada Festivals Slider</title>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
      @import url("https://fonts.cdnfonts.com/css/samarkan");
      h1 {
        font-family: "Samarkan";
      }
    </style>
  </head>
  <body class="bg-cover bg-center relative bg-gray-50">
    <div class="flex items-center justify-center h-screen">
      <div
        class="max-w-5xl w-full h-[75vh] flex bg-white shadow-lg rounded-xl overflow-hidden"
      >
        <div class="w-[65%] p-8 flex flex-col justify-center bg-white">
          <div id="festival-text" class="transition-all duration-500">
            <h2 id="festival-title" class="text-3xl font-bold text-orange-500">
              Narmada Festival
            </h2>
            <p id="festival-date" class="text-gray-600 mt-2">10th March 2025</p>
            <p id="festival-desc" class="mt-4 text-gray-700 text-justify">
              Experience the vibrant culture of Narmada with music, dance, and
              divine celebrations.
            </p>
          </div>
          <div class="flex mt-6 space-x-4">
            <button id="prevBtn" class="text-orange-500 text-2xl">
              &#8592;
            </button>
            <button id="nextBtn" class="text-orange-500 text-2xl">
              &#8594;
            </button>
          </div>
        </div>

        <div class="w-[35%]">
          <div class="swiper mySwiper h-full">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img
                  src="../assets/img/Govt/SHRI PREM SINGH TAMANG.png"
                  class="w-full h-full object-cover"
                  alt="Festival 1"
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="../assets/img/Govt/SHRI PRAKASH CHETTRI.jpg"
                  class="w-full h-full object-cover"
                  alt="Festival 2"
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="../assets/img/Govt/SHRI LUKENDRA RASAILY.jpg"
                  class="w-full h-full object-cover"
                  alt="Festival 3"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      const festivals = [
      {
        title: "SHRI PREM SINGH TAMANG (GOLAY)",
        date: "Hon'ble Chief Minister & Minister-in-Charge, Tourism",
        desc: "As the Chief Minister of Sikkim, he provides visionary leadership for the state's development, with a special focus on promoting sustainable and responsible tourism that showcases Sikkim's unique culture and pristine natural beauty on a global stage.",
      },
      {
        title: "SHRI PRAKASH CHETTRI, SCS",
        date: "Secretary, Tourism & Civil Aviation Department",
        desc: "As the administrative head of the department, he is responsible for policy implementation, strategic planning, and overseeing all tourism-related activities. He plays a crucial role in enhancing infrastructure and ensuring a seamless experience for tourists.",
      },
      {
        title: "SHRI LUKENDRA RASAILY",
        date: "Chairman, Sikkim Tourism Development Corporation (STDC)",
        desc: "He leads the STDC, the primary body for operating state-run tourism infrastructure like hotels, transport, and tour packages. His focus is on improving service quality and developing new tourism products to attract diverse travelers.",
      },
    ];

      let currentIndex = 0;
      const title = document.getElementById("festival-title");
      const date = document.getElementById("festival-date");
      const desc = document.getElementById("festival-desc");
      const prevBtn = document.getElementById("prevBtn");
      const nextBtn = document.getElementById("nextBtn");

      const swiper = new Swiper(".mySwiper", {
        loop: true,
        navigation: {
          nextEl: "#nextBtn",
          prevEl: "#prevBtn",
        },
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },
        on: {
          slideChange: function () {
            currentIndex = this.realIndex;
            updateText();
          },
        },
      });

      function updateText() {
        title.textContent = festivals[currentIndex].title;
        date.textContent = festivals[currentIndex].date;
        desc.textContent = festivals[currentIndex].desc;
      }

      prevBtn.addEventListener("click", function () {
        swiper.slidePrev();
      });
      nextBtn.addEventListener("click", function () {
        swiper.slideNext();
      });

      updateText();
    </script>
  </body>
</html>
