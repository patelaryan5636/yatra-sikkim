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
                  src="../assets/img/Places/Hemant_Soren_CM.png"
                  class="w-full h-full object-cover"
                  alt="Festival 1"
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="./img/Vijaya_IAS.png"
                  class="w-full h-full object-cover"
                  alt="Festival 2"
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="./img/Arun_kumar.png"
                  class="w-full h-full object-cover"
                  alt="Festival 3"
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="./img/Manoj_kumar.png"
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
          title: "SHRI HEMANT SOREN",
          date: "Chief Minister, Jharkhand",
          desc: "Shri Hemant Soren is an Indian politician and the current Chief Minister of Jharkhand. He is the leader of the Jharkhand Mukti Morcha (JMM), a political party in the state. He has been instrumental in leading various developmental and welfare initiatives for the people of Jharkhand.",
        },
        {
          title: "SMT VIJAYA JADHAV, IAS",
          date: "Director of Tourism, Department of Tourism, Arts, Culture, Sports & Youth Affairs",
          desc: "As the current Director of Tourism, she plays a pivotal role in shaping Jharkhand’s tourism strategy. She has recently spearheaded initiatives to craft tailored tour packages, boost local engagement, and train guides to deeply connect visitors with the state’s natural beauty and cultural heritage.",
        },
        {
          title: "SHRI ARUN KUMAR SINGH",
          date: "Senior Manager, Jharkhand Tourism Development Corporation (JTDC)",
          desc: "He is the in-charge and senior manager at Patratu Lake Resort, a prominent JTDC-run facility. His responsibilities include overseeing day-to-day operations, interfacing with private cruise operators, and ensuring the smooth functioning of resort activities.",
        },
        {
          title: "SHRI MANOJ KUMAR, IAS",
          date: "Secretary – Department of Tourism, Arts, Culture, Sports & Youth Affairs",
          desc: "As the administrative head of the tourism department, he oversees policy formulation, inter-departmental coordination, budget allocations, and implementation of major tourism initiatives.",
        }
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
