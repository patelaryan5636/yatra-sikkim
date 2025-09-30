<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sikkim Tourist Map - Component</title>
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
    explore & discover: sikkim
  </h1>
  <p class="text-gray-600 text-xl font-serif px-20 text-center">
    Immerse yourself in the Himalayan wonderland of Sikkim. From the awe-inspiring peaks of Kanchenjunga and serene
    Buddhist monasteries to shimmering high-altitude lakes and lush valleys, embark on an unforgettable journey through
    its vibrant culture and pristine landscapes.
  </p>

  <div class="flex justify-center items-center gap-5 mb-8 font-serif">
    <div class="px-3 py-4 mt-3 bg-orange-100 h-6 text-gray-600 font-medium rounded-lg flex items-center">
      🏔️ Himalayan Vistas
    </div>
    <div class="px-3 py-4 mt-3 bg-purple-100 h-6 text-gray-600 font-medium rounded-lg flex items-center">
      🙏 Monasteries & Culture
    </div>
    <div class="px-3 py-4 mt-3 bg-green-100 h-6 text-gray-600 font-medium rounded-lg flex items-center">
      🏞️ Pristine Landscapes
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
          <div class="legend-item" data-category="monastery">
            <div class="legend-icon" style="background: linear-gradient(135deg, #f97316, #ea580c)">
              <i class="fas fa-praying-hands"></i>
            </div>
            <div class="legend-text">
              Monasteries & Spiritual Sites
              <span class="item-count"></span>
            </div>
          </div>
          <div class="legend-item" data-category="wildlife">
            <div class="legend-icon" style="background: linear-gradient(135deg, #22c55e, #16a34a)">
              <i class="fas fa-paw"></i>
            </div>
            <div class="legend-text">
              National Parks & Sanctuaries
              <span class="item-count"></span>
            </div>
          </div>
          <div class="legend-item" data-category="lake">
            <div class="legend-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8)">
              <i class="fas fa-water"></i>
            </div>
            <div class="legend-text">
              Lakes & Waterfalls
              <span class="item-count"></span>
            </div>
          </div>
          <div class="legend-item" data-category="mountain">
            <div class="legend-icon" style="background: linear-gradient(135deg, #06b6d4, #0891b2)">
              <i class="fas fa-mountain"></i>
            </div>
            <div class="legend-text">
              Mountain Peaks & Passes
              <span class="item-count"></span>
            </div>
          </div>
          <div class="legend-item" data-category="valley">
            <div class="legend-icon" style="background: linear-gradient(135deg, #a855f7, #9333ea)">
              <i class="fas fa-spa"></i>
            </div>
            <div class="legend-text">
              Valleys & Hot Springs
              <span class="item-count"></span>
            </div>
          </div>
          <div class="legend-item" data-category="adventure">
            <div class="legend-icon" style="background: linear-gradient(135deg, #eab308, #ca8a04)">
              <i class="fas fa-hiking"></i>
            </div>
            <div class="legend-text">
              Viewpoints & Adventure
              <span class="item-count"></span>
            </div>
          </div>
          <div class="legend-item" data-category="city">
            <div class="legend-icon" style="background: linear-gradient(135deg, #ef4444, #dc2626)">
              <i class="fas fa-city"></i>
            </div>
            <div class="legend-text">
              Major Cities & Towns
              <span class="item-count"></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="map-container">
      <div class="map-header">
        <div class="map-title">Interactive Map of Sikkim</div>
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

    const sikkimBounds = [
      [27.05, 88.0],
      [28.1, 89.0],
    ];

    const mapData = {
      monastery: [
        {
          name: "Rumtek Monastery",
          lat: 27.3168,
          lng: 88.5834,
          desc: "The largest and most important monastery in Sikkim, a center of the Kagyu lineage.",
          city: "Gangtok",
        },
        {
          name: "Pemayangtse Monastery",
          lat: 27.3411,
          lng: 88.2393,
          desc: "One of the oldest and most important monasteries of the Nyingma order.",
          city: "Pelling",
        },
        {
          name: "Tashiding Monastery",
          lat: 27.274,
          lng: 88.243,
          desc: "A significant and sacred Buddhist monastery.",
          city: "Gyalshing",
        },
        {
          name: "Lachen Monastery",
          lat: 27.701,
          lng: 88.544,
          desc: "A small monastery with serene surroundings.",
          city: "Lachen",
        },
        {
          name: "Phodong Monastery",
          lat: 27.468,
          lng: 88.528,
          desc: "A beautiful monastery located on a hilltop, north of Gangtok.",
          city: "Phodong",
        },
        {
          name: "Dubdi Monastery",
          lat: 27.369,
          lng: 88.291,
          desc: "Sikkim's first monastery, established in 1701.",
          city: "Yuksom",
        },
        {
          name: "Enchey Monastery",
          lat: 27.33,
          lng: 88.62,
          desc: "A vibrant monastery with a unique pagoda-style structure.",
          city: "Gangtok",
        },
        {
          name: "Rinchenpong Monastery",
          lat: 27.28,
          lng: 88.24,
          desc: "A beautiful monastery offering a panoramic view of the Kanchenjunga.",
          city: "Kaluk",
        },
        {
          name: "Do Drul Chorten Stupa",
          lat: 27.329,
          lng: 88.618,
          desc: "A large stupa with 108 Mani Lhakor (prayer wheels).",
          city: "Gangtok",
        },
        {
          name: "Gyalshing Monastery",
          lat: 27.279,
          lng: 88.261,
          desc: "A newly built monastery with a peaceful ambiance.",
          city: "Gyalshing",
        },
        {
          name: "Sanga Choeling Monastery",
          lat: 27.313,
          lng: 88.204,
          desc: "One of the oldest monasteries in Sikkim, accessible via a short hike.",
          city: "Pelling",
        },
        {
          name: "Labrang Monastery",
          lat: 27.272,
          lng: 88.239,
          desc: "A serene monastery with intricate Tibetan artwork.",
          city: "Gyalshing",
        },
        {
          name: "Samdruptse Monastery",
          lat: 27.199,
          lng: 88.351,
          desc: "Part of the Buddha Park complex, featuring a giant statue of Buddha.",
          city: "Ravangla",
        },
        {
          name: "Yuksom",
          lat: 27.369,
          lng: 88.225,
          desc: "The first capital of Sikkim, a historic and spiritual hub.",
          city: "West Sikkim",
        },
      ],
      wildlife: [
        {
          name: "Khangchendzonga National Park",
          lat: 27.606,
          lng: 88.186,
          desc: "A UNESCO World Heritage site, home to diverse flora and fauna, including the Red Panda.",
          city: "Yuksom",
        },
        {
          name: "Fambong Lho Wildlife Sanctuary",
          lat: 27.341,
          lng: 88.542,
          desc: "Located near Gangtok, known for its rich birdlife and lush forests.",
          city: "Gangtok",
        },
        {
          name: "Maenam Wildlife Sanctuary",
          lat: 27.338,
          lng: 88.385,
          desc: "A serene sanctuary with a rich variety of medicinal plants and animals.",
          city: "Ravangla",
        },
        {
          name: "Kyongnosla Alpine Sanctuary",
          lat: 27.378,
          lng: 88.766,
          desc: "Home to high-altitude flora and fauna, including rare rhododendron species.",
          city: "Tsomgo Lake",
        },
        {
          name: "Shingba Rhododendron Sanctuary",
          lat: 27.705,
          lng: 88.667,
          desc: "Known for its stunning variety of rhododendron species, especially in spring.",
          city: "Lachung",
        },
        {
          name: "Pangolakha Wildlife Sanctuary",
          lat: 27.33,
          lng: 88.85,
          desc: "The largest wildlife sanctuary in Sikkim, connecting with Neora Valley National Park.",
          city: "Pangolakha",
        },
      ],
      lake: [
        {
          name: "Tsomgo Lake",
          lat: 27.378,
          lng: 88.766,
          desc: "A sacred glacial lake located at an altitude of 12,310 feet.",
          city: "Gangtok",
        },
        {
          name: "Gurudongmar Lake",
          lat: 28.02,
          lng: 88.71,
          desc: "One of the highest lakes in the world, revered by Buddhists and Sikhs.",
          city: "Lachen",
        },
        {
          name: "Khecheopalri Lake",
          lat: 27.343,
          lng: 88.196,
          desc: "A sacred 'Wishing Lake' considered holy by both Buddhists and Hindus.",
          city: "Yuksom",
        },
        {
          name: "Kathok Lake",
          lat: 27.371,
          lng: 88.225,
          desc: "A serene lake with historical and religious significance.",
          city: "Yuksom",
        },
        {
          name: "Menmecho Lake",
          lat: 27.325,
          lng: 88.834,
          desc: "A stunning lake surrounded by high mountains, a source of the Rangpo River.",
          city: "Zuluk",
        },
        {
          name: "Lampokhari Lake",
          lat: 27.13,
          lng: 88.5,
          desc: "An emerald-green lake known for its paddle boating facilities.",
          city: "Aritar",
        },
        {
          name: "Banjhakri Falls",
          lat: 27.319,
          lng: 88.571,
          desc: "A scenic waterfall and recreational park with a theme based on shamanic legends.",
          city: "Gangtok",
        },
        {
          name: "Seven Sisters Waterfall",
          lat: 27.42,
          lng: 88.6,
          desc: "A magnificent cascade of seven different waterfalls flowing over a wide cliff.",
          city: "Gangtok",
        },
        {
          name: "Kanchenjunga Falls",
          lat: 27.359,
          lng: 88.192,
          desc: "A perennial waterfall, believed to originate from the glaciers of Mt. Kanchenjunga.",
          city: "Pelling",
        },
      ],
      mountain: [
        {
          name: "Kanchenjunga Peak",
          lat: 27.7,
          lng: 88.15,
          desc: "The third highest mountain in the world, revered as the guardian deity of Sikkim.",
          city: "West Sikkim",
        },
        {
          name: "Nathu La Pass",
          lat: 27.387,
          lng: 88.828,
          desc: "A high-altitude mountain pass connecting Sikkim with Tibet.",
          city: "Gangtok",
        },
        {
          name: "Chopta Valley",
          lat: 27.818,
          lng: 88.751,
          desc: "A beautiful valley known for its alpine meadows and pristine beauty.",
          city: "North Sikkim",
        },
        {
          name: "Thangu Valley",
          lat: 27.994,
          lng: 88.706,
          desc: "A valley at high altitude, a gateway to Gurudongmar Lake.",
          city: "Lachen",
        },
        {
          name: "Zemu Glacier",
          lat: 27.712,
          lng: 88.337,
          desc: "The largest glacier in the Eastern Himalayas, located at the base of Mt. Kanchenjunga.",
          city: "North Sikkim",
        },
      ],
      valley: [
        {
          name: "Yumthang Valley",
          lat: 27.77,
          lng: 88.75,
          desc: "Known as the 'Valley of Flowers', famous for its vast rhododendron forests.",
          city: "Lachung",
        },
        {
          name: "Lachung Valley",
          lat: 27.683,
          lng: 88.74,
          desc: "A picturesque mountain village and a popular tourist destination.",
          city: "Lachung",
        },
        {
          name: "Zero Point (Yumesamdong)",
          lat: 27.83,
          lng: 88.79,
          desc: "The last civilian motorable road, offering magnificent snow-covered views.",
          city: "Lachung",
        },
        {
          name: "Dzongu Valley",
          lat: 27.56,
          lng: 88.42,
          desc: "A reserved area for the Lepcha people, a place of immense natural beauty.",
          city: "Mangan",
        },
        {
          name: "Reshi Hot Spring",
          lat: 27.39,
          lng: 88.61,
          desc: "A natural hot spring with medicinal properties, located on the banks of the Rangeet river.",
          city: "North Sikkim",
        },
        {
          name: "Yume Samdong Hot Springs",
          lat: 27.83,
          lng: 88.79,
          desc: "Natural hot springs located at Zero Point, known for their therapeutic properties.",
          city: "Lachung",
        },
      ],
      adventure: [
        {
          name: "Goechala",
          lat: 27.653,
          lng: 88.198,
          desc: "A famous trek route offering breathtaking close-up views of Mt. Kanchenjunga.",
          city: "Yuksom",
        },
        {
          name: "Tsomgo Trek",
          lat: 27.378,
          lng: 88.766,
          desc: "A trek around the sacred Tsomgo Lake with stunning mountain scenery.",
          city: "Gangtok",
        },
        {
          name: "Singshore Bridge",
          lat: 27.28,
          lng: 88.19,
          desc: "The highest bridge in Sikkim and the second-highest gorge bridge in Asia.",
          city: "Pelling",
        },
        {
          name: "Temi Tea Garden",
          lat: 27.24,
          lng: 88.45,
          desc: "Sikkim's only tea estate, offering scenic views and a chance to learn about tea processing.",
          city: "Ravangla",
        },
        {
          name: "Samdruptse Hill",
          lat: 27.165,
          lng: 88.358,
          desc: "Features a giant statue of Guru Padmasambhava, providing a panoramic view of the region.",
          city: "Namchi",
        },
        {
          name: "Buddha Park (Ravangla)",
          lat: 27.327,
          lng: 88.225,
          desc: "A massive statue of the Buddha, set in a peaceful garden with views of the Himalayas.",
          city: "Ravangla",
        },
        {
          name: "Tendong Hill",
          lat: 27.23,
          lng: 88.38,
          desc: "A popular trekking spot with a small monastery at the top and a 360-degree view.",
          city: "Namchi",
        },
        {
          name: "Dzongri La",
          lat: 27.625,
          lng: 88.14,
          desc: "A high-altitude viewpoint on the Goechala trek, offering stunning views of Kanchenjunga.",
          city: "Yuksom",
        },
        {
          name: "Baba Harbhajan Singh Mandir",
          lat: 27.388,
          lng: 88.828,
          desc: "A shrine dedicated to an Indian Army soldier, a pilgrimage site near Nathu La.",
          city: "Gangtok",
        },
      ],
      city: [
        {
          name: "Gangtok",
          lat: 27.33,
          lng: 88.62,
          desc: "The capital and largest city of Sikkim, a hub for tourism and commerce.",
          city: "East Sikkim",
        },
        {
          name: "Pelling",
          lat: 27.327,
          lng: 88.225,
          desc: "A popular hill station known for its magnificent views of the Kanchenjunga.",
          city: "West Sikkim",
        },
        {
          name: "Lachen",
          lat: 27.7,
          lng: 88.53,
          desc: "A serene town and a base for exploring Northern Sikkim.",
          city: "North Sikkim",
        },
        {
          name: "Namchi",
          lat: 27.165,
          lng: 88.358,
          desc: "Known for the world's largest statue of Guru Padmasambhava.",
          city: "South Sikkim",
        },
        {
          name: "Mangan",
          lat: 27.52,
          lng: 88.54,
          desc: "The headquarters of North Sikkim, offering a serene environment.",
          city: "North Sikkim",
        },
        {
          name: "Gyalshing",
          lat: 27.279,
          lng: 88.261,
          desc: "The administrative center of West Sikkim, a peaceful town.",
          city: "West Sikkim",
        },
        {
          name: "Lachung",
          lat: 27.683,
          lng: 88.74,
          desc: "A scenic town and a gateway to Yumthang Valley.",
          city: "North Sikkim",
        },
        {
          name: "Ravangla",
          lat: 27.327,
          lng: 88.225,
          desc: "A popular tourist destination with breathtaking views of the Himalayas.",
          city: "South Sikkim",
        },
        {
          name: "Singtam",
          lat: 27.25,
          lng: 88.42,
          desc: "A small town and a major transport hub in Sikkim.",
          city: "East Sikkim",
        },
      ],
    };

    function initMap() {
      map = L.map("map").setView([27.5, 88.5], 8);
      map.fitBounds(sikkimBounds);

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

      // ✅ ADD THIS PART (Sikkim border)
      fetch("sikkim.geojson")
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
        monastery: "#f97316",
        wildlife: "#22c55e",
        lake: "#3b82f6",
        mountain: "#06b6d4",
        valley: "#a855f7",
        adventure: "#eab308",
        city: "#ef4444",
      };
      return colors[category] || "#64748b";
    }

    function getMarkerIcon(category) {
      const icons = {
        monastery: "fa-praying-hands",
        wildlife: "fa-paw",
        lake: "fa-water",
        mountain: "fa-mountain",
        valley: "fa-spa",
        adventure: "fa-hiking",
        city: "fa-city",
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
      map.fitBounds(sikkimBounds);
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