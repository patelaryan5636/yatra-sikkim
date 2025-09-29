<?php
  session_start();
  require_once 'includes/scripts/connection.php';

  $stmt = $conn->prepare("SELECT * FROM `hotel_master` where is_confirmed = 1");
  $stmt->execute();
  $result = $stmt->get_result();

  if (isset($_SESSION['booking_status'])) {
    $bookingMsg = $_SESSION['booking_status'];
    unset($_SESSION['booking_status']); // clear so it doesn't show again
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <title>Hotels</title>
</head>
<style>
    @import url("https://fonts.cdnfonts.com/css/samarkan");
    * {
        margin: 0;
        padding: 0;
        font-family: "Ubuntu", sans-serif;
    }


    /* For Chrome, Edge, and Safari */
    ::-webkit-scrollbar {
        width: 12px;
        /* Width of the scrollbar */
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        /* Background of the scrollbar track */
        border-radius: 10px;
        /* Optional rounded corners */
    }

    ::-webkit-scrollbar-thumb {
        background: rgba(7, 99, 81, 0.832);
        /* Color of the scrollbar thumb */
        border-radius: 10px;
        /* Optional rounded corners */
    }

    ::-webkit-scrollbar-thumb:hover {
        background: rgba(3, 103, 76, 0.427);
        /* Color when hovered */
    }

    /* For Firefox */
    html {
        position: relative;
        scrollbar-width: thin;
        /* Options: auto, thin, none */
        scrollbar-color: #1d7f6b #6fe1d64d;
        /* Thumb color and track color */
        /* background-color: rgba(220, 243, 232, 0.788); */
    }

    html::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('patternpad-2025-03-28-18-48-25.png') no-repeat center center;
        background-size: cover;
        opacity: 0.3;
        /* Set the background image opacity */
        z-index: -1;
        /* Ensure the pseudo-element stays behind all content */
        pointer-events: none;
        /* Prevent interaction with the background */
    }


    body {
        box-sizing: border-box;
    }

    .main-container {
        min-height: 100vh;
        width: 97.2vw;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 15px;
    }

    .container {
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .cards {
        margin-top: 20px;
        margin-bottom: 20px;
        width: 85%;
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center;
    }

    .card {
        text-decoration: none;
        color: black;
        background-color: aliceblue;
        width: 100%;
        border: 3px solid transparent;
        height: 270px !important;
        padding: 30px;
        display: flex;
        justify-content: space-between;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.5s ease;
        box-shadow: 0 0 10px 2px rgba(158, 231, 217, 0.832);
    }

    .card:hover {
        border-color: rgba(3, 103, 76, 0.4);
        box-shadow: 0 0 15px 3px rgba(74, 155, 139, 0.481);
    }

    .left,
    .center,
    .right {
        position: relative;
        width: 32.5%;
        height: 100%;
        border-radius: 15px;
        overflow: hidden;
    }

    .left img {
        height: 100%;
        width: 100%;
    }

    .center {
        padding: 0px 25px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .center .top h1 {
        font-weight: bold;
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .center span {
        color: gray;
    }

    .center img {
        height: 20px;
    }

    .alertbox h3 {
        padding: 3px 13px;
        color: rgb(160, 7, 7);
        font-weight: bold;
        background-color: rgba(253, 4, 4, 0.148);
        width: fit-content;
        border-radius: 5px;
        display: flex;
    }

    .bottom {
        display: flex;
        align-items: center;
        gap: 10px;
        /* margin-bottom: 4px; */
    }

    .bleft {
        display: flex;
        align-items: center;
        background-color: rgba(2, 2, 73, 0.693);
        border-radius: 10px;
        padding: 5px 10px;
    }

    .bleft h1 {
        font-weight: bold;
        color: white;
        font-size: 1.5rem;
    }

    .right {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: space-around;
    }

    .box {
        padding: 10px 15px;
        width: 50%;
        text-align: center;
        border-radius: 8px;
    }

    .box-1 {
        background-color: rgba(199, 145, 145, 0.241);
    }

    .box-2 {
        background-color: rgba(159, 211, 184, 0.323);
    }

    .box-3 {
        background-color: rgba(102, 102, 212, 0.185);
    }

    .searchbar {
        width: 100%;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        gap: 10px;
    }

    .searchbar input,
    .searchbar button,
    .searchbar select {
        background-color: aliceblue;
        box-shadow: 0 0 10px 2px rgba(158, 231, 217, 0.832);
        border-radius: 10px;
        padding: 10px;
        border: none;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 400;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .searchbar button {
        cursor: pointer;
    }

    .searchbar input[type="search"] {
        width: 40%;
        padding: 11px 10px;
    }

    .searchbar input[type="time"] {
        width: 90%;
    }

    .searchbar button {
        width: 10%;
    }

    .searchbar select {
        width: 100%;
    }

    .no-results {
        display: none;
        font-size: 2rem;
        color: rgb(126, 5, 5);
        text-align: center;
        margin-top: 20px;
    }

    .searchbar input:focus {
        outline: none;
        border: 2px solid rgba(3, 103, 76, 0.427);
    }

    .searchbar select:focus {
        outline: none;
        border: 2px solid rgba(3, 103, 76, 0.427);
    }

    .searchbar button:hover {
        border: 2px solid rgba(3, 103, 76, 0.427);
    }

    .image-container {
        position: relative;
        display: inline-block;
    }

    .like-button {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: rgba(222, 220, 220, 0.625);
        border: 2px solid rgba(255, 0, 0, 0.5);
        border-radius: 50%;
        width: 40px;
        height: 40px;
        font-size: 20px;
        color: rgba(255, 0, 0, 0.5);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
    }

    .like-button.liked {
        background-color: rgba(255, 0, 0, 0.2);
        border-color: rgba(255, 0, 0, 1);
        color: rgba(255, 0, 0, 1);
        background-color: white;
    }

    .like-button:hover {
        transform: scale(1.1);
        background-color: rgba(255, 255, 255, 1);
    }

    .main-head {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .main-title {
        font-weight: bold;
        color: #4a5568;
        /* margin-bottom: 1rem; */
        font-size: 3.75rem;
        /* Equivalent to text-6xl */
        font-family: 'Samarkan';
    }

    .main-head * {
        text-align: center;
        margin-top: 1rem;
    }

    .main-description {
        color: #718096;
        font-size: 1.25rem;
        /* Equivalent to text-xl */
        font-family: 'Georgia', serif;
        /* Equivalent to font-serif */
        padding: 0 5rem;
        /* Equivalent to px-20 */
    }

    .tag-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1.25rem;
        /* Equivalent to gap-5 */
        margin-bottom: 2rem;
        /* Equivalent to mb-16 */
        font-family: 'Georgia', serif;
        /* Equivalent to font-serif */
    }

    .tag {
        padding: 0.3rem 0.75rem;
        /* Equivalent to px-3 py-4 */
        margin-top: 0.75rem;
        /* Equivalent to mt-3 */
        border-radius: 0.5rem;
        /* Equivalent to rounded-lg */
        font-weight: 500;
        /* Equivalent to font-medium */
        display: flex;
        align-items: center;
        height: 1.5rem;
        /* Equivalent to h-6 */
        color: #3f4752;
        /* Equivalent to text-gray-600 */
    }

    .tag-pink {
        background-color: #fed7e2;
        /* Equivalent to bg-pink-200 */
    }

    .tag-blue {
        background-color: #bfdbfe;
        /* Equivalent to bg-blue-200 */
    }

    .tag-purple {
        background-color: #e9d8fd;
        /* Equivalent to bg-purple-200 */
    }
</style>

<body>
    <!-- //    temp design  -->

    <?php if (!empty($bookingMsg)): ?>
    <script>
    window.onload = function() {
        alert("<?= $bookingMsg ?>");
    };
    </script>
<?php endif; ?>
    <?php
        include("includes/header.php");
    ?>
    <div class="main-container">
        <div class="main-head">
            <h1 class="main-title">
                Discover Your Perfect Stay
            </h1>
            <p class="main-description">
                Elevate your travel experience with our curated selection of exquisite hotels. Explore luxurious accommodations, prime locations, and unparalleled comfort tailored to your journey. Find your ideal retreat effortlessly and step into a world of refined hospitality that awaits you.
            </p>

            <div class="tag-container">
                <div class="tag tag-blue">
                    💎 Premium Hotels
                </div>
                <div class="tag tag-pink">
                    🛌 Unforgettable Comfort
                </div>
                <div class="tag tag-purple">
                    🔑 Seamless Booking
                </div>
            </div>
        </div>
        <div class="container">
            <div class="cards">
                <div class="searchbar">
                    <div
                        style="display: flex; width: 15%; flex-direction: column; justify-content: center; align-items: center; gap: 5px;">
                        <label for="" style="color: rgb(87, 87, 87);">Choice</label>
                        <select id="filterSelect">
                            <option value="all">All</option>
                            <option value="popular">Popular</option>
                        </select>
                    </div>
                    <div
                        style="display: flex; width: 15%; flex-direction: column; justify-content: center; align-items: center; gap: 5px;">
                        <label for="" style="color: rgb(87, 87, 87);">Check-in<span style="color: red;">*</span></label>
                        <input type="time" name="" id="inTime">
                    </div>
                    <div
                        style="display: flex; width: 15%; flex-direction: column; justify-content: center; align-items: center; gap: 5px;">
                        <label for="" style="color: rgb(87, 87, 87);">Check-out<span
                                style="color: red;">*</span></label>
                        <input type="time" name="" id="outTime">
                    </div>
                    <input type="search" id="searchInput" placeholder="Search Here...">
                    <button onclick="resetData()">Reset</button>
                </div>
                <div class="no-results">No Hotels Available</div>
                <?php
                function encrypt($data) {
                    $key = "Yatra@5636"; // Use a strong key
                    $iv = "1234567891011121"; // 16-byte IV (same during encryption & decryption)
                    return urlencode(openssl_encrypt($data, "AES-256-CBC", $key, 0, $iv));
                }
                 while($hotels = $result->fetch_assoc()){
                    $encrypted_id = encrypt($hotels['hotel_id']);
                ?>
                <a href="hoteldata?id=<?php echo $encrypted_id;?>" class="card">
                    <div class="left image-container">
                        <img src="uploads/hotels/<?php echo $hotels['hotel_image1']; ?>"
                            alt="Hotel Image">
                        <button class="like-button" onclick="toggleLike(this)">❤️</button>
                    </div>
                    <div class="center">
                        <div class="top">
                            <h1><?php echo $hotels['hotel_name'];?></h1>
                            <div style="display: flex; gap: 15px; flex-direction: column;">
                                <div style="display: flex; align-items: center; gap: 3px;"><img src="location.svg"
                                        alt=""><span>3.2 miles to city Center</span></div>
                                <div style="display: flex; align-items: center; gap: 3px;"><img src="star.svg"
                                        alt=""><span>5 star</span></div>
                            </div>
                        </div>
                        <div class="alertbox">
                            <h3>Popular Choice</h3>
                        </div>
                        <div class="bottom">
                            <div class="bleft">
                                <h1>7.5</h1>
                            </div>
                            <div class="bright">
                                <h4>Great</h4>
                                <h4 style="color: gray;">(2,405 Reviews)</h4>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="box box-1">
                            <h2>🏢 Luxury Hotel</h2>
                        </div>
                        <div class="box box-2">
                            <h2>⏹️ <?php echo $hotels['num_rooms'];?> Rooms</h2>
                        </div>
                        <div class="box box-3">
                            <h2>🤩 Facelities</h2>
                        </div>
                    </div>
                </a>
                <?php
                 }
                ?>
                
            </div>
        </div>
    </div>
    <?php
        include("includes/footer.php");
    ?>
</body>
<script>
    const searchInput = document.getElementById('searchInput');
    const cards = document.querySelectorAll('.card');
    const noResults = document.querySelector('.no-results');
    const inTime = document.getElementById('inTime');
    const outTime = document.getElementById('outTime');
    const filterSelect = document.getElementById('filterSelect');

    // Function to enable or disable the search bar
    function toggleSearchBar() {
        if (inTime.value && outTime.value) {
            searchInput.disabled = false;
            searchInput.placeholder = "Search Here...";
        } else {
            searchInput.disabled = true;
            searchInput.placeholder = "Please fill check-in and check-out time first";
        }
    }

    // Attach event listeners to check-in and check-out inputs
    inTime.addEventListener('input', toggleSearchBar);
    outTime.addEventListener('input', toggleSearchBar);

    // Filter function
    function filterCards() {
        const filter = searchInput.value.toLowerCase();
        const selectedFilter = filterSelect.value; // Get selected value from dropdown
        let visibleCards = 0;

        cards.forEach(card => {
            const cardContent = card.textContent.toLowerCase();
            const isPopular = card.querySelector('.alertbox'); // Check if the card has "Popular Choice"

            // Filter logic
            if (
                (selectedFilter === 'all' || (selectedFilter === 'popular' && isPopular)) &&
                cardContent.includes(filter)
            ) {
                card.style.display = 'flex';
                visibleCards++;
            } else {
                card.style.display = 'none';
            }
        });

        noResults.style.display = visibleCards === 0 ? 'block' : 'none';
    }

    // Event listener for search input
    searchInput.addEventListener('input', filterCards);

    // Event listener for dropdown filter
    filterSelect.addEventListener('change', filterCards);

    // Reset function
    function resetData() {
        // Clear all input fields
        searchInput.value = '';
        inTime.value = '';
        outTime.value = '';
        filterSelect.value = 'all'; // Reset dropdown to "All"

        // Disable search bar and reset placeholder
        searchInput.disabled = true;
        searchInput.placeholder = "Please fill check-in and check-out time first";

        // Show all cards
        cards.forEach(card => {
            card.style.display = 'flex';
        });

        // Hide "No hotels available" message
        noResults.style.display = 'none';

        // Display a message confirming data reset
        clearedDataMessage.innerHTML = `
        Search Input: Cleared<br>
        In Time: Cleared<br>
        Out Time: Cleared
    `;
    }

    // Initialize the search bar state on page load
    toggleSearchBar();



    function toggleLike(button) {
        event.preventDefault();
        button.classList.toggle("liked");
    }

</script>

</html>