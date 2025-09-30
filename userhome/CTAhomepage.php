<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gandiv CTA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
  </head>
  <body class="bg-gray-50 font-sans text-gray-800 mt-8">
    <section
      class="relative overflow-hidden bg-gradient-to-r from-[#e3f4f4] via-[#c4dfdf] to-[#f4fbfb] rounded-xl mb-10 border border-[#e3f4f4] mx-auto"
      style="width: 90%"
    >
      <div class="absolute inset-0 opacity-30 pointer-events-none">
        <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <pattern
              id="dots-gandiv"
              width="14"
              height="14"
              patternUnits="userSpaceOnUse"
            >
              <circle cx="1" cy="1" r="1.5" fill="#8ebebe" />
            </pattern>
          </defs>
          <rect width="100%" height="100%" fill="url(#dots-gandiv)" />
        </svg>
      </div>

      <div
        class="py-5 px-4 sm:px-12 text-center relative z-10 flex flex-col items-center"
      >
        <div class="mb-3 flex items-center justify-center">
          <div>
            <img
              src="gandiv.png"
              alt="Gandiv Logo"
              class="h-16 w-auto object-contain"
            />
          </div>
        </div>
        <h2
          class="text-[#395b64] text-lg md:text-2xl font-extrabold mb-1 drop-shadow-sm"
        >
          Start Your Business Journey with
          <span class="text-[#527277]">Gandiv</span>
        </h2>
        <p
          class="text-[#395b64] text-xs sm:text-sm font-medium mb-4 max-w-2xl mx-auto"
        >
          Partner with Us and Thrive in Sikkim's Growing Tourism Sector. Showcase your authentic homestays, local handicrafts, and unique cultural experiences to travelers from across the globe.
        </p>
        <div
          class="flex flex-col sm:flex-row justify-center items-center gap-2 mb-4"
        >
          <span
            class="flex items-center gap-2 bg-pink-100 text-pink-600 px-3 py-1.5 rounded-lg font-semibold text-xs"
          >
            <i class="fas fa-box-open text-base"></i> Sell locally made products
          </span>
          <span
            class="flex items-center gap-2 bg-sky-100 text-sky-600 px-3 py-1.5 rounded-lg font-semibold text-xs"
          >
            <i class="fas fa-bullhorn text-base"></i> Promote your services to
            travelers
          </span>
          <span
            class="flex items-center gap-2 bg-purple-100 text-purple-600 px-3 py-1.5 rounded-lg font-semibold text-xs"
          >
            <i class="fas fa-star text-base"></i> Get featured in Gandiv's
            business directory
          </span>
        </div>
        <a
          href="../business/business_login"
          target="_blank"
          class="inline-flex items-center justify-center px-7 py-3 text-base font-bold text-white bg-gradient-to-r from-[#527277] via-[#8ebebe] to-[#5eaaa8] rounded-lg shadow-lg hover:scale-105 hover:shadow-xl border-0 transition-all duration-300 group"
          style="box-shadow: 0 4px 20px 0 #8ebebe55"
        >
          <span class="mr-2 flex items-center gap-2">
            <i
              class="fas fa-rocket text-lg text-white group-hover:text-white transition"
            ></i>
            Start Your Business Now
          </span>
          <i
            class="fas fa-arrow-right text-white mt-1 text-base group-hover:translate-x-1 transition"
          ></i>
        </a>
      </div>
    </section>
  </body>
</html>
