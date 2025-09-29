<?php 
  
    session_start();
    require_once 'includes/scripts/connection.php';

    if(!isset($_GET['id'])){
        header("location: hotellist");
    }
    
    $encryptedId = $_GET['id'];
    function decrypt($data) {
      $key = "Yatra@5636";
      $iv = "1234567891011121";
      return openssl_decrypt(urldecode($data), "AES-256-CBC", $key, 0, $iv);
  }

    $id = decrypt($encryptedId);

    $stmt = $conn->prepare("SELECT * FROM `hotel_master` WHERE `hotel_id` = ?");
    $stmt->bind_param("i", $id);  // "i" means integer
    $stmt->execute();
    $result = $stmt->get_result();

     // Check if there is a result
     if ($result->num_rows > 0) {
      $hotels = $result->fetch_assoc();
  } else {
      header("location: hotellist");
      exit; // Stop further execution if no guide found
  }
    

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <title>Hotel Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script
      type="module"
      src="https://unpkg.com/@splinetool/viewer@1.9.79/build/spline-viewer.js"
    ></script>

    <style>
      @import url("https://fonts.cdnfonts.com/css/samarkan");
      body {
        background-color: #f8f6f4;
      }

      .ag-courses_box {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 50px 0;
      }

      .ag-courses_item {
        flex-basis: calc(33.333% - 30px);
        margin: 15px;
        overflow: hidden;
        border-radius: 20px;
      }

      .ag-courses-item_link {
        display: block;
        padding: 30px 20px;
        background-color: #ffffff;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #ddd;
        position: relative;
      }

      .ag-courses-item_link:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        color: inherit !important;
      }

      .ag-courses-item_title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        margin-bottom: 15px;
      }

      .ag-courses-item_date-box {
        font-size: 18px;
        color: #555;
      }

      .ag-courses-item_bg {
        height: 100px;
        width: 100px;
        background-color: #4c9eff;
        position: absolute;
        top: -50px;
        right: -50px;
        border-radius: 50%;
        transition: all 0.3s ease;
      }

      .ag-courses-item_link:hover,
      .ag-courses-item_link:hover .ag-courses-item_date {
        text-decoration: none;
        color: #fff;
      }
      .ag-courses-item_link:hover .ag-courses-item_bg {
        -webkit-transform: scale(10);
        -ms-transform: scale(10);
        transform: scale(10);
        opacity: 0.2;
      }

      .ag-courses_item:nth-child(2n) .ag-courses-item_bg {
        background-color: #3ecd5e;
      }
      .ag-courses_item:nth-child(3n) .ag-courses-item_bg {
        background-color: #e44002;
      }
      .ag-courses_item:nth-child(4n) .ag-courses-item_bg {
        background-color: #952aff;
      }
      .ag-courses_item:nth-child(5n) .ag-courses-item_bg {
        background-color: #cd3e94;
      }
      .ag-courses_item:nth-child(6n) .ag-courses-item_bg {
        background-color: #4c49ea;
      }

      @media (max-width: 979px) {
        .ag-courses_item {
          flex-basis: calc(50% - 30px);
        }
      }

      @media (max-width: 639px) {
        .ag-courses_item {
          flex-basis: 100%;
        }
      }

      .hotel-intro {
        text-align: justify;
        padding: 40px 20px;
        font-family: "Poppins", sans-serif;
      }

      .animated-text {
        font-size: 20px;
        color: #333;
        max-width: 90%;
        margin: 0 auto;
        line-height: 1.6;
        font-weight: 500;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 1.2s ease-in-out forwards;
      }

      @keyframes fadeInUp {
        0% {
          opacity: 0;
          transform: translateY(20px);
        }
        100% {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .room-pricing-container {
        text-align: center;
        padding: 50px 20px;
      }

      .pricing-title {
        font-size: 32px;
        font-weight: bold;
        color: #333;
        margin-bottom: 30px;
      }

      .room-cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
      }

      .room-card {
        background-color: #ffffff;
        padding: 20px;
        width: 250px;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, background-color 0.3s ease,
          box-shadow 0.3s ease;
        border: 2px solid #ddd;
      }

      .room-card:hover {
        transform: translateY(-5px);
        background-color: #ffcc5c;
        color: #ffffff;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
      }

      .room-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
      }

      .room-price {
        font-size: 24px;
        font-weight: bold;
        color: #ff6f61;
      }

      .room-card:hover .room-price {
        color: #fff;
      }

      @media (max-width: 768px) {
        .room-cards {
          flex-direction: column;
          align-items: center;
        }
      }

      .reach-section {
        background: #f8f6f4;
      }
      .info-card {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0px;
        border-bottom: 2px solid #ddd;
      }

      .testimonial-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
      }
      .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      }
      #text {
        font-family: "Samarkan";
      }
    </style>
  </head>
  <body class="bg-gray-100">
  <section
      class="relative h-screen w-full bg-cover bg-center"
      style="background-image: url('guidebg.jpg')"
    >
      <div
        class="absolute inset-0 bg-gradient-to-b from-black to-transparent opacity-0"
      ></div>
      <div
        class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-6 space-y-8"
      >
        <div class="animate__animated animate__fadeInDown">
          <h1
            id="text"
            class="text-6xl md:text-8xl uppercase px-20 font-extrabold tracking-widest leading-tight text-gray-600"
          >
            Discover Jharkhand with Expert Guides
          </h1>
        </div>
        <p
          class="text-2xl md:text-3xl max-w-2xl mx-auto animate__animated animate__fadeInUp text-gray-400"
        >
          Uncover hidden gems, historical wonders, and breathtaking landscapes
          with our expert guides.
        </p>
      </div>
      <div
        class="absolute bottom-12 left-1/2 transform -translate-x-1/2 text-center"
      >
        <a href="#content" class="text-white text-3xl animate-bounce"
          >↓ Scroll Down</a
        >
      </div>
    </section>
    <div
      class="flex justify-between items-center w-full max-w-4xl mx-auto py-6 px-2 border-b-2 border-gray-300"
    >
      <button
        class="tab-button w-1/3 text-gray-800 font-semibold text-lg pb-2 relative transition-all duration-300 hover:text-black"
        onclick="showSection('details')"
      >
        About Hotel
        <span
          class="absolute left-0 bottom-0 w-full h-1 bg-black scale-x-0 transition-transform duration-300 hover:scale-x-100"
        ></span>
      </button>

      <div class="w-px h-6 bg-gray-400"></div>

      <button
        class="tab-button w-1/3 text-gray-800 font-semibold text-lg pb-2 relative transition-all duration-300 hover:text-black"
        onclick="showSection('map')"
      >
        Map
        <span
          class="absolute left-0 bottom-0 w-full h-1 bg-black scale-x-0 transition-transform duration-300 hover:scale-x-100"
        ></span>
      </button>

      <div class="w-px h-6 bg-gray-400"></div>

      <button
        class="tab-button w-1/3 text-gray-800 font-semibold text-lg pb-2 relative transition-all duration-300 hover:text-black"
        onclick="showSection('gallery')"
      >
        Gallery
        <span
          class="absolute left-0 bottom-0 w-full h-1 bg-black scale-x-0 transition-transform duration-300 hover:scale-x-100"
        ></span>
      </button>

      <div class="w-px h-6 bg-gray-400"></div>

      <button
        class="tab-button w-1/3 text-gray-800 font-semibold text-lg pb-2 relative transition-all duration-300 hover:text-black"
        onclick="showSection('feedback')"
      >
        Feedback
        <span
          class="absolute left-0 bottom-0 w-full h-1 bg-black scale-x-0 transition-transform duration-300 hover:scale-x-100"
        ></span>
      </button>
      <?php
      function encrypt($data) {
                    $key = "Yatra@5636"; // Use a strong key
                    $iv = "1234567891011121"; // 16-byte IV (same during encryption & decryption)
                    return urlencode(openssl_encrypt($data, "AES-256-CBC", $key, 0, $iv));
      }
      $en_id = encrypt($id);
?>
      <a
        href="hotelbookform?id=<?php echo $en_id ?>"
        class="w-1/3 text-white text-center font-semibold text-lg py-3 px-6 rounded-lg bg-gradient-to-r from-green-400 to-green-600 shadow-lg hover:from-green-500 hover:to-green-700 transition-all duration-300 transform hover:scale-105"
      >
        Book Now →
      </a>
    </div>

    <section id="details" class="ag-format-container" data-aos="fade-up">
      <div class="ag-courses_box">
        <div class="ag-courses_item">
          <div class="ag-courses-item_link">
            <div class="ag-courses-item_bg"></div>
            <div class="ag-courses-item_title">Hotel Name</div>
            <div class="ag-courses-item_date-box"><?php echo $hotels['hotel_name'];?></div>
          </div>
        </div>

        <div class="ag-courses_item">
          <div class="ag-courses-item_link">
            <div class="ag-courses-item_bg"></div>
            <div class="ag-courses-item_title">Contact</div>
            <div class="ag-courses-item_date-box"><?php echo $hotels['contact_number'];?></div>
          </div>
        </div>

        <div class="ag-courses_item">
          <div class="ag-courses-item_link">
            <div class="ag-courses-item_bg"></div>
            <div class="ag-courses-item_title">Numbers of rooms</div>
            <div class="ag-courses-item_date-box"><?php echo $hotels['num_rooms'];?></div>
          </div>
        </div>

        <div class="ag-courses_item">
          <div class="ag-courses-item_link">
            <div class="ag-courses-item_bg"></div>
            <div class="ag-courses-item_title">Address</div>
            <div class="ag-courses-item_date-box">
              <?php echo $hotels['hotel_address'];?>
            </div>
          </div>
        </div>

        <div class="ag-courses_item">
          <div class="ag-courses-item_link">
            <div class="ag-courses-item_bg"></div>
            <div class="ag-courses-item_title">Owner Name</div>
            <div class="ag-courses-item_date-box"><?php echo $hotels['owner_name'];?></div>
          </div>
        </div>

        <div class="ag-courses_item">
          <div class="ag-courses-item_link">
            <div class="ag-courses-item_bg"></div>
            <div class="ag-courses-item_title">Licence Number</div>
            <div class="ag-courses-item_date-box">null</div>
          </div>
        </div>

        <div class="ag-courses_item">
          <div class="ag-courses-item_link">
            <div class="ag-courses-item_bg"></div>
            <div class="ag-courses-item_title">Available Rooms</div>
            <div class="ag-courses-item_date-box">
            <?php echo $hotels['room_types'];?>
            </div>
          </div>
        </div>

        <div class="ag-courses_item">
          <div class="ag-courses-item_link">
            <div class="ag-courses-item_bg"></div>
            <div class="ag-courses-item_title">Facilities</div>
            <div class="ag-courses-item_date-box">
            <?php echo $hotels['facilities'];?>
            </div>
          </div>
        </div>
      </div>

      <div class="room-pricing-container">
        <h2 class="pricing-title">Room Pricing (Per Night)</h2>
        <div class="room-cards">
          <div class="room-card">
            <h3 class="room-title">Single Room</h3>
            <p class="room-price"><?php echo $hotels['single_room_price'];?></p>
          </div>
          <div class="room-card">
            <h3 class="room-title">Couple Room</h3>
            <p class="room-price"><?php echo $hotels['couple_room_price'];?></p>
          </div>
          <div class="room-card">
            <h3 class="room-title">AC Room</h3>
            <p class="room-price"><?php echo $hotels['ac_room_price'];?></p>
          </div>
          <div class="room-card">
            <h3 class="room-title">VIP Room</h3>
            <p class="room-price"><?php echo $hotels['vip_room_price'];?></p>
          </div>
          <div class="room-card">
            <h3 class="room-title">Luxury Room</h3>
            <p class="room-price"><?php echo $hotels['luxury_room_price'];?></p>
          </div>
          <div class="room-card">
            <h3 class="room-title">Deluxe Double Room</h3>
            <p class="room-price"><?php echo $hotels['deluxe_room_price'];?></p>
          </div>
        </div>
      </div>

      <div class="hotel-intro">
        <p class="animated-text">
          <strong
            >🌟 Welcome to Your Ultimate Stay Experience with Yatra by Gandiv!
            🌟</strong
          >
          <br /><br />
          At <strong>Yatra by Gandiv</strong>, we redefine hospitality by
          offering a
          <strong>seamless and hassle-free booking experience</strong> tailored
          to your needs. Whether you're planning a
          <em>relaxing weekend retreat</em>, a <em>corporate stay</em>, or an
          <em>opulent vacation</em>, our platform ensures
          <strong
            >premium accommodation, world-class service, and unmatched
            convenience.</strong
          >
          <br /><br />
          We have partnered with the
          <strong>finest hotels, resorts, and exclusive stays</strong> to bring
          you a diverse selection of
          <strong>luxury, business, and budget-friendly accommodations</strong>—
          all carefully curated for a
          <strong>memorable and comfortable stay.</strong> <br /><br />

          <strong>🏨 Why Choose Yatra by Gandiv?</strong>
          <br /><br />
          ✔ <strong>Handpicked & Verified Hotels</strong> – We collaborate with
          top-rated properties to ensure high-quality hospitality.
          <br />
          ✔ <strong>Best Price Guarantee 💰</strong> – Get exclusive deals and
          competitive rates with no hidden charges.
          <br />
          ✔ <strong>Seamless Booking Experience</strong> – User-friendly
          platform with secure and instant booking confirmations.
          <br />
          ✔ <strong>Personalized Recommendations</strong> – Smart AI-powered
          suggestions tailored to your preferences.
          <br />
          ✔ <strong>24/7 Customer Support 📞</strong> – Dedicated support team
          ensuring a hassle-free and enjoyable experience.
          <br />
          ✔ <strong>Flexible Cancellation Policies</strong> – Travel plans
          change? We offer flexible booking modifications. <br /><br />

          <strong>🌍 Explore & Experience the Best Stay</strong>
          <br /><br />
          🏖 <strong>Luxury Resorts & Beachfront Villas</strong> – Immerse
          yourself in scenic beauty with top-class amenities.
          <br />
          🏙 <strong>Business Hotels & Executive Suites</strong> – Stay connected
          and productive with premium work-friendly environments.
          <br />
          🏡 <strong>Boutique Hotels & Cozy Stays</strong> – Enjoy personalized
          service in intimate, charming accommodations.
          <br />
          🎉 <strong>Family-Friendly & Group Stays</strong> – Spacious and
          comfortable options designed for all travelers. <br /><br />

          At <strong>Yatra by Gandiv</strong>,
          <em>your comfort is our top priority</em>. We are committed to
          delivering <strong>excellence in travel & hospitality</strong>—
          ensuring every journey is as delightful as the destination itself.
          <br /><br />

          🚀
          <strong
            >Book your perfect stay now and embark on a journey of luxury,
            comfort, and convenience!</strong
          >
        </p>
      </div>
    </section>

    <section
      id="map"
      class="container mx-auto p-6 bg-white rounded-lg shadow-lg hidden"
      data-aos="fade-up"
    >
      <h2 class="text-3xl font-semibold mb-4">Location</h2>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345086167!2d144.95373531531572!3d-37.81627974202121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0x5045675218ce6e0!2sMelbourne!5e0!3m2!1sen!2sau!4v1614074416895!5m2!1sen!2sau"
        class="w-full h-96"
      ></iframe>

      <div class="w-full py-10">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">
          How to Reach Tehre
        </h2>

        <div
          class="info-card w-full flex flex-col md:flex-row bg-red-50"
          data-aos="fade-right"
        >
          <div class="w-full md:w-1/3 flex justify-center">
            <dotlottie-player
              src="https://lottie.host/0ee4738b-2c55-435c-ba77-d5fa61cfd620/EhSS52GbBK.lottie"
              background="transparent"
              speed="1"
              style="width: 200px; height: 200px"
              loop
              autoplay
            ></dotlottie-player>
          </div>
          <div class="w-full md:w-2/3 px-6 text-center md:text-left">
            <h3 class="text-xl font-semibold text-gray-800">By Bus</h3>
            <p class="text-gray-600 text-lg">
              Regular buses connect Tehre with nearby cities. It’s a
              cost-effective way to travel.
            </p>
          </div>
        </div>

        <div
          class="info-card w-full flex flex-col md:flex-row bg-green-50"
          data-aos="fade-left"
        >
          <div class="w-full md:w-1/3 flex justify-center mb-10">
            <dotlottie-player
              src="https://lottie.host/fcb89822-8954-4b6e-aceb-1a145406e21e/97XBRq5hEJ.lottie"
              background="transparent"
              speed="1"
              style="width: 200px; height: 200px"
              loop
              autoplay
            ></dotlottie-player>
          </div>
          <div class="w-full md:w-2/3 px-6 text-center md:text-left">
            <h3 class="text-xl font-semibold text-gray-800">By Train</h3>
            <p class="text-gray-600 text-lg">
              The nearest railway station is just 30 km away, offering quick
              access.
            </p>
          </div>
        </div>

        <div
          class="info-card w-full flex flex-col md:flex-row bg-blue-50"
          data-aos="fade-right"
        >
          <div class="w-full md:w-1/3 flex justify-center">
            <dotlottie-player
              src="https://lottie.host/93129566-b387-433e-93cb-7cb94af06995/lseyZ8EroL.lottie"
              background="transparent"
              speed="1"
              style="width: 200px; height: 200px"
              loop
              autoplay
            >
            </dotlottie-player>
          </div>
          <div class="w-full md:w-2/3 px-6 text-center md:text-left">
            <h3 class="text-xl font-semibold text-gray-800">By Air</h3>
            <p class="text-gray-600 text-lg">
              The closest airport is 100 km away, providing domestic and
              international flights.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section
      id="gallery"
      class="container mx-auto p-6 bg-white rounded-lg shadow-lg hidden"
      data-aos="fade-up"
    >
      <h2 class="text-3xl font-semibold">Gallery</h2>
      <div class="grid grid-cols-3 gap-4 mt-4">
        <img src="uploads/hotels/<?php echo $hotels['hotel_image1']?>" class="w-full h-50 object-cover rounded-md" />
        <img src="uploads/hotels/<?php echo $hotels['hotel_image2']?>" class="w-full h-50 object-cover rounded-md" />
        <img src="uploads/hotels/<?php echo $hotels['hotel_image3']?>" class="w-full h-50 object-cover rounded-md" />
        <img src="uploads/hotels/<?php echo $hotels['hotel_image4']?>" class="w-full h-50 object-cover rounded-md" />
        <img src="uploads/hotels/<?php echo $hotels['hotel_image5']?>" class="w-full h-50 object-cover rounded-md" />
      </div>

      <div
        class="w-full max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-1 bg-white rounded-lg mt-1"
      >
        <div class="flex justify-center items-center p-4 rounded-lg">
          <dotlottie-player
            src="https://lottie.host/8311d7c3-ba05-4876-a08c-3e5842b7d8d3/4jI6urJCsV.lottie"
            background="transparent"
            speed="1"
            style="width: 300px; height: 300px"
            loop
            autoplay
          ></dotlottie-player>
        </div>

        <div class="flex justify-center items-center p-4 rounded-lg">
          <dotlottie-player
            src="https://lottie.host/6f0fa360-c873-4821-a9a2-99a4fbbcfa08/c3kDVQOAVw.lottie"
            background="transparent"
            speed="1"
            style="width: 300px; height: 300px"
            loop
            autoplay
          ></dotlottie-player>
        </div>

        <div class="flex justify-center items-center p-4 rounded-lg">
          <dotlottie-player
            src="https://lottie.host/31416f9f-e532-4fbf-a03d-4670ab540460/FhiBcJwe6y.lottie"
            background="transparent"
            speed="1"
            style="width: 300px; height: 300px"
            loop
            autoplay
          ></dotlottie-player>
        </div>

        <div class="flex justify-center items-center p-4 rounded-lg">
          <dotlottie-player
            src="https://lottie.host/03cf04b5-b6d8-4272-8ad1-eb79192bf68b/clkOrqC2Pi.lottie"
            background="transparent"
            speed="1"
            style="width: 300px; height: 300px"
            loop
            autoplay
          ></dotlottie-player>
        </div>
      </div>
    </section>

    <section
      id="feedback"
      class="container mx-auto p-6 bg-white rounded-lg shadow-lg mt-10 hidden"
    >
      <h2 class="text-3xl font-semibold text-center mb-6 text-black">
        Customer Feedback
      </h2>

      <div
        id="feedback-container"
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6"
      ></div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js"></script>
    <script>
      AOS.init();
      function showSection(section) {
        document.getElementById("details").classList.add("hidden");
        document.getElementById("map").classList.add("hidden");
        document.getElementById("gallery").classList.add("hidden");
        document.getElementById("feedback").classList.add("hidden");
        document.getElementById(section).classList.remove("hidden");
      }

      document.addEventListener("DOMContentLoaded", function () {
        const feedbacks = [
          {
            name: "John Doe",
            feedback:
              "Amazing experience! The service was top-notch and exceeded my expectations.",
            image:
              "https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample3.jpg",
          },
          {
            name: "Emma Smith",
            feedback:
              "The staff was very friendly and the atmosphere was great. Highly recommended!",
            image:
              "https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample27.jpg",
          },
          {
            name: "David Johnson",
            feedback:
              "A fantastic place to stay. The hospitality was truly remarkable!",
            image:
              "https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample17.jpg",
          },
          {
            name: "John Doe",
            feedback:
              "Amazing experience! The service was top-notch and exceeded my expectations.",
            image:
              "https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample3.jpg",
          },
          {
            name: "Emma Smith",
            feedback:
              "The staff was very friendly and the atmosphere was great. Highly recommended!",
            image:
              "https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample27.jpg",
          },
          {
            name: "David Johnson",
            feedback:
              "A fantastic place to stay. The hospitality was truly remarkable!",
            image:
              "https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample17.jpg",
          },
        ];

        const container = document.getElementById("feedback-container");

        feedbacks.forEach((feedback) => {
          const card = document.createElement("div");
          card.className =
            "bg-gray-50 p-6 rounded-lg shadow-md text-center hover:shadow-lg transition-transform duration-300 hover:-translate-y-1";

          card.innerHTML = `
                <img src="${feedback.image}" class="w-20 h-20 mx-auto rounded-full mb-4" alt="${feedback.name}">
                <p class="text-gray-700 italic">"${feedback.feedback}"</p>
                <h5 class="mt-4 font-semibold text-lg">${feedback.name}</h5>
              `;

          container.appendChild(card);
        });
      });
    </script>
    <script
      src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
      type="module"
    ></script>
  </body>
</html>
