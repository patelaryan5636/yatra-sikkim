<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="Logo_Title.png">
  <title>Gandiv - Privacy Policy</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              light: "#c4dfdf",
              DEFAULT: "#94c4c4",
              dark: "#648383",
            },
          },
        },
      },
    };
  </script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");
    @import url("https://fonts.cdnfonts.com/css/samarkan");

    .slogan {
      font-family: "Samarkan";
    }

    body {
      font-family: "Poppins", sans-serif;
      background: #f8f9fa;
      background-image: radial-gradient(at 90% 10%,
          #c4dfdf 0px,
          transparent 50%),
        radial-gradient(at 10% 90%, #94c4c4 0px, transparent 50%);
      background-attachment: fixed;
    }

    .privacy-section {
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.9);
    }

    .privacy-section:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(196, 223, 223, 0.2);
    }

    .listen-btn {
      transition: all 0.3s ease;
    }

    .listen-btn:hover {
      transform: scale(1.05);
    }

    .gradient-text {
      background: linear-gradient(135deg, #94c4c4 0%, #648383 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .gradient-border {
      position: relative;
      background: linear-gradient(rgba(255, 255, 255, 0.9),
          rgba(255, 255, 255, 0.9)) padding-box,
        linear-gradient(135deg, #c4dfdf, #94c4c4) border-box;
      border: 2px solid transparent;
      border-radius: 1rem;
    }
  </style>
</head>

<body class="min-h-screen">
  <?php
        include("includes/header.php");
    ?>
  <div class="min-h-screen py-10">
    <div id="loader" class="fixed inset-0 bg-white z-50 flex items-center justify-center">
      <div class="text-center">
        <i class="fas fa-spinner fa-spin text-4xl text-primary-DEFAULT mb-4"></i>
        <p class="text-gray-600">Loading...</p>
      </div>
    </div>

    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-10">
        <div class="floating mb-4 mr-4">
          <img src="gandiv.png" alt="Gandiv Logo" class="h-20 mx-auto" />
        </div>
        <h1 class="slogan text-5xl font-bold gradient-text mb-4">
          Privacy Policy
        </h1>
        <p class="text-gray-600">
          At Yatra by Gandiv, we respect your privacy and are committed to
          protecting your personal data.
        </p>
        <span class="block mt-2 text-gray-400 text-sm">
          <i class="fa-regular fa-clock mr-1"></i>Last Updated:
          <span class="font-semibold">07-09-2025</span>
        </span>
      </div>

      <div class="space-y-6">
        <div class="privacy-section gradient-border p-6">
          <div class="flex justify-between items-start mb-4">
            <h2 class="text-xl font-semibold text-primary-dark flex items-center">
              <i class="fas fa-database mr-2 text-primary-DEFAULT"></i>
              1. Information We Collect
            </h2>
            <button
              class="listen-btn bg-[#94c4c4] hover:bg-[#648383] text-white px-6 py-2.5 rounded-lg flex items-center gap-2 text-sm font-medium shadow-md transition-all duration-300 hover:shadow-lg"
              onclick="toggleSpeech(this)">
              <i class="fas fa-play text-xs"></i>
              <span>Listen</span>
            </button>
          </div>
          <ul class="list-disc ml-6 text-gray-600 leading-relaxed">
            <li>
              <span class="font-semibold">a) Personal Information:</span> Name,
              email address, phone number, location and address (for bookings or
              business registration), government ID (for verification, if
              required), payment details (via third-party secure gateways).
            </li>
            <li>
              <span class="font-semibold">b) Non-Personal Information:</span>
              Browser type, IP address, device information, usage data (pages
              visited, time spent, interactions).
            </li>
            <li>
              <span class="font-semibold">c) User-Generated Content:</span>
              Reviews, comments, listings, uploaded media (images, forms, etc.).
            </li>
          </ul>
        </div>

        <div class="privacy-section gradient-border p-6">
          <div class="flex justify-between items-start mb-4">
            <h2 class="text-xl font-semibold text-primary-dark flex items-center">
              <i class="fas fa-bullseye mr-2 text-primary-DEFAULT"></i>
              2. How We Use Your Information
            </h2>
            <button
              class="listen-btn bg-[#94c4c4] hover:bg-[#648383] text-white px-6 py-2.5 rounded-lg flex items-center gap-2 text-sm font-medium shadow-md transition-all duration-300 hover:shadow-lg"
              onclick="toggleSpeech(this)">
              <i class="fas fa-play text-xs"></i>
              <span>Listen</span>
            </button>
          </div>
          <ul class="list-disc ml-6 text-gray-600 leading-relaxed">
            <li>Process bookings for safaris, guides, museums, etc.</li>
            <li>Provide personalized experiences and local recommendations</li>
            <li>Display and manage business listings and job opportunities</li>
            <li>Send newsletters and updates about Rajpipla</li>
            <li>Improve website functionality and performance</li>
            <li>Ensure user authenticity and safety</li>
            <li>Enable AR/VR features based on location and preferences</li>
          </ul>
        </div>

        <div class="privacy-section gradient-border p-6">
          <div class="flex justify-between items-start mb-4">
            <h2 class="text-xl font-semibold text-primary-dark flex items-center">
              <i class="fas fa-share-alt mr-2 text-primary-DEFAULT"></i>
              3. How We Share Your Information
            </h2>
            <button
              class="listen-btn bg-[#94c4c4] hover:bg-[#648383] text-white px-6 py-2.5 rounded-lg flex items-center gap-2 text-sm font-medium shadow-md transition-all duration-300 hover:shadow-lg"
              onclick="toggleSpeech(this)">
              <i class="fas fa-play text-xs"></i>
              <span>Listen</span>
            </button>
          </div>
          <ul class="list-disc ml-6 text-gray-600 leading-relaxed">
            <li>Government agencies (for verified schemes and support)</li>
            <li>Business owners (only if you interact with their listings)</li>
            <li>
              Third-party providers (payment gateways, hosting, analytics, e.g.,
              Razorpay, Firebase, Supabase)
            </li>
            <li>Law enforcement, if required by legal obligation</li>
            <li>
              We do <b>not</b> sell your personal information to any third
              party.
            </li>
          </ul>
        </div>

        <div class="privacy-section gradient-border p-6">
          <div class="flex justify-between items-start mb-4">
            <h2 class="text-xl font-semibold text-primary-dark flex items-center">
              <i class="fas fa-cookie-bite mr-2 text-primary-DEFAULT"></i>
              4. Cookies & Tracking
            </h2>
            <button
              class="listen-btn bg-[#94c4c4] hover:bg-[#648383] text-white px-6 py-2.5 rounded-lg flex items-center gap-2 text-sm font-medium shadow-md transition-all duration-300 hover:shadow-lg"
              onclick="toggleSpeech(this)">
              <i class="fas fa-play text-xs"></i>
              <span>Listen</span>
            </button>
          </div>
          <ul class="list-disc ml-6 text-gray-600 leading-relaxed">
            <li>Remember your preferences</li>
            <li>Analyze website traffic and performance</li>
            <li>Customize content based on your region and interests</li>
            <li>
              You can modify your cookie preferences through your browser
              settings.
            </li>
          </ul>
        </div>

        <div class="privacy-section gradient-border p-6">
          <div class="flex justify-between items-start mb-4">
            <h2 class="text-xl font-semibold text-primary-dark flex items-center">
              <i class="fas fa-shield-halved mr-2 text-primary-DEFAULT"></i>
              5. Data Security
            </h2>
            <button
              class="listen-btn bg-[#94c4c4] hover:bg-[#648383] text-white px-6 py-2.5 rounded-lg flex items-center gap-2 text-sm font-medium shadow-md transition-all duration-300 hover:shadow-lg"
              onclick="toggleSpeech(this)">
              <i class="fas fa-play text-xs"></i>
              <span>Listen</span>
            </button>
          </div>
          <p class="text-gray-600 leading-relaxed">
            We use encryption, access control, and secure infrastructure to
            protect your data. However, no method is 100% secure—use our
            platform at your own risk.
          </p>
        </div>

        <div class="privacy-section gradient-border p-6">
          <div class="flex justify-between items-start mb-4">
            <h2 class="text-xl font-semibold text-primary-dark flex items-center">
              <i class="fas fa-child mr-2 text-primary-DEFAULT"></i>
              6. Children’s Privacy
            </h2>
            <button
              class="listen-btn bg-[#94c4c4] hover:bg-[#648383] text-white px-6 py-2.5 rounded-lg flex items-center gap-2 text-sm font-medium shadow-md transition-all duration-300 hover:shadow-lg"
              onclick="toggleSpeech(this)">
              <i class="fas fa-play text-xs"></i>
              <span>Listen</span>
            </button>
          </div>
          <p class="text-gray-600 leading-relaxed">
            Our services are not directed to children under 13. If we learn that
            we have collected data from a child without parental consent, we
            will delete it immediately.
          </p>
        </div>

        <div class="privacy-section gradient-border p-6">
          <div class="flex justify-between items-start mb-4">
            <h2 class="text-xl font-semibold text-primary-dark flex items-center">
              <i class="fas fa-link mr-2 text-primary-DEFAULT"></i>
              7. Third-Party Links
            </h2>
            <button
              class="listen-btn bg-[#94c4c4] hover:bg-[#648383] text-white px-6 py-2.5 rounded-lg flex items-center gap-2 text-sm font-medium shadow-md transition-all duration-300 hover:shadow-lg"
              onclick="toggleSpeech(this)">
              <i class="fas fa-play text-xs"></i>
              <span>Listen</span>
            </button>
          </div>
          <p class="text-gray-600 leading-relaxed">
            Our platform may include links to third-party websites (e.g.,
            government portals, local businesses). We are not responsible for
            their privacy practices.
          </p>
        </div>

        <div class="privacy-section gradient-border p-6">
          <div class="flex justify-between items-start mb-4">
            <h2 class="text-xl font-semibold text-primary-dark flex items-center">
              <i class="fas fa-user-lock mr-2 text-primary-DEFAULT"></i>
              8. Your Rights
            </h2>
            <button
              class="listen-btn bg-[#94c4c4] hover:bg-[#648383] text-white px-6 py-2.5 rounded-lg flex items-center gap-2 text-sm font-medium shadow-md transition-all duration-300 hover:shadow-lg"
              onclick="toggleSpeech(this)">
              <i class="fas fa-play text-xs"></i>
              <span>Listen</span>
            </button>
          </div>
          <ul class="list-disc ml-6 text-gray-600 leading-relaxed">
            <li>Access or update your data</li>
            <li>Request data deletion</li>
            <li>Opt out of marketing emails</li>
            <li>Withdraw consent</li>
            <li>You can exercise these rights by contacting us.</li>
          </ul>
        </div>

        <div class="privacy-section gradient-border p-6">
          <div class="flex justify-between items-start mb-4">
            <h2 class="text-xl font-semibold text-primary-dark flex items-center">
              <i class="fas fa-arrows-rotate mr-2 text-primary-DEFAULT"></i>
              9. Changes to This Policy
            </h2>
            <button
              class="listen-btn bg-[#94c4c4] hover:bg-[#648383] text-white px-6 py-2.5 rounded-lg flex items-center gap-2 text-sm font-medium shadow-md transition-all duration-300 hover:shadow-lg"
              onclick="toggleSpeech(this)">
              <i class="fas fa-play text-xs"></i>
              <span>Listen</span>
            </button>
          </div>
          <p class="text-gray-600 leading-relaxed">
            We may update this policy from time to time. We encourage you to
            review it periodically. Changes take effect immediately upon
            posting.
          </p>
        </div>

        <div class="privacy-section gradient-border p-6 bg-primary-light bg-opacity-20">
          <div class="flex justify-between items-start mb-4">
            <h2 class="text-xl font-semibold text-primary-dark flex items-center">
              <i class="fas fa-envelope mr-2 text-primary-DEFAULT"></i>
              10. Contact Us
            </h2>
            <button
              class="listen-btn bg-[#94c4c4] hover:bg-[#648383] text-white px-6 py-2.5 rounded-lg flex items-center gap-2 text-sm font-medium shadow-md transition-all duration-300 hover:shadow-lg"
              onclick="toggleSpeech(this)">
              <i class="fas fa-play text-xs"></i>
              <span>Listen</span>
            </button>
          </div>
          <ul class="ml-6 text-gray-600 leading-relaxed">
            <li>
              <span class="font-medium">📍 Gandiv Office, Rajpipla, Gujarat</span>
            </li>
            <li>
              <span class="font-medium">📧</span>
              <a href="mailto:privacy@gandivrajpipla.in"
                class="text-primary-dark underline hover:text-primary-DEFAULT">privacy@gandivrajpipla.in</a>
            </li>
            <li>
              <span class="font-medium">📞</span>
              <a href="tel:+919157431551"
                class="text-primary-dark underline hover:text-primary-DEFAULT">+91-91574-31551</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <?php 
        include("includes/footer.php");
      ?>

  <script>
    window.addEventListener("load", () => {
      document.getElementById("loader").style.display = "none";
    });

    const synth = window.speechSynthesis;
    let currentUtterance = null;

    function toggleSpeech(button) {
      const text = button
        .closest(".privacy-section")
        .querySelector("p,ul").textContent;

      if (currentUtterance && synth.speaking) {
        synth.cancel();
        resetButton(button);
        return;
      }

      document
        .querySelectorAll(".listen-btn")
        .forEach((btn) => resetButton(btn));

      const utterance = new SpeechSynthesisUtterance(text);
      utterance.lang = "en-US";
      utterance.rate = 1;
      utterance.pitch = 1;

      button.querySelector("i").classList.remove("fa-play");
      button.querySelector("i").classList.add("fa-stop");
      button.querySelector("span").textContent = "Stop";

      utterance.onend = () => {
        resetButton(button);
      };

      currentUtterance = utterance;
      synth.speak(utterance);
    }

    function resetButton(button) {
      button.querySelector("i").classList.remove("fa-stop");
      button.querySelector("i").classList.add("fa-play");
      button.querySelector("span").textContent = "Listen";
    }

    window.addEventListener("beforeunload", () => {
      if (synth.speaking) {
        synth.cancel();
      }
    });
  </script>
</body>

</html>