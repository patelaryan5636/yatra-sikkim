<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>3D Animated Food Slider</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
  <style>
    @import url("https://fonts.cdnfonts.com/css/samarkan");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    h2 {
      font-family: "Samarkan";
      text-align: center;
    }

    body {
      background-color: #f8f6f4;
      background-image: url("data:image/svg+xml,%3Csvg width='24' height='20' viewBox='0 0 24 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M20 18c0-1.105.887-2 1.998-2 1.104 0 2-.895 2.002-1.994V14v6h-4v-2zM0 13.998C0 12.895.888 12 2 12c1.105 0 2 .888 2 2 0 1.105.888 2 2 2 1.105 0 2 .888 2 2v2H0v-6.002zm16 4.004A1.994 1.994 0 0 1 14 20c-1.105 0-2-.887-2-1.998v-4.004A1.994 1.994 0 0 0 10 12c-1.105 0-2-.888-2-2 0-1.105-.888-2-2-2-1.105 0-2-.887-2-1.998V1.998A1.994 1.994 0 0 0 2 0a2 2 0 0 0-2 2V0h8v2c0 1.105.888 2 2 2 1.105 0 2 .888 2 2 0 1.105.888 2 2 2 1.105 0 2-.888 2-2 0-1.105.888-2 2-2 1.105 0 2-.888 2-2V0h4v6.002A1.994 1.994 0 0 1 22 8c-1.105 0-2 .888-2 2 0 1.105-.888 2-2 2-1.105 0-2 .887-2 1.998v4.004z' fill='%23c4dfdf' fill-opacity='0.31' fill-rule='evenodd'/%3E%3C/svg%3E");
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .swiper {
      width: 100%;
      padding-top: 20px;
      padding-bottom: 50px;
    }

    .swiper-slide {
      perspective: 1000px;
      width: 300px;
      height: 400px;
    }

    .card {
      position: relative;
      width: 100%;
      height: 100%;
      transform-style: preserve-3d;
      transition: transform 0.8s ease;
    }

    .swiper-slide:hover .card {
      transform: rotateY(180deg);
    }

    .card-front,
    .card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
      border-radius: 15px;
      overflow: hidden;
    }

    .card-back {
      transform: rotateY(180deg);
      background: rgba(248, 246, 244, 0.9);
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .place-title {
      font-size: 24px;
      font-weight: bold;
      color: #333;
      margin-bottom: 15px;
    }

    .place-description {
      font-size: 16px;
      color: #666;
      line-height: 1.5;
    }

    .main-content {
      width: 100%;
      max-width: 1270px;
      margin: 0 auto;
    }

    /* --- FIX FOR OVERLAPPING TEXT IN SLIDER --- */

    /* By default, hide the back of all cards */
    .swiper-slide .card-back {
      visibility: hidden;
      opacity: 0;
      transition: visibility 0s 0.4s, opacity 0.4s ease;
    }

    /* ONLY show the back of the card when its slide is active AND hovered */
    .swiper-slide.swiper-slide-active:hover .card-back {
      visibility: visible;
      opacity: 1;
      transition-delay: 0s;
    }

    /* --- NEW FIX FOR SLIDER HOVER EFFECT --- */

    /* Disable mouse interactions (like hover and click) on all slides by default */
    .swiper-slide {
      pointer-events: none;
    }

    /* ONLY enable mouse interactions for the slide that is currently in the center */
    .swiper-slide.swiper-slide-active {
      pointer-events: auto;
    }

    /* --- RESPONSIVE FIXES FOR SLIDER --- */

    /* Styles for mobile screens */
    @media (max-width: 767px) {
      .swiper-slide {
        width: 240px;
        height: 320px;
      }

      h2 {
        font-size: 2.5rem;
        /* 40px */
        line-height: 1.2;
      }

      .swiper-button-next,
      .swiper-button-prev {
        transform: scale(0.8);
        /* Make navigation arrows smaller */
      }

      .swiper-button-next {
        display: none;
      }

      .swiper-button-prev {
        display: none;
      }
    }
  </style>
</head>

<body>
  <div class="main-content">
    <h2 class="text-gray-800 text-6xl font-bold mb-4">
      Pick Your Trail Explore Sikkim as per Your Interest
    </h2>

    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="card">
            <div class="card-front">
              <img src="../assets/img/Places/Gangtok_Sikkim.png" alt="Gangtok View"
                class="w-full h-full object-cover" />
            </div>
            <div class="card-back">
              <h3 class="place-title">Gangtok</h3>
              <p class="place-description">
                Explore the vibrant capital of Sikkim, a perfect blend of tradition and modernity. Gangtok offers
                breathtaking views of Kanchenjunga, serene monasteries like Rumtek, and the bustling, pedestrian-only
                M.G. Marg.
              </p>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="card">
            <div class="card-front">
              <img src="../assets/img/Places/Tsomgo_Lake_Sikkim.png" alt="Tsomgo Lake View"
                class="w-full h-full object-cover" />
            </div>
            <div class="card-back">
              <h3 class="place-title">Tsomgo Lake</h3>
              <p class="place-description">
                Discover the ethereal beauty of Tsomgo Lake, a sacred glacial lake perched at 12,313 feet. Frozen in
                winter and surrounded by alpine flowers in summer, it offers stunning reflections and memorable yak
                rides.
              </p>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="card">
            <div class="card-front">
              <img src="../assets/img/Places/Nathula_Pass_Sikkim.png" alt="Nathula Pass View"
                class="w-full h-full object-cover" />
            </div>
            <div class="card-back">
              <h3 class="place-title">Nathula Pass</h3>
              <p class="place-description">
                Journey to the historic Nathula Pass on the Indo-China border, a former trade route on the ancient Silk
                Road. This high-altitude pass at 14,140 feet offers a thrilling experience and a glimpse into a
                strategic border landscape.
              </p>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="card">
            <div class="card-front">
              <img src="../assets/img/Places/Pelling_Sikkim.png" alt="Pelling View"
                class="w-full h-full object-cover" />
            </div>
            <div class="card-back">
              <h3 class="place-title">Pelling</h3>
              <p class="place-description">
                Witness the majestic, up-close vistas of the Kanchenjunga range from Pelling. This tranquil town is home
                to the ancient Pemayangtse Monastery and the historic Rabdentse Ruins, offering a perfect mix of nature
                and heritage.
              </p>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="card">
            <div class="card-front">
              <img src="../assets/img/Places/Lachung_sikkim.png" alt="Lachung View"
                class="w-full h-full object-cover" />
            </div>
            <div class="card-back">
              <h3 class="place-title">Lachung</h3>
              <p class="place-description">
                Escape to the picturesque mountain village of Lachung in North Sikkim. Known for its stunning
                waterfalls, apple orchards, and the historic Lachung Monastery, it serves as the gateway to the
                enchanting Yumthang Valley.
              </p>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="card">
            <div class="card-front">
              <img src="../assets/img/Places/Yumthang_Valley_Sikkim.png" alt="Yumthang Valley View"
                class="w-full h-full object-cover" />
            </div>
            <div class="card-back">
              <h3 class="place-title">Yumthang Valley</h3>
              <p class="place-description">
                Wander through the 'Valley of Flowers' at Yumthang. Famous for its spectacular bloom of native
                rhododendrons during the spring season, this valley is a paradise with its meandering river and
                surrounding snow-capped peaks.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next text-[#116A7B] mr-10"></div>
      <div class="swiper-button-prev text-[#116A7B] ml-10"></div>
    </div>
  </div>

  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      loop: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 20,
        stretch: 0,
        depth: 500,
        modifier: 1,
        slideShadows: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
    });
  </script>
</body>

</html>