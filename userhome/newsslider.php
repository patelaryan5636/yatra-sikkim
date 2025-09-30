<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/2f64f3b789.js" crossorigin="anonymous"></script>
  <title>News Updates</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url("https://fonts.cdnfonts.com/css/samarkan");

    .title {
      font-family: "Samarkan";
    }

    @layer components {
      .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
      }

      .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
      }
    }
  </style>
</head>

<body>
  <section class="relative pt-[2rem] px-12">
    <div class="absolute inset-0">
      <img src="img/newscardbg.jpg" alt="Background" class="w-full h-[700px] object-cover" />
      <div class="absolute inset-0 h-[700px] bg-white/80"></div>
    </div>

    <div class="relative h-full mx-auto mt-8">
      <div class="flex justify-between items-center mb-16 px-6">
        <div class="relative">
          <h2 class="title font-gloock text-5xl font-semibold md:text-5xl text-accent text-gray-600">
            News & Updates – What’s New in Sikkim
            <div class="absolute -right-8 -top-8 w-16 h-16 bg-secondary/30 rounded-full blur-xl"></div>
          </h2>
        </div>
        <a href="#"
          class="px-6 py-3 bg-[#49a7a7] hover:bg-[#309595] font-bold font-serif rounded-lg text-white transition-all flex items-center gap-2"
        >
          View More <i class="fa-solid fa-right-to-bracket"></i>
        </a>
      </div>

      <!-- HTML: wrap & cards (use your card markup) -->
      <div id="sliderViewport" class="relative w-full overflow-hidden">
        <div id="newsSlider" class="flex">
          <!-- Put your cards here (any number) -->
          <a href="#" class="min-w-[33.333%] px-4 carousel-slide">
            <div class="bg-[#f8f6f4] backdrop-blur-sm rounded-xl overflow-hidden shadow-lg">
              <div class="aspect-video">
                <img src="../assets/img/Places/Nathula_Pass_Sikkim.png" alt="Nathula Pass News" class="w-full h-full object-cover" />
              </div>
              <div class="p-6">
                <h3 class="font-sofia text-xl font-semibold text-accent mb-2 line-clamp-1">
                  Border Tourism Boom
                </h3>
                <p class="text-gray-600 line-clamp-2">
                  With the tourist season in full swing, Nathula Pass on the Indo-China border is seeing record visitor numbers. The thrilling high-altitude journey and patriotic atmosphere make it a top destination for travelers exploring East Sikkim.
                </p>
              </div>
            </div>
          </a>
          <a href="#" class="min-w-[33.333%] px-4 carousel-slide">
            <div class="bg-[#f8f6f4] backdrop-blur-sm rounded-xl overflow-hidden shadow-lg">
              <div class="aspect-video">
                <img src="../assets/img/Places/Yumthang_Valley_Sikkim.png" alt="Yumthang Valley News" class="w-full h-full object-cover" />
              </div>
              <div class="p-6">
                <h3 class="font-sofia text-xl font-semibold text-accent mb-2 line-clamp-1">
                  Valley in Full Bloom
                </h3>
                <p class="text-gray-600 line-clamp-2">
                  Yumthang Valley, Sikkim's famed 'Valley of Flowers', is currently a riot of color as rhododendrons are in full bloom. Trekkers and nature lovers are flocking to North Sikkim to witness this spectacular natural display.
                </p>
              </div>
            </div>
          </a>
          <a href="#" class="min-w-[33.333%] px-4 carousel-slide">
            <div class="bg-[#f8f6f4] backdrop-blur-sm rounded-xl overflow-hidden shadow-lg">
              <div class="aspect-video">
                <img src="../assets/img/places/pelling_sikkim.png" alt="Pelling Skywalk News" class="w-full h-full object-cover" />
              </div>
              <div class="p-6">
                <h3 class="font-sofia text-xl font-semibold text-accent mb-2 line-clamp-1">
                  Pelling's Glass Skywalk
                </h3>
                <p class="text-gray-600 line-clamp-2">
                  The Pelling Skywalk, India's first of its kind, continues to be a major crowd-puller. It offers thrilling views of the 137-feet tall Chenrezig statue and the surrounding Himalayan peaks, creating a unique experience for visitors.
                </p>
              </div>
            </div>
          </a>
          <a href="#" class="min-w-[33.333%] px-4 carousel-slide">
            <div class="bg-[#f8f6f4] backdrop-blur-sm rounded-xl overflow-hidden shadow-lg">
              <div class="aspect-video">
                <img src="../assets/img/Places/Yumthang_Valley_Sikkim.png" alt="Sikkim Homestay News" class="w-full h-full object-cover" />
              </div>
              <div class="p-6">
                <h3 class="font-sofia text-xl font-semibold text-accent mb-2 line-clamp-1">
                  Green Tourism Push
                </h3>
                <p class="text-gray-600 line-clamp-2">
                  Sikkim is reinforcing its commitment to sustainable tourism by banning single-use plastic bottles in certain areas and promoting eco-friendly homestays. This initiative aims to preserve the state's pristine natural beauty.
                </p>
              </div>
            </div>
          </a>
          <a href="#" class="min-w-[33.333%] px-4 carousel-slide">
            <div class="bg-[#f8f6f4] backdrop-blur-sm rounded-xl overflow-hidden shadow-lg">
              <div class="aspect-video">
                <img src="../assets/img/festivals/saga-dawa-festival_sikkim.png" alt="Rumtek Monastery News" class="w-full h-full object-cover" />
              </div>
              <div class="p-6">
                <h3 class="font-sofia text-xl font-semibold text-accent mb-2 line-clamp-1">
                  Saga Dawa Preparations
                </h3>
                <p class="text-gray-600 line-clamp-2">
                  Monasteries across Sikkim, including the famous Rumtek Monastery, are preparing for the upcoming Saga Dawa festival. This sacred event celebrates Buddha's life and will feature grand processions and prayers.
                </p>
              </div>
            </div>
          </a>
          
          

          <!-- add more .carousel-slide blocks as needed -->
        </div>

        <!-- Prev Button -->
        <button id="prevBtn"
          class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/80 rounded-full flex items-center justify-center text-accent hover:bg-white transition-all z-10">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </button>

        <!-- Next Button -->
        <button id="nextBtn"
          class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/80 rounded-full flex items-center justify-center text-accent hover:bg-white transition-all z-10">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>

      <!-- JS: infinite carousel with clones and responsive slides-per-view -->
      <script>
        document.addEventListener('DOMContentLoaded', () => {
          const viewport = document.getElementById('sliderViewport');
          const slider = document.getElementById('newsSlider');
          const prevBtn = document.getElementById('prevBtn');
          const nextBtn = document.getElementById('nextBtn');

          let origSlides = [];        // original slides (no clones)
          let slidesPerView = 3;      // computed by getSlidesPerView()
          let slideWidth = 0;
          let currentIndex = 0;       // index inside full slider (with clones)
          let autoPlayInterval = null;
          let isDragging = false;
          let startX = 0;
          let isInitialized = false;
          let totalReal = 0;

          function getSlidesPerView() {
            const w = window.innerWidth;
            if (w < 640) return 1;     // mobile
            if (w < 1024) return 2;    // tablet
            return 3;                  // desktop
          }

          function removeClones() {
            slider.querySelectorAll('[data-clone]').forEach(n => n.remove());
          }

          function initialize() {
            // Clear previous interval
            clearInterval(autoPlayInterval);

            // Remove existing clones if re-initializing
            removeClones();

            // Collect originals again (only non-clone slides)
            origSlides = Array.from(slider.querySelectorAll('.carousel-slide'));
            totalReal = origSlides.length;
            if (totalReal === 0) return;

            slidesPerView = getSlidesPerView();

            // If slidesPerView > totalReal, clamp to totalReal
            if (slidesPerView > totalReal) slidesPerView = totalReal;

            // Create clones: last N before, first N after
            const lastN = origSlides.slice(-slidesPerView).map(node => {
              const c = node.cloneNode(true);
              c.setAttribute('data-clone', 'true');
              return c;
            });
            const firstN = origSlides.slice(0, slidesPerView).map(node => {
              const c = node.cloneNode(true);
              c.setAttribute('data-clone', 'true');
              return c;
            });

            // insert lastN before first child
            lastN.forEach(c => slider.insertBefore(c, slider.firstChild));
            // append firstN at end
            firstN.forEach(c => slider.appendChild(c));

            // full slides collection (including clones)
            const allSlides = Array.from(slider.children);
            const totalSlides = allSlides.length;

            // compute slide width (pixel) based on viewport width and slidesPerView
            slideWidth = viewport.clientWidth / slidesPerView;

            // apply width to each slide
            allSlides.forEach(s => {
              s.style.minWidth = slideWidth + 'px';
              s.style.boxSizing = 'border-box';
            });

            // set currentIndex to first real slide (which is at position = slidesPerView)
            currentIndex = slidesPerView;

            // remove transition and position to start (no flicker)
            slider.style.transition = 'none';
            slider.style.transform = `translateX(${-currentIndex * slideWidth}px)`;

            // small timeout to allow style application before enabling transitions
            requestAnimationFrame(() => {
              slider.style.willChange = 'transform';
            });

            // add event listeners once
            if (!isInitialized) {
              slider.addEventListener('transitionend', onTransitionEnd);
              addDragListeners();
              prevBtn.addEventListener('click', () => moveSlide(-1));
              nextBtn.addEventListener('click', () => moveSlide(1));
              window.addEventListener('resize', () => {
                // small debounce
                clearTimeout(window._carouselResizeTimer);
                window._carouselResizeTimer = setTimeout(initialize, 120);
              });
              isInitialized = true;
            }

            startAutoPlay();
          }

          function onTransitionEnd() {
            const allSlides = Array.from(slider.children);
            const totalSlides = allSlides.length; // includes clones
            // if we moved to clones at the end (after last real slide)
            if (currentIndex >= slidesPerView + totalReal) {
              // jump back to the first real slide (no transition)
              currentIndex = slidesPerView;
              slider.style.transition = 'none';
              slider.style.transform = `translateX(${-currentIndex * slideWidth}px)`;
            }
            // if we moved to clones at the start (before first real slide)
            if (currentIndex < slidesPerView) {
              // jump to last real slide (no transition)
              currentIndex = slidesPerView + totalReal - 1;
              slider.style.transition = 'none';
              slider.style.transform = `translateX(${-currentIndex * slideWidth}px)`;
            }
          }

          function moveSlide(direction) {
            if (!slider) return;
            // allow only integer direction: -1 or 1 or 0 (0 = snap back)
            if (direction === 0) {
              // snap back to current index
              slider.style.transition = 'transform 500ms ease';
              slider.style.transform = `translateX(${-currentIndex * slideWidth}px)`;
              resetAutoPlay();
              return;
            }
            slider.style.transition = 'transform 500ms ease';
            currentIndex += direction;
            slider.style.transform = `translateX(${-currentIndex * slideWidth}px)`;
            resetAutoPlay();
          }

          function startAutoPlay() {
            clearInterval(autoPlayInterval);
            autoPlayInterval = setInterval(() => {
              moveSlide(1);
            }, 3500);
          }

          function resetAutoPlay() {
            clearInterval(autoPlayInterval);
            // restart after short delay so manual interactions feel responsive
            autoPlayInterval = setInterval(() => moveSlide(1), 3500);
          }

          // Drag / Swipe
          function addDragListeners() {
            // pointer events cover mouse and touch in modern browsers.
            slider.addEventListener('pointerdown', pointerDown);
            slider.addEventListener('pointermove', pointerMove);
            slider.addEventListener('pointerup', pointerUp);
            slider.addEventListener('pointercancel', pointerUp);
            slider.addEventListener('pointerleave', pointerUp);
            // prevent default image drag
            slider.querySelectorAll('img').forEach(img => img.setAttribute('draggable', 'false'));
          }

          function pointerDown(e) {
            isDragging = true;
            startX = e.clientX;
            slider.style.transition = 'none';
            clearInterval(autoPlayInterval);
            // capture pointer to keep getting events even if pointer leaves
            if (e.pointerId) slider.setPointerCapture?.(e.pointerId);
          }

          function pointerMove(e) {
            if (!isDragging) return;
            const dx = e.clientX - startX;
            const translate = -currentIndex * slideWidth + dx;
            slider.style.transform = `translateX(${translate}px)`;
          }

          function pointerUp(e) {
            if (!isDragging) return;
            isDragging = false;
            const dx = (e.clientX || (e.changedTouches && e.changedTouches[0].clientX)) - startX;
            // threshold = quarter of slide width
            const threshold = Math.max(30, slideWidth / 4);
            if (dx > threshold) {
              moveSlide(-1);
            } else if (dx < -threshold) {
              moveSlide(1);
            } else {
              moveSlide(0); // snap back
            }
            resetAutoPlay();
            if (e.pointerId) slider.releasePointerCapture?.(e.pointerId);
          }

          // init first time
          initialize();
        });
      </script>

</body>

</html>