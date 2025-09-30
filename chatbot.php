<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <title>Sikkim TravelMate AI Guide</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />

    <style>
      @import url("https://fonts.cdnfonts.com/css/samarkan");
      .slogan {
        font-family: "Samarkan";
      }

      body {
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
      }
      body {
        background: url("img/chatbotbg.jpg") no-repeat center center fixed;
        background-size: cover;
        position: relative;
      }

      body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        z-index: -1;
      }

      @keyframes gradient {
        0% {
          background-position: 0% 50%;
        }
        50% {
          background-position: 100% 50%;
        }
        100% {
          background-position: 0% 50%;
        }
      }

      .main-loader-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(8px);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
      }

      .fancy-loader {
        width: 150px;
        height: 150px;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .fancy-loader:before,
      .fancy-loader:after {
        content: "";
        position: absolute;
        border-radius: 50%;
        animation: pulsOut 1.8s ease-in-out infinite;
        filter: drop-shadow(0 0 1rem rgba(255, 255, 255, 0.75));
      }

      .fancy-loader:before {
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.15);
        animation-name: pulsIn;
      }

      .fancy-loader:after {
        width: calc(100% - 2rem);
        height: calc(100% - 2rem);
        background: rgba(255, 255, 255, 0.25);
        animation-name: pulsIn;
      }

      @keyframes pulsIn {
        0% {
          transform: scale(1);
          opacity: 1;
        }
        50% {
          transform: scale(1.4);
          opacity: 0.5;
        }
        100% {
          transform: scale(1);
          opacity: 1;
        }
      }

      #responseBox {
        width: 100%;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        color: #333;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        font-family: "Arial", sans-serif;
        line-height: 1.8;
        text-align: left;
        border-left: 5px solid #115d5d;
        transition: all 0.4s ease-in-out;
        margin: 20px auto;
        max-width: 1200px;
      }

      .search-container {
        position: relative;
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
      }

      .search-input {
        width: 100%;
        padding: 15px 60px;
        border-radius: 15px;
        border: 2px solid rgba(255, 255, 255, 0.2);
        background: rgba(255, 255, 255, 0.9);
        font-size: 16px;
        transition: all 0.3s ease;
      }

      .search-input:focus {
        border-color: #3498db;
        box-shadow: 0 0 15px rgba(52, 152, 219, 0.3);
      }

      .voice-btn {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #666;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .voice-btn:hover {
        color: #3498db;
      }

      .voice-btn.listening {
        color: #e74c3c;
      }

      .send-btn {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        background: #075555;
        border: none;
        color: white;
        padding: 12px;
        border-radius: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .send-btn:hover {
        background: #2980b9;
        transform: translateY(-50%) scale(1.1);
      }

      .time-display {
        position: fixed;
        top: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.9);
        padding: 10px 20px;
        border-radius: 20px;
        font-size: 14px;
        color: #333;
        z-index: 1000;
      }

      .voice-output-btn {
        position: absolute;
        top: 10px;
        right: 20px;
        margin-bottom: 10px;
        background: linear-gradient(145deg, #c4dfdf, #075555);
        color: white;
        border: none;
        padding: 7px 14px;
        border-radius: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        z-index: 10;
      }

      .voice-output-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
      }

      .voice-output-btn.speaking {
        background: linear-gradient(145deg, #e74c3c, #c0392b);
      }

      @keyframes speakingPulse {
        0% {
          transform: scale(1);
        }
        50% {
          transform: scale(1.05);
        }
        100% {
          transform: scale(1);
        }
      }

      .voice-output-btn.speaking {
        animation: speakingPulse 1.5s infinite;
      }

      .quick-suggestions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
        margin: 20px 0;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
      }

      .suggestion-chip {
        background: rgba(255, 255, 255, 0.8);
        color: #075555;
        padding: 8px 16px;
        border-radius: 20px;
        border: 2px solid rgba(7, 85, 85, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
        font-weight: 500;
      }

      .suggestion-chip:hover {
        background: #075555;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(7, 85, 85, 0.3);
      }
    </style>
  </head>

  <body class="min-h-screen">
    <?php 

    include("includes/header.php");

    ?>
    <div class="container mx-auto px-4 py-4">
      <div class="text-center mb-8">
        <div class="flex justify-center items-center gap-6">
          <!-- First Logo -->
          <div class="logo-container">
            <img
              src="gandiv.png"
              alt="Logo 1"
              class="w-40 h-40 object-contain transform hover:scale-105 transition-transform duration-300"
            />
          </div>

          <!-- Second Logo -->
          <div class="logo-container">
            <img
              src="yatra.png"
              alt="Logo 2"
              class="w-32 h-32 object-contain transform hover:scale-105 transition-transform duration-300"
            />
          </div>
        </div>

        <h1 class="text-7xl font-bold text-white mb-2">
          <span
            class="slogan bg-clip-text text-transparent bg-[#115d5d] drop-shadow-lg"
          >
            Sikkim
          </span>
        </h1>
        <p
          class="text-gray-800 text-xl px-18 py-2 max-w-4xl mx-auto leading-relaxed font-serif"
        >
          Explore the Land of Forests and Waterfalls like never before with our
          AI-Powered Guide! Get instant recommendations for tribal heritage
          sites, magnificent waterfalls, wildlife sanctuaries, and cultural
          treasures. Ask anything, from Hundru Falls to Betla National Park, and
          let AI enhance your Sikkim journey! ✨
        </p>

        <div class="flex space-x-2 mt-2 justify-center">
          <span class="bg-red-100 px-2 py-1 rounded text-xs md:text-sm"
            >🏔️ Mountain Adventures</span
          >
          <span class="bg-yellow-100 px-2 py-1 rounded text-xs md:text-sm"
            >🌊 Waterfall Tours</span
          >
          <span class="bg-green-100 px-2 py-1 rounded text-xs md:text-sm"
            >🎭 Tribal Heritage</span
          >
        </div>
      </div>

      <div class="quick-suggestions">
        <div
          class="suggestion-chip"
          onclick="askQuestion('Best waterfalls in Sikkim')"
        >
          🌊 Famous Waterfalls
        </div>
        <div
          class="suggestion-chip"
          onclick="askQuestion('Tribal culture and heritage sites in Sikkim')"
        >
          🎭 Tribal Heritage
        </div>
        <div
          class="suggestion-chip"
          onclick="askQuestion('Ranchi tourist attractions')"
        >
          🏙️ Ranchi Tourism
        </div>
        <div
          class="suggestion-chip"
          onclick="askQuestion('Wildlife sanctuaries in Sikkim')"
        >
          🐅 Wildlife Parks
        </div>
        <div
          class="suggestion-chip"
          onclick="askQuestion('Adventure activities in Sikkim')"
        >
          🏔️ Adventure Sports
        </div>
        <div
          class="suggestion-chip"
          onclick="askQuestion('Traditional Sikkim cuisine')"
        >
          🍛 Local Food
        </div>
      </div>

      <div class="search-container mb-8">
        <button class="voice-btn" id="voiceBtn">
          <i class="fas fa-microphone"></i>
        </button>
        <input
          type="text"
          class="search-input"
          id="searchInput"
          placeholder="Ask me anything about Sikkim travel..."
        />
        <button class="send-btn" id="sendBtn">
          <i class="fas fa-paper-plane"></i>
        </button>
      </div>

      <div id="responseBox" class="hidden"></div>

      <div class="main-loader-container" id="mainLoader">
        <div class="fancy-loader"></div>
        <div class="text-white text-center mt-4">
          <h3 class="text-xl font-bold">
            Discovering Sikkim's Treasures...
          </h3>
          <p class="mt-2">
            Just a moment while I prepare your Sikkim travel guide
          </p>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script>
      const apiKey = "AIzaSyDye6u0kFWWZty0WlNZDCBNS37vj28fLys";
      const endpoint = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=${apiKey}`;
      let isListening = false;

      const voiceBtn = document.getElementById("voiceBtn");
      const searchInput = document.getElementById("searchInput");
      const sendBtn = document.getElementById("sendBtn");
      const mainLoader = document.getElementById("mainLoader");
      const responseBox = document.getElementById("responseBox");

      // Voice recognition setup with error handling
      let recognition = null;
      if (
        "webkitSpeechRecognition" in window ||
        "SpeechRecognition" in window
      ) {
        recognition = new (window.SpeechRecognition ||
          window.webkitSpeechRecognition)();
        recognition.continuous = false;
        recognition.lang = "en-US";
        recognition.interimResults = false;
      }

      voiceBtn.addEventListener("click", toggleVoiceInput);
      sendBtn.addEventListener("click", handleSearch);
      searchInput.addEventListener("keypress", (e) => {
        if (e.key === "Enter") handleSearch();
      });

      function toggleVoiceInput() {
        if (!recognition) {
          console.warn("Voice recognition not supported");
          return;
        }

        if (isListening) {
          recognition.stop();
        } else {
          recognition.start();
          voiceBtn.classList.add("listening");
          isListening = true;
        }
      }

      if (recognition) {
        recognition.onresult = (event) => {
          const transcript = event.results[0][0].transcript;
          searchInput.value = transcript;
          handleSearch();
        };

        recognition.onend = () => {
          isListening = false;
          voiceBtn.classList.remove("listening");
        };

        recognition.onerror = (event) => {
          console.error("Voice recognition error:", event.error);
          isListening = false;
          voiceBtn.classList.remove("listening");
        };
      }

      function askQuestion(question) {
        searchInput.value = question;
        handleSearch();
      }

      async function handleSearch() {
        const query = searchInput.value.trim();
        if (!query) return;

        try {
          mainLoader.style.display = "flex";
          const response = await fetchTravelInfo(query);
          displayResponse(response);
          searchInput.value = "";
        } catch (error) {
          console.error("Search error:", error);
          displayError(error.message);
        } finally {
          mainLoader.style.display = "none";
        }
      }

      async function fetchTravelInfo(query) {
        const currentTime = new Date().toISOString();

        const promptTemplate = `
                Time: ${currentTime}
                User: TravelExplorer
                Location: Sikkim, India
                Query: ${query}

                Please provide a comprehensive Sikkim travel guide with the following sections:
                📜 Historical Background
                🏛️ Cultural Significance
                🎉 Local Traditions and Festivals
                🏰 Must-See Places in Sikkim
                🌟 Nearby Attractions
                🌟 Visitor Reviews and Experiences
                📅 Best Time to Visit
                🍴 Traditional Sikkim Cuisine
                🛏️ Accommodation Options
                🚌 Accessibility and Transportation
                💡 Sikkim Travel Tips
                🛡️ Safety Tips
                🌿 Environmental Impact and Conservation
                🗣️ Language and Communication (Hindi, Santhali, Ho, Mundari)
                💱 Currency and Local Markets
                ⚖️ Local Laws and Tribal Etiquette
                📞 Emergency Contacts
                🛎️ Tourist Services and Facilities
                🗺️ Maps and Route Planning
                
                Focus specifically on Sikkim's unique attractions:
                - Waterfalls: Hundru Falls, Dassam Falls, Jonha Falls, Hirni Falls
                - Wildlife: Betla National Park, Palamau Tiger Reserve, Hazaribagh Wildlife Sanctuary
                - Religious Sites: Baidyanath Dham (Deoghar), Rajrappa Temple, Parasnath Hills
                - Tribal Heritage: Santhali culture, Ho tribe, Mundari traditions
                - Cities: Ranchi, Jamshedpur, Dhanbad, Bokaro
                - Adventure: Trekking, rock climbing, water sports
                - Industrial Tourism: Tata Steel Plant, coal mines
                - Handicrafts: Dokra art, tribal paintings, bamboo crafts

                Keep the information concise, accurate, and well-structured for Sikkim tourism.
            `;

        const requestBody = {
          contents: [
            {
              parts: [
                {
                  text: promptTemplate,
                },
              ],
            },
          ],
          generationConfig: {
            temperature: 0.7,
            topK: 40,
            topP: 0.95,
            maxOutputTokens: 1024,
          },
          safetySettings: [
            {
              category: "HARM_CATEGORY_HARASSMENT",
              threshold: "BLOCK_MEDIUM_AND_ABOVE",
            },
            {
              category: "HARM_CATEGORY_HATE_SPEECH",
              threshold: "BLOCK_MEDIUM_AND_ABOVE",
            },
            {
              category: "HARM_CATEGORY_SEXUALLY_EXPLICIT",
              threshold: "BLOCK_MEDIUM_AND_ABOVE",
            },
            {
              category: "HARM_CATEGORY_DANGEROUS_CONTENT",
              threshold: "BLOCK_MEDIUM_AND_ABOVE",
            },
          ],
        };

        try {
          const response = await fetch(endpoint, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify(requestBody),
          });

          if (!response.ok) {
            const errorData = await response.text();
            console.error("API Error:", response.status, errorData);

            if (response.status === 400) {
              throw new Error(
                "Invalid request. Please check your API key and try again."
              );
            } else if (response.status === 403) {
              throw new Error(
                "API access denied. Please enable Generative Language API in Google Cloud Console and verify your API key permissions."
              );
            } else if (response.status === 429) {
              throw new Error(
                "Too many requests. Please wait a moment and try again."
              );
            } else if (response.status === 404) {
              throw new Error(
                "Model not found. The API endpoint may have changed."
              );
            } else {
              throw new Error(`API Error: ${response.status}`);
            }
          }

          const data = await response.json();

          if (
            !data.candidates ||
            !data.candidates[0] ||
            !data.candidates[0].content
          ) {
            throw new Error("Invalid response format from API");
          }

          return data.candidates[0].content.parts[0].text;
        } catch (error) {
          console.error("Fetch error:", error);
          if (error.name === "TypeError" && error.message.includes("fetch")) {
            throw new Error(
              "Network error. Please check your internet connection."
            );
          }
          throw error;
        }
      }

      function displayResponse(text) {
        responseBox.innerHTML = `
        <button class="voice-output-btn" id="voiceOutputBtn" onclick="toggleVoiceOutput()">
            <i class="fas fa-volume-up"></i>
            <span>Listen</span>
        </button>
        <div class="response-content">
            ${marked.parse(text)}
        </div>
    `;
        responseBox.classList.remove("hidden");
      }

      function displayError(message) {
        responseBox.innerHTML = `
                <div class="bg-red-100 text-red-700 p-4 rounded-lg">
                    <h3 class="font-bold">Error</h3>
                    <p>${message}</p>
                    <div class="mt-3 text-sm">
                        <p><strong>Troubleshooting:</strong></p>
                        <ul class="list-disc ml-5 mt-1">
                            <li>Enable Generative Language API in Google Cloud Console</li>
                            <li>Check your internet connection</li>
                            <li>Wait a few minutes and try again</li>
                            <li>Verify your API key is active</li>
                        </ul>
                    </div>
                </div>
            `;
        responseBox.classList.remove("hidden");
      }

      let isReading = false;
      let utterance = null;

      function toggleVoiceOutput() {
        const voiceBtn = document.getElementById("voiceOutputBtn");
        const content = document.querySelector(".response-content").textContent;

        if (isReading) {
          window.speechSynthesis.cancel();
          isReading = false;
          voiceBtn.classList.remove("speaking");
          voiceBtn.innerHTML =
            '<i class="fas fa-volume-up"></i> <span>Listen</span>';
        } else {
          utterance = new SpeechSynthesisUtterance(content);
          utterance.rate = 0.9;
          utterance.pitch = 1;
          utterance.volume = 1;

          utterance.onend = () => {
            isReading = false;
            voiceBtn.classList.remove("speaking");
            voiceBtn.innerHTML =
              '<i class="fas fa-volume-up"></i> <span>Listen</span>';
          };

          utterance.onerror = (event) => {
            console.error("Speech synthesis error:", event);
            isReading = false;
            voiceBtn.classList.remove("speaking");
            voiceBtn.innerHTML =
              '<i class="fas fa-volume-up"></i> <span>Listen</span>';
          };

          window.speechSynthesis.speak(utterance);
          isReading = true;
          voiceBtn.classList.add("speaking");
          voiceBtn.innerHTML =
            '<i class="fas fa-volume-mute"></i> <span>Stop</span>';
        }
      }

      window.addEventListener("beforeunload", () => {
        if (isReading) {
          window.speechSynthesis.cancel();
        }
      });

      document.addEventListener("DOMContentLoaded", () => {
        if (!window.speechSynthesis) {
          console.warn("Speech synthesis not supported");
        }
        mainLoader.style.display = "none";
      });
    </script>
    <?php 
      include("includes/footer.php");
    ?>
  </body>
</html>
