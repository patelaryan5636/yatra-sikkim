<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yatra By Gandiv</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />
    <style>
      @import url("https://fonts.cdnfonts.com/css/samarkan");
      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body,
      html {
        margin: 0;
        background-color: #000;
        color: #eee;
        font-family: Poppins;
        font-size: 12px;
      }
      a {
        text-decoration: none;
      }

      .carousel {
        height: 100vh;

        width: 100%;
        overflow: hidden;
        position: relative;
      }
      .carousel .list .item {
        width: 100%;
        height: 100%;
        position: absolute;
        inset: 0 0 0 0;
      }
      .carousel .list .item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
      .carousel .list .item .content {
        position: absolute;
        top: 20%;
        width: 1140px;
        max-width: 80%;
        left: 50%;
        transform: translateX(-50%);
        padding-right: 30%;
        box-sizing: border-box;
        color: #fff;
        text-shadow: 0 5px 10px #0004;
      }
      .carousel .list .item .author {
        font-weight: bold;
        letter-spacing: 10px;
      }
      .carousel .list .item .title,
      .carousel .list .item .topic {
        font-size: 5em;
        font-weight: bold;
        line-height: 1.3em;
      }
      .carousel .list .item .topic {
        color: #f8f6f4;
        font-family: "Samarkan";
      }
      .carousel .list .item .des {
        color: #f8f6f4;
        font-weight: 800;
        font-size: 15px;
      }
      .carousel .list .item .title {
        color: #f8f6f4;
        font-family: "Samarkan";
      }

      .carousel .list .item .buttons {
        display: grid;
        grid-template-columns: repeat(2, 130px);
        grid-template-rows: 40px;
        gap: 5px;
        margin-top: 20px;
      }
      .carousel .list .item .buttons button {
        border: none;
        color: rgb(86, 85, 85);
        background-color: #c4dfdf;
        border-radius: 8px;
        letter-spacing: 3px;
        font-family: Poppins;
        font-weight: 500;
      }
      .carousel .list .item .buttons button:nth-child(2) {
        background-color: #f8f6f4;
        border: 1px solid black;
        color: black;
      }

      .thumbnail {
        position: absolute;
        bottom: 50px;
        left: 50%;
        width: max-content;
        z-index: 100;
        display: flex;
        gap: 20px;
      }
      .thumbnail .item {
        width: 150px;
        height: 220px;
        flex-shrink: 0;
        position: relative;
      }
      .thumbnail .item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 20px;
      }
      .thumbnail .item .content {
        color: #fff;
        position: absolute;
        bottom: 10px;
        left: 10px;
        right: 10px;
      }
      .thumbnail .item .content .title {
        font-weight: 800;
        color: black;
      }
      .thumbnail .item .content .description {
        font-weight: 500;
        color: black;
      }

      .arrows {
        position: absolute;
        top: 80%;
        right: 52%;
        z-index: 100;
        width: 300px;
        max-width: 30%;
        display: flex;
        gap: 10px;
        align-items: center;
      }
      .arrows button {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #c4dfdf;
        border: none;
        color: gray;
        font-family: monospace;
        font-weight: bold;
        transition: 0.5s;
      }
      .arrows button:hover {
        background-color: black;
        color: white;
      }

      .carousel .list .item:nth-child(1) {
        z-index: 1;
      }

      .carousel .list .item:nth-child(1) .content .author,
      .carousel .list .item:nth-child(1) .content .title,
      .carousel .list .item:nth-child(1) .content .topic,
      .carousel .list .item:nth-child(1) .content .des,
      .carousel .list .item:nth-child(1) .content .buttons {
        transform: translateY(50px);
        filter: blur(20px);
        opacity: 0;
        animation: showContent 0.5s 1s linear 1 forwards;
      }
      @keyframes showContent {
        to {
          transform: translateY(0px);
          filter: blur(0px);
          opacity: 1;
        }
      }
      .carousel .list .item:nth-child(1) .content .title {
        animation-delay: 1.2s !important;
      }
      .carousel .list .item:nth-child(1) .content .topic {
        animation-delay: 1.4s !important;
      }
      .carousel .list .item:nth-child(1) .content .des {
        animation-delay: 1.6s !important;
      }
      .carousel .list .item:nth-child(1) .content .buttons {
        animation-delay: 1.8s !important;
      }

      .carousel.next .list .item:nth-child(1) img {
        width: 150px;
        height: 220px;
        position: absolute;
        bottom: 50px;
        left: 50%;
        border-radius: 30px;
        animation: showImage 0.5s linear 1 forwards;
      }
      @keyframes showImage {
        to {
          bottom: 0;
          left: 0;
          width: 100%;
          height: 100%;
          border-radius: 0;
        }
      }

      .carousel.next .thumbnail .item:nth-last-child(1) {
        overflow: hidden;
        animation: showThumbnail 0.5s linear 1 forwards;
      }
      .carousel.prev .list .item img {
        z-index: 100;
      }
      @keyframes showThumbnail {
        from {
          width: 0;
          opacity: 0;
        }
      }
      .carousel.next .thumbnail {
        animation: effectNext 0.5s linear 1 forwards;
      }

      @keyframes effectNext {
        from {
          transform: translateX(150px);
        }
      }

      .carousel .time {
        position: absolute;
        z-index: 1000;
        width: 0%;
        height: 3px;
        background-color: #f1683a;
        left: 0;
        top: 0;
      }

      .carousel.next .time,
      .carousel.prev .time {
        animation: runningTime 3s linear 1 forwards;
      }
      @keyframes runningTime {
        from {
          width: 100%;
        }
        to {
          width: 0;
        }
      }

      .carousel.prev .list .item:nth-child(2) {
        z-index: 2;
      }

      .carousel.prev .list .item:nth-child(2) img {
        animation: outFrame 0.5s linear 1 forwards;
        position: absolute;
        bottom: 0;
        left: 0;
      }
      @keyframes outFrame {
        to {
          width: 150px;
          height: 220px;
          bottom: 50px;
          left: 50%;
          border-radius: 20px;
        }
      }

      .carousel.prev .thumbnail .item:nth-child(1) {
        overflow: hidden;
        opacity: 0;
        animation: showThumbnail 0.5s linear 1 forwards;
      }
      .carousel.next .arrows button,
      .carousel.prev .arrows button {
        pointer-events: none;
      }
      .carousel.prev .list .item:nth-child(2) .content .author,
      .carousel.prev .list .item:nth-child(2) .content .title,
      .carousel.prev .list .item:nth-child(2) .content .topic,
      .carousel.prev .list .item:nth-child(2) .content .des,
      .carousel.prev .list .item:nth-child(2) .content .buttons {
        animation: contentOut 1.5s linear 1 forwards !important;
      }

      @keyframes contentOut {
        to {
          transform: translateY(-150px);
          filter: blur(20px);
          opacity: 0;
        }
      }
      @media screen and (max-width: 678px) {
        .carousel .list .item .content {
          padding-right: 0;
        }
        .carousel .list .item .content .title {
          font-size: 30px;
        }
      }
    </style>
  </head>
  <body>
    <div class="carousel">
      <div class="list">
        <div class="item">
          <img src="../assets/img/Places/Gangtok_Sikkim.png" />
          <div class="content">
            <div class="author">Jain Community</div>
            <div class="title">Parasnath Hill</div>
            <div class="topic">Sammed Shikharji</div>
            <div class="des">
              A sacred hill in Jharkhand and a major Jain pilgrimage site. It's believed that 20 of the 24 Jain Tirthankaras attained salvation here.
            </div>
            <div class="buttons">
              <button>SEE MORE</button>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="../assets/img/Places/Tsomgo_Lake_Sikkim.png" />
          <div class="content">
            <div class="author">Jharkhand Tourism</div>
            <div class="title">Patratu Valley</div>
            <div class="topic">Scenic Viewpoint</div>
            <div class="des">
              A stunning valley known for its picturesque, winding roads and serene lake. It is often called the "Manali of Jharkhand" and is a popular spot for scenic drives and boating.
            </div>
            <div class="buttons">
              <button>SEE MORE</button>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="../assets/img/Places/Nathula_Pass_Sikkim.png" />
          <div class="content">
            <div class="author">Jharkhand Tourism</div>
            <div class="title">Netarhat</div>
            <div class="topic">Hill Station</div>
            <div class="des">
              Known as the "Queen of Chotanagpur," this hill station is famous for its stunning views, especially of the sunrise and sunset. It is a tranquil retreat surrounded by dense forests.
            </div>
            <div class="buttons">
              <button>SEE MORE</button>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="../assets/img/Places/Pelling_Sikkim.png" />
          <div class="content">
            <div class="author">Jharkhand Tourism</div>
            <div class="title">Hundru Falls</div>
            <div class="topic">Waterfall</div>
            <div class="des">
              A magnificent waterfall on the Subarnarekha River, where water plunges from a height of over 300 feet. It is one of the most famous waterfalls in the state, located near Ranchi.
            </div>
            <div class="buttons">
              <button>SEE MORE</button>
            </div>
          </div>
        </div>
      </div>

      <div class="thumbnail">
        <div class="item">
          <img src="../assets/img/Places/Parasnath_Hill.png" />
          <div class="content">
            <div class="title" style="color: white;">Parasnath Hill</div>
            <div class="description" style="color: white;">Sammed Shikharji</div>
          </div>
        </div>
        <div class="item">
          <img src="../assets/img/Places/Patratu_Valley.png" />
          <div class="content">
            <div class="title" style="color: white;">Patratu Valley</div>
            <div class="description" style="color: white;">Scenic Viewpoint</div>
          </div>
        </div>
        <div class="item">
          <img src="../assets/img/Places/Netarhat.png" />
          <div class="content">
            <div class="title" style="color: white;">Netarhat</div>
            <div class="description" style="color: white;">Hill Station</div>
          </div>
        </div>
        <div class="item">
          <img src="../assets/img/Places/Hundru_Falls.png" />
          <div class="content">
            <div class="title" style="color: white;">Hundru Falls</div>
            <div class="description" style="color: white;">Waterfall</div>
          </div>
        </div>
      </div>

      <div class="arrows">
        <button id="prev"><</button>
        <button id="next">></button>
      </div>

      <div class="time"></div>
    </div>

    <script>
      let nextDom = document.getElementById("next");
      let prevDom = document.getElementById("prev");

      let carouselDom = document.querySelector(".carousel");
      let SliderDom = carouselDom.querySelector(".carousel .list");
      let thumbnailBorderDom = document.querySelector(".carousel .thumbnail");
      let thumbnailItemsDom = thumbnailBorderDom.querySelectorAll(".item");
      let timeDom = document.querySelector(".carousel .time");

      thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
      let timeRunning = 3000;
      let timeAutoNext = 7000;

      nextDom.onclick = function () {
        showSlider("next");
      };

      prevDom.onclick = function () {
        showSlider("prev");
      };
      let runTimeOut;
      let runNextAuto = setTimeout(() => {
        next.click();
      }, timeAutoNext);
      function showSlider(type) {
        let SliderItemsDom = SliderDom.querySelectorAll(
          ".carousel .list .item"
        );
        let thumbnailItemsDom = document.querySelectorAll(
          ".carousel .thumbnail .item"
        );

        if (type === "next") {
          SliderDom.appendChild(SliderItemsDom[0]);
          thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
          carouselDom.classList.add("next");
        } else {
          SliderDom.prepend(SliderItemsDom[SliderItemsDom.length - 1]);
          thumbnailBorderDom.prepend(
            thumbnailItemsDom[thumbnailItemsDom.length - 1]
          );
          carouselDom.classList.add("prev");
        }
        clearTimeout(runTimeOut);
        runTimeOut = setTimeout(() => {
          carouselDom.classList.remove("next");
          carouselDom.classList.remove("prev");
        }, timeRunning);

        clearTimeout(runNextAuto);
        runNextAuto = setTimeout(() => {
          next.click();
        }, timeAutoNext);
      }

      function loadHeader() {
        fetch("userheader.html")
          .then((response) => response.text())
          .then((data) => {
            document.getElementById("header-container").innerHTML = data;
          })
          .catch((error) => console.error("Error loading header:", error));
      }

      loadHeader();
    </script>
  </body>
</html>
