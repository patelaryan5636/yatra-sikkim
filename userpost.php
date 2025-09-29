<?php 
  
    session_start();
    require_once 'includes/scripts/connection.php';  

// Fetch posts
$sql = "SELECT * FROM post_master ORDER BY post_id DESC";
$result = $conn->query($sql);

$posts = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Fetch username from second DB
        $userId = $row['post_upload_by'];
        $userResult = $conn->query("SELECT user_name FROM user_master WHERE user_id = '$userId' ");
        $userRow = $userResult->fetch_assoc();

        $row['username'] = $userRow ? $userRow['user_name'] : "Unknown User";
        unset($row['user_id']); // remove user_id if you don’t want it in JSON

        // Convert tags string → array
        $row['tags'] = array_filter([$row['post_tag1'], $row['post_tag2'], $row['post_tag3']]);
        $row['isLiked'] = false; // later you can add logic here

        $posts[] = [
            "id" => $row['post_id'],
            "username" => $row['username'],
            "image" => $row['post_img'],
            "description" => $row['post_desc'],
            "tags" => $row['tags'], 
            "likes" => $row['post_like'],
            "isLiked" => false // default, can update if user liked it
        ];
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <title>Social Feed - Share Your Moments</title>
    <meta name="description"
        content="A beautiful social media feed where you can share your favorite moments, photos, and stories with the community.">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        foreground: 'hsl(214 31% 18%)',
                        card: 'hsl(0 0% 100%)',
                        'card-foreground': 'hsl(214 31% 18%)',
                        primary: 'hsl(235 89% 60%)',
                        'primary-foreground': 'hsl(0 0% 100%)',
                        'primary-glow': 'hsl(235 89% 70%)',
                        secondary: 'hsl(240 25% 96%)',
                        'secondary-foreground': 'hsl(214 31% 18%)',
                        muted: 'hsl(240 25% 96%)',
                        'muted-foreground': 'hsl(220 14% 55%)',
                        accent: 'hsl(235 89% 95%)',
                        'accent-foreground': 'hsl(235 89% 30%)',
                        border: 'hsl(240 20% 92%)',
                        'like-heart': 'hsl(349 89% 60%)',
                        'like-heart-hover': 'hsl(349 89% 50%)',
                        'share-blue': 'hsl(210 89% 55%)',
                        'tag-bg': 'hsl(235 89% 95%)',
                        'tag-text': 'hsl(235 89% 40%)',
                    },
                    borderRadius: {
                        'custom': '0.75rem',
                    },
                    boxShadow: {
                        'card': '0 4px 20px -2px hsl(235 89% 60% / 0.08)',
                        'hover': '0 8px 30px -4px hsl(235 89% 60% / 0.15)',
                        'button': '0 2px 8px -1px hsl(235 89% 60% / 0.2)',
                    },
                    animation: {
                        'heart-beat': 'heartBeat 0.6s ease-in-out',
                        'fade-in-up': 'fadeInUp 0.3s ease-out',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #d6e4e4;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M54.627 0l.83.828-1.415 1.415L51.8 0h2.827zM5.373 0l-.83.828L5.96 2.243 8.2 0H5.374zM48.97 0l3.657 3.657-1.414 1.414L46.143 0h2.828zM11.03 0L7.372 3.657 8.787 5.07 13.857 0H11.03zm32.284 0L49.8 6.485 48.384 7.9l-7.9-7.9h2.83zM16.686 0L10.2 6.485 11.616 7.9l7.9-7.9h-2.83zm20.97 0l9.315 9.314-1.414 1.414L34.828 0h2.83zM22.344 0L13.03 9.314l1.414 1.414L25.172 0h-2.83zM32 0l12.142 12.142-1.414 1.414L30 .828 17.272 13.556l-1.414-1.414L28 0h4zM.284 0l28 28-1.414 1.414L0 2.544V0h.284zM0 5.373l25.456 25.455-1.414 1.415L0 8.2V5.374zm0 5.656l22.627 22.627-1.414 1.414L0 13.86v-2.83zm0 5.656l19.8 19.8-1.415 1.413L0 19.514v-2.83zm0 5.657l16.97 16.97-1.414 1.415L0 25.172v-2.83zM0 28l14.142 14.142-1.414 1.414L0 30.828V28zm0 5.657L11.314 44.97 9.9 46.386l-9.9-9.9v-2.828zm0 5.657L8.485 47.8 7.07 49.212 0 42.143v-2.83zm0 5.657l5.657 5.657-1.414 1.415L0 47.8v-2.83zm0 5.657l2.828 2.83-1.414 1.413L0 53.456v-2.83zM54.627 60L30 35.373 5.373 60H8.2L30 38.2 51.8 60h2.827zm-5.656 0L30 41.03 11.03 60h2.828L30 43.858 46.142 60h2.83zm-5.656 0L30 46.686 16.686 60h2.83L30 49.515 40.485 60h2.83zm-5.657 0L30 52.343 22.343 60h2.83L30 55.172 34.828 60h2.83zM32 60l-2-2-2 2h4zM59.716 0l-28 28 1.414 1.414L60 2.544V0h-.284zM60 5.373L34.544 30.828l1.414 1.415L60 8.2V5.374zm0 5.656L37.373 33.656l1.414 1.414L60 13.86v-2.83zm0 5.656l-19.8 19.8 1.415 1.413L60 19.514v-2.83zm0 5.657l-16.97 16.97 1.414 1.415L60 25.172v-2.83zM60 28L45.858 42.142l1.414 1.414L60 30.828V28zm0 5.657L48.686 44.97l1.415 1.415 9.9-9.9v-2.828zm0 5.657L51.515 47.8l1.414 1.413 7.07-7.07v-2.83zm0 5.657l-5.657 5.657 1.414 1.415L60 47.8v-2.83zm0 5.657l-2.828 2.83 1.414 1.413L60 53.456v-2.83zM39.9 16.385l1.414-1.414L30 3.658 18.686 14.97l1.415 1.415 9.9-9.9 9.9 9.9zm-2.83 2.828l1.415-1.414L30 9.313 21.515 17.8l1.414 1.413 7.07-7.07 7.07 7.07zm-2.827 2.83l1.414-1.416L30 14.97l-5.657 5.657 1.414 1.415L30 17.8l4.243 4.242zm-2.83 2.827l1.415-1.414L30 20.626l-2.828 2.83 1.414 1.414L30 23.456l1.414 1.414zM56.87 59.414L58.284 58 30 29.716 1.716 58l1.414 1.414L30 32.544l26.87 26.87z' fill='%23f8f6f4' fill-opacity='0.4' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        @import url("https://fonts.cdnfonts.com/css/samarkan");

        .title {
            font-family: "Samarkan";
        }

        /* Custom CSS Animations and Styles */
        @keyframes heartBeat {
            0% {
                transform: scale(1);
            }

            25% {
                transform: scale(1.2);
            }

            50% {
                transform: scale(1);
            }

            75% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .post-card {
            background: linear-gradient(145deg, hsl(0 0% 100%), hsl(240 25% 98%));
            box-shadow: 0 4px 20px -2px hsl(235 89% 60% / 0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .post-card:hover {
            box-shadow: 0 8px 30px -4px hsl(235 89% 60% / 0.15);
        }

        .like-button {
            color: hsl(220 14% 55%);
            transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            cursor: pointer;
        }

        .like-button:hover {
            color: hsl(349 89% 60%);
        }

        .like-button.liked {
            color: hsl(349 89% 60%);
            animation: heartBeat 0.6s ease-in-out;
        }

        .share-button {
            color: hsl(220 14% 55%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        .share-button:hover {
            color: hsl(210 89% 55%);
        }

        .post-tag {
            background: hsl(235 89% 95%);
            color: #518a8a;
        }

        .add-post-button {
            background: linear-gradient(135deg, hsl(235 89% 60%), hsl(260 89% 65%));
            box-shadow: 0 2px 8px -1px hsl(235 89% 60% / 0.2);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .add-post-button:hover {
            box-shadow: 0 8px 30px -4px hsl(235 89% 60% / 0.15);
        }

        .read-post-button {
            background: #518a8ac8;
            color: hsl(0 0% 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .read-post-button:hover {
            background: #518a8a;
        }

        .modal-backdrop {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }

        .fade-in {
            animation: fadeInUp 0.3s ease-out;
        }

        /* Toast Notification */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            background: hsl(0 0% 100%);
            border: 1px solid hsl(240 20% 92%);
            border-radius: 0.75rem;
            padding: 16px;
            box-shadow: 0 8px 30px -4px hsl(235 89% 60% / 0.15);
            z-index: 1000;
            transform: translateX(100%);
            transition: transform 0.3s ease-out;
        }

        .toast.show {
            transform: translateX(0);
        }

        /* Heart fill animation */
        .heart-fill {
            fill: hsl(349 89% 60%);
        }

        .truncate-3-lines {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
        }

        /* --- STYLES FOR THE NEW READ POST MODAL --- */
        @keyframes modalScaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .modal-backdrop {
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(8px);
        }

        .modal-content-container.open {
            animation: modalScaleIn 0.3s ease-out forwards;
        }

        .modal-content-container .content-inner {
            opacity: 0;
            /* Uses the existing fadeInUp animation */
            animation: fadeInUp 0.5s ease-out 0.2s forwards;
        }

        /* --- CSS FOR REVERSE CLOSE ANIMATION --- */
        @keyframes modalScaleOut {
            from {
                opacity: 1;
                transform: scale(1);
            }

            to {
                opacity: 0;
                transform: scale(0.95);
            }
        }

        .modal-content-container.closing {
            animation: modalScaleOut 0.3s ease-in forwards;
        }

        .share-story-button {
            /* UPDATED: Your new gradient */
            background: linear-gradient(145deg, hsl(170, 48%, 62%), hsl(199, 89%, 65%));
            color: white;
            font-weight: 600;
            padding: 0.75rem 2.5rem;
            border-radius: 9999px;
            /* UPDATED: Shadow color now matches the new gradient */
            box-shadow: 0 8px 25px -5px hsla(199, 89%, 65%, 0.4), 0 4px 10px -2px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .share-story-button:hover {
            transform: translateY(-2px) scale(1.02);
            /* UPDATED: Brighter gradient for hover effect */
            background: linear-gradient(145deg, hsl(170, 48%, 67%), hsl(199, 89%, 70%));
            /* UPDATED: Enhanced shadow color to match */
            box-shadow: 0 12px 35px -8px hsla(199, 89%, 65%, 0.5), 0 6px 15px -3px rgba(0, 0, 0, 0.15);
        }

        .share-story-button svg {
            color: white;
        }

        /* --- STYLES FOR CUSTOM FILE UPLOAD --- */
        .form-input-dragdrop {
            border-color: hsl(240 20% 92%);
            background-color: hsl(220, 33%, 98%);
            transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        .form-input-dragdrop.dragover {
            background-color: hsl(235, 89%, 97%);
            border-color: hsl(235, 89%, 60%);
        }

        /* Ensure all form inputs have borders and matching focus states */
        #modal .form-input,
        #modal .form-input-dragdrop {
            border: 1px solid hsl(240 20% 92%);
            /* Default border for all inputs */
            background-color: hsl(220, 33%, 97%);
            /* A light, cool gray */
            transition: all 0.2s ease-in-out;
        }

        #modal .form-input:focus,
        #modal .form-input-dragdrop:focus-within {
            /* focus-within for the drag-drop area */
            border-color: hsl(199, 89%, 65%);
            background-color: white;
            box-shadow: 0 0 0 3px hsla(199, 89%, 65%, 0.2);
        }

        /* Style for the drag-drop area when an image is present */
        .form-input-dragdrop.has-image {
            background-color: transparent;
            /* Or a very light overlay */
            border-color: hsl(199, 89%, 65%);
            /* Solid border once image is uploaded */
        }

        /* Text and icon over image preview */
        .form-input-dragdrop.has-image #uploadIcon,
        .form-input-dragdrop.has-image #imageUploadText {
            color: hsl(214 31% 18%);
            /* Make text/icon slightly darker for contrast */
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.7);
            /* Subtle shadow for readability */
        }

        /* Hide default dashed border when image is present */
        .form-input-dragdrop.has-image {
            border-style: solid;
        }
    </style>
</head>

<body class="min-h-screen">
    <?php include("includes/header.php"); ?>
    <!-- Posts Grid -->
    <section>
        <h1 class="title font-bold text-gray-700 mb-2 text-5xl text-center mt-12"
            style="font-family: 'Samarkan', sans-serif;">
            Community Chronicles
        </h1>
        <p class="text-gray-600 text-xl font-serif px-20 text-center">
            Dive into a vibrant tapestry of shared experiences. See the world through the eyes of our community, from
            breathtaking landscapes to hidden local gems. Share your own story and become a part of our collective
            journey.
        </p>

        <div class="flex justify-center items-center gap-5 mb-8 font-serif">
            <div class="px-3 py-4 mt-3 bg-blue-100 h-6 text-gray-600 font-medium rounded-lg flex items-center">
                📸 Stunning Photos
            </div>
            <div class="px-3 py-4 mt-3 bg-pink-100 h-6 text-gray-600 font-medium rounded-lg flex items-center">
                ✍️ Travel Stories
            </div>
            <div class="px-3 py-4 mt-3 bg-teal-100 h-6 text-gray-600 font-medium rounded-lg flex items-center">
                🗺️ Hidden Gems
            </div>
        </div>

        <div class="mt-8 text-center">
            <button  <?php if (!isset($_SESSION['Yatra_logedin_user_id'])) echo "disabled"; ?> onclick="openAddModal()" class="share-story-button">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Share Your Story
            </button>
        </div>
    </section>
    <div class="max-w-7xl mx-auto py-8">
        <div id="postsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Posts will be dynamically inserted here -->
        </div>

        <div id="emptyState" class="text-center py-12 hidden">
            <p class="text-lg" style="color: hsl(220 14% 55%);">No posts yet. Be the first to share something!</p>
        </div>
    </div>

    <!-- Add Post Modal -->
    <div id="modal" class="fixed inset-0 modal-backdrop flex items-center justify-center z-50 p-4 hidden">
        <div class="bg-white rounded-custom p-6 w-full max-w-md"
            style="box-shadow: 0 8px 30px -4px hsl(235 89% 60% / 0.15);">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold" style="color: hsl(214 31% 18%);">Add New Post</h2>
                <button onclick="closeAddModal()"
                    class="text-muted-foreground hover:text-card-foreground transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            
            
            <form method="post" action="userpost_process.php" id="postForm" class="p-6 space-y-6" enctype='multipart/form-data'>
                <div>
                    <label class="block text-sm font-medium mb-2 text-foreground">Upload Image</label>
                    <label for="imageUpload" id="imageDropzone"
                        class="form-input-dragdrop relative flex flex-col items-center justify-center w-full h-32 border-2 border-dashed rounded-lg cursor-pointer overflow-hidden">
                        <img id="imagePreview" src="" alt="Image Preview"
                            class="absolute inset-0 w-full h-full object-cover opacity-30 hidden" />
                        <div class="relative z-10 flex flex-col items-center justify-center pt-5 pb-6">
                            <svg id="uploadIcon" class="w-8 h-8 mb-3 text-muted-foreground" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            <p id="imageUploadText" class="mb-2 text-sm text-muted-foreground text-center"><span
                                    class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p id="fileName" class="text-xs text-green-600 font-semibold text-center"></p>
                        </div>
                        <input id="imageUpload" name="post_image"  type="file" class="hidden" accept="image/jpeg, image/jpg, image/png" required />
                    </label>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2 text-foreground">Description</label>
                    <textarea id="description" input="content" name="post_content"
                        class="form-input w-full px-4 py-2.5 rounded-lg resize-none focus:outline-none" rows="4"
                        placeholder="Write your post description..." required></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2 text-foreground">Tags</label>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <input type="text" id="tag1" name="tag1" class="form-input w-full px-4 py-2.5 rounded-lg focus:outline-none"
                            placeholder="Tag 1">
                        <input type="text" id="tag2"  name="tag2" class="form-input w-full px-4 py-2.5 rounded-lg focus:outline-none"
                            placeholder="Tag 2">
                        <input type="text" id="tag3" name="tag3" class="form-input w-full px-4 py-2.5 rounded-lg focus:outline-none"
                            placeholder="Tag 3">
                    </div>
                </div>

                <div class="flex space-x-4 pt-4">
                    <button type="button" onclick="closeModal()"
                        class="flex-1 px-4 py-2.5 rounded-lg transition-colors font-semibold text-muted-foreground hover:bg-gray-100">Cancel</button>
                    <button type="submit"
                        class="flex-1 add-post-button text-white px-4 py-2.5 rounded-lg font-semibold hover:scale-105 transition-transform">Add
                        Post</button>
                </div>
            </form>
        </div>
    </div>
    <div id="readPostModal" class="fixed inset-0 modal-backdrop flex items-center justify-center z-50 p-4 hidden">
        <div id="readPostModalContent"
            class="modal-content-container bg-white rounded-xl w-full max-w-3xl overflow-hidden shadow-2xl">
            <div class="h-80 bg-gray-200">
                <img id="modalPostImage" src="" alt="Post full image" class="w-full h-full object-cover">
            </div>

            <div class="p-8">
                <button id="closeReadPostModalBtnGlobal"
                    class="fixed top-6 right-6 z-50 text-white bg-black bg-opacity-20 p-2 rounded-full hover:bg-opacity-40 transition-colors hidden"
                    aria-label="Close modal">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>

                <div class="content-inner">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center mr-4"
                            style="background: linear-gradient(135deg, hsl(235 89% 60%), hsl(235 89% 70%));">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 id="modalPostUsername" class="font-bold text-lg" style="color: hsl(214 31% 18%);"></h3>
                        </div>
                    </div>

                    <div class="max-h-60 overflow-y-auto pr-2">
                        <p id="modalPostDescription" class="mb-6 leading-relaxed text-base"
                            style="color: hsl(220 14% 55%);"></p>
                    </div>

                    <div id="modalPostTags" class="flex flex-wrap gap-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Toast Container -->
    <div id="toastContainer"></div>
    <?php include("includes/footer.php"); ?>
    <script>
        // 1. DATA
        // let posts = [
        //     { 
        //         id: '1', 
        //         username: 'Sarah Johnson', 
        //         image: 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=500&h=300&fit=crop', 
        //         description: 'Just captured this breathtaking sunset at the beach! The colors were absolutely incredible tonight...', 
        //         tags: ['sunset', 'beach', 'photography'], 
        //         likes: 42, 
        //         isLiked: false, 
        //     },
        //     { 
        //         id: '2', 
        //         username: 'Alex Chen', 
        //         image: 'https://images.unsplash.com/photo-1511593358241-7eea1f3c84e5?w=500&h=300&fit=crop', 
        //         description: 'Exploring the mountains this weekend was such an adventure! The fresh air, stunning views, and peaceful silence make every step worth it...', 
        //         tags: ['hiking', 'mountains', 'adventure'], 
        //         likes: 28, 
        //         isLiked: true, 
        //     },
        //     { 
        //         id: '3', 
        //         username: 'Maria Garcia', 
        //         image: 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=500&h=300&fit=crop', 
        //         description: 'Tried a new recipe today and it turned out amazing! Cooking has become my new passion during weekends...', 
        //         tags: ['cooking', 'food', 'recipe'], 
        //         likes: 35, 
        //         isLiked: false, 
        //     },
        // ];

        let posts = <?php echo json_encode($posts, JSON_PRETTY_PRINT); ?>;
        console.log(posts);

        // 2. UTILITY FUNCTIONS
        function showToast(title, description) {
            const toast = document.createElement('div');
            toast.className = 'toast';
            toast.innerHTML = `<div class="font-semibold text-sm" style="color: hsl(214 31% 18%);">${title}</div><p class="text-sm mt-1" style="color: hsl(220 14% 55%);">${description}</p>`;
            document.getElementById('toastContainer').appendChild(toast);
            setTimeout(() => toast.classList.add('show'), 100);
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // 3. POST CARD & RENDERING LOGIC
        function createPostCard(post) {
            return `
            <div class="post-card flex flex-col justify-between rounded-custom p-5 fade-in" data-post-id="${post.id}">
                <div class="relative mb-4 overflow-hidden rounded-custom">
                    <img src="${post.image}" alt="Post image by ${post.username}" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-105">
                </div>
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center mr-3" style="background: linear-gradient(135deg, hsl(235 89% 60%), hsl(235 89% 70%));">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div><h3 class="font-semibold" style="color: hsl(214 31% 18%);">${post.username}</h3></div>
                </div>
                <p class="mb-4 leading-relaxed truncate-3-lines" style="color: hsl(220 14% 55%);">${post.description}</p>
                <div class="flex flex-wrap gap-2 mb-4">
                    ${post.tags.map(tag => `<span class="post-tag px-3 py-1 rounded-full text-sm font-medium">#${tag}</span>`).join('')}
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <button onclick="handleLike('${post.id}')" class="like-button ${post.isLiked ? 'liked' : ''} flex items-center space-x-2">
                            <svg class="w-5 h-5 ${post.isLiked ? 'heart-fill' : ''}" fill="${post.isLiked ? 'hsl(349 89% 60%)' : 'none'}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            <span class="text-sm font-medium">${post.likes}</span>
                        </button>
                        <button onclick="handleShare('${post.id}')" class="share-button flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path></svg>
                            <span class="text-sm font-medium">Share</span>
                        </button>
                    </div>
                    <button onclick="handleReadPost('${post.id}')" class="read-post-button px-4 py-2 rounded-custom text-sm font-medium">Read Post</button>
                </div>
            </div>
        `;
        }

        function renderPosts() {
            const postsGrid = document.getElementById('postsGrid');
            postsGrid.innerHTML = posts.map(post => createPostCard(post)).join('');
        }

        // 4. POST ACTION HANDLERS (Like, Share, Read)
        function handleLike(postId) {
            const post = posts.find(p => p.id === postId);
            if (!post) return;
            post.isLiked = !post.isLiked;
            post.likes += post.isLiked ? 1 : -1;
            const cardElement = document.querySelector(`.post-card[data-post-id="${postId}"]`);
            if (!cardElement) return;
            const likeButton = cardElement.querySelector('.like-button');
            const likeCountSpan = likeButton.querySelector('span');
            const svgIcon = likeButton.querySelector('svg');
            likeCountSpan.textContent = post.likes;
            if (post.isLiked) {
                likeButton.classList.add('liked');
                svgIcon.classList.add('heart-fill');
                svgIcon.setAttribute('fill', 'hsl(349 89% 60%)');
            } else {
                likeButton.classList.remove('liked');
                svgIcon.classList.remove('heart-fill');
                svgIcon.setAttribute('fill', 'none');
            }
        }

        function handleShare(postId) {
            navigator.clipboard.writeText(`${window.location.origin}/post/${postId}`).then(() => {
                showToast('Link Copied!', 'Post link has been copied to clipboard.');
            });
        }

        function handleReadPost(postId) {
            const post = posts.find(p => p.id === postId);
            if (post) {
                openReadPostModal(post);
            }
        }

        // 5. MODAL CONTROL FUNCTIONS
        function openAddModal() {
            document.getElementById('modal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('modal').classList.add('hidden');
            document.getElementById('postForm').reset();
            resetImageUpload(); // Reset the image preview
        }

        function openReadPostModal(post) {
            document.getElementById('modalPostImage').src = post.image;
            document.getElementById('modalPostUsername').textContent = post.username;
            document.getElementById('modalPostDescription').textContent = post.description;
            const tagsContainer = document.getElementById('modalPostTags');
            tagsContainer.innerHTML = post.tags.map(tag => `<span class="post-tag px-3 py-1 rounded-full text-sm font-medium">#${tag}</span>`).join('');
            const modal = document.getElementById('readPostModal');
            const modalContent = document.getElementById('readPostModalContent');
            document.getElementById('closeReadPostModalBtnGlobal').classList.remove('hidden');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => modalContent.classList.add('open'), 10);
        }

        function closeReadPostModal() {
            const modal = document.getElementById('readPostModal');
            const modalContent = document.getElementById('readPostModalContent');
            const globalCloseBtn = document.getElementById('closeReadPostModalBtnGlobal');
            modalContent.classList.remove('open');
            modalContent.classList.add('closing');
            globalCloseBtn.classList.add('hidden');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                modalContent.classList.remove('closing');
            }, 300);
        }

        // --- NEW: Function to reset the image upload state ---
        function resetImageUpload() {
            const imagePreview = document.getElementById('imagePreview');
            const fileNameDisplay = document.getElementById('fileName');
            const imageUploadText = document.getElementById('imageUploadText');
            const dropzone = document.getElementById('imageDropzone');

            imagePreview.classList.add('hidden');
            imagePreview.src = '';
            fileNameDisplay.textContent = '';
            imageUploadText.classList.remove('hidden');
            dropzone.classList.remove('has-image');
            document.getElementById('imageUpload').value = ''; // Clear the file input
        }

        // 6. EVENT LISTENERS (This runs once the page is loaded)
        document.addEventListener('DOMContentLoaded', function () {
            // Form Submission Logic
            document.getElementById('postForm').addEventListener('submit', function (e) {
                e.preventDefault(); // ⬅️ stop full page reload, keep JS in control

                const formData = new FormData(this); 
                // ⬅️ collects *all form inputs automatically* (description, tags, AND post_image)

                fetch('userpost_process.php', {
                    method: 'POST',
                    body: formData  // ⬅️ sends the actual file + fields to PHP
                })
                .then(res => res.text())
                .then(data => {
                    console.log(data); 
                    closeAddModal(); // ⬅️ only close after server responds
                    showToast('Post Submitted!','Please Refresh The Page To See Your Post'); // ⬅️ message comes from PHP result
                })
                .catch(err => {
                    console.error('Upload error:', err);
                    showToast('Error', 'Something went wrong while uploading.');
                });
            });

            // --- NEW: File Upload UI and Preview Logic ---
            const dropzone = document.getElementById('imageDropzone');
            const imageInput = document.getElementById('imageUpload');
            const imageUploadText = document.getElementById('imageUploadText');
            const fileNameDisplay = document.getElementById('fileName');
            const imagePreview = document.getElementById('imagePreview');

            imageInput.addEventListener('change', () => {
                if (imageInput.files.length > 0) {
                    const file = imageInput.files[0];
                    fileNameDisplay.textContent = file.name;
                    imageUploadText.classList.add('hidden');
                    dropzone.classList.add('has-image');
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        imagePreview.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    resetImageUpload();
                }
            });

            dropzone.addEventListener('dragover', (e) => { e.preventDefault(); dropzone.classList.add('dragover'); });
            dropzone.addEventListener('dragleave', () => { dropzone.classList.remove('dragover'); });
            dropzone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropzone.classList.remove('dragover');
                const files = e.dataTransfer.files;
                if (files.length > 0 && files[0].type.startsWith('image/')) {
                    imageInput.files = files;
                    imageInput.dispatchEvent(new Event('change'));
                }
            });

            // Modal Close Listeners
            const addPostModal = document.getElementById('modal');
            const readPostModal = document.getElementById('readPostModal');
            const closeReadPostBtn = document.getElementById('closeReadPostModalBtn');
            const globalCloseBtn = document.getElementById('closeReadPostModalBtnGlobal');

            addPostModal.addEventListener('click', function (e) { if (e.target === addPostModal) closeModal(); });
            if (closeReadPostBtn) closeReadPostBtn.addEventListener('click', closeReadPostModal);
            if (globalCloseBtn) globalCloseBtn.addEventListener('click', closeReadPostModal);
            if (readPostModal) readPostModal.addEventListener('click', function (e) { if (e.target === readPostModal) closeReadPostModal(); });

            // Keyboard Listener
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    if (!addPostModal.classList.contains('hidden')) closeModal();
                    if (!readPostModal.classList.contains('hidden')) closeReadPostModal();
                }
            });

            // Initial Render
            renderPosts();
        });
    </script>
</body>

</html>