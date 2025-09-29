<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap");
      @import url("https://fonts.cdnfonts.com/css/samarkan");

      h1 {
        font-family: "Samarkan";
        text-align: center;
      }
      :root {
        --first-color: #c4dfdf;
        --title-color: hsl(0, 0%, 15%);
        --text-color: hsl(0, 0%, 35%);
        --body-color: hsl(0, 0%, 95%);
        --container-color: #f8f6f4;

        --body-font: "Poppins", sans-serif;
        --h2-font-size: 1.25rem;
        --small-font-size: 0.813rem;
      }

      @media screen and (min-width: 1120px) {
        :root {
          --h2-font-size: 1.5rem;
          --small-font-size: 0.875rem;
        }
      }

      * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
      }

      body {
        font-family: var(--body-font);
        /* background: url("otpbg.jpg") repeat scroll 0; */
        color: var(--text-color);
        position: relative;
        
      }

      body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #c4dfdfcd;
        /* background-color: #d6e4e4; */
      background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M54.627 0l.83.828-1.415 1.415L51.8 0h2.827zM5.373 0l-.83.828L5.96 2.243 8.2 0H5.374zM48.97 0l3.657 3.657-1.414 1.414L46.143 0h2.828zM11.03 0L7.372 3.657 8.787 5.07 13.857 0H11.03zm32.284 0L49.8 6.485 48.384 7.9l-7.9-7.9h2.83zM16.686 0L10.2 6.485 11.616 7.9l7.9-7.9h-2.83zm20.97 0l9.315 9.314-1.414 1.414L34.828 0h2.83zM22.344 0L13.03 9.314l1.414 1.414L25.172 0h-2.83zM32 0l12.142 12.142-1.414 1.414L30 .828 17.272 13.556l-1.414-1.414L28 0h4zM.284 0l28 28-1.414 1.414L0 2.544V0h.284zM0 5.373l25.456 25.455-1.414 1.415L0 8.2V5.374zm0 5.656l22.627 22.627-1.414 1.414L0 13.86v-2.83zm0 5.656l19.8 19.8-1.415 1.413L0 19.514v-2.83zm0 5.657l16.97 16.97-1.414 1.415L0 25.172v-2.83zM0 28l14.142 14.142-1.414 1.414L0 30.828V28zm0 5.657L11.314 44.97 9.9 46.386l-9.9-9.9v-2.828zm0 5.657L8.485 47.8 7.07 49.212 0 42.143v-2.83zm0 5.657l5.657 5.657-1.414 1.415L0 47.8v-2.83zm0 5.657l2.828 2.83-1.414 1.413L0 53.456v-2.83zM54.627 60L30 35.373 5.373 60H8.2L30 38.2 51.8 60h2.827zm-5.656 0L30 41.03 11.03 60h2.828L30 43.858 46.142 60h2.83zm-5.656 0L30 46.686 16.686 60h2.83L30 49.515 40.485 60h2.83zm-5.657 0L30 52.343 22.343 60h2.83L30 55.172 34.828 60h2.83zM32 60l-2-2-2 2h4zM59.716 0l-28 28 1.414 1.414L60 2.544V0h-.284zM60 5.373L34.544 30.828l1.414 1.415L60 8.2V5.374zm0 5.656L37.373 33.656l1.414 1.414L60 13.86v-2.83zm0 5.656l-19.8 19.8 1.415 1.413L60 19.514v-2.83zm0 5.657l-16.97 16.97 1.414 1.415L60 25.172v-2.83zM60 28L45.858 42.142l1.414 1.414L60 30.828V28zm0 5.657L48.686 44.97l1.415 1.415 9.9-9.9v-2.828zm0 5.657L51.515 47.8l1.414 1.413 7.07-7.07v-2.83zm0 5.657l-5.657 5.657 1.414 1.415L60 47.8v-2.83zm0 5.657l-2.828 2.83 1.414 1.413L60 53.456v-2.83zM39.9 16.385l1.414-1.414L30 3.658 18.686 14.97l1.415 1.415 9.9-9.9 9.9 9.9zm-2.83 2.828l1.415-1.414L30 9.313 21.515 17.8l1.414 1.413 7.07-7.07 7.07 7.07zm-2.827 2.83l1.414-1.416L30 14.97l-5.657 5.657 1.414 1.415L30 17.8l4.243 4.242zm-2.83 2.827l1.415-1.414L30 20.626l-2.828 2.83 1.414 1.414L30 23.456l1.414 1.414zM56.87 59.414L58.284 58 30 29.716 1.716 58l1.414 1.414L30 32.544l26.87 26.87z' fill='%23f8f6f4' fill-opacity='0.4' fill-rule='evenodd'/%3E%3C/svg%3E");
        z-index: -1;
      }

      img {
        display: block;
        max-width: 400px;
        height: 400px;
      }

      .container {
        display: grid;
        place-items: center;
        margin-inline: 1.5rem;
        padding-block: 5rem;
      }

      .card__container {
        display: grid;
        row-gap: 3.5rem;
      }

      .card__article {
        position: relative;
        overflow: hidden;
      }

      .card__img {
        width: 328px;
        border-radius: 1.5rem;
      }

      .card__data {
        width: 280px;
        background-color: var(--container-color);
        padding: 1.5rem 2rem;
        box-shadow: 0 8px 24px hsla(0, 0%, 0%, 0.15);
        border-radius: 1rem;
        position: absolute;
        bottom: -9rem;
        left: 0;
        right: 0;
        margin-inline: auto;
        opacity: 0;
        transition: opacity 1s 1s;
      }

      .card__description {
        display: block;
        font-size: var(--small-font-size);
        margin-bottom: 0.25rem;
      }

      .card__title {
        font-size: var(--h2-font-size);
        font-weight: 500;
        color: var(--title-color);
        margin-bottom: 0.75rem;
      }

      .card__button {
        text-decoration: none;
        font-size: var(--small-font-size);
        font-weight: 500;
        color: var(--first-color);
      }

      .card__button:hover {
        text-decoration: underline;
      }

      .card__article:hover .card__data {
        animation: show-data 1s forwards;
        opacity: 1;
        transition: opacity 0.3s;
      }

      .card__article:hover {
        animation: remove-overflow 2s forwards;
      }

      .card__article:not(:hover) {
        animation: show-overflow 2s forwards;
      }

      .card__article:not(:hover) .card__data {
        animation: remove-data 1s forwards;
      }

      @keyframes show-data {
        50% {
          transform: translateY(-10rem);
        }
        100% {
          transform: translateY(-7rem);
        }
      }

      @keyframes remove-overflow {
        to {
          overflow: initial;
        }
      }

      @keyframes remove-data {
        0% {
          transform: translateY(-7rem);
        }
        50% {
          transform: translateY(-10rem);
        }
        100% {
          transform: translateY(0.5rem);
        }
      }

      @keyframes show-overflow {
        0% {
          overflow: initial;
          pointer-events: none;
        }
        50% {
          overflow: hidden;
        }
      }

      @media screen and (max-width: 340px) {
        .container {
          margin-inline: 1rem;
        }

        .card__data {
          width: 250px;
          padding: 1rem;
        }
      }

      @media screen and (min-width: 768px) {
        .card__container {
          grid-template-columns: repeat(2, 1fr);
          column-gap: 1.5rem;
        }
      }

      @media screen and (min-width: 1120px) {
        .container {
          height: 100vh;
        }

        .card__container {
          grid-template-columns: repeat(3, 1fr);
        }
        .card__img {
          width: 348px;
        }
        .card__data {
          width: 316px;
          padding-inline: 2.5rem;
        }
      }
    </style>

    <title>Landscape responsive card - Bedimcode</title>
  </head>
  <body>
    <div class="container">
      <h1
        style="
          text-align: center;
          font-size: 2.5rem;
          color: #4b5563;
          margin-bottom: 2rem;
        "
      >
        Explore Jharkhand – Sacred Peaks, Waterfalls & Heritage
      </h1>
      <div class="card__container">
        <article class="card__article">
          <img src="img/place.png" alt="image" class="card__img" />

          <div class="card__data">
  <span class="card__description">Jonha Falls, Ranchi, Jharkhand</span>
  <h2 class="card__title">Experience the Serenity of Jonha Falls</h2>
  <a href="#" class="card__button">Explore Nature Trails</a>
</div>

        </article>

        <article class="card__article">
          <img src="img/place2.png" alt="image" class="card__img" />
          <div class="card__data">
            <span class="card__description">Deoghar, Jharkhand</span>
            <h2 class="card__title">Discover Baidyanath Jyotirlinga - Land of Faith</h2>
            <a href="#" class="card__button">Explore Pilgrimage Routes</a>
          </div>
        </article>

        <article class="card__article">
          <img src="img/place3.png" alt="image" class="card__img" />

          <div class="card__data">
            <span class="card__description">Parasnath Hill, Giridih, Jharkhand</span>
            <h2 class="card__title">Explore Parasnath - The Spiritual Peak</h2>
            <a href="#" class="card__button">View Trails & Pilgrimages</a>
          </div>

        </article>
      </div>
    </div>
  </body>
</html>
