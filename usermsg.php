<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Feedback & Complaints Hub</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
    crossorigin="anonymous"></script>
  <style>
    @import url("https://fonts.cdnfonts.com/css/samarkan");

    h1 {
      font-family: "Samarkan";
    }

    body {
      background-color: #f8f6f4;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='105' viewBox='0 0 80 105'%3E%3Cg fill-rule='evenodd'%3E%3Cg id='death-star' fill='%23c4dfdf' fill-opacity='0.3'%3E%3Cpath d='M20 10a5 5 0 0 1 10 0v50a5 5 0 0 1-10 0V10zm15 35a5 5 0 0 1 10 0v50a5 5 0 0 1-10 0V45zM20 75a5 5 0 0 1 10 0v20a5 5 0 0 1-10 0V75zm30-65a5 5 0 0 1 10 0v50a5 5 0 0 1-10 0V10zm0 65a5 5 0 0 1 10 0v20a5 5 0 0 1-10 0V75zM35 10a5 5 0 0 1 10 0v20a5 5 0 0 1-10 0V10zM5 45a5 5 0 0 1 10 0v50a5 5 0 0 1-10 0V45zm0-35a5 5 0 0 1 10 0v20a5 5 0 0 1-10 0V10zm60 35a5 5 0 0 1 10 0v50a5 5 0 0 1-10 0V45zm0-35a5 5 0 0 1 10 0v20a5 5 0 0 1-10 0V10z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    p::-webkit-scrollbar {
      width: 6px;
    }

    p::-webkit-scrollbar-track {
      background: transparent;
    }

    p::-webkit-scrollbar-thumb {
      background: #b0b0b0;
      border-radius: 10px;
    }

    p::-webkit-scrollbar-thumb:hover {
      background: #909090;
    }
  </style>
</head>

<body class="p-6">
  <div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-5xl font-bold text-gray-600">
        Feedback & Complaints Hub
      </h1>
      <button
        id="addCommentBtn"
        class="bg-[#c4dfdf] text-gray-600 px-4 py-2 rounded font-serif text-xl">
        + Add Your Experience
      </button>
    </div>

    <div
      id="commentsContainer"
      class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <div
        class="comment-card bg-gradient-to-br from-[#d4efef] to-[#f8f6f4] p-5 rounded-lg shadow-md border border-gray-200 relative hover:shadow-lg transition duration-300">
        <div class="flex items-center justify-between mb-3">
          <div class="flex items-center">
            <img
              src="krish.jpg"
              class="w-10 h-10 rounded-full mr-3 border border-gray-300" />
            <div>
              <span class="font-semibold text-gray-800 block">Krish Prajapati</span>
              <div class="text-gray-500 text-sm flex items-center">
                <i class="fas fa-clock mr-1"></i> March 22, 2025 - 10:30 AM
              </div>
            </div>
          </div>
        </div>

        <p
          class="text-gray-700 mb-4 max-h-24 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400">
          This is an amazing initiative! Can't wait to explore more. Lorem
          ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt
          urna at risus luctus, vitae facilisis eros tincidunt. Proin bibendum
          fermentum quam, eget aliquam orci aliquet nec. Cras volutpat felis
          non arcu gravida, non fermentum velit ullamcorper. Vestibulum et
          accumsan nisl.
        </p>

        <div class="flex items-center space-x-4">
          <button
            class="like-btn flex items-center text-gray-500 hover:text-red-600 transition duration-200"
            data-liked="false">
            <i class="fas fa-heart mr-1 h-6 w-6"></i>
            <span class="like-count h-6 w-6">12</span>
          </button>
          <button
            class="share-btn flex items-center text-gray-500 hover:text-blue-600 transition duration-200">
            <i class="fa-regular fa-share-from-square mr-2 h-6 w-6"></i>
            <span>Share</span>
          </button>
        </div>
      </div>
    </div>

    <div
      id="commentModal"
      class="fixed inset-0 bg-black bg-opacity-40 hidden flex items-center justify-center backdrop-blur-md transition-opacity duration-300">
      <div
        class="bg-[#f8f6f4] p-8 rounded-2xl shadow-xl w-[500px] h-[350px] relative border border-[#c4dfdf]">
        <button
          id="closeModal"
          class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-xl">
          &times;
        </button>

        <form method="get" action='save_comment.php'>
          <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-comment-dots text-[#76a3a3] mr-2"></i> Add Your
            Experience
          </h2>

          <textarea
            id="commentInput" name="comment_input"
            class="w-full p-3 border rounded-lg resize-none h-40 outline-none border-[#c4dfdf] bg-[#e8f0f0] focus:ring-2 focus:ring-[#76a3a3] transition-all duration-200"
            placeholder="Write your experience..."></textarea>

          <div class="flex justify-between items-center mt-5">
            <span class="text-sm text-gray-500"><i class="fas fa-pencil-alt mr-1"></i> Share honestly &
              respectfully</span>
            <div>
              <button
                id="closeModal"
                class="px-4 py-2 text-gray-700 bg-[#e8f0f0] hover:bg-[#c4dfdf] rounded-lg transition">
                Cancel
              </button>
              <button
                id="submitComment" type="submit" name="post"
                class="px-5 py-2 bg-gradient-to-r from-[#76a3a3] to-[#5a8c8c] text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                Post
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    document
      .getElementById("addCommentBtn")
      .addEventListener("click", function() {
        document.getElementById("commentModal").classList.remove("hidden");
      });

    document
      .getElementById("closeModal")
      .addEventListener("click", function() {
        document.getElementById("commentModal").classList.add("hidden");
      });

    document
      .getElementById("submitComment")
      .addEventListener("click", function() {

        let commentText = document.getElementById("commentInput").value;
        if (commentText.trim() === "") return;

        let now = new Date();
        let formattedDate = now.toLocaleDateString("en-US", {
          year: "numeric",
          month: "long",
          day: "numeric",
        });
        let formattedTime = now.toLocaleTimeString("en-US", {
          hour: "2-digit",
          minute: "2-digit",
          hour12: true,
        });

        let commentHTML = `
          <div class="comment-card bg-gradient-to-br from-[#d4efef] to-[#f8f6f4] p-5 rounded-lg shadow-md border border-gray-200 relative hover:shadow-lg transition duration-300">
              <div class="flex items-center justify-between mb-3">
                  <div class="flex items-center">
                      <img src="" class="w-10 h-10 rounded-full mr-3 border border-gray-300" />
                      <div>
                          <span class="font-semibold text-gray-800 block">New User</span>
                          <div class="text-gray-500 text-sm flex items-center">
                              <i class="fas fa-clock mr-1"></i> ${formattedDate} - ${formattedTime}
                          </div>
                      </div>
                  </div>
              </div>
              <p
            class="text-gray-700 mb-4 max-h-24 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200"
          >${commentText}</p>
              <div class="flex items-center space-x-4">
                  <button class="like-btn flex items-center text-gray-500 hover:text-red-600 transition duration-200" data-liked="false">
                      <i class="fas fa-heart mr-1 h-6 w-6"></i>
                      <span class="like-count">0</span>
                  </button>
                  <button class="share-btn flex items-center text-gray-500 hover:text-blue-600 transition duration-200">
                      <i class="fa-regular fa-share-from-square mr-2 h-6 w-6"></i>
                      <span>Share</span>
                  </button>
              </div>
          </div>`;

        document
          .getElementById("commentsContainer")
          .insertAdjacentHTML("afterbegin", commentHTML);
        document.getElementById("commentInput").value = "";
        document.getElementById("commentModal").classList.add("hidden");
      });

    document
      .getElementById("commentsContainer")
      .addEventListener("click", function(e) {
        if (e.target.closest(".like-btn")) {
          let likeBtn = e.target.closest(".like-btn");
          let likeCount = likeBtn.querySelector(".like-count");
          let count = parseInt(likeCount.textContent, 10);

          if (likeBtn.dataset.liked === "true") {
            likeCount.textContent = count - 1;
            likeBtn.dataset.liked = "false";
            likeBtn.classList.remove("text-red-600");
            likeBtn.classList.add("text-gray-500");
          } else {
            likeCount.textContent = count + 1;
            likeBtn.dataset.liked = "true";
            likeBtn.classList.remove("text-gray-500");
            likeBtn.classList.add("text-red-600");
          }
        }

        if (e.target.closest(".share-btn")) {
          let comment = e.target
            .closest(".comment-card")
            .querySelector("p").innerText;
          navigator.share ?
            navigator.share({
              text: comment
            }) :
            navigator.clipboard
            .writeText(comment)
            .then(() => alert("Comment copied!"));
        }
      }); 
  </script>

</body>

</html> -->
<?php
require_once 'includes/scripts/connection.php'; // Ensure this connects to your database

// Fetch comments from the database
$sql = "SELECT fm.id, fm.comment, fm.likes, fm.created_at, um.user_id, um.user_name 
        FROM feedback_master fm 
        JOIN user_master um ON fm.user_id = um.user_id 
        ORDER BY fm.created_at DESC";
$result = $conn->query($sql);
$comments = [];
while ($row = $result->fetch_assoc()) {
    $comments[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="Logo_Title.png">
  <title>Feedback & Complaints Hub</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" crossorigin="anonymous"></script>
  <style>
    @import url("https://fonts.cdnfonts.com/css/samarkan");
    h1 { font-family: "Samarkan"; }
    body {
      background-color: #f8f6f4;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='105' viewBox='0 0 80 105'%3E%3Cg fill-rule='evenodd'%3E%3Cg id='death-star' fill='%23c4dfdf' fill-opacity='0.3'%3E%3Cpath d='M20 10a5 5 0 0 1 10 0v50a5 5 0 0 1-10 0V10zm15 35a5 5 0 0 1 10 0v50a5 5 0 0 1-10 0V45zM20 75a5 5 0 0 1 10 0v20a5 5 0 0 1-10 0V75zm30-65a5 5 0 0 1 10 0v50a5 5 0 0 1-10 0V10zm0 65a5 5 0 0 1 10 0v20a5 5 0 0 1-10 0V75zM35 10a5 5 0 0 1 10 0v20a5 5 0 0 1-10 0V10zM5 45a5 5 0 0 1 10 0v50a5 5 0 0 1-10 0V45zm0-35a5 5 0 0 1 10 0v20a5 5 0 0 1-10 0V10zm60 35a5 5 0 0 1 10 0v50a5 5 0 0 1-10 0V45zm0-35a5 5 0 0 1 10 0v20a5 5 0 0 1-10 0V10z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    p::-webkit-scrollbar {
      width: 6px;
    }

    p::-webkit-scrollbar-track {
      background: transparent;
    }

    p::-webkit-scrollbar-thumb {
      background: #b0b0b0;
      border-radius: 10px;
    }

    p::-webkit-scrollbar-thumb:hover {
      background: #909090;
    }
  </style>
</head>

<body class="p-6">
  <div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-5xl font-bold text-gray-600">Feedback & Complaints Hub</h1>
      <button id="addCommentBtn" class="bg-[#c4dfdf] text-gray-600 px-4 py-2 rounded font-serif text-xl">+ Add Your Experience</button>
    </div>

    <div id="commentsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($comments as $comment): ?>
        <div class="comment-card bg-gradient-to-br from-[#d4efef] to-[#f8f6f4] p-5 rounded-lg shadow-md border border-gray-200 relative hover:shadow-lg transition duration-300">
          <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
              <img src="<?php echo ""; ?>" class="w-10 h-10 rounded-full mr-3 border border-gray-300" />
              <div>
                <span class="font-semibold text-gray-800"><?= htmlspecialchars($comment['user_name']) ?></span>
                <div class="text-gray-500 text-sm flex items-center">
                  <i class="fas fa-clock mr-1"></i> <?= date('F d, Y - h:i A', strtotime($comment['created_at'])) ?>
                </div>
              </div>
            </div>
          </div>
          <p class="text-gray-700 mb-4 max-h-24 overflow-y-auto"><?= htmlspecialchars($comment['comment']) ?></p>
          <div class="flex items-center space-x-4">
            <button 
                class="like-btn flex items-center text-gray-500 hover:text-red-600 transition duration-200" 
                data-comment-id="<?= htmlspecialchars($comment['id']); ?>">
                <i class="fas fa-heart mr-1 h-6 w-6"></i>
                <span class="like-count h-6 w-6"><?= htmlspecialchars($comment['likes']); ?></span>
            </button>
            <button class="share-btn flex items-center text-gray-500 hover:text-blue-600 transition duration-200">
                <i class="fa-regular fa-share-from-square mr-2 h-6 w-6"></i>
                <span>Share</span>
            </button>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Modal for Adding Comment -->
    <div id="commentModal" class="fixed inset-0 bg-black bg-opacity-40 hidden flex items-center justify-center">
      <div class="bg-[#f8f6f4] p-8 rounded-2xl shadow-xl w-[500px] relative border border-[#c4dfdf]">
        <button id="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-xl">&times;</button>
        <form action="save_comment.php" method="POST">
          <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-comment-dots text-[#76a3a3] mr-2"></i> Add Your Experience
          </h2>
          <textarea name="comment_text" class="w-full p-3 border rounded-lg resize-none h-40 outline-none border-[#c4dfdf] bg-[#e8f0f0] focus:ring-2 focus:ring-[#76a3a3] transition-all duration-200"
            placeholder="Write your experience..."></textarea>
          <div class="flex justify-between items-center mt-5">
            <button type="button" id="closeModalBtn" class="px-4 py-2 text-gray-700 bg-[#e8f0f0] hover:bg-[#c4dfdf] rounded-lg">Cancel</button>
            <button type="submit" class="px-5 py-2 bg-gradient-to-r from-[#76a3a3] to-[#5a8c8c] text-white font-medium rounded-lg">Post</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    document.getElementById("addCommentBtn").addEventListener("click", function() {
      document.getElementById("commentModal").classList.remove("hidden");
    });

    document.getElementById("closeModal").addEventListener("click", function() {
      document.getElementById("commentModal").classList.add("hidden");
    });

    document.getElementById("closeModalBtn").addEventListener("click", function() {
      document.getElementById("commentModal").classList.add("hidden");
    });
    document.querySelectorAll(".like-btn").forEach(button => {
        button.addEventListener("click", function() {
            let commentId = this.getAttribute("data-comment-id");
            let likeCountSpan = this.querySelector(".like-count");

            fetch("update_likes.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "comment_id=" + commentId
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    likeCountSpan.textContent = data.likes; // Update like count
                    this.classList.add("text-red-600"); // Change color to indicate liked
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
    document.querySelectorAll(".share-btn").forEach(button => {
    button.addEventListener("click", function (e) { // Pass 'e' here
        let comment = this.closest(".comment-card").querySelector("p").innerText;

        if (navigator.share) {
            navigator.share({ text: comment })
                .catch(error => console.error("Sharing failed:", error));
        } else {
            navigator.clipboard.writeText(comment)
                .then(() => alert("Comment copied!"))
                .catch(error => console.error("Copy failed:", error));
        }
    });
});



  </script>


</body>
</html>
