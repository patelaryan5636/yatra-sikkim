<?php
session_start();
require_once '../includes/scripts/connection.php';

if(isset($_SESSION['Yatra_logedin_user_id']) && (trim ($_SESSION['Yatra_logedin_user_id']) !== '')){
    $user_id = $_SESSION['Yatra_logedin_user_id'];
    $query = "SELECT * FROM user_master WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);
    $userdata = mysqli_fetch_assoc($result);
    $user_role = $userdata["user_role"];
    $is_sucess = $userdata["is_sucess"];
    $is_confirmed = $userdata["is_confirmed"];
    if($user_role != 2){
        header("Location: ../404");
        exit();
    }else{
        if($is_confirmed == 1){
            header("location: index");
            exit();
        }else if($is_sucess != 0){
            header("location: ../req");
        }
    }
} else {
    header("Location: ../business/business_register");
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Become a Guide</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Custom fade-out animation */
    .fade-out {
      animation: fadeOut 10s forwards;
    }

    @keyframes fadeOut {
      0% {
        opacity: 1;
      }

      50% {
        opacity: 1;
      }

      100% {
        opacity: 0;
        display: none;
      }
    }
  </style>
</head>

<body style="background-image: url('formbgimg.jpg')" class="overflow-x-auto">
  <div class="max-w-5xl mx-auto  bg-[#f8f6f4] shadow-lg p-8 rounded-lg relative  my-16">
    <h2 class="text-3xl font-bold text-gray-800 text-center mt-3">
      Join Our Professional Guide Network 🌍
    </h2>
    <p class="text-gray-600 text-center mt-2 mb-4">
      Become a certified tour guide and offer travelers an unforgettable
      experience. Register today and start your journey!
    </p>

    <div class="flex space-x-2 mt-2 justify-center">
      <span class="bg-[#C4DFDF] px-2 py-1 rounded text-xs md:text-sm">🗺️ Expert Local Guidance</span>
      <span class="bg-[#C4DFDF] px-2 py-1 rounded text-xs md:text-sm">📅 Flexible Tour Scheduling </span>
      <span class="bg-[#C4DFDF] px-2 py-1 rounded text-xs md:text-sm">💼 Certified & Trusted Guide</span>
    </div>
    <div class="container flex flex-col lg:flex-row">

      <div class="w-full lg:w-2/3 p-6">
        <?php if (isset($_SESSION['Yatra_error_message'])): ?>
        <div id="errorAlert"
          class="fade-out bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md mb-4">
          <div class="flex items-center justify-between">
            <div>
              <strong class="font-semibold text-lg">⚠️ Error!</strong>
              <p class="mt-1 text-sm">
                <?php echo $_SESSION['Yatra_error_message']; ?>
              </p>
            </div>
            <button onclick="closeErrorAlert()"
              class="text-red-700 hover:text-red-900 text-lg font-bold">&times;</button>
          </div>
        </div>
        <?php unset($_SESSION['Yatra_error_message']); // Clear message after displaying ?>
        <?php endif; ?>
        <form action="process_guide" method="POST" enctype="multipart/form-data">
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <input type="text" name="full_name" placeholder="Full Name" class="p-3 border rounded-md">
            <select class="p-3 border rounded-md" name="gender" required>
              <option>Gender</option>
              <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select>
            <input type="text" name="address" placeholder="Address" class="p-3 border rounded-md" required>
            <select class="p-3 border rounded-md" name="nationality">
              <option>Nationality</option>
              <option>Indian</option>
              <option>NRI</option>
              <option>Other</option>
            </select>
            <input type="text" placeholder="Aadhar Card Number" name="aadhar_card_number" class="p-3 border rounded-md"
              required>
            <input type="text" placeholder="PAN Card Number" name="pan_card_number" class="p-3 border rounded-md"
              required>
            <input type="tel" placeholder="Mobile Number" name="mobile_number" class="p-3 border rounded-md" required>

            <input type="tel" placeholder="Alternative Mobile" name="alternative_mobile" class="p-3 border rounded-md"
              required>
            <input type="text" placeholder="Guide License Number" name="guide_license_number"
              class="p-3 border rounded-md" required>
            <select class="p-3 border rounded-md" name="experience" required>
              <option>Years of Experience</option>
              <option>1-3 Years</option>
              <option>3-5 Years</option>
              <option>5+ Years</option>
            </select>
            <input type="date" id="g_dob" name="birth_date" class="p-3 border rounded-md" required>
            <span style="color: red; font-weight: bold;" id="error-message"></span>
          </div>
          <h3 class="mt-6 text-lg font-semibold mb-3 text-center uppercase">Fee Criteria (Per Hour)</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input type="text" placeholder="Solo Tour Fee" name="solo_tour_fee" class="p-3 border rounded-md" required>
            <input type="text" placeholder="Group Tour Fee" name="group_tour_fee" class="p-3 border rounded-md"
              required>
            <input type="text" placeholder="VIP Tour Fee" name="vip_tour_fee" class="p-3 border rounded-md" required>
          </div>
          <h3 class="mt-6 text-lg font-semibold mb-4 text-center uppercase">Available Days & Time</h3>
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <label><input type="checkbox" name="available_days[]" value="Monday"> Monday</label>
            <label><input type="checkbox" name="available_days[]" value="Tuesday"> Tuesday</label>
            <label><input type="checkbox" name="available_days[]" value="Wednesday"> Wednesday</label>
            <label><input type="checkbox" name="available_days[]" value="Thursday"> Thursday</label>
            <label><input type="checkbox" name="available_days[]" value="Friday"> Friday</label>
            <label><input type="checkbox" name="available_days[]" value="Saturday"> Saturday</label>
            <label><input type="checkbox" name="available_days[]" value="Sunday"> Sunday</label>
          </div>
          <h3 class="mt-6 text-lg font-semibold mb-4 text-center uppercase">Prefered time</h3>
          <input type="text" class="w-full px-4 py-2 border rounded-lg mt-2" name="preferred_time"
            placeholder="e.g., 9 AM - 12 PM, 2 PM - 5 PM" required />
          <h3 class="mt-6 mb-3 text-lg font-semibold text-center uppercase">Upload Documents</h3>
          <div class="grid grid-cols-1   gap-4">
            <label>Upload Aadhar Card <input type="file" name="aadhar_card_document" class="p-2 border rounded-md"
                onchange="trimFileName(this)" required></label>
            <label>Upload PAN Card <input type="file" name="pan_card_document" class="p-2 border rounded-md"
                onchange="trimFileName(this)" required></label>
            <label>Upload Passport Size Photo <input type="file" name="passport_photo" class="p-2 border rounded-md"
                onchange="trimFileName(this)" required></label>
            <label>Upload Training Certifications <input type="file" name="training_certifications"
                class="p-2 border rounded-md" onchange="trimFileName(this)" required></label>
          </div>
          <button type="submit" value="submit" id="submit-btn" name="submit"
            class="mt-6 bg-[#C4DFDF] text-black uppercase p-3 rounded-md w-full hover:bg-[#E3F4F4]">Submit →</button>
      </div>
      </form>

      <div class="w-full lg:w-1/3 p-6 flex flex-col items-center space-y-4">
        <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
          type="module"></script>
        <dotlottie-player src="https://lottie.host/93129566-b387-433e-93cb-7cb94af06995/lseyZ8EroL.lottie"
          background="transparent" speed="1" style="width: 200px; height: 200px" loop autoplay></dotlottie-player>
        <dotlottie-player src="https://lottie.host/fbd299b4-fd36-47b2-8d33-a65f6d8188a7/Qrgf2w9Psh.lottie"
          background="transparent" speed="1" style="width: 200px; height: 200px" loop autoplay></dotlottie-player>
        <dotlottie-player src="https://lottie.host/1923b169-a4ff-482f-bada-190fb7bba3cb/KfFGLzAOcg.lottie"
          background="transparent  speed=" 1" style="width: 200px; height: 200px" loop autoplay></dotlottie-player>
        <dotlottie-player src="https://lottie.host/f37cc523-2be5-4dda-887e-81a71b1afb94/Q7aKKoyCEN.lottie"
          background="transparent" speed="1" style="width: 200px; height: 200px" loop autoplay></dotlottie-player>
        <dotlottie-player src="https://lottie.host/180268a0-957f-43d2-b627-1a7236fc85df/wnaCNerebg.lottie"
          background="transparent" speed="1" style="width: 200px; height: 200px" loop autoplay></dotlottie-player>
      </div>
    </div>
    <div class="max-w-7xl mx-auto mt-1 mb-2 grid grid-cols-1 gap-3 md:grid-cols-3 text-black">
      <div class="bg-red-100 p-6  rounded-lg text-center">
        🌍
        <h3 class="font-bold text-lg">Global Opportunities</h3>
        <p>Expand your reach and guide travelers worldwide.</p>
      </div>
      <div class="bg-green-100 rounded-lg p-6 shadow-md text-center">
        📅
        <h3 class="font-bold text-lg">Flexible Scheduling</h3>
        <p>Work at your convenience with custom time slots.</p>
      </div>
      <div class="bg-blue-100 p-6 rounded-lg shadow-md text-center">
        💰
        <h3 class="font-bold text-lg">Earn Handsomely</h3>
        <p>Set your own fee and maximize your income.</p>
      </div>
    </div>


</body>
<script>
  const dobInput = document.getElementById('g_dob');
  const submitBtn = document.getElementById('submit-btn');
  const errorMessage = document.getElementById('error-message');

  // Set the max date to 18 years ago
  const today = new Date();
  const maxEligibleDate = new Date();
  maxEligibleDate.setFullYear(today.getFullYear() - 18);
  dobInput.setAttribute('max', maxEligibleDate.toISOString().split('T')[0]);

  dobInput.addEventListener('change', function () {
    const dob = new Date(dobInput.value);
    if (isNaN(dob)) {
      // Handle invalid date input
      errorMessage.textContent = 'Please select a valid date.';
      submitBtn.disabled = true;
      return;
    }

    // Calculate the date the guide turns 18
    const eighteenYearsLater = new Date(dob);
    eighteenYearsLater.setFullYear(eighteenYearsLater.getFullYear() + 18);

    if (today < eighteenYearsLater) {
      dobInput.setAttribute('title', 'You are not eligible to be a guide');
      errorMessage.textContent = 'You are not eligible to be a guide.';
      submitBtn.disabled = true; // Disable submit button
    } else {
      dobInput.removeAttribute('title');
      errorMessage.textContent = '';
      submitBtn.disabled = false; // Enable submit button
    }
  });

  // Initially validate the input and disable the button if necessary
  if (dobInput.value) {
    dobInput.dispatchEvent(new Event('change'));
  }
</script>
<script>
  function trimFileName(input) {
    if (input.files && input.files[0]) {
      let fileName = input.files[0].name;
      fileName = fileName.replace(/\s+/g, ''); // Remove ALL spaces

      // alert(`Trimmed file name: ${fileName}`);
    }
  }
</script>

</html>