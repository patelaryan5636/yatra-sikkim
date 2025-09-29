<!-- Last Updated by
    MIHIR AMIN
-->

<!-- 
  LANGUAGES PENDING
 -->

<?php
  session_start();
  require_once 'includes/scripts/connection.php';

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $stmt = $conn->prepare("SELECT * FROM `guide_master`");
  $stmt->execute();
  $result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Guide Cards</title>
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="bg-[#c4dfdf] flex justify-center items-center min-h-screen p-8">
    <?php
      while($guides = $result->fetch_assoc()){
    ?>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-6xl w-full">
      <div
        class="bg-[#f8f6f4] shadow-xl rounded-lg overflow-hidden flex flex-col md:flex-row relative"
        data-aos="fade-up"
      >
        <img
          src="krish.jpg"
          alt="Guide Image"
          class="w-full md:w-1/3 h-48 md:h-auto object-cover"
        />
        <div class="p-5 w-full">
          <h2 class="text-xl font-bold text-gray-800 ml-1"><?php echo $guides['full_name']; ?></h2>
          <p class="text-gray-600 text-sm mt-1 ml-1">
            <?php echo $guides['address']; ?>
          </p>
          
          <div
            class="mt-2 flex flex-wrap gap-2 text-xs font-semibold text-gray-500"
          >
            <span class="px-2 py-1 bg-red-100 rounded">Hindi</span>
            <span class="px-2 py-1 bg-yellow-100 rounded">English</span>
            <span class="px-2 py-1 bg-green-100 rounded">Gujrati</span>
          </div>
         
          <p class="text-gray-600 text-sm mt-2 ml-1">
            <?php
              echo $guides['experience'];
            ?>
          </p>

          <button class="bg-[#C4DFDF] text-gray-800 font-semibold mt-2 px-4 py-2 rounded-lg shadow-md transition duration-300 hover:bg-[#A2C8C8] hover:shadow-lg transform hover:scale-105">
            See Details →
          </button>
          
          <!-- <div
            class="mt-4 flex flex-wrap gap-1 text-xs font-semibold text-gray-500"
          >
            <span class="px-2 py-1 bg-red-100 rounded">History</span>
            <span class="px-2 py-1 bg-yellow-100 rounded">Culture</span>
            <span class="px-2 py-1 bg-green-100 rounded">Heritage</span>
            <span class="px-2 py-1 bg-blue-200 rounded">Wildlife</span>
            <span class="px-2 py-1 bg-indigo-100 rounded">Adventure</span>
          </div> -->
        </div>

        <button
          class="like-button absolute top-3 right-3 bg-white p-2 h-10 w-10 rounded-full shadow-md hover:bg-gray-200 transition z-10"
          onclick="toggleLike(this, 0)"
        >
          <i class="far fa-heart text-gray-800 text-xl"></i>
        </button>
      </div>
      <?php
        }
      ?>
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
      AOS.init({ duration: 1000 });

      function toggleLike(button, id) {
        const icon = button.querySelector("i");
        const isLiked = localStorage.getItem(`liked_${id}`);

        if (isLiked) {
          localStorage.removeItem(`liked_${id}`);
          icon.classList.replace("fas", "far");
          icon.classList.remove("text-red-500");
        } else {
          localStorage.setItem(`liked_${id}`, "true");
          icon.classList.replace("far", "fas");
          icon.classList.add("text-red-500");
        }
      }

      function loadLikes() {
        document.querySelectorAll(".like-button").forEach((button, index) => {
          const icon = button.querySelector("i");
          if (localStorage.getItem(`liked_${index}`)) {
            icon.classList.replace("far", "fas");
            icon.classList.add("text-red-500");
          }
        });
      }

      document.addEventListener("DOMContentLoaded", loadLikes);
    </script>
  </body>
</html>
