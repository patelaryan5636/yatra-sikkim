<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jharkhand's Most Visited Destinations</title>
    <meta name="description"
        content="Explore Jharkhand's breathtaking landscapes - from towering mountains to serene lakes and ancient monasteries.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2Pkf6t1QjwqWiMzMKi1e0MZt9DSCzUrtWvC2TbZj+9p0ua3r3r1N5x7w2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS -->
    <style>
        * {
            transition: all ease 0.3s;
        }

        body {
            background-color: white;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 40 40'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23369e85' fill-opacity='0.1'%3E%3Cpath d='M0 38.59l2.83-2.83 1.41 1.41L1.41 40H0v-1.41zM0 1.4l2.83 2.83 1.41-1.41L1.41 0H0v1.41zM38.59 40l-2.83-2.83 1.41-1.41L40 38.59V40h-1.41zM40 1.41l-2.83 2.83-1.41-1.41L38.59 0H40v1.41zM20 18.6l2.83-2.83 1.41 1.41L21.41 20l2.83 2.83-1.41 1.41L20 21.41l-2.83 2.83-1.41-1.41L18.59 20l-2.83-2.83 1.41-1.41L20 18.59z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        :root {
            --background: white;
            --foreground: 215 28% 17%;
            --card: 0 0% 100%;
            --card-foreground: 215 28% 17%;
            --primary: 217 91% 60%;
            --primary-foreground: 0 0% 100%;
            --primary-hover: 217 91% 50%;
            --secondary: 142 76% 36%;
            --secondary-foreground: 0 0% 100%;
            --muted: 220 14% 96%;
            --muted-foreground: 220 9% 46%;
            --accent: 25 95% 53%;
            --accent-foreground: 0 0% 100%;
            --heritage: 300 100% 25.1%;
            --heritage-foreground: 0 0% 100%;
            --natural: 142 76% 36%;
            --natural-foreground: 0 0% 100%;
            --historical: 60 64% 30%;
            --historical-foreground: 0 0% 100%;
            --adventure: 0 100% 30%;
            --transition-all: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            color: hsl(var(--foreground));
        }

        .card {
            background-color: hsl(var(--card));
            color: hsl(var(--card-foreground));
        }

        .btn-primary {
            background-color: hsl(var(--primary));
            color: hsl(var(--primary-foreground));
            transition: var(--transition-all);
        }

        .btn-primary:hover {
            background-color: hsl(var(--primary-hover));
            transform: scale(1.05);
        }

        .text-primary {
            color: hsl(var(--primary));
        }

        .text-muted {
            color: hsl(var(--muted-foreground));
        }

        .bg-natural {
            background-color: hsl(var(--natural));
            color: hsl(var(--natural-foreground));
        }

        .bg-heritage {
            background-color: hsl(var(--heritage));
            color: hsl(var(--heritage-foreground));
        }

        .bg-historical {
            background-color: hsl(var(--historical));
            color: hsl(var(--historical-foreground));
        }

        .bg-adventure {
            background-color: hsl(var(--adventure));
            color: white;
        }

        .bor-natural {
            border-color: hsl(var(--natural) /0.4);
        }

        .bor-heritage {
            border-color: hsl(var(--heritage) /0.4);
        }

        .bor-historical {
            border-color: hsl(var(--historical) /0.4);
        }

        .bor-adventure {
            border-color: hsl(var(--adventure)/ 0.4);
        }

        .btn-natural:hover {
            background-color: hsl(var(--natural) / 0.1);
            /* slightly transparent bg */
            color: hsl(var(--natural));
            /* text color */
        }

        .btn-heritage:hover {
            background-color: hsl(var(--heritage) / 0.1);
            color: hsl(var(--heritage));
        }

        .btn-historical:hover {
            background-color: hsl(var(--historical) / 0.1);
            color: hsl(var(--historical));
        }

        .btn-adventure:hover {
            background-color: hsl(var(--adventure) / 0.1);
            color: hsl(var(--adventure));
        }

        .filter-pill {
            transition: var(--transition-all);
        }

        .filter-pill:hover {
            transform: translateY(-2px);
        }

        .filter-pill.active {
            background-color: hsl(var(--primary));
            color: hsl(var(--primary-foreground));
            transform: scale(1.05);
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

        @keyframes gradient-rotate {
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

        .animated-gradient {
            background-size: 300% 300%;
            /* allows smooth color flow */
            animation: gradient-rotate 3s linear infinite;
        }
    </style>
</head>

<body>
    <div class="min-h-screen">
        <!-- Header -->
        <div class="max-w-7xl mx-auto px-6 py-12 ">
            <div class="mb-12 text-center md:text-left lg:text-left">
                <div class="inline-block px-6 py-2 rounded-full text-sm font-semibold mb-6 shadow-lg 
        bg-gradient-to-r from-pink-300/20 via-red-300/20 via-yellow-200/20 via-green-300/20 to-blue-300/20 
        text-gray-800 animated-gradient">
                    Most Visited Destinations
                </div>

                <h1 class="text-5xl font-bold mb-6 leading-tight">
                    Unveiling Jharkhand's
                    <span class="bg-gradient-to-r from-pink-500 via-red-500 via-yellow-400 via-green-400 to-blue-500 
            bg-clip-text text-transparent animated-gradient">
                        Most Visited
                    </span>
                    Wonders
                </h1>

                <p class="text-muted max-w-full mx-auto text-xl leading-relaxed">
                    Explore Jharkhand's breathtaking landscapes - from towering mountains to serene
                    lakes and ancient monasteries. Discover the top destinations that capture the
                    heart and soul of this Himalayan paradise.
                </p>
            </div>

            <!-- Filter Pills -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-12 items-stretch">

                <button class="h-full cursor-auto flex items-center gap-4 justify-center px-6 py-3 rounded-full font-semibold shadow-md card 
           bg-gradient-to-r from-pink-200/20 via-yellow-200/20 via-green-200/20 to-blue-200/20 
           animated-gradient">
                    <div class="w-3 h-3 rounded-full bg-white flex items-center">
                        <i class="fa-solid fa-map-location-dot" style="color: #56deb5;"></i>
                    </div>
                    <span>Top Destinations</span>
                </button>

                <button class="h-full cursor-auto flex items-center gap-4 justify-center px-6 py-3 rounded-full font-semibold shadow-md card 
           bg-gradient-to-r from-pink-200/20 via-yellow-200/20 via-green-200/20 to-blue-200/20 
           animated-gradient">
                    <div class="w-3 h-3 rounded-full flex items-center">
                        <i class="fa-solid fa-mountain" style="color: #56deb5;"></i>
                    </div>
                    <span>Majestic Mountains</span>
                </button>

                <button class="h-full cursor-auto flex items-center gap-4 justify-center px-6 py-3 rounded-full font-semibold shadow-md card 
           bg-gradient-to-r from-pink-200/20 via-yellow-200/20 via-green-200/20 to-blue-200/20 
           animated-gradient">
                    <div class="w-3 h-3 rounded-full flex items-center">
                        <i class="fa-solid fa-water" style="color: #56deb5;"></i>
                    </div>
                    <span>Sacred Lakes</span>
                </button>

                <button class="h-full cursor-auto flex items-center gap-4 justify-center px-6 py-3 rounded-full font-semibold shadow-md card 
           bg-gradient-to-r from-pink-200/20 via-yellow-200/20 via-green-200/20 to-blue-200/20 
           animated-gradient">
                    <div class="w-3 h-3 rounded-full flex items-center">
                        <i class="fa-solid fa-landmark" style="color: #56deb5;"></i>
                    </div>
                    <span>Cultural Heritage</span>
                </button>

            </div>



            <!-- Cards Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" id="destinationGrid">
                <!-- Destinations will be populated by JavaScript -->
            </div>
        </div>
    </div>

    <script>
        // Destinations data
        const destinations = [
            {
                id: 1,
                title: "Netarhat",
                link: "./placedetail",
                description: "Netarhat, nestled in West Jharkhand's Soreng District, is a charming destination famous for its vibrant rhododendron forests that burst into color during spring. Serving as the gateway to the iconic Sandakphu-Phalut trek, Hilley offers stunning mountain views and peaceful village life.",
                image: "assets/img/places/Netarhat.png",
                location: "From Gangtok: Approx 120km",
                bestTime: "Mar - May",
                duration: "2-4 days",
                category: "Natural",
                categoryColor: "natural"
            },
            {
                id: 2,
                title: "Patratu Valley",
                link: "./placedetail",
                description: "Patratu Valley also known as Tathagata Tsal was built to commemorate the 2550th birth anniversary of Gautam Buddha. The park is home to majestic statue depicting the Dhyana Chakra Mudra, offering a peaceful spiritual experience surrounded by beautiful landscaped gardens.",
                image: "assets/img/places/Patratu_Valley.png",
                location: "Approx 15 km from Ravangla",
                bestTime: "Jan - Dec",
                duration: "2-4 hours",
                category: "Religious",
                categoryColor: "heritage"
            },
            {
                id: 3,
                title: "Hundru Falls",
                link: "./placedetail",
                description: "Hundru Falls or Old Silk Route in East Jharkhand, lies on the historic Silk Route linking Tibet to India. Famous for its winding roads with 32 hairpin bends and scenic beauty, Zuluk offers breathtaking sunrise views over Kanchenjunga and a glimpse into ancient trade history.",
                image: "assets/img/places/Hundru_Falls.png",
                location: "From Gangtok: 95 km",
                bestTime: "Nov - Feb",
                duration: "2-3 days",
                category: "Historical",
                categoryColor: "historical"
            },

            {
                id: 4,
                title: "Parasnath Hill",
                link: "./placedetail",
                description: "Parasnath Hill in West Jharkhand famous not just for tallest statue of Guru Padmasambhava at 137 feet but also, it has become famous for the glass skywalk that leads visitors to the statue. This glass skywalk offers thrilling views of the valley below and panoramic mountain vistas.",
                image: "assets/img/places/Parasnath_Hill.png",
                location: "From Gangtok: Approx 115km",
                bestTime: "Mar - May",
                duration: "1-2 days",
                category: "Adventure",
                categoryColor: "adventure"
            }
        ];

        // State management
        let activeFilter = 'Top Destinations';

        // Render destinations
        function renderDestinations() {
            const grid = document.getElementById('destinationGrid');
            grid.innerHTML = '';

            destinations.forEach(destination => {
                const card = document.createElement('div');
                card.className = 'destination-card card rounded-2xl overflow-hidden';

                card.innerHTML = `
                    <div class="flex h-auto flex-col sm:flex-row maincard">
                        <!-- Left Image Section -->
                        <div class="relative w-full sm:w-48 flex-shrink-0 overflow-hidden ">
                            <img 
                                src="${destination.image}"
                                alt="${destination.title}"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            />
                            
                            <!-- Category Tag -->
                            <div class="absolute top-3 left-3 bg-${destination.categoryColor} px-3 py-1.5 category rounded-lg text-xs font-semibold shadow-md">
                                ${destination.category}
                            </div>
                            
                            <!-- Location at bottom -->
                            <!-- <div class="absolute bottom-3 left-3 bg-black bg-opacity-50 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm font-medium">
                                Jharkhand, India
                            </div> -->
                        </div>

                        <!-- Right Content Section -->
                        <div class="flex-1 p-3 flex flex-col justify-between">
                            <!-- Title and Explore Button -->
                            <div class="flex items-start justify-between mb-4">
                                <h3 class="text-xl title font-bold leading-tight hover:text-primary transition-colors">
                                    ${destination.title}
                                </h3>
                                <a href="${destination.link}" class="flex items-center gap-2 px-2 py-1 rounded-lg text-sm font-semibold shadow-md flex-shrink-0 border-2 border-${destination.categoryColor} btn-${destination.categoryColor} bg-gradient-to-r from-pink-300/20 via-yellow-300/20 to-green-300/20 text-gray-800 lg:bg-transparent lg:text-inherit animated-gradient">
                                    Explore 
                                    <svg class="arrow-icon" viewBox="0 0 24 24">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12,5 19,12 12,19"></polyline>
                                    </svg>
                                </a>
                            </div>

                            <!-- Description -->
                            <p class="text-muted text-sm leading-relaxed mb-4 flex-1 line-clamp-3">
                                ${destination.description}
                            </p>

                            <!-- Bottom Info -->
                            <div class="space-y-1">
                                <div class="flex justify-between text-xs font-bold text-[15px]  text-gray-500 uppercase tracking-wide">
                                    <span class="w-1/3">Location</span>
                                    <span class="w-1/3 text-center">Best Time</span>
                                    <span class="w-1/3 text-right">Duration</span>
                                    </div>
                                    
                                    <!-- Values -->
                                    <div class="flex gap-1 text-[10px] justify-between text-sm font-semibold text-gray-800">
                                        <span class="w-1/3 text-left truncate">${destination.location}</span>
                                        <span class="w-1/3 text-center truncate">${destination.bestTime}</span>
                                        <span class="w-1/3 text-right truncate">${destination.duration}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                grid.appendChild(card);
            });
        }

        // Handle filter clicks

        // Initialize the app
        function init() {
            // Render destinations
            renderDestinations();

            // Add event listeners to filter buttons
            const filterButtons = document.querySelectorAll('.filter-pill');
            filterButtons.forEach(button => {
                button.addEventListener('click', handleFilterClick);
            });
        }

        // Run when DOM is loaded
        document.addEventListener('DOMContentLoaded', init);
    </script>
    <script src="https://kit.fontawesome.com/2f64f3b789.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"
        integrity="sha512-Bx9rA+f4q8v4AePOwiqkFsMkPIVx37pBTVX5weS4vqg6+o+tkz7+PlcTztH1ytLNKd/nWq3u0MLtY6pJr+xAqA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>