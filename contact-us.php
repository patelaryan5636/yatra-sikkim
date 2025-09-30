<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <title>Contact Us - Sikkim Tourism</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap");

      body {
        font-family: "Plus Jakarta Sans", sans-serif;
        background-color: #f8f9fa;
        background-image: radial-gradient(
            at 80% 0%,
            #c4dfdf 0px,
            transparent 50%
          ),
          radial-gradient(at 20% 100%, #94c4c4 0px, transparent 50%);
        background-attachment: fixed;
        min-height: 100vh;
      }

      .card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
      }

      .input-field {
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(148, 196, 196, 0.3);
        transition: all 0.3s ease;
      }

      .input-field:focus {
        border-color: #94c4c4;
        box-shadow: 0 0 0 4px rgba(148, 196, 196, 0.15);
      }

      @keyframes float {
        0% {
          transform: translateY(0px);
        }
        50% {
          transform: translateY(-10px);
        }
        100% {
          transform: translateY(0px);
        }
      }

      .float {
        animation: float 3s ease-in-out infinite;
      }

      .success-message {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        padding: 1rem;
        border-radius: 0.75rem;
        margin-top: 1rem;
        display: none;
      }
    </style>
  </head>
  <body class="">
    <?php 
      include("includes/header.php");
    ?>
    <div class="max-w-8xl mx-10 my-16 ">
      <!-- Header Section -->
      <div class="text-center mb-8">
        <h1 class="text-4xl md:text-5xl font-bold text-[#648383] mb-4">
          🏔️ Discover Sikkim with Us
        </h1>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
          Your gateway to the mineral-rich land of waterfalls, forests, and
          vibrant tribal culture. We're here to make your Sikkim adventure
          unforgettable!
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="card rounded-3xl p-8">
          <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-[#648383] mb-3">
              Connect with Sikkim Tourism
            </h2>
            <p class="text-gray-600">
              From majestic waterfalls to ancient temples, we're your local
              experts
            </p>
          </div>

          <div class="space-y-6">
            <div class="bg-[#c4dfdf]/20 rounded-2xl p-6">
              <div class="flex items-start gap-4">
                <div
                  class="bg-[#c4dfdf] rounded-full p-3 w-12 h-12 flex items-center justify-center shrink-0"
                >
                  <i class="fas fa-map-marked-alt text-[#648383] text-xl"></i>
                </div>
                <div>
                  <h3 class="text-lg font-semibold text-[#648383] mb-2">
                    Sikkim Tourism Office
                  </h3>
                  <p class="text-gray-600 leading-relaxed">
                    Tourism Directorate<br />
                    Government of Sikkim<br />
                    HEC Township, Dhurwa<br />
                    Ranchi, Sikkim - 834004
                  </p>
                </div>
              </div>
            </div>

            <div class="bg-[#c4dfdf]/20 rounded-2xl p-6">
              <div class="flex items-start gap-4">
                <div
                  class="bg-[#c4dfdf] rounded-full p-3 w-12 h-12 flex items-center justify-center shrink-0"
                >
                  <i class="fas fa-phone-alt text-[#648383] text-xl"></i>
                </div>
                <div>
                  <h3 class="text-lg font-semibold text-[#648383] mb-2">
                    Contact Information
                  </h3>
                  <div class="space-y-2">
                    <p class="flex items-center gap-2 text-gray-600">
                      <i class="fas fa-phone text-[#94c4c4]"></i>
                      +91 651 244 0000
                    </p>
                    <p class="flex items-center gap-2 text-gray-600">
                      <i class="fas fa-envelope text-[#94c4c4]"></i>
                      tourism@Sikkim.gov.in
                    </p>
                    <p class="flex items-center gap-2 text-gray-600">
                      <i class="fas fa-globe text-[#94c4c4]"></i>
                      www.Sikkimtourism.gov.in
                    </p>
                    <p class="flex items-center gap-2 text-gray-600">
                      <i class="fas fa-clock text-[#94c4c4]"></i>
                      Mon-Sat: 10:00 AM - 6:00 PM
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="bg-[#c4dfdf]/20 rounded-2xl p-6">
              <div class="flex items-start gap-4">
                <div
                  class="bg-[#c4dfdf] rounded-full p-3 w-12 h-12 flex items-center justify-center shrink-0"
                >
                  <i class="fas fa-users text-[#648383] text-xl"></i>
                </div>
                <div>
                  <h3 class="text-lg font-semibold text-[#648383] mb-2">
                    Tour Operators & Guides
                  </h3>
                  <p class="text-gray-600 mb-2">
                    Connect with certified local tour guides and operators for
                    authentic Sikkim experiences:
                  </p>
                  <p class="flex items-center gap-2 text-gray-600">
                    <i class="fas fa-envelope text-[#94c4c4]"></i>
                    guides@Sikkimtourism.gov.in
                  </p>
                </div>
              </div>
            </div>

            <div class="bg-[#c4dfdf]/20 rounded-2xl p-6">
              <div class="flex items-start gap-4">
                <div
                  class="bg-[#c4dfdf] rounded-full p-3 w-12 h-12 flex items-center justify-center shrink-0"
                >
                  <i class="fas fa-mountain text-[#648383] text-xl"></i>
                </div>
                <div>
                  <h3 class="text-lg font-semibold text-[#648383] mb-3">
                    Popular Destinations Support
                  </h3>
                  <div class="grid grid-cols-2 gap-3">
                    <div class="flex items-center gap-2 text-gray-600">
                      <i class="fas fa-water text-[#94c4c4]"></i>
                      Waterfalls Tours
                    </div>
                    <div class="flex items-center gap-2 text-gray-600">
                      <i class="fas fa-tree text-[#94c4c4]"></i>
                      Wildlife Safaris
                    </div>
                    <div class="flex items-center gap-2 text-gray-600">
                      <i class="fas fa-om text-[#94c4c4]"></i>
                      Temple Circuits
                    </div>
                    <div class="flex items-center gap-2 text-gray-600">
                      <i class="fas fa-palette text-[#94c4c4]"></i>
                      Tribal Culture
                    </div>
                    <div class="flex items-center gap-2 text-gray-600">
                      <i class="fas fa-hiking text-[#94c4c4]"></i>
                      Adventure Sports
                    </div>
                    <div class="flex items-center gap-2 text-gray-600">
                      <i class="fas fa-camera text-[#94c4c4]"></i>
                      Photography Tours
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="bg-[#c4dfdf]/20 rounded-2xl p-6">
              <div class="flex items-start gap-4">
                <div
                  class="bg-[#c4dfdf] rounded-full p-3 w-12 h-12 flex items-center justify-center shrink-0"
                >
                  <i
                    class="fas fa-exclamation-triangle text-[#648383] text-xl"
                  ></i>
                </div>
                <div>
                  <h3 class="text-lg font-semibold text-[#648383] mb-2">
                    Emergency & Safety
                  </h3>
                  <div class="space-y-2">
                    <p class="flex items-center gap-2 text-gray-600">
                      <i class="fas fa-phone text-[#94c4c4]"></i>
                      Tourist Helpline: 1363
                    </p>
                    <p class="flex items-center gap-2 text-gray-600">
                      <i class="fas fa-shield-alt text-[#94c4c4]"></i>
                      24/7 Emergency Support
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card rounded-3xl p-8">
          <h2
            class="text-2xl font-semibold text-[#648383] mb-6 flex items-center gap-2"
          >
            <i class="fas fa-paper-plane"></i>
            Plan Your Sikkim Journey
          </h2>
          <form action="contactus_process.php" method="post" class="space-y-6" id="contactForm">
            <div>
              <label
                class="block text-gray-600 text-sm font-medium mb-2"
                for="name"
              >
                Full Name
              </label>
              <input
                type="text"
                id="name"
                name="name"
                class="input-field w-full px-4 py-3 rounded-xl focus:outline-none"
                placeholder="Enter your name"
                required
              />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label
                  class="block text-gray-600 text-sm font-medium mb-2"
                  for="email"
                >
                  Email Address
                </label>
                <input
                  type="email"
                  id="email"
                  name="email"
                  class="input-field w-full px-4 py-3 rounded-xl focus:outline-none"
                  placeholder="Enter your email"
                  required
                />
              </div>
              <div>
                <label
                  class="block text-gray-600 text-sm font-medium mb-2"
                  for="phone"
                >
                  Phone Number
                </label>
                <input
                  type="tel"
                  id="phone"
                  name="phone"
                  class="input-field w-full px-4 py-3 rounded-xl focus:outline-none"
                  placeholder="Enter your phone"
                  required
                />
              </div>
            </div>

            <div>
              <label
                class="block text-gray-600 text-sm font-medium mb-2"
                for="subject"
              >
                What can we help you with?
              </label>
              <select
                id="subject"
                name="subject"
                class="input-field w-full px-4 py-3 rounded-xl focus:outline-none"
                required
              >
                <option value="">Select your inquiry type</option>
                <option value="tour-package">
                  Tour Packages & Itineraries
                </option>
                <option value="accommodation">Accommodation Booking</option>
                <option value="transport">Transportation Services</option>
                <option value="guide">Local Guides & Escorts</option>
                <option value="adventure">Adventure Activities</option>
                <option value="cultural">Cultural Tours & Festivals</option>
                <option value="group">Group/Corporate Tours</option>
                <option value="complaint">Complaint/Feedback</option>
                <option value="other">Other Inquiry</option>
              </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label
                  class="block text-gray-600 text-sm font-medium mb-2"
                  for="travelDate"
                >
                  Preferred Travel Date
                </label>
                <input
                  type="date"
                  name="travelDate"
                  id="travelDate"
                  class="input-field w-full px-4 py-3 rounded-xl focus:outline-none"
                />
              </div>
              <div>
                <label
                  class="block text-gray-600 text-sm font-medium mb-2"
                  for="groupSize"
                >
                  Group Size
                </label>
                <select
                  id="groupSize"
                  name="groupSize"
                  class="input-field w-full px-4 py-3 rounded-xl focus:outline-none"
                >
                  <option value="">Select group size</option>
                  <option value="solo">Solo Traveler</option>
                  <option value="couple">2 People</option>
                  <option value="family">3-5 People</option>
                  <option value="group">6-15 People</option>
                  <option value="large">15+ People</option>
                </select>
              </div>
            </div>

            <div>
              <label
                class="block text-gray-600 text-sm font-medium mb-2"
                for="message"
              >
                Tell us about your travel plans
              </label>
              <textarea
                id="message"
                name="message"
                rows="5"
                class="input-field w-full px-4 py-3 rounded-xl focus:outline-none resize-none"
                placeholder="What destinations interest you? Any specific activities or experiences you're looking for? Budget preferences?"
                required
              ></textarea>
            </div>

            <button
              type="submit"
              class="w-full bg-[#94c4c4] hover:bg-[#648383] text-white font-medium py-3 px-6 rounded-xl transition-all duration-300 flex items-center justify-center gap-2"
            >
              <i class="fas fa-compass"></i>
              Start Planning My Sikkim Trip
            </button>

            <div id="successMessage" class="success-message">
              <i class="fas fa-check-circle"></i>
              Thank you for your interest in Sikkim! We'll get back to you
              within 24 hours with personalized recommendations.
            </div>
          </form>

          <!-- Map Section -->
          <div class="mt-8">
            <h3
              class="text-lg font-semibold text-[#648383] mb-4 flex items-center gap-2"
            >
              <i class="fas fa-map-marker-alt"></i>
              Find Us in Ranchi
            </h3>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29448.36729598968!2d85.31489869999999!3d23.3440997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f4e104aa5db7dd%3A0xdc09d49d6899f43e!2sRanchi%2C%20Jharkhand!5e0!3m2!1sen!2sin!4v1650998546548!5m2!1sen!2sin"
              class="w-full h-52 rounded-xl border-2 border-[#c4dfdf]/30"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
            >
            </iframe>
          </div>

          <!-- Popular Destinations Quick Links -->
          <div class="mt-8">
            <h3
              class="text-lg font-semibold text-[#648383] mb-4 flex items-center gap-2"
            >
              <i class="fas fa-star"></i>
              Must-Visit Destinations
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
              <div class="bg-[#c4dfdf]/10 rounded-lg p-3 text-center">
                <i class="fas fa-water text-[#94c4c4] text-2xl mb-2"></i>
                <p class="text-sm text-gray-600 font-medium">Hundru Falls</p>
              </div>
              <div class="bg-[#c4dfdf]/10 rounded-lg p-3 text-center">
                <i class="fas fa-mountain text-[#94c4c4] text-2xl mb-2"></i>
                <p class="text-sm text-gray-600 font-medium">Netarhat</p>
              </div>
              <div class="bg-[#c4dfdf]/10 rounded-lg p-3 text-center">
                <i class="fas fa-paw text-[#94c4c4] text-2xl mb-2"></i>
                <p class="text-sm text-gray-600 font-medium">
                  Betla National Park
                </p>
              </div>
              <div class="bg-[#c4dfdf]/10 rounded-lg p-3 text-center">
                <i class="fas fa-om text-[#94c4c4] text-2xl mb-2"></i>
                <p class="text-sm text-gray-600 font-medium">Parasnath Hill</p>
              </div>
              <div class="bg-[#c4dfdf]/10 rounded-lg p-3 text-center">
                <i class="fas fa-industry text-[#94c4c4] text-2xl mb-2"></i>
                <p class="text-sm text-gray-600 font-medium">
                  Tata Steel Plant
                </p>
              </div>
              <div class="bg-[#c4dfdf]/10 rounded-lg p-3 text-center">
                <i class="fas fa-water text-[#94c4c4] text-2xl mb-2"></i>
                <p class="text-sm text-gray-600 font-medium">Dassam Falls</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <?php 
          include("includes/footer.php");
      ?>
    <!-- <script>
      document
        .getElementById("contactForm")
        .addEventListener("submit", function (e) {
          // e.preventDefault();

          // Show success message
          const successMessage = document.getElementById("successMessage");
          successMessage.style.display = "block";

          // Scroll to success message
          successMessage.scrollIntoView({ behavior: "smooth" });

          // Reset form after 3 seconds
          setTimeout(() => {
            this.reset();
            successMessage.style.display = "none";
          }, 5000);
        });
    </script> -->
  </body>
</html>
