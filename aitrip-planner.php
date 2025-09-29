<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <title>Find Your Perfect Place with AI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      crossorigin="anonymous"
    />
    <style>
      @import url("https://fonts.cdnfonts.com/css/samarkan");
      .hello {
        font-family: "Samarkan";
      }

      body{
        background-color: #3b6363;
      }
      .loader {
        width: 48px;
        height: 48px;
        border: 5px solid #76a3a3;
        border-bottom-color: transparent;
        border-radius: 50%;
        display: inline-block;
        box-sizing: border-box;
        animation: rotation 1s linear infinite;
      }

      @keyframes rotation {
        0% {
          transform: rotate(0deg);
        }
        100% {
          transform: rotate(360deg);
        }
      }

      .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.9);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        z-index: 1000;
      }
      .button-selected {
        background-color: #5b8484 !important;
        color: white !important;
        border-color: #5b8484 !important;
        transform: scale(1.02);
      }
      .speaker-icon {
        font-size: 24px;
        cursor: pointer;
        color: #5b8484;
        transition: all 0.3s ease;
      }
      .speaker-icon:hover {
        color: #3b6363;
        transform: scale(1.1);
      }
      .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2.5rem;
            margin-top: 50px;
            margin-bottom: 50px;
            border-radius: 20px;
            background-color: #f8f6f4;
            background-image: url("data:image/svg+xml,%3Csvg width='6' height='6' viewBox='0 0 6 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23c4dfdf' fill-opacity='0.4' fill-rule='evenodd'%3E%3Cpath d='M5 0h1L0 6V5zM6 5v1H5z'/%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
  </head>
  <body>
    <?php
      include("includes/header.php");
    ?>
    <div id="loadingOverlay" class="loading-overlay hidden">
      <span class="loader"></span>
      <p class="mt-4 text-lg text-gray-600">
        Generating your perfect destinations...
      </p>
    </div>

    <div class="main-container">
      <div class="backdrop flex justify-center items-center mb-4">
        <img src="gandiv.png" alt="Left Logo" class="h-20 mx-4">
        <img src="yatra.png" alt="Right Logo" class="h-20 mx-4">
    </div>
    
    <div class="text-center my-4">
      <h1 class="hello text-5xl font-bold text-gray-600">AI-Powered Travel Companion 🏔️</h1>
      <p class="text-lg text-gray-600 mt-2 max-w-6xl mx-auto">
        Experience the future of travel with our AI-driven recommendation system! Get personalized place suggestions in Jharkhand state based on your interests and preferences powered by smart algorithms for the best experience.
      </p>
  </div>
  <div class="flex space-x-6 mt-2 justify-center my-2">
    <span class="bg-pink-100 px-2 py-1 rounded text-xs md:text-sm">🌲 Tribal Culture</span>
    <span class="bg-blue-100 px-2 py-1 rounded text-xs md:text-sm">💎 Mineral Rich</span>
    <span class="bg-purple-100 px-2 py-1 rounded text-xs md:text-sm">🏞️ Waterfalls</span>
</div>

        <div id="categoriesForm" class="space-y-6 mb-6">
          <div class="category-section">
            <h3 class="text-lg font-medium text-gray-700 mb-3">
              1. Travel Interests
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3 ">
              <button
                type="button"
                class="interest-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="interests"
              >
              🏛️ Historical & Heritage Sites (Temples, tribal museums, ancient sites)
              </button>
              <button
                type="button"
                class="interest-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="interests"
              >
              🌿 Nature & Scenic Beauty (Waterfalls, hills, forests, wildlife)
              </button>
              <button
                type="button"
                class="interest-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="interests"
              >
              🚀 Adventure & Thrill (Rock climbing, river rafting, trekking)
              </button>
              <button
                type="button"
                class="interest-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="interests"
              >
              🧘 Spiritual & Peaceful (Temples, ashrams, meditation spots)
              </button>
              <button
                type="button"
                class="interest-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="interests"
              >
              🎭 Tribal Culture & Festivals (Local traditions, tribal arts, folk dances)
              </button>
            </div>
          </div>

          <div class="category-section">
            <h3 class="text-lg font-medium text-gray-700 mb-3">
              2. Activities
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
              <button
                type="button"
                class="activity-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="activities"
              >
              🏞️ Waterfall Hopping
              </button>
              <button
                type="button"
                class="activity-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="activities"
              >
              🥾 Hill Trekking & Hiking
              </button>
              <button
                type="button"
                class="activity-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="activities"
              >
              📸 Wildlife Photography
              </button>
              <button
                type="button"
                class="activity-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="activities"
              >
              🏕️ Forest Camping & Eco-stays
              </button>
              <button
                type="button"
                class="activity-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="activities"
              >
              🎨 Tribal Art & Handicrafts
              </button>
            </div>
          </div>

          <div class="category-section">
            <h3 class="text-lg font-medium text-gray-700 mb-3">
              3. Weather Preference
            </h3>
            <div class="grid grid-cols-3 gap-3">
              <button
                type="button"
                class="weather-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="weather"
              >
              ☀️ Warm & Pleasant (October-March, ideal for sightseeing)
              </button>
              <button
                type="button"
                class="weather-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="weather"
              >
              🌧️ Monsoon Magic (July-September, lush waterfalls)
              </button>
              <button
                type="button"
                class="weather-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="weather"
              >
              ❄️ Cool & Misty (December-February, hill stations)
              </button>
            </div>
          </div>

          <div class="category-section">
            <h3 class="text-lg font-medium text-gray-700 mb-3">
              4. Travel Style
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
              <button
                type="button"
                class="style-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="style"
              >
              🏍️ Solo Explorer
              </button>
              <button
                type="button"
                class="style-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="style"
              >
              🏡 Family Adventure
              </button>
              <button
                type="button"
                class="style-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="style"
              >
              🔥 Group Expedition
              </button>
            </div>
          </div>

          <div class="category-section">
            <h3 class="text-lg font-medium text-gray-700 mb-3">5. Duration</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
              <button
                type="button"
                class="duration-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="duration"
              >
              🏡 1 Day
              </button>
              <button
                type="button"
                class="duration-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="duration"
              >
              🚗 2-3 Days
              </button>
              <button
                type="button"
                class="duration-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="duration"
              >
              🏞️ Week
              </button>
              <button
                type="button"
                class="duration-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="duration"
              >
              🏨 2+ Weeks
              </button>
            </div>
          </div>

          <div class="category-section">
            <h3 class="text-lg font-medium text-gray-700 mb-3">6. Budget</h3>
            <div class="grid grid-cols-3 gap-3">
              <button
                type="button"
                class="budget-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="budget"
              >
              💸 Budget-Friendly
              </button>
              <button
                type="button"
                class="budget-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="budget"
              >
              🏨 Mid-Range 
              </button>
              <button
                type="button"
                class="budget-btn p-3 bg-white rounded-lg border-2 hover:border-[#76a3a3] transition"
                data-category="budget"
              >
              💎 Luxury & Comfort
              </button>
            </div>
          </div>

          <button
            id="findPlaces"
            class="w-full bg-[#76a3a3] text-white py-3 rounded-lg text-lg font-semibold hover:bg-[#5b8484] transition disabled:opacity-50 disabled:cursor-not-allowed"
            disabled
          >
            Find My Perfect Place 📍
          </button>
        </div>

        <div id="results" class="hidden">
          <h2 class="text-2xl font-semibold text-gray-800 mb-4">
            AI Recommended Places
          </h2>
          <ul id="placesList" class="space-y-4"></ul>
        </div>
      </div>
    </div>
  </div>
<?php
  include("includes/footer.php");
?>
    <script>

document.addEventListener("DOMContentLoaded", function () {
    const currentDate = new Date();
    const formattedDate = currentDate.toISOString().replace("T", " ").slice(0, 19);
    document.getElementById("current-date").innerHTML = `Date: ${formattedDate}`;
});

      const selections = {
        interests: null,
        activities: null,
        weather: null,
        style: null,
        duration: null,
        budget: null,
      };

      function updateButtonSelection(button, category) {
        const categoryButtons = document.querySelectorAll(
          `[data-category="${category}"]`
        );
        categoryButtons.forEach((btn) => {
          btn.classList.remove("button-selected");
        });

        button.classList.add("button-selected");

        selections[category] = button.textContent.trim();

        updateFindButton();

        console.log(`Selected ${category}:`, selections[category]);
      }

      function updateFindButton() {
        const findButton = document.getElementById("findPlaces");
        const allSelected = Object.values(selections).every(
          (value) => value !== null
        );
        findButton.disabled = !allSelected;

        console.log("Current selections:", selections);
        console.log("All selected:", allSelected);
      }

      document.querySelectorAll("[data-category]").forEach((button) => {
        button.addEventListener("click", function () {
          const category = this.dataset.category;
          updateButtonSelection(this, category);
        });
      });

      document
        .getElementById("findPlaces")
        .addEventListener("click", async function () {
          if (!Object.values(selections).every((value) => value !== null)) {
            alert("Please select one option from each category");
            return;
          }

          const loadingOverlay = document.getElementById("loadingOverlay");
          loadingOverlay.classList.remove("hidden");

          try {
            const apiKey = "AIzaSyBdJ3xZr3FhW3G7mXtnJaGPf2oUMe-al1E";
            const endpoint = `https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=${apiKey}`;

            const prompt = `Suggest 3 places in Jharkhand state, India that match these preferences:
                        - Interest: ${selections.interests}
                        - Activities: ${selections.activities}
                        - Weather: ${selections.weather}
                        - Travel Style: ${selections.style}
                        - Duration: ${selections.duration}
                        - Budget: ${selections.budget}
                        
                        For each place, provide:
                        1. Name of the place
                        2. A detailed description including available activities
                        3. Best time to visit
                        4. Approximate costs
                        5. Special tips for the selected travel style

                        Format each place as: Name: Description`;

            const requestBody = {
              contents: [
                {
                  parts: [
                    {
                      text: prompt,
                    },
                  ],
                },
              ],
            };

            document.getElementById("results").classList.add("hidden");

            const response = await fetch(endpoint, {
              method: "POST",
              headers: { "Content-Type": "application/json" },
              body: JSON.stringify(requestBody),
            });

            const data = await response.json();
            const placesText =
              data?.candidates?.[0]?.content?.parts?.[0]?.text ||
              "No results found.";
            const places = placesText
              .split("\n")
              .filter((place) => place.trim() !== "");
            const placesList = document.getElementById("placesList");
            placesList.innerHTML = "";

            places.forEach((place, index) => {
              const [name, description] = place.split(":");
              if (name && description) {
                const li = document.createElement("li");
                li.classList.add("bg-white", "p-4", "rounded-lg", "shadow-md");
                li.innerHTML = `
                                <div>
                                    <strong class='text-lg text-gray-800'>${name.trim()}</strong>
                                    <p class='text-gray-600 mt-1'>${description.trim()}</p>
                                    <button onclick="toggleVoice(${index}, '${name.trim()}: ${description.trim()}')" class="mt-2 p-2 text-white rounded-lg text-sm transition">
                                        <i id="speakerIcon-${index}" class="fas fa-volume-mute speaker-icon"></i>
                                    </button>
                                </div>`;
                placesList.appendChild(li);
              }
            });

            document.getElementById("results").classList.remove("hidden");
          } catch (error) {
            console.error("Error fetching AI recommendations:", error);
            document.getElementById("placesList").innerHTML = `
                        <li class="bg-red-100 p-4 rounded-lg">
                            <p class="text-red-600">Sorry, there was an error generating recommendations. Please try again.</p>
                        </li>`;
            document.getElementById("results").classList.remove("hidden");
          } finally {
            loadingOverlay.classList.add("hidden");
          }
        });

      let currentUtterance = null;

      function toggleVoice(index, text) {
        const icon = document.getElementById(`speakerIcon-${index}`);
        if (currentUtterance && speechSynthesis.speaking) {
          speechSynthesis.cancel();
          icon.classList.replace("fa-volume-up", "fa-volume-mute");
          currentUtterance = null;
        } else {
          if (currentUtterance) {
            const previousIcon = document.querySelector(
              ".speaker-icon.fa-volume-up"
            );
            if (previousIcon) {
              previousIcon.classList.replace("fa-volume-up", "fa-volume-mute");
            }
          }
          currentUtterance = new SpeechSynthesisUtterance(text);
          speechSynthesis.speak(currentUtterance);
          icon.classList.replace("fa-volume-mute", "fa-volume-up");
          currentUtterance.onend = () => {
            icon.classList.replace("fa-volume-up", "fa-volume-mute");
          };
        }
      }

      updateFindButton();
    </script>
  </body>
</html>