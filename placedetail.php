<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <meta name="description"
        content="Discover Hulley Village, your gateway to the stunning Rhododendron Wonderland. Explore beautiful trails, accommodations, and natural wonders.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/2f64f3b789.js" crossorigin="anonymous"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css' rel='stylesheet' />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body{
            background-color: #eeeef0;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='48' height='48' viewBox='0 0 48 48'%3E%3Cg fill='%2346a199' fill-opacity='0.22'%3E%3Cpath fill-rule='evenodd' d='M5 3.59L1.46.05.05 1.46 3.59 5 .05 8.54l1.41 1.41L5 6.41l3.54 3.54 1.41-1.41L6.41 5l3.54-3.54L8.54.05 5 3.59zM17 2h24v2H17V2zm0 4h24v2H17V6zM2 17h2v24H2V17zm4 0h2v24H6V17z'/%3E%3C/g%3E%3C/svg%3E");
        }

        .hero-bg {
            background: url('assets/img/Places/Parasnath_Hill.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #8ebebe transparent;
        }

        .section-bg {
            background: linear-gradient(185deg, #f0fdf4 0%, #ecfdf5ca 50%, #f0f9ff87 100%);
        }

        .section-bg2 {
            background: #f0f9ff7a;
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .nature-gradient {
            background: linear-gradient(135deg, #059669 0%, #047857 50%, #065f46 100%);
        }

        .orange-gradient {
            background: linear-gradient(135deg, #ea580c 0%, #dc2626 50%, #b91c1c 100%);
        }

        .blue-gradient {
            background: linear-gradient(135deg, #4169c6 0%, #268adc 50%, #0f5972 100%);
        }

        .gallery-image {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .nav-sticky {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .mapbox-token-input {
            display: none;
        }

        .mapbox-token-input.show {
            display: block;
        }

        #map {
            height: 400px;
            width: 100%;
            border-radius: 12px;
        }

        .service-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .service-card:hover {
            border-color: #059669;
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .qr-pattern {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            gap: 2px;
            width: 100%;
            height: 100%;
        }

        .qr-dot {
            background: #000;
            border-radius: 1px;
        }

        .qr-dot:nth-child(even) {
            background: transparent;
        }

        .emergency-card {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            border-left: 4px solid #dc2626;
        }

        .health-card {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border-left: 4px solid #2563eb;
        }

        .modal-backdrop {
            backdrop-filter: blur(8px);
            transition: all 0.3s ease-in-out;
        }

        .modal-content {
            transform: scale(0.95);
            opacity: 0;
            transition: all 0.3s ease-in-out;
        }

        .modal-open .modal-content {
            transform: scale(1);
            opacity: 1;
        }

        .gradient-header {
            background: linear-gradient(135deg, #0e7b76, #4ae2df);
        }

        .amenity-check {
            background-color: #10b981;
        }

        .modal-shadow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }

        .btn-gradient {
            background: linear-gradient(135deg, #4a90e2, #67b2ff);
        }

        .btn-gradient:hover {
            background: linear-gradient(135deg, #3a7bc8, #5aa3ff);
        }

        .destination-card {
            transition: var(--transition-all);
            box-shadow: 0 4px 6px -1px hsl(217 91% 60% / 0.1), 0 2px 4px -1px hsl(217 91% 60% / 0.06);
        }

        .destination-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px hsl(217 91% 60% / 0.1), 0 10px 10px -5px hsl(217 91% 60% / 0.04);
        }

        .destination-card img {
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .destination-card:hover img {
            transform: scale(1.1);
        }

        .line-clamp-4 {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Arrow icon */
        .arrow-icon {
            width: 16px;
            height: 16px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .maincard:hover {
            .category {
                opacity: 40%;
            }
        }

        .bg-adventure{
            background-color: darkgoldenrod;
        }
    </style>
</head>

<body class="bg-gray-50">

    <?php
        include("includes/header.php");
    ?>

    <!-- Hero Section -->
    <section id="home" class="hero-bg  min-h-[80vh] flex items-center p-2 justify-center relative">
        <div
            class="max-w-7xl mx-auto p-8 rounded-2xl border border bg-black/20 backdrop-blur-md text-center text-white">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <div class="lg:w-2/3 mb-8 lg:mb-0 text-left lg:pr-12">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                        Parasnath Hill
                    </h1>
                    <p class="text-lg md:text-lg text-sm mb-8 text-gray-200 max-w-4xl leading-relaxed">
                        Parasnath Hill in West Jharkhand famous not just for tallest statue of Guru Padmasambhava at 137 feet but also, it has become famous for the glass skywalk that leads visitors to the statue. This glass skywalk offers thrilling views of the valley below and panoramic mountain vistas.
                    </p>
                    <div>
                        <table>
                            <tr>
                                <th class="w-1/4 text-xs md:text-sm ">Address</th>
                                <th class="w-1/4 text-xs md:text-sm ">Distance</th>
                                <th class="w-1/4 text-xs md:text-sm ">Best Time</th>
                            </tr>
                            <tr>
                                <td class="w-1/4 text-xs md:text-sm align-text-top">Giridih district, Jharkhand, India</td>
                                <td class="w-1/4 text-xs md:text-sm align-text-top">24km From Your Location</td>
                                <td class="w-1/4 text-xs md:text-sm align-text-top">May - Mar</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="lg:w-1/3 flex justify-center">
                    <div class="flex flex-row md:flex-col gap-4">
                        <a href="#"
                            class="nature-gradient text-white px-4 py-2 md:py-4 md:px-8 rounded-lg font-semibold text-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <i class="fa-solid fa-share-nodes" style="color: #ffffff;"></i> Share
                        </a>
                        <a href="../map.html"
                            class="blue-gradient text-white px-4 py-2 md:py-4 md:px-8 rounded-lg font-semibold text-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <i class="fa-solid fa-location-dot" style="color: #ffffff;"></i> Navigate Now
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform hidden md:block -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3">
                </path>
            </svg>
        </div>
    </section>

    <!-- Gateway Section -->
    <section class="section-bg py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 group">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Gateway to the Rhododendron Wonderland</h2>
                <div class="w-24 h-1 orange-gradient mx-auto mb-8 group-hover:w-64 transaction-all duration-300"></div>
                <p class="text-lg text-gray-600 max-w-5xl mx-auto leading-relaxed">
                    Hulley Village stands as your perfect gateway to the magnificent Rhododendron Wonderland.
                    Nestled in the pristine mountains, our village offers unparalleled access to one of nature's most
                    spectacular floral displays.
                    With comfortable accommodations, expert local guides, and well-maintained trails, we provide
                    everything you need to explore
                    the diverse world of wild rhododendrons in their natural habitat. From easy family-friendly walks to
                    challenging mountain
                    treks, experience the breathtaking beauty that draws visitors from around the world to our untouched
                    wilderness paradise.
                </p>
                <div class="mt-5 grid grid-cols-3 gap-5">
                    <span class="border px-6 py-2 rounded-lg bg-[#6cddce4e]"><i class="fa-solid fa-mountain"
                            style="color: #3f7aa6;"></i> Adventure</span>
                    <span class="border px-6 py-2 rounded-lg bg-[#ddd46c53]"><i class="fa-solid fa-fire-burner"
                            style="color: #907b2c;"></i> Heritage</span>
                    <span class="border px-6 py-2 rounded-lg bg-[#dd6cd64b]"><i class="fa-solid fa-gopuram"
                            style="color: #6c5b9f;"></i> temple</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-20 section-bg2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 group lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Explore <span class="text-green-600">Hulley
                        Village</span> Gallery</h2>
                <div class="w-24 h-1 orange-gradient mx-auto mb-8 group-hover:w-64 transition-all duration-300"></div>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Discover the natural beauty that surrounds our village through these stunning captures of
                    rhododendron blooms,
                    scenic trails, and breathtaking mountain landscapes.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="h-64 rhododendron-1 relative">
                        <div class="absolute inset-0">
                            <img src="assets/img/Places/Netarhat.png" alt="" class="h-full w-full">
                        </div>
                    </div>
                </div>
                <div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="h-64 rhododendron-1 relative">
                        <div class="absolute inset-0">
                            <img src="assets/img/Places/Betla_National_Park.png" alt="" class="h-full w-full">
                        </div>
                    </div>
                </div>
                <div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="h-64 rhododendron-1 relative">
                        <div class="absolute inset-0">
                            <img src="assets/img/Places/Hundru_Falls.png" alt="" class="h-full w-full">
                        </div>
                    </div>
                </div>
                <div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="h-64 rhododendron-1 relative">
                        <div class="absolute inset-0">
                            <img src="assets/img/Places/Jonha_Falls.png" alt="" class="h-full w-full">
                        </div>
                    </div>
                </div>
                <div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="h-64 rhododendron-1 relative">
                        <div class="absolute inset-0">
                            <img src="assets/img/Places/Parasnath_Hill.png" alt="" class="h-full w-full">
                        </div>
                    </div>
                </div>
                <div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="h-64 rhododendron-1 relative">
                        <div class="absolute inset-0">
                            <img src="assets/img/Places/Patratu_Valley.png" alt="" class="h-full w-full">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Facilities & Services -->
    <!-- <section id="facilities" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Explore <span class="text-green-600">Facilities &
                        Services</span></h2>
                <div class="w-24 h-1 orange-gradient mx-auto mb-8"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="service-card">
                    <div class="flex items-start space-x-6">
                        <div class="w-32 h-24 rounded-lg flex-shrink-0"><img src="../userhome/img/Btfly.jpg" alt="">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-semibold text-gray-900 mb-3">Parking</h3>
                            <div class="grid md:grid-cols-2 gap-4 text-sm text-gray-600">
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-2">Parking Features:</h4>
                                    <ul class="space-y-1">
                                        <li>• 24/7 security monitoring</li>
                                        <li>• All vehicle types welcome</li>
                                        <li>• Easy access to village center</li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-2">Services:</h4>
                                    <ul class="space-y-1">
                                        <li>• Free parking for guests</li>
                                        <li>• Attendant assistance available</li>
                                        <li>• Clean restroom facilities nearby</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Safety & Emergency Services -->
    <!-- <section class="section-bg py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Safety & <span class="text-red-600">Emergency
                        Services</span></h2>
                <div class="w-24 h-1 orange-gradient mx-auto mb-8"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="emergency-card rounded-2xl p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-red-500 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-900">Patrol & Emergency Services</h3>
                    </div>
                    <p class="text-gray-700 mb-6 text-lg">
                        Round-the-clock emergency response team with trained professionals ready to assist visitors in
                        any emergency situation
                        during their exploration of the rhododendron wonderland.
                    </p>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-white/60 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-2">Emergency Response</h4>
                            <ul class="space-y-1 text-sm text-gray-700">
                                <li>• 24/7 emergency hotline</li>
                                <li>• Rapid response team</li>
                                <li>• Mountain rescue specialists</li>
                            </ul>
                        </div>
                        <div class="bg-white/60 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-2">Safety Measures</h4>
                            <ul class="space-y-1 text-sm text-gray-700">
                                <li>• First aid stations on trails</li>
                                <li>• Weather monitoring</li>
                                <li>• Emergency communication</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="health-card rounded-2xl p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-blue-500 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h1a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-900">Health & Medical Facilities</h3>
                    </div>
                    <p class="text-gray-700 mb-6 text-lg">
                        Comprehensive medical facilities and trained healthcare professionals available to handle any
                        health concerns
                        or medical emergencies that may arise during your visit.
                    </p>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-white/60 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-2">Medical Services</h4>
                            <ul class="space-y-1 text-sm text-gray-700">
                                <li>• On-site medical clinic</li>
                                <li>• Qualified medical staff</li>
                                <li>• Basic medical supplies</li>
                            </ul>
                        </div>
                        <div class="bg-white/60 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-2">Emergency Care</h4>
                            <ul class="space-y-1 text-sm text-gray-700">
                                <li>• Emergency evacuation</li>
                                <li>• Ambulance services</li>
                                <li>• Hospital coordination</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Accommodation & Eateries -->
    <section id="accommodation" class="py-20 section-bg2">
        <div class="max-w-5xl mx-auto group px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Accommodation & <span
                        class="text-green-600">Eateries</span></h2>
                <div class="w-24 h-1 orange-gradient mx-auto mb-8 group-hover:w-64 transition-all duration-300"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="h-64"><img src="assets/img/Places/Betla_National_Park.png" alt="" class="h-full w-full">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Homestays</h3>
                        <p class="text-gray-600 mb-4">
                            Experience authentic local hospitality in our comfortable homestays. Enjoy traditional
                            mountain architecture,
                            warm hospitality, and stunning views of the surrounding rhododendron forests.
                        </p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-lg font-semibold text-green-600">From ₹1,500/night</span>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <span class="text-sm text-gray-600">4.8 (124 reviews)</span>
                            </div>
                        </div>
                        <button
                            class="w-full nature-gradient text-white px-4 py-3 rounded-lg font-medium hover:shadow-lg transition-all duration-300">
                            Book Homestay
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="h-64"><img src="assets/img/Places/Jonha_Falls.png" alt="" class="h-full w-full"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Local Eateries</h3>
                        <p class="text-gray-600 mb-4">
                            Savor authentic local cuisine prepared with fresh mountain ingredients. Our eateries offer
                            traditional dishes
                            and modern comfort food with panoramic valley views.
                        </p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-lg font-semibold text-orange-600">Open 6AM - 10PM</span>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <span class="text-sm text-gray-600">4.7 (89 reviews)</span>
                            </div>
                        </div>
                        <button id="openModalBtn"
                            class="w-full orange-gradient text-white px-4 py-3 rounded-lg font-medium hover:shadow-lg transition-all duration-300">
                            Stay At Hotel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="modalBackdrop"
        class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black bg-opacity-50 modal-backdrop">
        <!-- Modal Content -->
        <div id="modalContent"
            class="modal-content relative w-full max-w-2xl bg-white rounded-xl modal-shadow max-h-[55vh]">
            <!-- Header -->
            <div class="gradient-header rounded-t-xl p-4 text-white relative">
                <!-- Close Button -->
                <button id="closeModalBtn"
                    class="absolute top-4 right-4 p-2 rounded-full hover:bg-white hover:bg-opacity-20 transition-colors duration-200"
                    aria-label="Close modal">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6L6 18M6 6l12 12" />
                    </svg>
                </button>

                <h2 class="text-xl font-bold mb-2">Salakha Homestay</h2>
                <div class="flex items-center gap-2 text-white text-opacity-90">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                        <circle cx="12" cy="10" r="3" />
                    </svg>
                    <span class="text-sm">Okhrey 10th mile west Jharkhand, India</span>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6 overflow-y-auto max-h-[40vh]">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-5 h-5 bg-blue-500 rounded-sm flex items-center justify-center">
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                    </div>
                    <h3 class="font-semibold text-gray-800">Amenities</h3>
                </div>

                <ul id="amenitiesList" class="grid grid-cols-2 gap-3"></ul>
            </div>
        </div>
    </div>

    <!-- How to Reach -->
    <section id="reach" class="section-bg2 py-20">
        <div class="max-w-7xl mx-auto px-4 group sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">How to <span class="text-green-600">Reach</span></h2>
                <div class="w-24 h-1 orange-gradient mx-auto mb-8 group-hover:w-64 transition-all duration-300"></div>
            </div>

            <!-- Mapbox Token Input -->
            <div id="mapbox-token-section" class="mapbox-token-input mb-8">
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-4">
                    <h3 class="text-lg font-semibold text-yellow-800 mb-2">Interactive Map Setup</h3>
                    <p class="text-yellow-700 mb-4">
                        To display the interactive map, please enter your Mapbox public token.
                        You can get one free at <a href="https://mapbox.com/" target="_blank"
                            class="text-blue-600 underline">mapbox.com</a>
                    </p>
                    <div class="flex gap-4">
                        <input type="text" id="mapbox-token" placeholder="Enter your Mapbox public token (pk.ey...)"
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <button id="load-map-btn"
                            class="nature-gradient text-white px-6 py-2 rounded-lg font-medium hover:shadow-lg transition-all duration-300">
                            Load Map
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 items-start">
                <div class="bg-white rounded-2xl p-6 shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 4m0 13V4m-6 3l6-3">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900">By Road</h3>
                    </div>
                    <p class="text-gray-600 mb-4">
                        Hulley Village is well-connected by road with regular transportation services and private
                        vehicle access
                        through scenic mountain routes.
                    </p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>• <strong>Distance from Darjeeling:</strong> 32 km</li>
                        <li>• <strong>Drive time:</strong> 1.5 hours via Sukhia-Pokhri</li>
                        <li>• <strong>Shared taxi:</strong> Available from Darjeeling</li>
                        <li>• <strong>Private vehicles:</strong> Road accessible year-round</li>
                    </ul>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900">Location Details</h3>
                    </div>
                    <p class="text-gray-600 mb-4">
                        Detailed coordinates and directions for easy navigation to our beautiful mountain village.
                    </p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>• <strong>Latitude:</strong> 27.0238° N</li>
                        <li>• <strong>Longitude:</strong> 88.2636° E</li>
                        <li>• <strong>Altitude:</strong> 2,500 meters (8,202 ft)</li>
                        <li>• <strong>Nearest town:</strong> Darjeeling (32 km)</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- What's New -->
    <section id="points" class="section-bg2 py-20">
        <div class="max-w-7xl mx-auto px-4 group sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Explore<span class="text-green-600"> What’s
                        Nearby</span></h2>
                <div class="w-24 h-1 orange-gradient mx-auto mb-8 group-hover:w-64 transition-all duration-300"></div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 p-6 bg-gray-50">
                <!-- Destination Card -->
                <div class="destination-card card rounded-2xl overflow-hidden shadow-md bg-white transition-al duration-300">
                    <div class="flex h-auto flex-col maincard">

                        <!-- Left Image Section -->
                        <div class="relative w-full max-h-64 flex-shrink-0 overflow-hidden">
                            <img src="./assets/img/Places/Patratu_Valley.png" alt="Sample Destination"
                                class="w-full h-full object-cover max-h-[29vh]" />

                            <!-- Category Tag -->
                            <div
                                class="absolute category top-3 left-3 bg-green-500 px-3 py-1.5 rounded-lg text-xs font-semibold text-white shadow-md">
                                Natural
                            </div>
                        </div>

                        <!-- Right Content Section -->
                        <div class="flex-1 p-3 flex flex-col justify-between">
                            <!-- Title + Explore Button -->
                            <div class="flex items-start justify-between mb-4">
                                <h3 class="text-xl font-bold leading-tight hover:text-primary transition-colors">
                                    Sample Place
                                </h3>
                                <button
                                    class="flex items-center gap-2 px-2 py-1 rounded-lg text-sm font-semibold shadow-md flex-shrink-0 border-2 border-gray-300 hover:scale-105 transition-all duration-150 text-gray-800">
                                    Explore
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12,5 19,12 12,19"></polyline>
                                    </svg>
                                </button>
                            </div>

                            <!-- Description -->
                            <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">
                                This is a sample description of the destination. It provides a quick
                                overview of the place and what makes it special
                            </p>

                            <!-- Bottom Info -->
                            <div class="space-y-1">
                                <div
                                    class="flex justify-between text-xs font-bold text-gray-500 uppercase tracking-wide">
                                    <span class="w-1/3">Location</span>
                                    <span class="w-1/3 text-center">Best Time</span>
                                    <span class="w-1/3 text-right">Duration</span>
                                </div>

                                <div class="flex justify-between text-sm font-semibold text-gray-800">
                                    <span class="w-1/3">Near Ranchi</span>
                                    <span class="w-1/3 text-center">Mar - May</span>
                                    <span class="w-1/3 text-right">2-4 Days</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><div class="destination-card card rounded-2xl overflow-hidden shadow-md bg-white transition-al duration-300">
                    <div class="flex h-auto flex-col maincard">

                        <!-- Left Image Section -->
                        <div class="relative w-full max-h-64 flex-shrink-0 overflow-hidden">
                            <img src="./assets/img/Places/Hundru_Falls.png" alt="Sample Destination"
                                class="w-full h-full object-cover max-h-[29vh]" />

                            <!-- Category Tag -->
                            <div
                                class="absolute category top-3 left-3 bg-green-500 px-3 py-1.5 rounded-lg text-xs font-semibold text-white shadow-md">
                                Natural
                            </div>
                        </div>

                        <!-- Right Content Section -->
                        <div class="flex-1 p-3 flex flex-col justify-between">
                            <!-- Title + Explore Button -->
                            <div class="flex items-start justify-between mb-4">
                                <h3 class="text-xl font-bold leading-tight hover:text-primary transition-colors">
                                    Sample Place
                                </h3>
                                <button
                                    class="flex items-center gap-2 px-2 py-1 rounded-lg text-sm font-semibold shadow-md flex-shrink-0 border-2 border-gray-300 hover:scale-105 transition-all duration-150 text-gray-800">
                                    Explore
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12,5 19,12 12,19"></polyline>
                                    </svg>
                                </button>
                            </div>

                            <!-- Description -->
                            <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">
                                This is a sample description of the destination. It provides a quick
                                overview of the place and what makes it special
                            </p>

                            <!-- Bottom Info -->
                            <div class="space-y-1">
                                <div
                                    class="flex justify-between text-xs font-bold text-gray-500 uppercase tracking-wide">
                                    <span class="w-1/3">Location</span>
                                    <span class="w-1/3 text-center">Best Time</span>
                                    <span class="w-1/3 text-right">Duration</span>
                                </div>

                                <div class="flex justify-between text-sm font-semibold text-gray-800">
                                    <span class="w-1/3">Near Ranchi</span>
                                    <span class="w-1/3 text-center">Mar - May</span>
                                    <span class="w-1/3 text-right">2-4 Days</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><div class="destination-card card rounded-2xl overflow-hidden shadow-md bg-white transition-al duration-300">
                    <div class="flex h-auto flex-col maincard">

                        <!-- Left Image Section -->
                        <div class="relative w-full max-h-64 flex-shrink-0 overflow-hidden">
                            <img src="./assets/img/Places/Betla_National_Park.png" alt="Sample Destination"
                                class="w-full h-full object-cover max-h-[29vh]" />

                            <!-- Category Tag -->
                            <div
                                class="absolute category transition-all duration-150 top-3 left-3 bg-adventure px-3 py-1.5 rounded-lg text-xs font-semibold text-white shadow-md">
                                Adventure
                            </div>
                        </div>

                        <!-- Right Content Section -->
                        <div class="flex-1 p-3 flex flex-col justify-between">
                            <!-- Title + Explore Button -->
                            <div class="flex items-start justify-between mb-4">
                                <h3 class="text-xl font-bold leading-tight hover:text-primary transition-colors">
                                    Sample Place
                                </h3>
                                <button
                                    class="flex items-center gap-2 px-2 py-1 rounded-lg text-sm font-semibold shadow-md flex-shrink-0 border-2 border-gray-300 hover:scale-105 transition-all duration-150 text-gray-800">
                                    Explore
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12,5 19,12 12,19"></polyline>
                                    </svg>
                                </button>
                            </div>

                            <!-- Description -->
                            <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">
                                This is a sample description of the destination. It provides a quick
                                overview of the place and what makes it special
                            </p>

                            <!-- Bottom Info -->
                            <div class="space-y-1">
                                <div
                                    class="flex justify-between text-xs font-bold text-gray-500 uppercase tracking-wide">
                                    <span class="w-1/3">Location</span>
                                    <span class="w-1/3 text-center">Best Time</span>
                                    <span class="w-1/3 text-right">Duration</span>
                                </div>

                                <div class="flex justify-between text-sm font-semibold text-gray-800">
                                    <span class="w-1/3">Near Ranchi</span>
                                    <span class="w-1/3 text-center">Mar - May</span>
                                    <span class="w-1/3 text-right">2-4 Days</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <?php
        include("includes/footer.php");
    ?>
    <script>
        let map = null;

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                navbar.classList.add('nav-sticky');
            } else {
                navbar.classList.remove('nav-sticky');
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    mobileMenu.classList.add('hidden');
                }
            });
        });

        // Mapbox Map functionality
        function initializeMap(accessToken) {
            if (!accessToken) return;

            try {
                // Show the map container and hide placeholder
                document.getElementById('map').style.display = 'block';
                document.getElementById('map-placeholder').style.display = 'none';

                mapboxgl.accessToken = accessToken;

                map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/outdoors-v12',
                    center: [88.2636, 27.0238], // Hulley Village coordinates
                    zoom: 12,
                    pitch: 45,
                });

                // Add navigation controls
                map.addControl(new mapboxgl.NavigationControl());

                // Add marker for Hulley Village
                new mapboxgl.Marker({ color: '#dc2626' })
                    .setLngLat([88.2636, 27.0238])
                    .setPopup(new mapboxgl.Popup().setHTML('<h3>Hulley Village</h3><p>Gateway to Rhododendron Wonderland</p>'))
                    .addTo(map);

                // Add marker for Darjeeling
                new mapboxgl.Marker({ color: '#059669' })
                    .setLngLat([88.2627, 27.0410])
                    .setPopup(new mapboxgl.Popup().setHTML('<h3>Darjeeling</h3><p>Nearest major town (32 km)</p>'))
                    .addTo(map);

                // Hide the token input section
                document.getElementById('mapbox-token-section').style.display = 'none';

            } catch (error) {
                console.error('Error initializing map:', error);
                alert('Error loading map. Please check your Mapbox token.');
            }
        }

        // Load map button event
        document.getElementById('load-map-btn').addEventListener('click', () => {
            const token = document.getElementById('mapbox-token').value.trim();
            if (token.startsWith('pk.')) {
                initializeMap(token);
                // Store token in localStorage for future visits
                localStorage.setItem('mapbox-token', token);
            } else {
                alert('Please enter a valid Mapbox public token (starts with pk.)');
            }
        });

        // Check for stored token on page load
        document.addEventListener('DOMContentLoaded', () => {
            const storedToken = localStorage.getItem('mapbox-token');
            if (storedToken) {
                document.getElementById('mapbox-token').value = storedToken;
                initializeMap(storedToken);
            } else {
                // Show token input section if no stored token
                document.getElementById('mapbox-token-section').classList.add('show');
            }
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all sections and cards
        document.querySelectorAll('section, .card-hover, .service-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });

        // Enhanced card hover effects
        document.querySelectorAll('.card-hover').forEach(card => {
            card.addEventListener('mouseenter', function () {
                this.style.transform = 'translateY(-12px) scale(1.02)';
            });

            card.addEventListener('mouseleave', function () {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Simple parallax effect for hero background
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('#home');
            if (hero && scrolled < window.innerHeight) {
                hero.style.transform = `translateY(${scrolled * 0.3}px)`;
            }
        });

        // Add some interactive effects to service cards
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('mouseenter', function () {
                this.style.transform = 'translateY(-6px)';
                this.style.boxShadow = '0 20px 40px -12px rgba(0, 0, 0, 0.15)';
            });

            card.addEventListener('mouseleave', function () {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';
            });
        });
    </script>
    <script>
        // Get DOM elements
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const modalContent = document.getElementById('modalContent');

        // Open modal function
        function openModal() {
            modalBackdrop.classList.remove('hidden');
            modalBackdrop.classList.add('flex');
            // Add animation class after a brief delay
            setTimeout(() => {
                modalBackdrop.classList.add('modal-open');
            }, 10);
        }

        // Close modal function
        function closeModal() {
            modalBackdrop.classList.remove('modal-open');
            // Hide modal after animation completes
            setTimeout(() => {
                modalBackdrop.classList.add('hidden');
                modalBackdrop.classList.remove('flex');
            }, 300);
        }

        // Event listeners
        openModalBtn.addEventListener('click', openModal);
        closeModalBtn.addEventListener('click', closeModal);

        // Close modal when clicking outside of it
        modalBackdrop.addEventListener('click', function (e) {
            if (e.target === modalBackdrop) {
                closeModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !modalBackdrop.classList.contains('hidden')) {
                closeModal();
            }
        });
    </script>
    <script>
        // Your amenities list
        const amenities = [
            "Parking",
            "Wi-Fi",
            "Hot Water",
            "Room Service",
            "Breakfast",
            "Power Backup",
            "TV",
            "Laundry",
            "Swimming Pool",
            "Restaurant"
        ];

        const amenitiesList = document.getElementById("amenitiesList");

        amenities.forEach(item => {
            amenitiesList.innerHTML += `
      <li class="flex items-center gap-3 group border-2 border-[#0e857f] p-2 bg-[#89e2db48] rounded-md">
        <div class="flex-shrink-0 w-5 h-5 rounded-sm amenity-check flex items-center justify-center">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 6L9 17l-5-5" />
          </svg>
        </div>
        <span class="text-sm text-[#000000ab] group-hover:text-[#000000] transition-colors text-xl duration-200">${item}</span>
      </li>`;
        });
    </script>
</body>