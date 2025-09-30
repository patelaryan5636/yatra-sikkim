<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Container</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'video-bg': 'hsl(240 10% 3.9%)',
                        'video-border': 'hsl(240 3.7% 15.9%)',
                        'primary': 'hsl(263.4 70% 50.4%)',
                        'background': 'hsl(240 10% 3.9%)',
                        'foreground': 'hsl(0 0% 98%)',
                        'muted-foreground': 'hsl(240 5% 64.9%)',
                        'card': 'hsl(240 10% 3.9%)',
                        'border': 'hsl(240 3.7% 15.9%)',
                        'accent': 'hsl(240 4.8% 95.9%)',
                    },
                    aspectRatio: {
                        '9/16': '9 / 16',
                    },
                    boxShadow: {
                        'video': '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
                    }
                }
            }
        }
    </script>
    <style>
        .main-video-container {
            background-color: #f8f6f4;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='52' height='52' viewBox='0 0 52 52'%3E%3Cpath fill='%23c4dfdf' fill-opacity='0.28' d='M0 17.83V0h17.83a3 3 0 0 1-5.66 2H5.9A5 5 0 0 1 2 5.9v6.27a3 3 0 0 1-2 5.66zm0 18.34a3 3 0 0 1 2 5.66v6.27A5 5 0 0 1 5.9 52h6.27a3 3 0 0 1 5.66 0H0V36.17zM36.17 52a3 3 0 0 1 5.66 0h6.27a5 5 0 0 1 3.9-3.9v-6.27a3 3 0 0 1 0-5.66V52H36.17zM0 31.93v-9.78a5 5 0 0 1 3.8.72l4.43-4.43a3 3 0 1 1 1.42 1.41L5.2 24.28a5 5 0 0 1 0 5.52l4.44 4.43a3 3 0 1 1-1.42 1.42L3.8 31.2a5 5 0 0 1-3.8.72zm52-14.1a3 3 0 0 1 0-5.66V5.9A5 5 0 0 1 48.1 2h-6.27a3 3 0 0 1-5.66-2H52v17.83zm0 14.1a4.97 4.97 0 0 1-1.72-.72l-4.43 4.44a3 3 0 1 1-1.41-1.42l4.43-4.43a5 5 0 0 1 0-5.52l-4.43-4.43a3 3 0 1 1 1.41-1.41l4.43 4.43c.53-.35 1.12-.6 1.72-.72v9.78zM22.15 0h9.78a5 5 0 0 1-.72 3.8l4.44 4.43a3 3 0 1 1-1.42 1.42L29.8 5.2a5 5 0 0 1-5.52 0l-4.43 4.44a3 3 0 1 1-1.41-1.42l4.43-4.43a5 5 0 0 1-.72-3.8zm0 52c.13-.6.37-1.19.72-1.72l-4.43-4.43a3 3 0 1 1 1.41-1.41l4.43 4.43a5 5 0 0 1 5.52 0l4.43-4.43a3 3 0 1 1 1.42 1.41l-4.44 4.43c.36.53.6 1.12.72 1.72h-9.78zm9.75-24a5 5 0 0 1-3.9 3.9v6.27a3 3 0 1 1-2 0V31.9a5 5 0 0 1-3.9-3.9h-6.27a3 3 0 1 1 0-2h6.27a5 5 0 0 1 3.9-3.9v-6.27a3 3 0 1 1 2 0v6.27a5 5 0 0 1 3.9 3.9h6.27a3 3 0 1 1 0 2H31.9z'%3E%3C/path%3E%3C/svg%3E");

        }

        @import url("https://fonts.cdnfonts.com/css/samarkan");

        .title {
            font-family: "Samarkan";
        }

        .video-hover:hover {
            transform: scale(1.02);
        }

        .gradient-primary {
            background: linear-gradient(135deg, hsl(263.4 70% 50.4%), hsl(263.4 70% 60.4%));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="min-h-screen">
    <div class="main-video-container pb-10">
        <div class="w-full max-w-7xl mx-auto p-6">
            <!-- Header -->
            <section>
                <h1 class="title font-bold text-gray-700 mb-2 text-5xl text-center mt-8"
                    style="font-family: 'Samarkan', sans-serif;">
                    Reel Moments
                </h1>
                <p class="text-gray-600 text-xl font-serif px-20 text-center">
                    Press play on a world of adventure. Experience the sights and sounds of our community's journeys,
                    captured in motion. From bustling cityscapes to tranquil nature, every clip tells a unique story.
                </p>

                <div class="flex justify-center items-center gap-5 mb-8 font-serif">
                    <div class="px-3 py-4 mt-3 bg-red-100 h-6 text-gray-600 font-medium rounded-lg flex items-center">
                        🎬 Cinematic Shorts
                    </div>
                    <div
                        class="px-3 py-4 mt-3 bg-yellow-100 h-6 text-gray-600 font-medium rounded-lg flex items-center">
                        🌍 Travel Vlogs
                    </div>
                    <div
                        class="px-3 py-4 mt-3 bg-indigo-100 h-6 text-gray-600 font-medium rounded-lg flex items-center">
                        🚀 Daily Adventures
                    </div>
                </div>
            </section>

            <!-- Video Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Video 1 -->
                <a href="https://www.instagram.com/sikkim.tourism?igsh=MWRrb2hoMXczMXZ2aQ==" target="_blank"
                    rel="noopener noreferrer">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-gray-900 shadow-video shadow-2xl transition-all duration-500 video-hover">
                        <div class="aspect-[9/16] relative">
                            <video class="w-full h-full object-cover" poster="/api/placeholder/360/640" muted autoplay
                                loop playsinline>
                                <source
                                    src="https://res.cloudinary.com/dwm1amavn/video/upload/v1759148700/Reel1_a51nrq.mp4"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </a>

                <a href="https://www.instagram.com/sikkim.tourism?igsh=MWRrb2hoMXczMXZ2aQ==" target="_blank"
                    rel="noopener noreferrer">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-gray-900 shadow-video shadow-2xl transition-all duration-500 video-hover">
                        <div class="aspect-[9/16] relative">
                            <video class="w-full h-full object-cover" poster="/api/placeholder/360/640" muted autoplay
                                loop playsinline>
                                <source
                                    src="https://res.cloudinary.com/dwm1amavn/video/upload/v1759148698/Reel2_smytay.mp4"
                                    type="video/mp4">
                            </video>
                        </div>
                    </div>
                </a>

                <a href="https://www.instagram.com/sikkim.tourism?igsh=MWRrb2hoMXczMXZ2aQ==" target="_blank"
                    rel="noopener noreferrer">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-gray-900 shadow-video shadow-2xl transition-all duration-500 video-hover">
                        <div class="aspect-[9/16] relative">
                            <video class="w-full h-full object-cover" poster="/api/placeholder/360/640" muted autoplay
                                loop playsinline>
                                <source
                                    src="https://res.cloudinary.com/dwm1amavn/video/upload/v1759148699/Reel3_n9rmrh.mp4"
                                    type="video/mp4">
                            </video>
                        </div>
                    </div>
                </a>

                <a href="https://www.instagram.com/sikkim.tourism?igsh=MWRrb2hoMXczMXZ2aQ==" target="_blank"
                    rel="noopener noreferrer">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-gray-900 shadow-video shadow-2xl transition-all duration-500 video-hover">
                        <div class="aspect-[9/16] relative">
                            <video class="w-full h-full object-cover" poster="/api/placeholder/360/640" muted autoplay
                                loop playsinline>
                                <source
                                    src="https://res.cloudinary.com/dwm1amavn/video/upload/v1759148700/Reel4_txlvch.mp4"
                                    type="video/mp4">
                            </video>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script>
        // Ensure videos play on load (some browsers require user interaction)
        document.addEventListener('DOMContentLoaded', function () {
            const videos = document.querySelectorAll('video');
            videos.forEach(video => {
                video.play().catch(e => {
                    console.log('Autoplay prevented:', e);
                });
            });
        });

        // Handle intersection observer for performance
        if ('IntersectionObserver' in window) {
            const videoObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    const video = entry.target;
                    if (entry.isIntersecting) {
                        video.play().catch(e => console.log('Play prevented:', e));
                    } else {
                        video.pause();
                    }
                });
            }, { threshold: 0.5 });

            document.querySelectorAll('video').forEach(video => {
                videoObserver.observe(video);
            });
        }
    </script>
</body>

</html>