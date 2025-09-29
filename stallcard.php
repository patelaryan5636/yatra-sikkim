<?php
  session_start();
  require_once 'includes/scripts/connection.php';

  $stmt = $conn->prepare("SELECT * FROM `store_master` where is_confirmed= 1 ");
  $stmt->execute();
  $result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Discover & Connect: Best Local Businesses</title>
  <link rel="icon" type="image/png" href="Logo_Title.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
    crossorigin="anonymous"></script>
  <style>
    @import url("https://fonts.cdnfonts.com/css/samarkan");

    .title {
      font-family: "Samarkan";
    }

    body {
      background-image: url("stallcardbg.jpg");
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      font-family: "Arial", sans-serif;
    }

    .container {
      max-width: 900px;
      padding: 20px;
      text-align: center;
    }

    .cards-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      justify-items: center;
    }

    .business-card {
      transition: transform 0.3s ease-in-out;
    }

    .business-card:hover {
      transform: translateY(-5px);
    }

    .line-clamp {
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  </style>
</head>

<body>
  <?php
    include("includes/header.php");
  ?>
  <div class="container">
    <h1 class="title font-bold text-gray-700 mb-2 text-6xl">
      Discover & Connect: Best
      Local Businesses
    </h1>
    <p class="text-gray-600 text-xl font-serif px-20">Bring your business to the digital world and connect with
      customers who
      appreciate heritage, craftsmanship, and tradition. Whether you specialize in handmade art, cultural treasures, or
      timeless creations, showcase your shop online and let the world experience the essence of Jharkhand through your
      unique offerings.</p>

    <div class="flex justify-center items-center  gap-5  mb-16 font-serif">
      <div class="px-3 py-4 mt-3 bg-pink-200 h-6  text-gray-600 font-medium rounded-lg  flex items-center">
        ✨ Show your craft
      </div>
      <div class="px-3 py-4 mt-3 bg-blue-200 h-6  text-gray-600 font-medium rounded-lg  flex items-center">
        🌍 reach more
      </div>
      <div class="px-3 py-4 mt-3 bg-purple-200 h-6  text-gray-600 font-medium rounded-lg  flex items-center">
        🚀 grow beyond
      </div>
    </div>

    <div class="cards-container flex flex-wrap justify-center gap-12">
                <?php
                function encrypt($data) {
                  $key = "Yatra@5636"; // Use a strong key
                  $iv = "1234567891011121"; // 16-byte IV (same during encryption & decryption)
                  return urlencode(openssl_encrypt($data, "AES-256-CBC", $key, 0, $iv));
              }
                 while($stores = $result->fetch_assoc()){
                  $encrypted_id = encrypt($stores['store_id']);
                  $store_image = str_replace("../", "", $stores['store_image']);
                ?>
      <div
        class="max-w-sm w-[30%] business-card h-[400px] rounded-2xl overflow-hidden shadow-lg bg-white border border-[#c4dfdf] p-5 flex flex-col">
        <div class="relative">
          <img class="w-full h-40 object-cover rounded-lg" src="<?php echo $store_image;?>" alt="Hotel Image" />
          <div
            class="absolute top-3 right-3 bg-[#c4dfdf] bg-opacity-80 px-3 py-1 text-sm font-semibold rounded-lg text-gray-700">
            <i class="fa-solid fa-cart-shopping"></i>
            <?php echo "Stall"?>
          </div>
        </div>
        <div class="mt-4 flex-grow">
          <h2 class="text-xl font-bold text-gray-800 flex items-center">
            <i class="fas fa-store text-[#5a8c8c] mr-2"></i> <?php echo $stores['store_name'];?>
          </h2>
          <p class="text-gray-600 mt-2 line-clamp-2 overflow-hidden text-ellipsis w-full text-left">
            <i class="fas fa-info-circle text-[#76a3a3] mr-2 "></i> A luxurious stay with world-class amenities. A
            luxurious stay with world-class amenities. A luxurious stay with world-class amenities.
          </p>
        </div>
        <div class="flex  items-center gap-2">
          <div class="px-3 py-3 mt-3 bg-pink-100 h-6  text-gray-700 font-medium rounded-lg  flex items-center">
            <i class="fas fa-phone mr-2"></i><?php echo $stores['owner_mobile_number'];?>
          </div>
          <div class="px-3 py-3 mt-3 bg-blue-100 h-6  text-gray-700 font-medium rounded-lg  flex items-center">
            <i class="fas fa-user mr-2"></i>Owner
          </div>
          <div class="px-3 py-3 mt-3 bg-purple-100 h-6  text-gray-700 font-medium rounded-lg  flex items-center">
            <i class="fas fa-map-marker-alt mr-2"></i>JharKhand
          </div>
        </div>
        <div class=" font-serif mt-5">
          <a href="stalldata?id=<?php echo $encrypted_id;?>">

            <button
            class="px-4 py-2 bg-gradient-to-r from-[#76a3a3] to-[#5a8c8c] text-white text-lg rounded-lg shadow-md h-10 w-full mb-4 hover:shadow-lg transition-all duration-300 flex items-center justify-center">
            <i class="fa-solid fa-right-to-bracket mr-2"></i> More Details
          </button>
        </a>
        </div>
      </div>

      <?php 
        }
      ?>
    </div>

  </div>
  </div>
   <?php 
      include("includes/footer.php");
    ?>
</body>

</html>