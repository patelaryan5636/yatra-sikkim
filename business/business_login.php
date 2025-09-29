<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="../Logo_Title.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yatra - Business Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="flex items-center justify-center min-h-screen bg-[#C4DFDF] p-4">
    <div
      class="flex flex-col md:flex-row w-[80%] md:w-[82%] h-[80vh] bg-white shadow-lg rounded-lg overflow-hidden"
    >
      <div
        class="w-full md:w-1/2 bg-white p-6 md:p-10 flex flex-col justify-center"
      >
        <img
          src="../gandiv.png"
          alt="Yatra Logo"
          class="h-10 w-28 mb-4 mx-auto md:mx-0"
        />
        <h2
          class="text-2xl md:text-3xl font-bold text-gray-800 text-center md:text-left"
        >
          Welcome Back to Yatra
        </h2>
        <p class="text-gray-600 mt-2 text-center md:text-left">
          Manage your business through Yatra effortlessly
        </p>

        <div class="grid grid-cols-2 gap-4 mt-6">
          <div class="bg-blue-50 p-4 rounded-lg flex flex-col items-center">
            <h3 class="font-semibold mt-2 text-center">🏨 Hotels Management</h3>
            <p class="text-sm text-gray-600 text-center">
              Manage bookings and availability.
            </p>
          </div>
          <div class="bg-green-50 p-4 rounded-lg flex flex-col items-center">
            <h3 class="font-semibold mt-2 text-center">🗺️ Local Guides</h3>
            <p class="text-sm text-gray-600 text-center">
              Connect with tourists easily.
            </p>
          </div>
          <div class="bg-yellow-50 p-4 rounded-lg flex flex-col items-center">
            <h3 class="font-semibold mt-2 text-center">🛍️ Handicrafts</h3>
            <p class="text-sm text-gray-600 text-center">
              Showcase and sell products.
            </p>
          </div>
          <div class="bg-red-50 p-4 rounded-lg flex flex-col items-center">
            <h3 class="font-semibold mt-2 text-center">🏛️ Museums</h3>
            <p class="text-sm text-gray-600 text-center">
              Manage visitor tickets.
            </p>
          </div>
        </div>

        <div class="flex justify-between mt-6 gap-2">
          <div class="bg-[#E3F4F4] p-3 rounded-lg text-center w-1/4">
            <p class="text-xl font-bold text-red-500">123+</p>
            <p class="text-gray-600 text-sm">Guides</p>
          </div>
          <div class="bg-[#E3F4F4] p-3 rounded-lg text-center w-1/4">
            <p class="text-xl font-bold text-blue-500">87+</p>
            <p class="text-gray-600 text-sm">Hotels</p>
          </div>
          <div class="bg-[#E3F4F4] p-3 rounded-lg text-center w-1/4">
            <p class="text-xl font-bold text-green-500">4+</p>
            <p class="text-gray-600 text-sm">Museums</p>
          </div>
          <div class="bg-[#E3F4F4] p-3 rounded-lg text-center w-1/4">
            <p class="text-xl font-bold text-yellow-500">246+</p>
            <p class="text-gray-600 text-sm">Shops</p>
          </div>
        </div>
      </div>

      <div
        class="w-full md:w-1/2 flex flex-col justify-center p-6 md:p-10 bg-[#F8F6F4]"
      >
        <h2
          class="text-2xl md:text-3xl font-bold text-gray-800 text-center md:text-left"
        >
          Sign in to your account 👋🏻
        </h2>
        <p class="text-gray-600 mt-1 text-center md:text-left">
          Access to Your Business Insights & Management Dashboard
        </p>
        
        <!-- Display Animated Success Message -->
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

        <form class="mt-6" action="business_signmein.php" method="post">
          <label class="block text-gray-700">Email address</label>
          <input
            type="email"
            class="w-full px-4 py-2 border rounded-lg mt-2"
            placeholder="Enter Your Email Address"
            name="Yatra_login_email"
          />

          <label class="block text-gray-700 mt-4">Password</label>
          <input
            type="password"
            class="w-full px-4 py-2 border rounded-lg mt-2"
            placeholder="Enter Your Password"
            name="Yatra_login_password"
          />

          <button
            class="w-full mt-8 bg-[#C4DFDF] text-white py-2 rounded-lg text-sm md:text-base"
          >
            Sign in →
          </button>
        </form>

        <p class="text-sm text-gray-600 mt-4 text-center md:text-left">
          Don’t have an account?
          <a href="business_register" class="text-blue-500">Register your business</a>
        </p>
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
        }, 3000);
        setTimeout(() => {
            let sucessalert = document.getElementById('successAlert');
            if (sucessalert) {
                sucessalert.classList.add('hidden');
            }
        }, 3000);
    
  </script>
  </body>
</html>
