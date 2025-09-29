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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />

    <style>
      @import url("https://fonts.cdnfonts.com/css/samarkan");
      h1 {
        font-family: "Samarkan";
      }

      @keyframes fadeInUp {
        0% {
          opacity: 0;
          transform: translateY(26px) scale(0.98);
        }
        60% {
          opacity: 0.6;
          transform: translateY(4px) scale(1.01);
        }
        100% {
          opacity: 1;
          transform: translateY(0) scale(1);
        }
      }
      .festival-animate {
        animation: fadeInUp 0.7s cubic-bezier(0.23, 1.07, 0.32, 1) both;
      }

      body{
        /* background: linear-gradient(#FFFFFF,#a1d4d17b); */
        background-color: #f8f6f4;
        background-image: url("data:image/svg+xml,%3Csvg width='24' height='20' viewBox='0 0 24 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M20 18c0-1.105.887-2 1.998-2 1.104 0 2-.895 2.002-1.994V14v6h-4v-2zM0 13.998C0 12.895.888 12 2 12c1.105 0 2 .888 2 2 0 1.105.888 2 2 2 1.105 0 2 .888 2 2v2H0v-6.002zm16 4.004A1.994 1.994 0 0 1 14 20c-1.105 0-2-.887-2-1.998v-4.004A1.994 1.994 0 0 0 10 12c-1.105 0-2-.888-2-2 0-1.105-.888-2-2-2-1.105 0-2-.887-2-1.998V1.998A1.994 1.994 0 0 0 2 0a2 2 0 0 0-2 2V0h8v2c0 1.105.888 2 2 2 1.105 0 2 .888 2 2 0 1.105.888 2 2 2 1.105 0 2-.888 2-2 0-1.105.888-2 2-2 1.105 0 2-.888 2-2V0h4v6.002A1.994 1.994 0 0 1 22 8c-1.105 0-2 .888-2 2 0 1.105-.888 2-2 2-1.105 0-2 .887-2 1.998v4.004z' fill='%23c4dfdf' fill-opacity='0.31' fill-rule='evenodd'/%3E%3C/svg%3E");
        
      }
    </style>
  </head>
  <body>
    <h1 class="absolute left-32 top-14 text-5xl font-bold text-gray-800">
      Fairs & Festivals - The Life of Jharkhand
    </h1>

    <a href="./jobcard"
          class="absolute right-32 top-14 px-6 py-3 bg-[#94cfcf] hover:bg-[#c4dfdf] hover:text-gray-700 font-bold font-serif rounded-lg text-white transition-all flex items-center gap-2"
        >
          View All <i class="fa-solid fa-right-to-bracket"></i>
        </a>

    <div class="flex items-center justify-center h-screen">   
      <div
        class="max-w-5xl w-full h-[65vh] flex bg-white shadow-lg rounded-xl overflow-hidden mt-20"
      >
        <div class="w-[35%] p-8 flex flex-col justify-center">
          <div id="festival-text" class="transition-all duration-500">
            <p class="text-gray-500 uppercase">Festival</p>
            <h2 id="festival-title" class="text-3xl font-bold text-orange-500">
              Sarhul
            </h2>
            <p id="festival-date" class="text-gray-600 mt-2">10th April</p>
            <p id="festival-desc" class="mt-4 text-gray-700">
              Celebrate the arrival of spring with tribal rituals, sal flowers, and traditional dances honoring nature.
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

        <div class="w-[65%]">
          <div class="swiper mySwiper h-full">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img
                  src="./img/Sarhul-Festival.png"
                  class="w-full h-full object-cover"
                  alt="Festival 1"
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="./img/karma_festival.jpg"
                  class="w-full h-full object-cover"
                  alt="Festival 2"
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="./img/tesu_festival.jpg"
                  class="w-full h-full object-cover"
                  alt="Festival 3"
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="./img/rath_yatra_festival.png"
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
          title: "Sarhul",
          date: "10th April",
          desc: "Celebrate the arrival of spring with tribal rituals, sal flowers, and traditional dances honoring nature.",
        },
        {
          title: "Karma",
          date: "20th August",
          desc: "Experience the sacred Karma Puja as devotees worship the Karma tree for prosperity, joy, and good harvests.",
        },
        {
          title: "Tusu Parab",
          date: "15th January",
          desc: "Enjoy the harvest festival with colorful songs, fairs, and decorated clay idols floating in rivers.",
        },
        {
          title: "Rath Yatra",
          date: "29th June",
          desc: "Be part of the grand chariot procession of Lord Jagannath celebrated with devotion and folk performances.",
        },
      ];

      let currentIndex = 0;
      const title = document.getElementById("festival-title");
      const date = document.getElementById("festival-date");
      const desc = document.getElementById("festival-desc");
      const prevBtn = document.getElementById("prevBtn");
      const nextBtn = document.getElementById("nextBtn");
      const festivalText = document.getElementById("festival-text");

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
            animateText();
            updateText();
          },
        },
      });

      prevBtn.addEventListener("click", function () {
        swiper.slidePrev();
      });
      nextBtn.addEventListener("click", function () {
        swiper.slideNext();
      });

      function updateText() {
        title.textContent = festivals[currentIndex].title;
        date.textContent = festivals[currentIndex].date;
        desc.textContent = festivals[currentIndex].desc;
      }

      function animateText() {
        festivalText.classList.remove("festival-animate");
        void festivalText.offsetWidth;
        festivalText.classList.add("festival-animate");
      }

      updateText();
      animateText();
    </script>
  </body>
</html>
