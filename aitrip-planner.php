<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
            max-width: 90%;
            margin: 0 auto;
            padding: 2.5rem;
            margin-top: 50px;
            margin-bottom: 50px;
            border-radius: 20px;
            background-color: #f8f6f4;
            background-image: url("data:image/svg+xml,%3Csvg width='6' height='6' viewBox='0 0 6 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23c4dfdf' fill-opacity='0.4' fill-rule='evenodd'%3E%3Cpath d='M5 0h1L0 6V5zM6 5v1H5z'/%3E%3C/g%3E%3C/svg%3E");
        }
      
      @keyframes slide-in {
        from {
          transform: translateX(100%);
          opacity: 0;
        }
        to {
          transform: translateX(0);
          opacity: 1;
        }
      }
      
      @keyframes slide-out {
        from {
          transform: translateX(0);
          opacity: 1;
        }
        to {
          transform: translateX(100%);
          opacity: 0;
        }
      }
      
      .animate-slide-in {
        animation: slide-in 0.3s ease-out;
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
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
              ✨ Your Personalized Jharkhand Journey
            </h2>
            <button onclick="downloadItinerary()" class="bg-[#76a3a3] text-white px-4 py-2 rounded-lg font-semibold hover:bg-[#5b8484] transition-all duration-300">
              <i class="fas fa-download mr-2"></i>Download Plan
            </button>
          </div>
          <p class="text-gray-600 mb-6">Based on your preferences, here are the perfect destinations for you</p>
          <ul id="placesList" class="space-y-6"></ul>
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
    const dateElement = document.getElementById("current-date");
    if (dateElement) {
        dateElement.innerHTML = `Date: ${formattedDate}`;
    }
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
            const endpoint = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=${apiKey}`;

            const prompt = `You are a Jharkhand travel expert. Suggest 3 amazing places in Jharkhand state, India that match these preferences:
                        
                        Interest: ${selections.interests}
                        Activities: ${selections.activities}
                        Weather: ${selections.weather}
                        Travel Style: ${selections.style}
                        Duration: ${selections.duration}
                        Budget: ${selections.budget}
                        
                        For each place, provide EXACTLY in this format:
                        
                        PLACE_NAME: [Place Name]
                        DESCRIPTION: [2-3 sentences about the place and why it's special]
                        HIGHLIGHTS: [3-4 key attractions or activities, separated by |]
                        BEST_TIME: [Best months to visit]
                        BUDGET: [Approximate cost range]
                        TRAVEL_TIP: [One useful tip for travelers]
                        DISTANCE: [Distance from Ranchi]
                        
                        Make it engaging and exciting! Use clear, simple language without markdown symbols or asterisks.`;

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
              generationConfig: {
                temperature: 0.7,
                topK: 40,
                topP: 0.95,
                maxOutputTokens: 2048,
              },
              safetySettings: [
                {
                  category: "HARM_CATEGORY_HARASSMENT",
                  threshold: "BLOCK_MEDIUM_AND_ABOVE"
                },
                {
                  category: "HARM_CATEGORY_HATE_SPEECH",
                  threshold: "BLOCK_MEDIUM_AND_ABOVE"
                },
                {
                  category: "HARM_CATEGORY_SEXUALLY_EXPLICIT",
                  threshold: "BLOCK_MEDIUM_AND_ABOVE"
                },
                {
                  category: "HARM_CATEGORY_DANGEROUS_CONTENT",
                  threshold: "BLOCK_MEDIUM_AND_ABOVE"
                }
              ]
            };

            document.getElementById("results").classList.add("hidden");

            const response = await fetch(endpoint, {
              method: "POST",
              headers: { "Content-Type": "application/json" },
              body: JSON.stringify(requestBody),
            });

            if (!response.ok) {
              const errorData = await response.text();
              console.error('API Error:', response.status, errorData);
              throw new Error(`API Error: ${response.status}`);
            }

            const data = await response.json();
            
            if (!data.candidates || !data.candidates[0] || !data.candidates[0].content) {
              throw new Error("Invalid response format from API");
            }

            const placesText = data.candidates[0].content.parts[0].text || "No results found.";
            
            // Parse the structured response
            const places = parsePlacesResponse(placesText);
            const placesList = document.getElementById("placesList");
            placesList.innerHTML = "";

            places.forEach((place, index) => {
              const li = document.createElement("li");
              li.classList.add("bg-white", "p-6", "rounded-xl", "shadow-lg", "border-l-4", "border-[#76a3a3]", "hover:shadow-2xl", "transition-all", "duration-300");
              
              const highlights = place.highlights ? place.highlights.split('|').map(h => h.trim()).filter(h => h) : [];
              const highlightsHTML = highlights.length > 0 ? 
                `<div class="flex flex-wrap gap-2 my-3">
                  ${highlights.map(h => `<span class="bg-[#c4dfdf] text-[#3b6363] px-3 py-1 rounded-full text-sm font-medium">✨ ${h}</span>`).join('')}
                </div>` : '';
              
              li.innerHTML = `
                <div class="space-y-3">
                  <div class="flex justify-between items-start">
                    <h3 class='text-2xl font-bold text-[#3b6363] flex items-center gap-2'>
                      <span class="text-3xl">${index + 1}</span>
                      📍 ${place.name}
                    </h3>
                    <button onclick="toggleVoice(${index}, \`${place.name}. ${place.description}. Best time to visit: ${place.bestTime}. ${place.tip}\`.replace(/'/g, ''), this)" class="p-2 rounded-lg hover:bg-gray-100 transition">
                      <i id="speakerIcon-${index}" class="fas fa-volume-mute speaker-icon"></i>
                    </button>
                  </div>
                  
                  <p class='text-gray-700 text-base leading-relaxed'>${place.description}</p>
                  
                  ${highlightsHTML}
                  
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-4">
                    <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-3 rounded-lg">
                      <div class="flex items-center gap-2">
                        <span class="text-2xl">📅</span>
                        <div>
                          <p class="text-xs text-gray-600 font-semibold">Best Time</p>
                          <p class="text-sm text-gray-800 font-medium">${place.bestTime}</p>
                        </div>
                      </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-green-50 to-green-100 p-3 rounded-lg">
                      <div class="flex items-center gap-2">
                        <span class="text-2xl">💰</span>
                        <div>
                          <p class="text-xs text-gray-600 font-semibold">Budget</p>
                          <p class="text-sm text-gray-800 font-medium">${place.budget}</p>
                        </div>
                      </div>
                    </div>
                    
                    ${place.distance ? `
                    <div class="bg-gradient-to-r from-purple-50 to-purple-100 p-3 rounded-lg">
                      <div class="flex items-center gap-2">
                        <span class="text-2xl">🚗</span>
                        <div>
                          <p class="text-xs text-gray-600 font-semibold">Distance</p>
                          <p class="text-sm text-gray-800 font-medium">${place.distance}</p>
                        </div>
                      </div>
                    </div>` : ''}
                    
                    ${place.tip ? `
                    <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 p-3 rounded-lg ${place.distance ? '' : 'md:col-span-2'}">
                      <div class="flex items-start gap-2">
                        <span class="text-2xl">💡</span>
                        <div>
                          <p class="text-xs text-gray-600 font-semibold">Pro Tip</p>
                          <p class="text-sm text-gray-800 font-medium">${place.tip}</p>
                        </div>
                      </div>
                    </div>` : ''}
                  </div>
                  
                  <div class="flex gap-2 mt-4 pt-4 border-t border-gray-200">
                    <button onclick="bookmarkPlace(${index}, '${place.name.replace(/'/g, "\\'")}', this)" 
                            class="flex-1 bg-white border-2 border-[#76a3a3] text-[#76a3a3] py-2 px-4 rounded-lg font-semibold hover:bg-[#76a3a3] hover:text-white transition-all duration-300">
                      <i class="far fa-bookmark mr-2"></i>Save for Later
                    </button>
                    <button onclick="sharePlace('${place.name.replace(/'/g, "\\'")}', '${place.description.substring(0, 100).replace(/'/g, "\\'")}...')" 
                            class="flex-1 bg-[#76a3a3] text-white py-2 px-4 rounded-lg font-semibold hover:bg-[#5b8484] transition-all duration-300">
                      <i class="fas fa-share-alt mr-2"></i>Share
                    </button>
                  </div>
                </div>`;
              placesList.appendChild(li);
            });

            document.getElementById("results").classList.remove("hidden");
          } catch (error) {
            console.error("Error fetching AI recommendations:", error);
            document.getElementById("placesList").innerHTML = `
                        <li class="bg-red-100 p-4 rounded-lg">
                            <p class="text-red-600">Sorry, there was an error generating recommendations. Please try again.</p>
                            <p class="text-red-500 text-sm mt-2">Error: ${error.message}</p>
                        </li>`;
            document.getElementById("results").classList.remove("hidden");
          } finally {
            loadingOverlay.classList.add("hidden");
          }
        });

      let currentUtterance = null;
      let currentIndex = null;
      let bookmarkedPlaces = [];

      function parsePlacesResponse(text) {
        const places = [];
        const placeBlocks = text.split(/PLACE_NAME:/i).filter(block => block.trim());
        
        placeBlocks.forEach(block => {
          const place = {};
          
          const nameMatch = block.match(/^([^\n]+)/);
          place.name = nameMatch ? nameMatch[1].trim() : 'Unknown Place';
          
          const descMatch = block.match(/DESCRIPTION:\s*([^\n]+(?:\n(?!HIGHLIGHTS:|BEST_TIME:|BUDGET:|TRAVEL_TIP:|DISTANCE:)[^\n]+)*)/i);
          place.description = descMatch ? descMatch[1].trim().replace(/\*/g, '') : '';
          
          const highlightsMatch = block.match(/HIGHLIGHTS:\s*([^\n]+)/i);
          place.highlights = highlightsMatch ? highlightsMatch[1].trim().replace(/\*/g, '') : '';
          
          const bestTimeMatch = block.match(/BEST_TIME:\s*([^\n]+)/i);
          place.bestTime = bestTimeMatch ? bestTimeMatch[1].trim().replace(/\*/g, '') : 'Year-round';
          
          const budgetMatch = block.match(/BUDGET:\s*([^\n]+)/i);
          place.budget = budgetMatch ? budgetMatch[1].trim().replace(/\*/g, '') : 'Varies';
          
          const tipMatch = block.match(/TRAVEL_TIP:\s*([^\n]+)/i);
          place.tip = tipMatch ? tipMatch[1].trim().replace(/\*/g, '') : '';
          
          const distanceMatch = block.match(/DISTANCE:\s*([^\n]+)/i);
          place.distance = distanceMatch ? distanceMatch[1].trim().replace(/\*/g, '') : '';
          
          if (place.name && place.description) {
            places.push(place);
          }
        });
        
        return places;
      }

      function bookmarkPlace(index, placeName, button) {
        const icon = button.querySelector('i');
        
        if (bookmarkedPlaces.includes(placeName)) {
          bookmarkedPlaces = bookmarkedPlaces.filter(p => p !== placeName);
          icon.classList.remove('fas');
          icon.classList.add('far');
          button.classList.remove('bg-[#76a3a3]', 'text-white', 'border-transparent');
          button.classList.add('bg-white', 'text-[#76a3a3]', 'border-[#76a3a3]');
          showToast(`${placeName} removed from bookmarks`);
        } else {
          bookmarkedPlaces.push(placeName);
          icon.classList.remove('far');
          icon.classList.add('fas');
          button.classList.remove('bg-white', 'text-[#76a3a3]');
          button.classList.add('bg-[#76a3a3]', 'text-white', 'border-transparent');
          showToast(`${placeName} bookmarked!`);
        }
        
        console.log('Bookmarked places:', bookmarkedPlaces);
      }

      function sharePlace(name, description) {
        const shareText = `Check out ${name} in Jharkhand! ${description}`;
        
        if (navigator.share) {
          navigator.share({
            title: name,
            text: shareText,
            url: window.location.href
          }).then(() => {
            showToast('Shared successfully!');
          }).catch((error) => {
            console.log('Error sharing:', error);
            copyToClipboard(shareText);
          });
        } else {
          copyToClipboard(shareText);
        }
      }

      function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
          showToast('Details copied to clipboard!');
        }).catch((error) => {
          console.error('Copy failed:', error);
          showToast('Could not copy details');
        });
      }

      function showToast(message) {
        const existingToast = document.getElementById('customToast');
        if (existingToast) {
          existingToast.remove();
        }
        
        const toast = document.createElement('div');
        toast.id = 'customToast';
        toast.className = 'fixed top-5 right-5 bg-[#3b6363] text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-slide-in';
        toast.textContent = message;
        document.body.appendChild(toast);
        
        setTimeout(() => {
          toast.style.animation = 'slide-out 0.3s ease-out';
          setTimeout(() => toast.remove(), 300);
        }, 3000);
      }

      function toggleVoice(index, text, button) {
        const icon = document.getElementById(`speakerIcon-${index}`);
        
        if (currentUtterance && speechSynthesis.speaking && currentIndex === index) {
          speechSynthesis.cancel();
          icon.classList.replace("fa-volume-up", "fa-volume-mute");
          currentUtterance = null;
          currentIndex = null;
        } else {
          if (currentUtterance && speechSynthesis.speaking) {
            speechSynthesis.cancel();
            const previousIcon = document.getElementById(`speakerIcon-${currentIndex}`);
            if (previousIcon) {
              previousIcon.classList.replace("fa-volume-up", "fa-volume-mute");
            }
          }
          
          currentUtterance = new SpeechSynthesisUtterance(text);
          currentUtterance.rate = 0.9;
          currentUtterance.pitch = 1;
          currentUtterance.volume = 1;
          
          speechSynthesis.speak(currentUtterance);
          icon.classList.replace("fa-volume-mute", "fa-volume-up");
          currentIndex = index;
          
          currentUtterance.onend = () => {
            icon.classList.replace("fa-volume-up", "fa-volume-mute");
            currentUtterance = null;
            currentIndex = null;
          };
          
          currentUtterance.onerror = (event) => {
            console.error("Speech synthesis error:", event);
            icon.classList.replace("fa-volume-up", "fa-volume-mute");
            currentUtterance = null;
            currentIndex = null;
          };
        }
      }

      function downloadItinerary() {
        const placesList = document.getElementById("placesList");
        const places = Array.from(placesList.children);
        
        let content = "JHARKHAND TRAVEL ITINERARY\n";
        content += "Generated by AI Travel Companion\n";
        content += "="   .repeat(50) + "\n\n";
        content += "YOUR PREFERENCES:\n";
        content += `Interest: ${selections.interests}\n`;
        content += `Activities: ${selections.activities}\n`;
        content += `Weather: ${selections.weather}\n`;
        content += `Style: ${selections.style}\n`;
        content += `Duration: ${selections.duration}\n`;
        content += `Budget: ${selections.budget}\n\n`;
        content += "="   .repeat(50) + "\n\n";
        
        places.forEach((place, index) => {
          const title = place.querySelector('h3').textContent.trim();
          const description = place.querySelector('p').textContent.trim();
          
          content += `${index + 1}. ${title}\n`;
          content += `${description}\n\n`;
        });
        
        content += "\n" + "=".repeat(50) + "\n";
        content += "Happy Traveling! 🎒\n";
        
        const blob = new Blob([content], { type: 'text/plain' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'jharkhand-travel-plan.txt';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        window.URL.revokeObjectURL(url);
        
        showToast('Itinerary downloaded successfully!');
      }

      window.addEventListener("beforeunload", () => {
        if (currentUtterance && speechSynthesis.speaking) {
          speechSynthesis.cancel();
        }
      });

      updateFindButton();
    </script>
  </body>
</html>