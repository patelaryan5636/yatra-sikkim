<?php
  session_start();
  require_once 'includes/scripts/connection.php';
  

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $stmt = $conn->prepare("SELECT * FROM `guide_master` where is_confirm = 1");
  $stmt->execute();
  $result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <title>Discover & Connect: Best Local Businesses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
        crossorigin="anonymous"></script>
    <style>
        @import url("https://fonts.cdnfonts.com/css/samarkan");

        ::-webkit-scrollbar {
            width: 6px;
            /* Width of the scrollbar */
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            /* Background of the scrollbar track */
            border-radius: 10px;
            /* Optional rounded corners */
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(7, 99, 81, 0.832);
            /* Color of the scrollbar thumb */
            border-radius: 10px;
            /* Optional rounded corners */
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(3, 103, 76, 0.427);
            /* Color when hovered */
        }

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
        <h1 class="title font-bold text-gray-700 mb-2 text-6xl mt-5">
            Discover & Connect: Your Best Local Guides
        </h1>
        <p class="text-gray-600 text-xl font-serif px-20">Bring your business to the digital world and connect with
            Bring your travel aspirations to life and connect with local experts who appreciate the essence of your
            destination. Whether you're interested in historical insights, cultural immersion, or off-the-beaten-path
            adventures, explore our curated selection of guides and let them showcase the heart and soul of the place
            through their unique knowledge and passion.</p>

        <div class="flex justify-center items-center  gap-5  mb-16 font-serif">
            <div class="px-3 py-4 mt-3 bg-purple-200 h-6  text-gray-600 font-medium rounded-lg  flex items-center">
                🗣️ Expert Guides
            </div>
            <div class="px-3 py-4 mt-3 bg-blue-200 h-6  text-gray-600 font-medium rounded-lg  flex items-center">
                🗺️ Personalized Tours
            </div>
            <div class="px-3 py-4 mt-3 bg-pink-200 h-6  text-gray-600 font-medium rounded-lg  flex items-center">
                🌟 Immersive Experiences
            </div>
        </div>

        <div class="cards-container flex flex-wrap justify-center gap-12">
            <?php
                    function encrypt($data) {
                        $key = "Yatra@5636"; // Use a strong key
                        $iv = "1234567891011121"; // 16-byte IV (same during encryption & decryption)
                        return urlencode(openssl_encrypt($data, "AES-256-CBC", $key, 0, $iv));
                    }
                 while($guides = $result->fetch_assoc()){
                    $encrypted_id = encrypt($guides['guide_id']);
            ?>
            <div
                class="max-w-sm w-[22%] business-card h-[400px] rounded-2xl overflow-hidden shadow-lg bg-white border border-[#c4dfdf] p-5 flex flex-col">
                <div class="relative w-full align-center justify-center" style="display: flex;">
                    <img class="w-[55%] h-40 object-cover rounded-[50%]" src="uploads/guides_documents/<?php echo $guides['passport_photo'];?>" alt="Hotel Image" />
                </div>
                <div class="mt-4 flex-grow">
                    <h2 class="text-xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-user text-[#5a8c8c] mr-2"></i> <?php echo $guides['full_name']; ?>
                    </h2>
                    <p class="text-gray-600 mt-2 line-clamp-2 overflow-hidden text-ellipsis w-full text-left">
                        <i class="fas fa-info-circle text-[#76a3a3] mr-2 "></i> Experience: <?php echo $guides['experience']; ?>
                    </p>
                    <p class="text-gray-600 mt-2 line-clamp-2 overflow-hidden text-ellipsis w-full text-left">
                        <i class="fa-regular fa-clock text-[#76a3a3] mr-2 "></i> Time: <?php echo $guides['preferred_time']; ?>
                    </p>
                </div>
                <div class="flex  items-center gap-2">
                    <div
                        class="px-9 py-3 mt-3 bg-purple-100 h-6  text-gray-700 font-medium rounded-lg  flex items-center">
                        <i class="fa fa-venus-mars mr-2"></i><?php echo $guides['gender']; ?>
                    </div>
                    <div
                        class="px-9 py-3 mt-3 bg-blue-100 h-6  text-gray-700 font-medium rounded-lg  flex items-center">
                        <i class="fa-solid fa-globe mr-2"></i><?php echo $guides['nationality']; ?>
                    </div>
                </div>
                <a href="guidedata?id=<?php echo $encrypted_id;?>">

                    <div class=" font-serif mt-5">
                        <button
                        class="px-4 py-2 bg-gradient-to-r from-[#76a3a3] to-[#5a8c8c] text-white text-lg rounded-lg shadow-md h-10 w-full mb-4 hover:shadow-lg transition-all duration-300 flex items-center justify-center">
                        <i class="fa-solid fa-right-to-bracket mr-2"></i> See Details
                    </button>
                </div>
            </a>
            </div>
            <?php
                }
            ?>
        </div>

    </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</html>