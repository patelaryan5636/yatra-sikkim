<?php 
  session_start();
  require_once '../includes/scripts/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Portal - Secure Access</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body
    class="bg-gray-100 flex items-center justify-center min-h-screen"
    style="background-image: url('adminloginbg.jpg'); background-size: cover"
  >
    <div class="bg-[#f8f6f4] shadow-xl overflow-hidden flex w-3/4 max-w-4xl">
      <div class="w-1/2 px-6 py-8 flex items-center justify-center">
        <div class="relative w-full h-full">
          <div class="absolute inset-0 bg-black bg-opacity-30"></div>
          <img
            src="adminloginbg.jpg"
            alt="Background"
            class="w-full h-full object-cover"
          />
        </div>
      </div>

      <div class="w-1/2 p-8 flex flex-col justify-center mr-2">
        <div class="flex justify-center mb-4">
          <img src="../gandiv.png" alt="Logo" class="h-16" />
        </div>

        <h2
          class="text-3xl font-bold text-center mb-2 text-gray-600 font-serif"
        >
          <span class="text-[#a3d9d9]">Access Granted,</span> Admin!
        </h2>

        <div class="flex space-x-2 mt-1 mb-4 justify-center">
          <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm"
            >🏰 Control</span
          >
          <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm"
            >🚆 Manage</span
          >
          <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm"
            >🛕 Monitor</span
          >
        </div>

        <?php if (isset($_SESSION['success_message'])): ?>
          <br>
                <div id="successAlert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md mb-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <strong class="font-semibold text-lg">🎉 Success!</strong>
                            <p class="mt-1 text-sm"><?php echo $_SESSION['success_message']; ?></p>
                        </div>
                        <button onclick="closeSuccessAlert()" class="text-green-700 hover:text-green-900 text-lg font-bold">&times;</button>
                    </div>
                </div>
                <?php unset($_SESSION['success_message']); // Clear message after displaying ?>
        <?php endif; ?>

           <!-- Display Animated Error Message (For 4 Seconds) -->
           <?php if (isset($_SESSION['Yatra_error_message'])): ?>
            <br>
                <div id="errorAlert" class="fade-out bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md mb-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <strong class="font-semibold text-lg">⚠️ Error!</strong>
                            <p class="mt-1 text-sm"><?php echo $_SESSION['Yatra_error_message']; ?></p>
                        </div>
                        <button onclick="closeErrorAlert()" class="text-red-700 hover:text-red-900 text-lg font-bold">&times;</button>
                    </div>
                </div>
                <?php unset($_SESSION['Yatra_error_message']); // Clear message after displaying ?>
            <?php endif; ?>


        <form id="adminLoginForm" action="process_admin_login.php" method="post" class="space-y-5">
          <div>
            <label
              for="username"
              class="block text-gray-700 text-sm font-bold mb-2"
            >
              <i class="fas fa-user mr-2 text-[#a3d9d9]"></i> Username
            </label>
            <input
              type="text"
              id="username"
              name="username"
              class="shadow-md border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-[#c4dfdf]"
              placeholder="Enter your username"
              required
            />
          </div>

          <div>
            <label
              for="password"
              class="block text-gray-700 text-sm font-bold mb-2"
            >
              <i class="fas fa-lock mr-2 text-[#a3d9d9]"></i> Password
            </label>
            <input
              type="password"
              id="password"
              name="password"
              class="shadow-md border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-[$c4dfdf]"
              placeholder="Enter your password"
              required
            />
          </div>

          <div class="flex items-center justify-center">
            <button
              type="submit"
              class="w-full bg-[#a3d9d9] hover:bg-[#c4dfdf] text-white font-bold py-3 px-6 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 flex items-center justify-center transition-all duration-300"
            >
              Login <i class="fas fa-sign-in-alt ml-2"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
    <script>
      
    
        // Function to close error alert manually
        function closeErrorAlert() {
            document.getElementById('errorAlert').classList.add('hidden');
        }

        // Function to close success alert manually
        function closeSuccessAlert() {
            document.getElementById('successAlert').style.display = 'none';
        }

        // Auto-hide error alert after 4 seconds
        setTimeout(() => {
            let errorAlert = document.getElementById('errorAlert');
            if (errorAlert) {
                errorAlert.classList.add('hidden');
            }
        }, 2000);
        setTimeout(() => {
            let sucessalert = document.getElementById('successAlert');
            if (sucessalert) {
                sucessalert.classList.add('hidden');
            }
        }, 2000);
    
  </script>
  </body>
</html>
