<?php 
  
    session_start();
    require_once 'includes/scripts/connection.php';

    if(!isset($_GET['id'])){
        header("location: stallcard");
    }
    
    $encryptedId = $_GET['id'];
    function decrypt($data) {
      $key = "Yatra@5636";
      $iv = "1234567891011121";
      return openssl_decrypt(urldecode($data), "AES-256-CBC", $key, 0, $iv);
  }

    $id = decrypt($encryptedId);

    $stmt = $conn->prepare("SELECT * FROM `store_master` WHERE `store_id` = ?");
    $stmt->bind_param("i", $id);  // "i" means integer
    $stmt->execute();
    $result = $stmt->get_result();

     // Check if there is a result
     if ($result->num_rows > 0) {
      $stores = $result->fetch_assoc();
  } else {
      // header("location: stallcard");
      var_dump($id);
      // Stop further execution if no guide found
  }
    
  $store_image1 = str_replace("../", "", $stores['store_image']);
  $store_image2 = str_replace("../", "", $stores['store_image2']);
  $store_image3 = str_replace("../", "", $stores['store_image3']);
  $store_image4 = str_replace("../", "", $stores['store_image4']);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <title>Tourism Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Gloock&family=Sofia+Sans+Condensed:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
      crossorigin="anonymous"
    ></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#f8f6f4",
              secondary: "#c4dfdf",
              accent: "#116A7B",
              light: "#E3F4F4",
            },
            fontFamily: {
              gloock: ["Gloock", "serif"],
              sofia: ["Sofia Sans Condensed", "sans-serif"],
            },
          },
        },
      };
    </script>
    <style>
      .body {
        background-color: #f8f6f4;
      }

      .gradient-text {
        background: linear-gradient(90deg, #c4dfdf 0%, #116a7b 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }

      .dot-pattern::before {
        content: "";
        display: inline-block;
        width: 70px;
        height: 70px;
        background-image: radial-gradient(#193e3e 25%, transparent 0);
        background-size: 7px 7px;
        background-position: 5px 11px;
        opacity: 0.3;
        margin-right: 15px;
        border-radius: 50%;
      }

      .image-dots {
        background-image: radial-gradient(#193e3e 25%, transparent 0);
        background-size: 10px 10px;
        background-position: 5px 9px;
        opacity: 0.2;
      }

      .explore-button:hover .arrow {
        transform: translateX(10px);
      }

      .store-card {
        @apply bg-white/50 backdrop-blur-sm rounded-xl p-6 hover:shadow-lg transition-all duration-300 relative overflow-hidden;
        border-radius: 30px 0 30px  0;
      }

    .store-card::before {
        content: '';
        position: absolute;
        bottom: -2px;
        left:30px;
        right: 30px;
        height: 3px;
        background: #116a7b;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s ease;
    }

    .store-card:hover::before {
        transform: scaleX(1);
    }
   
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .store-card {
        animation: fadeInUp 0.5s ease forwards;
        opacity: 0;
    }
    
    .store-card:nth-child(1) { animation-delay: 0.1s; }
    .store-card:nth-child(2) { animation-delay: 0.2s; }
    .store-card:nth-child(3) { animation-delay: 0.3s; }
    .store-card:nth-child(4) { animation-delay: 0.4s; }
    .store-card:nth-child(5) { animation-delay: 0.5s; }
    .store-card:nth-child(6) { animation-delay: 0.6s; }
    </style>
  </head>
  <body class="bg-gradient-to-b from-primary to-secondary min-h-screen"></body>
    <section
      class="container mx-auto px-4 min-h-screen flex items-center justify-center"
    >
      <div
        class="flex flex-wrap md:flex-nowrap items-center justify-center gap-8 md:gap-16 relative"
      >
        <div class="w-full md:w-1/4 order-2 md:order-1">
          <div class="relative">
            <div class="h-[380px] rounded-tr-[150px] overflow-hidden">
              <img
                src="./userhome/img/local.png"
                alt="Tourism Scene"
                class="w-full h-full object-cover object-center filter sepia-[0.2] grayscale-[0.3]"
              />
            </div>
            <div class="h-12 w-full image-dots"></div>
          </div>
        </div>

        <div
          class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 md:static md:transform-none"
        >
          <a
            href="#"
            class="explore-button group flex items-center gap-4 text-accent"
          >
            <span
              class="w-12 h-12 bg-[#c4dfdf] rounded-full flex items-center justify-center relative transition-transform duration-300 arrow"
            >
            <i class="fa-solid fa-angles-down"></i>
            </span>
            <span
              class="uppercase font-sofia tracking-[8px] text-xl transition-all duration-300 group-hover:tracking-[7px]"
            >
              Explore
            </span>
          </a>
        </div>

        <div class="w-full md:w-1/2 order-1 md:order-2">
          <h1
            class="font-gloock text-4xl md:text-8xl uppercase tracking-[8px] flex flex-col"
          >
            <span class="dot-pattern text-gray-600">Craft</span>
            <span class="gradient-text">Connect</span>
            <span class="text-accent"> &Grow</span>
          </h1>
        </div>
      </div>
    </section>
    
    <section class="container mx-auto px-4 py-16 relative ">
     
      <div class="absolute inset-0 image-dots opacity-10"></div>
      
      
      <div class="bg-primary/80 backdrop-blur-sm rounded-3xl p-8 md:p-12 shadow-xl relative overflow-hidden group hover:shadow-2xl transition-all duration-500">
         
          <div class="absolute -right-10 -top-10 w-64 h-64 bg-gradient-to-br from-secondary to-accent rounded-full blur-3xl opacity-20 group-hover:opacity-30 transition-all duration-500"></div>
          
          <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 relative">
              <div class="space-y-2">
                  <h2 class="font-gloock text-4xl md:text-5xl text-accent">Kalakruti</h2>
                  <p class="font-sofia text-xl tracking-wider text-gray-600">Handcraft & Art Gallery</p>
              </div>
              <div class="mt-4 md:mt-0">
                  <span class="px-6 py-2 bg-secondary/30 rounded-full font-sofia tracking-wider text-accent">
                      Since 2020
                  </span>
              </div>
          </div>
  
         
          <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 relative">
             
              <div class="store-card bg-gradient-to-b from-secondary to-accent/30 p-4 ">
                  <div class="text-accent mb-1">
                      <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path>
                      </svg>
                  </div>
                  <h3 class="font-sofia text-3xl font-semibold mb-1 text-gray-700">Owner</h3>
                  <p class="text-gray-600 text-xl">Krish Prajapati</p>
              </div>
  
             
              <div class="store-card bg-gradient-to-b from-secondary to-accent/30 p-4 ">
                  <div class="text-accent mb-1">
                      <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                      </svg>
                  </div>
                  <h3 class="font-sofia text-3xl font-semibold mb-2 text-gray-700">Location</h3>
                  <p class="text-gray-600 text-xl">123 Craft Street, Artisan Square</p>
              </div>
  
              
              <div class="store-card bg-gradient-to-b from-secondary to-accent/30 p-4 ">
                  <div class="text-accent mb-2">
                      <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                      </svg>
                  </div>
                  <h3 class="font-sofia text-3xl font-semibold mb-2 text-gray-700">Store Hours</h3>
                  <p class="text-gray-600 text-base">10:00 AM - 8:00 | PM  Monday - Saturday</p>
                  
              </div>
  
             
              <div class="store-card bg-gradient-to-b from-secondary to-accent/30 p-4">
                  <div class="text-accent mb-2">
                      <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                      </svg>
                  </div>
                  <h3 class="font-sofia text-3xl font-semibold mb-2 text-gray-700">Contact</h3>
                  <p class="text-gray-600">+1 234 567 8900</p>
                  <p class="text-gray-600">info@kalakruti.com</p>
              </div>
  
              
              <div class="store-card bg-gradient-to-b from-secondary to-accent/30 p-4">
                  <div class="text-accent mb-2">
                      <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M5 2a2 2 0 012-2h6a2 2 0 012 2v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V5a2 2 0 012-2h2V2zm2-1a1 1 0 011-1h4a1 1 0 011 1v1H7V1zm9 9a1 1 0 01-1 1H5a1 1 0 01-1-1V7h12v3z" clip-rule="evenodd"></path>
                      </svg>
                  </div>
                  <h3 class="font-sofia text-3xl font-semibold mb-2 text-gray-700">Specialization</h3>
                  <p class="text-gray-600">Handcrafted Art</p>
                  <p class="text-gray-600">Traditional Artifacts</p>
              </div>
  
             
              
                <div class="store-card bg-gradient-to-b from-secondary to-accent/30 p-4 md:col-span-2 lg:col-span-3">
                  <div class="text-accent mb-2">
                      <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                      </svg>
                  </div>
                  <h3 class="font-sofia text-3xl font-semibold mb-2 text-gray-700">About Our Store</h3>
                  <p class="text-gray-600 leading-relaxed">
                      Kalakruti is a premier destination for authentic handcrafted art and traditional artifacts. 
                      Our gallery showcases the finest collection of local artisans' work, bringing together 
                      centuries-old craftsmanship with contemporary aesthetic appeal. Each piece tells a unique 
                      story of cultural heritage and artistic excellence.
                  </p>
              </div>
          </div>
      </div>
  </section>
  <section class="container mx-auto px-4 py-8">
  <div
        class="bg-white shadow-lg rounded-xl p-8 md:p-12 mb-4 border-l-8 border-[#116A7B]"
      >
        <h2
          class="text-4xl font-playfair text-gray-900 font-semibold mb-6 border-b-2 pb-2"
        >
        Store Rules & Guidelines
        </h2>
        <ul class="space-y-4 text-lg leading-relaxed text-gray-700">
          <li class="flex items-center gap-3">
            <i class="fa-solid fa-pen-ruler text-xl text-[#116A7B]"></i>  Handle products with care and seek staff assistance when needed
          </li>
          <li class="flex items-center gap-3">
            <i class="fas fa-camera text-xl text-[#116A7B]"></i> Photography is allowed only with staff permission
          </li>
          <li class="flex items-center gap-3">
            <i class="fa-solid fa-cart-shopping text-xl text-[#116A7B]"></i> All sales are final - check items before purchase
          </li>
          <li class="flex items-center gap-3">
            <i class="fas fa-volume-mute text-xl text-[#116A7B]"></i> Maintain respectful behavior and appropriate noise levels
          </li>
          <li class="flex items-center gap-3">
            <i class="fas fa-child text-xl text-[#116A7B]"></i> Children must be
            supervised at all times.
          </li>
          <li class="flex items-center gap-3">
            <i class="fas fa-user-shield text-xl text-[#116A7B]"></i> Report any damage or safety concerns to staff immediately
          </li>
        </ul>
      </div>
    </section>
    <section class="container mx-auto px-4 py-8 bg-[#f8f6f4]">
      <div class="text-center mb-4 mt-6">
          <div class="inline-block relative">
              <h2 class="font-gloock text-4xl md:text-5xl text-accent mb-4 mt-6">
                🛍️ Stalls & Craft – Business in Every Creation
              </h2>
              <div class="absolute -right-8 -top-8 w-16 h-16 bg-secondary/30 rounded-full blur-xl"></div>
          </div>
      </div>
  
      <div class="relative overflow-hidden">
          <div class="flex transition-transform duration-500 ease-in-out" id="slider">
              <div class="min-w-[33.333%] px-2">
                  <div class="aspect-square overflow-hidden rounded-xl">
                      <img src="<?php echo $store_image1;?>" alt="Shop View" class="w-full h-full object-cover">
                  </div>
              </div>
              <div class="min-w-[33.333%] px-2">
                  <div class="aspect-square overflow-hidden rounded-xl">
                      <img src="<?php echo $store_image2;?>" alt="Shop View" class="w-full h-full object-cover">
                  </div>
              </div>
              <div class="min-w-[33.333%] px-2">
                  <div class="aspect-square overflow-hidden rounded-xl">
                      <img src="<?php echo $store_image3;?>" alt="Shop View" class="w-full h-full object-cover">
                  </div>
              </div>
              <div class="min-w-[33.333%] px-2">
                  <div class="aspect-square overflow-hidden rounded-xl">
                      <img src="<?php echo $store_image4;?>" alt="Shop View" class="w-full h-full object-cover">
                  </div>
              </div>
              <!-- <div class="min-w-[33.333%] px-2">
                  <div class="aspect-square overflow-hidden rounded-xl">
                      <img src="Btfly.jpg" alt="Shop View" class="w-full h-full object-cover">
                  </div>
              </div> -->
          </div>
  
          <button class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/80 rounded-full flex items-center justify-center text-accent hover:bg-white transition-all" onclick="moveSlide(-1)">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
              </svg>
          </button>
          <button class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/80 rounded-full flex items-center justify-center text-accent hover:bg-white transition-all" onclick="moveSlide(1)">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
              </svg>
          </button>
      </div>
  </section>
  <section class="container mx-auto px-4 py-16 bg-gray-100">
    <div class="text-center mb-12">
        <div class="inline-block relative">
            <h2 class="font-gloock text-4xl md:text-5xl text-accent mb-4"> 🛍️ Explore Unique Stalls</h2>
            <div class="absolute -right-8 -top-8 w-16 h-16 bg-secondary/30 rounded-full blur-xl"></div>
        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-8 items-start">
        <div class="bg-white/80 backdrop-blur-sm rounded-xl p-8 shadow-lg border-l-8 border-accent">
            <div class="space-y-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-secondary/30 rounded-full flex items-center justify-center text-accent">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-sofia text-lg font-semibold text-accent">Address</h3>
                        <p class="text-gray-600">123 Craft Street, Artisan Square</p>
                        <p class="text-gray-600">Gujarat, India, 380001</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-secondary/30 rounded-full flex items-center justify-center text-accent">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-sofia text-lg font-semibold text-accent">Contact</h3>
                        <p class="text-gray-600">+91 1234567890</p>
                        <p class="text-gray-600">info@kalakruti.com</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-secondary/30 rounded-full flex items-center justify-center text-accent">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-sofia text-lg font-semibold text-accent">Hours</h3>
                        <p class="text-gray-600">Monday - Saturday</p>
                        <p class="text-gray-600">10:00 AM - 8:00 PM</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="h-[340px] rounded-xl overflow-hidden shadow-lg">
            <iframe 
                src="https://www.google.com/maps/embed?pb=YOUR_GOOGLE_MAPS_EMBED_CODE" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                class="w-full h-full"
            ></iframe>
        </div>
    </div>
</section>
  <script>
    let currentSlide = 0;
const slider = document.getElementById('slider');
const totalSlides = 5;
let autoSlideInterval;
let isDragging = false;
let startPos = 0;
let currentTranslate = 0;
let prevTranslate = 0;

function updateSlider(transition = true) {
    if (transition) {
        slider.style.transition = 'transform 0.5s ease-in-out';
    } else {
        slider.style.transition = 'none';
    }
    
    if (currentSlide === totalSlides) {
        currentSlide = 0;
        slider.style.transition = 'none';
    } else if (currentSlide === -1) {
        currentSlide = totalSlides - 1;
        slider.style.transition = 'none';
    }
    
    currentTranslate = currentSlide * -33.333;
    slider.style.transform = `translateX(${currentTranslate}%)`;
}

function moveSlide(direction) {
    currentSlide += direction;
    updateSlider();
    
    if (currentSlide === totalSlides) {
        setTimeout(() => {
            currentSlide = 0;
            updateSlider(false);
        }, 500);
    } else if (currentSlide === -1) {
        setTimeout(() => {
            currentSlide = totalSlides - 1;
            updateSlider(false);
        }, 500);
    }
    
    resetAutoSlide();
}

function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    autoSlideInterval = setInterval(() => moveSlide(1), 3000);
}

function touchStart(event) {
    isDragging = true;
    startPos = event.type.includes('mouse') 
        ? event.pageX 
        : event.touches[0].clientX;
    slider.style.cursor = 'grabbing';
}

function touchMove(event) {
    if (!isDragging) return;
    
    const currentPosition = event.type.includes('mouse')
        ? event.pageX
        : event.touches[0].clientX;
    
    const diff = currentPosition - startPos;
    const move = (diff / window.innerWidth) * 100;
    currentTranslate = prevTranslate + move;
    
    slider.style.transform = `translateX(${currentTranslate}%)`;
}

function touchEnd() {
    isDragging = false;
    const movedBy = currentTranslate - prevTranslate;
    
    if (Math.abs(movedBy) > 10) {
        if (movedBy < 0) {
            moveSlide(1);
        } else {
            moveSlide(-1);
        }
    } else {
        moveSlide(0);
    }
    
    slider.style.cursor = 'grab';
}

slider.addEventListener('mousedown', touchStart);
slider.addEventListener('touchstart', touchStart);
slider.addEventListener('mousemove', touchMove);
slider.addEventListener('touchmove', touchMove);
slider.addEventListener('mouseup', touchEnd);
slider.addEventListener('touchend', touchEnd);
slider.addEventListener('mouseleave', touchEnd);

resetAutoSlide();

slider.addEventListener('transitionend', () => {
    if (currentSlide === totalSlides) {
        currentSlide = 0;
        updateSlider(false);
    } else if (currentSlide === -1) {
        currentSlide = totalSlides - 1;
        updateSlider(false);
    }
});
    </script>
  </body>
</html>
