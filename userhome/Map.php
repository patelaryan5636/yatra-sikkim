<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jharkhand Tourist Map - Component</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css"
    /> -->

  <link rel="stylesheet" href="leaflet.css">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />

  <style>
    @import url("https://fonts.cdnfonts.com/css/samarkan");

    .title {
      font-family: "Samarkan";
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Poppins", sans-serif;
      background-color: #d6e4e4;
      background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M54.627 0l.83.828-1.415 1.415L51.8 0h2.827zM5.373 0l-.83.828L5.96 2.243 8.2 0H5.374zM48.97 0l3.657 3.657-1.414 1.414L46.143 0h2.828zM11.03 0L7.372 3.657 8.787 5.07 13.857 0H11.03zm32.284 0L49.8 6.485 48.384 7.9l-7.9-7.9h2.83zM16.686 0L10.2 6.485 11.616 7.9l7.9-7.9h-2.83zm20.97 0l9.315 9.314-1.414 1.414L34.828 0h2.83zM22.344 0L13.03 9.314l1.414 1.414L25.172 0h-2.83zM32 0l12.142 12.142-1.414 1.414L30 .828 17.272 13.556l-1.414-1.414L28 0h4zM.284 0l28 28-1.414 1.414L0 2.544V0h.284zM0 5.373l25.456 25.455-1.414 1.415L0 8.2V5.374zm0 5.656l22.627 22.627-1.414 1.414L0 13.86v-2.83zm0 5.656l19.8 19.8-1.415 1.413L0 19.514v-2.83zm0 5.657l16.97 16.97-1.414 1.415L0 25.172v-2.83zM0 28l14.142 14.142-1.414 1.414L0 30.828V28zm0 5.657L11.314 44.97 9.9 46.386l-9.9-9.9v-2.828zm0 5.657L8.485 47.8 7.07 49.212 0 42.143v-2.83zm0 5.657l5.657 5.657-1.414 1.415L0 47.8v-2.83zm0 5.657l2.828 2.83-1.414 1.413L0 53.456v-2.83zM54.627 60L30 35.373 5.373 60H8.2L30 38.2 51.8 60h2.827zm-5.656 0L30 41.03 11.03 60h2.828L30 43.858 46.142 60h2.83zm-5.656 0L30 46.686 16.686 60h2.83L30 49.515 40.485 60h2.83zm-5.657 0L30 52.343 22.343 60h2.83L30 55.172 34.828 60h2.83zM32 60l-2-2-2 2h4zM59.716 0l-28 28 1.414 1.414L60 2.544V0h-.284zM60 5.373L34.544 30.828l1.414 1.415L60 8.2V5.374zm0 5.656L37.373 33.656l1.414 1.414L60 13.86v-2.83zm0 5.656l-19.8 19.8 1.415 1.413L60 19.514v-2.83zm0 5.657l-16.97 16.97 1.414 1.415L60 25.172v-2.83zM60 28L45.858 42.142l1.414 1.414L60 30.828V28zm0 5.657L48.686 44.97l1.415 1.415 9.9-9.9v-2.828zm0 5.657L51.515 47.8l1.414 1.413 7.07-7.07v-2.83zm0 5.657l-5.657 5.657 1.414 1.415L60 47.8v-2.83zm0 5.657l-2.828 2.83 1.414 1.413L60 53.456v-2.83zM39.9 16.385l1.414-1.414L30 3.658 18.686 14.97l1.415 1.415 9.9-9.9 9.9 9.9zm-2.83 2.828l1.415-1.414L30 9.313 21.515 17.8l1.414 1.413 7.07-7.07 7.07 7.07zm-2.827 2.83l1.414-1.416L30 14.97l-5.657 5.657 1.414 1.415L30 17.8l4.243 4.242zm-2.83 2.827l1.415-1.414L30 20.626l-2.828 2.83 1.414 1.414L30 23.456l1.414 1.414zM56.87 59.414L58.284 58 30 29.716 1.716 58l1.414 1.414L30 32.544l26.87 26.87z' fill='%23f8f6f4' fill-opacity='0.4' fill-rule='evenodd'/%3E%3C/svg%3E");
      color: #334155;
      line-height: 1.6;
      overflow: hidden;
      /* min-height: 100vh; */
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .title-section {
      max-width: 1400px;
      margin: 20px auto 0;
      padding: 0 20px;
      text-align: center;
    }

    .title-section h1 {
      font-size: 28px;
      font-weight: 700;
      color: #1e293b;
      margin-bottom: 5px;
    }

    .title-section p {
      font-size: 14px;
      color: #64748b;
      font-weight: 400;
    }

    .main-container {
      max-width: 100%;
      margin: 50px auto;
      padding: 0 20px;
      display: grid;
      grid-template-columns: auto 1fr;
      gap: 30px;
      min-height: max-content;
    }

    .sidebar {
      background: white;
      border-radius: 16px;
      box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
      padding: 25px;
      height: 65.3vh;
      position: sticky;
      top: 30px;
    }

    .sidebar h2 {
      font-size: 20px;
      font-weight: 600;
      color: #1e293b;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .legend-section {
      margin-bottom: 25px;
      max-height: 99%;
      overflow-y: scroll;
      overflow-x: clip;
      padding-right: 15px;
      /* <-- ADD THIS LINE to create space */
    }

    /* --- Custom Scrollbar for the Legend Section --- */

    /* For Firefox */
    .legend-section {
      scrollbar-width: thin;
      scrollbar-color: #8ebebe #f8fafc;
      /* Thumb and light track color */
    }

    /* For Chrome, Safari, Edge, etc. */
    .legend-section::-webkit-scrollbar {
      width: 8px;
      /* Sets the width of the scrollbar */
    }

    .legend-section::-webkit-scrollbar-track {
      background: #f8fafc;
      /* Sets a light background for the track, matching the item hover */
    }

    .legend-section::-webkit-scrollbar-thumb {
      background: linear-gradient(135deg, #bdcdcd 0%, #839b9e 100%);
      border-radius: 8px;
    }

    .legend-section::-webkit-scrollbar-thumb:hover {
      background: linear-gradient(135deg, #a1dcdc 0%, #628a8f 100%);
    }

    .legend-grid {
      display: grid;
      gap: 12px;
    }

    .legend-item {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px;
      border-radius: 10px;
      transition: all 0.3s ease;
      cursor: pointer;
      border: 1px solid transparent;
    }

    .legend-item:hover,
    .legend-item.active {
      background: #f8fafc;
      border-color: #e2e8f0;
      transform: translateX(5px);
    }

    .legend-icon {
      width: 36px;
      height: 36px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
      color: white;
      flex-shrink: 0;
    }

    .legend-text {
      font-size: 14px;
      font-weight: 500;
      color: #475569;
    }

    .legend-text .item-count {
      font-size: 12px;
      color: #94a3b8;
      font-weight: 400;
      margin-left: 5px;
    }

    .map-container {
      width: 1000px;
      background: white;
      border-radius: 16px;
      box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      position: relative;
      display: flex;
      max-height: 65.3vh;
      flex-direction: column;
    }

    .map-header {
      padding: 20px 25px;
      border-bottom: 1px solid #e2e8f0;
      background: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .map-title {
      font-size: 18px;
      font-weight: 600;
      color: #1e293b;
    }

    .map-controls {
      display: flex;
      gap: 10px;
    }

    .control-btn {
      padding: 8px 12px;
      border: 1px solid #e2e8f0;
      border-radius: 6px;
      background: white;
      color: #64748b;
      cursor: pointer;
      transition: all 0.2s ease;
      font-size: 12px;
    }

    .control-btn:hover {
      background: #f1f5f9;
      border-color: #cbd5e1;
    }

    #map {
      height: 100%;
      width: 100%;
    }

    .custom-marker {
      background: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
      border: 2px solid white;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .custom-marker:hover {
      transform: scale(1.1);
    }

    .popup-content {
      font-family: "Poppins", sans-serif;
      max-width: 250px;
    }

    .popup-title {
      font-size: 16px;
      font-weight: 600;
      color: #1e293b;
      margin-bottom: 8px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .popup-description {
      font-size: 13px;
      color: #64748b;
      line-height: 1.5;
      margin-bottom: 10px;
    }

    .popup-category {
      display: inline-block;
      padding: 4px 8px;
      border-radius: 12px;
      font-size: 11px;
      font-weight: 500;
      color: white;
    }

    .reset-item {
      margin-top: 15px;
      padding-top: 15px;
      border-top: 1px solid #e2e8f0;
    }

    @media (max-width: 1024px) {
      .main-container {
        grid-template-columns: 1fr;
        gap: 20px;
      }

      .sidebar {
        position: relative;
        top: 0;
      }
    }

    @media (max-width: 768px) {
      .main-container {
        padding: 20px 15px;
      }

      .map-container {
        height: 500px;
      }
    }
  </style>
</head>

<body>
  <h1 class="title font-bold text-gray-700 mb-2 text-5xl text-center mt-12">
    explore & discover: jharkhand
  </h1>
  <p class="text-gray-600 text-xl font-serif px-20 text-center">
    Unearth the hidden gems and vibrant culture of Jharkhand. From ancient
    temples nestled in serene hills to majestic waterfalls and diverse
    wildlife sanctuaries, embark on a journey through its rich heritage and
    natural beauty.
  </p>

  <div class="flex justify-center items-center gap-5 mb-8 font-serif">
    <div class="px-3 py-4 mt-3 bg-orange-100 h-6 text-gray-600 font-medium rounded-lg flex items-center">
      🎉 Festivals & Culture
    </div>
    <div class="px-3 py-4 mt-3 bg-purple-100 h-6 text-gray-600 font-medium rounded-lg flex items-center">
      🌱 Unveiling Nature
    </div>
    <div class="px-3 py-4 mt-3 bg-green-100 h-6 text-gray-600 font-medium rounded-lg flex items-center">
      🏛 Heritage Sites
    </div>
  </div>

  <div class="main-container">
    <div class="sidebar">
      <div class="legend-section">
        <h2><i class="fas fa-list-ul"></i> Map Legend</h2>
        <div class="legend-grid">
          <div class="legend-item active" data-category="all">
            <div class="legend-icon" style="background: linear-gradient(135deg, #475569, #334155)">
              <i class="fas fa-layer-group"></i>
            </div>
            <div class="legend-text">
              Show All Places
              <span class="item-count"></span>
            </div>
          </div>
          <div class="legend-item" data-category="temple">
            <div class="legend-icon" style="background: linear-gradient(135deg, #f97316, #ea580c)">
              <i class="fas fa-om"></i>
            </div>
            <div class="legend-text">
              Temples & Religious Sites
              <span class="item-count"></span>
            </div>
          </div>
          <div class="legend-item" data-category="wildlife">
            <div class="legend-icon" style="background: linear-gradient(135deg, #22c55e, #16a34a)">
              <i class="fas fa-tree"></i>
            </div>
            <div class="legend-text">
              Wildlife Sanctuaries
              <span class="item-count"></span>
            </div>
          </div>
          <div class="legend-item" data-category="waterfall">
            <div class="legend-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8)">
              <i class="fas fa-water"></i>
            </div>
            <div class="legend-text">
              Waterfalls & Lakes
              <span class="item-count"></span>
            </div>
          </div>
          <div class="legend-item" data-category="hill">
            <div class="legend-icon" style="background: linear-gradient(135deg, #eab308, #ca8a04)">
              <i class="fas fa-mountain"></i>
            </div>
            <div class="legend-text">
              Hills & Viewpoints
              <span class="item-count"></span>
            </div>
          </div>
          <div class="legend-item" data-category="city">
            <div class="legend-icon" style="background: linear-gradient(135deg, #ef4444, #dc2626)">
              <i class="fas fa-city"></i>
            </div>
            <div class="legend-text">
              Major Cities
              <span class="item-count"></span>
            </div>
          </div>
          <div class="legend-item" data-category="industry">
            <div class="legend-icon" style="background: linear-gradient(135deg, #6b7280, #4b5563)">
              <i class="fas fa-industry"></i>
            </div>
            <div class="legend-text">
              Industrial Areas
              <span class="item-count"></span>
            </div>
          </div>
          <div class="legend-item" data-category="education">
            <div class="legend-icon" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed)">
              <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="legend-text">
              Educational Institutions
              <span class="item-count"></span>
            </div>
          </div>
          <div class="legend-item" data-category="dam">
            <div class="legend-icon" style="background: linear-gradient(135deg, #5ee0f0, #348892)">
              <i class="fas fa-tint"></i>
            </div>
            <div class="legend-text">
              Dams & Reservoirs
              <span class="item-count"></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="map-container">
      <div class="map-header">
        <div class="map-title">Interactive Map of Jharkhand</div>
        <div class="map-controls">
          <button id="lock-btn" class="control-btn" onclick="toggleMapLock()">
            <i class="fas fa-lock"></i> Locked
          </button>
          <button class="control-btn" onclick="resetMapView()">
            <i class="fas fa-home"></i> Reset View
          </button>
          <button class="control-btn" onclick="toggleSatellite()">
            <i class="fas fa-satellite"></i> Satellite
          </button>
        </div>
      </div>
      <div id="map"></div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>

  <script>
    let map;
    let markersLayer;
    let satelliteLayer;
    let defaultLayer;
    let isMapLocked = true; // FIX: New variable to track lock state

    const jharkhandBounds = [
      [21.95, 83.32],
      [25.35, 87.57],
    ];

    const mapData = {
      // Your map data remains unchanged...
      temple: [{ name: "Baidyanath Jyotirlinga", lat: 24.4833, lng: 86.7006, desc: "One of the 12 Jyotirlingas, a major pilgrimage site.", city: "Deoghar" }, { name: "Basukinath Temple", lat: 24.3667, lng: 87.1333, desc: "Revered temple for Lord Shiva, pilgrimage destination.", city: "Dumka" }, { name: "Jagannath Temple", lat: 23.3441, lng: 85.3096, desc: "Replica of the famous Puri Jagannath Temple.", city: "Ranchi" }, { name: "Pahari Mandir", lat: 23.3738, lng: 85.3342, desc: "Hilltop temple with panoramic city views.", city: "Ranchi" }, { name: "Maluti Temples", lat: 24.9167, lng: 87.3167, desc: "Group of 108 terracotta temples from the 17th century.", city: "Dumka" }, { name: "Chhinnamasta Temple", lat: 23.6333, lng: 85.8167, desc: "One of the 51 Shakti Peethas.", city: "Ramgarh" }, { name: "Surya Temple", lat: 23.2917, lng: 85.5348, desc: "Temple shaped like a huge chariot with 18 wheels.", city: "Ranchi" }, { name: "Harihar Dham", lat: 24.1667, lng: 85.8833, desc: "Home to the world's largest Shiva Linga.", city: "Giridih" }, { name: "Dewri Temple", lat: 23.275, lng: 85.7333, desc: "Ancient temple dedicated to Goddess Durga.", city: "Ranchi" }, { name: "Naulakha Mandir", lat: 24.4752, lng: 86.6853, desc: "Known for its architecture similar to the Ramakrishna Mission.", city: "Deoghar" }, { name: "Bindudham Temple", lat: 24.87, lng: 87.89, desc: "Pilgrimage site atop Binduwasni Hills.", city: "Sahebganj" }, { name: "Kapilnath Temple", lat: 23.1672, lng: 84.8055, desc: "Historic temple built by King Ram Shah in 1643.", city: "Gumla" }, { name: "Rankini Temple", lat: 22.5693, lng: 86.4172, desc: "A famous temple known for its sacrificial rituals.", city: "Jadugora" }, { name: "Bhuvaneshwari Temple", lat: 22.8021, lng: 86.1953, desc: "A hilltop temple providing a view of the entire Jamshedpur city.", city: "Jamshedpur" }],
      wildlife: [{ name: "Betla National Park", lat: 23.8667, lng: 84.1833, desc: "Tiger reserve and elephant sanctuary with historic Palamau Forts.", city: "Palamau" }, { name: "Dalma Wildlife Sanctuary", lat: 22.85, lng: 86.1167, desc: "Famous for its large elephant herds and diverse wildlife.", city: "Jamshedpur" }, { name: "Hazaribagh Wildlife Sanctuary", lat: 24.0167, lng: 85.35, desc: "Sanctuary known for its diverse flora and fauna.", city: "Hazaribagh" }, { name: "Topchanchi Wildlife Sanctuary", lat: 23.9333, lng: 86.25, desc: "Home to a large lake and various bird species.", city: "Dhanbad" }, { name: "Koderma Wildlife Sanctuary", lat: 24.4667, lng: 85.5833, desc: "Sanctuary in a mica-rich region.", city: "Koderma" }, { name: "Mahuadanr Wolf Sanctuary", lat: 23.475, lng: 84.095, desc: "Dedicated sanctuary for the Indian Wolf.", city: "Latehar" }, { name: "Birsa Zoological Park", lat: 23.42, lng: 85.34, desc: "A large zoological park located near Ranchi.", city: "Ranchi" }],
      waterfall: [{ name: "Hundru Falls", lat: 23.4167, lng: 85.5833, desc: "Spectacular 320-foot high waterfall on the Subarnarekha River.", city: "Ranchi" }, { name: "Jonha Falls", lat: 23.2833, lng: 85.4667, desc: "Known as Gautamdhara Falls, a popular picnic spot.", city: "Ranchi" }, { name: "Dassam Falls", lat: 23.3333, lng: 85.6167, desc: "A beautiful cascade waterfall of the Kanchi River.", city: "Ranchi" }, { name: "Hirni Falls", lat: 22.95, lng: 85.0833, desc: "A serene waterfall nestled in the midst of a forest.", city: "West Singhbhum" }, { name: "Panchghagh Falls", lat: 23.275, lng: 85.2583, desc: "Five-stream waterfall, a perfect family outing spot.", city: "Khunti" }, { name: "Lodh Falls", lat: 23.44, lng: 84.288, desc: "Highest waterfall in Jharkhand, also known as Burhaghagh Falls.", city: "Latehar" }, { name: "Usri Falls", lat: 24.1833, lng: 86.3167, desc: "A scenic waterfall located near the Parasnath Hills.", city: "Giridih" }, { name: "Sita Falls", lat: 23.333, lng: 85.5, desc: "A charming waterfall and popular tourist spot.", city: "Ranchi" }, { name: "Sadni Falls", lat: 23.35, lng: 84.8, desc: "A beautiful horseshoe-shaped waterfall.", city: "Gumla" }],
      hill: [{ name: "Netarhat", lat: 23.4667, lng: 84.25, desc: "Known as the 'Queen of Chotanagpur' for its scenic beauty.", city: "Latehar" }, { name: "Parasnath Hill", lat: 23.9667, lng: 86.1667, desc: "The highest peak in Jharkhand and a major Jain pilgrimage site.", city: "Giridih" }, { name: "Trikut Pahar", lat: 24.4444, lng: 86.6713, desc: "A famous hill with a ropeway and scenic views.", city: "Deoghar" }, { name: "Tagore Hill", lat: 23.3667, lng: 85.3167, desc: "Historical hill where Rabindranath Tagore stayed.", city: "Ranchi" }, { name: "Dalma Hills", lat: 22.85, lng: 86.1167, desc: "Part of the Dalma Wildlife Sanctuary, offering great trekking.", city: "Jamshedpur" }, { name: "Patratu Valley", lat: 23.42, lng: 85.29, desc: "A beautiful valley known for its winding roads and scenic views.", city: "Ramgarh" }, { name: "Canary Hill", lat: 24.0167, lng: 85.35, desc: "A popular tourist spot offering panoramic views of Hazaribagh.", city: "Hazaribagh" }],
      city: [{ name: "Ranchi", lat: 23.3441, lng: 85.3096, desc: "The capital city and a major educational and cultural hub.", city: "Ranchi" }, { name: "Jamshedpur", lat: 22.8046, lng: 86.2029, desc: "India's first planned industrial city, known as the Steel City.", city: "East Singhbhum" }, { name: "Dhanbad", lat: 23.7957, lng: 86.4304, desc: "The 'Coal Capital of India' due to its vast coal reserves.", city: "Dhanbad" }, { name: "Bokaro", lat: 23.6693, lng: 86.1511, desc: "A major industrial city known for its steel plant.", city: "Bokaro" }, { name: "Deoghar", lat: 24.4833, lng: 86.7006, desc: "A significant religious tourism center and pilgrimage site.", city: "Deoghar" }, { name: "Hazaribagh", lat: 23.99, lng: 85.35, desc: "Known as the 'City of a Thousand Gardens' with beautiful lakes.", city: "Hazaribagh" }, { name: "Dumka", lat: 24.27, lng: 87.25, desc: "The sub-capital of Jharkhand with rich cultural heritage.", city: "Dumka" }],
      industry: [{ name: "Tata Steel Plant", lat: 22.7739, lng: 86.1463, desc: "Asia's first integrated steel plant.", city: "Jamshedpur" }, { name: "Bokaro Steel Plant", lat: 23.6693, lng: 86.1511, desc: "One of the largest steel plants in India.", city: "Bokaro" }, { name: "HEC (Heavy Engineering Corp)", lat: 23.376, lng: 85.293, desc: "Major heavy machinery manufacturing unit.", city: "Ranchi" }, { name: "Jharia Coalfield", lat: 23.75, lng: 86.4, desc: "The largest coalfield in India.", city: "Dhanbad" }],
      education: [{ name: "IIT Dhanbad", lat: 23.8103, lng: 86.441, desc: "Premier engineering institute (ISM).", city: "Dhanbad" }, { name: "BIT Mesra", lat: 23.4142, lng: 85.4405, desc: "Birla Institute of Technology, a top private engineering college.", city: "Ranchi" }, { name: "Ranchi University", lat: 23.3441, lng: 85.3096, desc: "Major state university.", city: "Ranchi" }, { name: "NIT Jamshedpur", lat: 22.8016, lng: 86.1418, desc: "National Institute of Technology.", city: "Jamshedpur" }, { name: "XLRI Jamshedpur", lat: 22.8021, lng: 86.1953, desc: "Top private business school.", city: "Jamshedpur" }],
      dam: [{ name: "Maithon Dam", lat: 23.7845, lng: 86.8406, desc: "Hydroelectric dam on the Barakar River.", city: "Dhanbad" }, { name: "Panchet Dam", lat: 23.6599, lng: 86.7865, desc: "Large dam on the Damodar River.", city: "Dhanbad" }, { name: "Kanke Dam", lat: 23.401, lng: 85.319, desc: "A scenic dam with a popular rock garden nearby.", city: "Ranchi" }, { name: "Patratu Dam", lat: 23.4338, lng: 85.2863, desc: "A beautiful lake and dam with a thermal power station.", city: "Ramgarh" }, { name: "Dimna Lake", lat: 22.812, lng: 86.279, desc: "An artificial reservoir and popular picnic spot.", city: "Jamshedpur" }, { name: "Getalsud Dam", lat: 23.4735, lng: 85.5255, desc: "Reservoir on the Subarnarekha River.", city: "Ranchi" }, { name: "Konar Dam", lat: 23.729, lng: 85.83, desc: "A dam on the Konar River.", city: "Hazaribagh" }],
    };

    function initMap() {
      map = L.map("map").setView([23.6102, 85.2799], 7);
      map.fitBounds(jharkhandBounds);

      defaultLayer = L.tileLayer(
        "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
        {
          attribution: "© OpenStreetMap contributors",
          maxZoom: 18,
        }
      );
      satelliteLayer = L.tileLayer(
        "https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}",
        {
          attribution:
            "Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community",
          maxZoom: 18,
        }
      );

      defaultLayer.addTo(map);
      markersLayer = L.layerGroup().addTo(map);

      // ✅ ADD THIS PART (Jharkhand border)
      fetch("jharkhand.geojson")
        .then(response => response.json())
        .then(data => {
          const borderLayer = L.geoJSON(data, {
            style: {
              color: "#ff0000", // ✅ soft greenish border color
              weight: 2,        // border thickness
              fill: false       // only border, no fill
            }
          }).addTo(map);

          // optional: fit map exactly to border
          map.fitBounds(borderLayer.getBounds());
        });

      updateItemCounts();
      addMarkersToMap("all");
      updateMapLockState();
    }


    // FIX: NEW FUNCTION to update the map's interaction state
    function updateMapLockState() {
      const lockButton = document.getElementById('lock-btn');
      if (isMapLocked) {
        map.dragging.disable();
        map.touchZoom.disable();
        map.doubleClickZoom.disable();
        map.scrollWheelZoom.disable();
        map.boxZoom.disable();
        map.keyboard.disable();
        if (map.tap) map.tap.disable();
        lockButton.innerHTML = '<i class="fas fa-lock"></i> Locked';
      } else {
        map.dragging.enable();
        map.touchZoom.enable();
        map.doubleClickZoom.enable();
        map.scrollWheelZoom.enable();
        map.boxZoom.enable();
        map.keyboard.enable();
        if (map.tap) map.tap.enable();
        lockButton.innerHTML = '<i class="fas fa-lock-open"></i> Unlocked';
      }
    }

    // FIX: NEW FUNCTION to toggle the lock state
    function toggleMapLock() {
      isMapLocked = !isMapLocked; // Flip the boolean
      updateMapLockState();
    }

    // --- All your other functions (getMarkerColor, addMarkersToMap, etc.) remain below ---

    function getMarkerColor(category) {
      const colors = {
        temple: "#f97316",
        wildlife: "#22c55e",
        waterfall: "#3b82f6",
        hill: "#eab308",
        city: "#ef4444",
        industry: "#6b7280",
        education: "#8b5cf6",
        dam: "#5EE0F0",
      };
      return colors[category] || "#64748b";
    }

    function getMarkerIcon(category) {
      const icons = {
        temple: "fa-om",
        wildlife: "fa-tree",
        waterfall: "fa-water",
        hill: "fa-mountain",
        city: "fa-city",
        industry: "fa-industry",
        education: "fa-graduation-cap",
        dam: "fa-tint",
      };
      return icons[category] || "fa-map-marker-alt";
    }

    function createCustomMarker(category, size = "medium") {
      const sizes = {
        small: { width: 25, height: 25, fontSize: "12px" },
        medium: { width: 35, height: 35, fontSize: "16px" },
        large: { width: 45, height: 45, fontSize: "20px" },
      };
      const s = sizes[size];
      const color = getMarkerColor(category);
      const icon = getMarkerIcon(category);
      return L.divIcon({
        html: `<div class="custom-marker" style="width: ${s.width}px; height: ${s.height}px; background: ${color}; font-size: ${s.fontSize};">
                      <i class="fas ${icon}"></i>
                      </div>`,
        iconSize: [s.width, s.height],
        iconAnchor: [s.width / 2, s.height / 2],
        popupAnchor: [0, -s.height / 2],
        className: "custom-div-icon",
      });
    }

    function addMarkersToMap(filter = "all") {
      markersLayer.clearLayers();
      Object.keys(mapData).forEach((category) => {
        if (filter === "all" || filter === category) {
          mapData[category].forEach((place) => {
            const marker = L.marker([place.lat, place.lng], {
              icon: createCustomMarker(category),
            });
            const popupContent = `
              <div class="popup-content">
                <div class="popup-title">
                  <i class="fas ${getMarkerIcon(
              category
            )}" style="color: ${getMarkerColor(category)};"></i>
                  ${place.name}
                </div>
                <div class="popup-description">${place.desc}</div>
                <div class="popup-category" style="background: ${getMarkerColor(
              category
            )};">${place.city}</div>
              </div>
            `;
            marker.bindPopup(popupContent);
            markersLayer.addLayer(marker);
          });
        }
      });
    }

    function resetMapView() {
      map.fitBounds(jharkhandBounds);
    }

    function toggleSatellite() {
      const satButton = document.querySelector(
        '.control-btn[onclick="toggleSatellite()"]'
      );
      if (map.hasLayer(satelliteLayer)) {
        map.removeLayer(satelliteLayer);
        defaultLayer.addTo(map);
        satButton.innerHTML = '<i class="fas fa-satellite"></i> Satellite';
      } else {
        map.removeLayer(defaultLayer);
        satelliteLayer.addTo(map);
        satButton.innerHTML = '<i class="fas fa-map"></i> Map View';
      }
    }

    function updateItemCounts() {
      document.querySelector(
        '.legend-item[data-category="all"] .item-count'
      ).textContent = `(${Object.values(mapData).flat().length})`;
      Object.keys(mapData).forEach((category) => {
        const count = mapData[category].length;
        document.querySelector(
          `.legend-item[data-category="${category}"] .item-count`
        ).textContent = `(${count})`;
      });
    }

    document.addEventListener("DOMContentLoaded", function () {
      initMap();

      document.querySelectorAll(".legend-item").forEach((item) => {
        item.addEventListener("click", function () {
          const category = this.dataset.category;
          document
            .querySelectorAll(".legend-item")
            .forEach((b) => b.classList.remove("active"));
          this.classList.add("active");
          addMarkersToMap(category);
        });
      });
    });
  </script>
</body>

</html>