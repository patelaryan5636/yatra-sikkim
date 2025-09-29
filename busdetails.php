<?php
require 'includes/scripts/connection.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <title>Journey</title>
</head>
<style>
    @import url("https://fonts.cdnfonts.com/css/samarkan");
    @import url('https://fonts.cdnfonts.com/css/unbounded');

    .main-title {
        font-family: "Samarkan";
    }


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
        filter: blur(2px);
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

        /* min-height: 99.8vh; */
        /* width: 97.2vw; */
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

    @keyframes fadePopup {
        0% {
            opacity: 0;
            transform: scale(0.9);
            /* transform: translateY(40px); */
        }

        100% {
            opacity: 1;
            transform: scale(1);
            /* transform: translateY(0); */
        }
    }

    .cards {
        animation: fadePopup 0.8s ease-out;
        margin-top: 20px;
        margin-bottom: 20px;
        width: 92%;
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center;
    }

    .bus-cards,
    .railway-cards {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        width: 100%;
        place-content: center;
    }

    .card {
        text-decoration: none;
        color: black;
        background-color: white;
        width: 90%;
        border: 3px solid transparent;
        height: auto !important;
        padding: 30px;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.5s ease;
        box-shadow: 0 0 10px 2px rgba(236, 243, 242, 0.83);
    }

    .card:hover {
        border-color: rgba(3, 103, 76, 0.4);
        box-shadow: 0 0 15px 3px rgba(74, 155, 139, 0.481);
    }

    .rail-card {
        text-decoration: none;
        color: black;
        background-color: white;
        width: 90%;
        border: 3px solid transparent;
        height: auto !important;
        padding: 30px;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.5s ease;
        box-shadow: 0 0 10px 2px rgba(158, 231, 217, 0.832);
    }

    .rail-card:hover {
        border-color: rgba(3, 103, 76, 0.4);
        box-shadow: 0 0 15px 3px rgba(74, 155, 139, 0.481);
    }

    .searchbar {
        width: 100%;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        gap: 20px;
    }

    .searchbar input,
    .searchbar button,
    .searchbar select {
        background-color: white !important;
        box-shadow: 0 0 10px 2px rgba(158, 231, 217, 0.832);
        border-radius: 10px;
        padding: 10px;
        border: none;
        background-color: transparent;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 400;
        border: 2px solid transparent;
        transition: all 0.3s ease;
        width: 90%;
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

    .no-results,
    .no-results-train {
        display: none;
        font-size: 2rem;
        color: rgb(126, 5, 5);
        font-family: 'Unbounded', sans-serif;
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

    .upper-section {
        width: 68%;
        background-color: rgba(164, 229, 219, 0.123);
        padding: 10px;
        border-radius: 15px;
    }

    .upper-section .tabs {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    #bus,
    #train {
        padding: 10px 20px;
        font-size: 1.2rem;
        border-radius: 15px;
        text-align: center;
        width: 43%;
        cursor: pointer;
        color: gray;
        background-color: rgb(196, 235, 229);
        transition: all 0.3s ease;
    }

    .active {
        background-color: rgb(164, 229, 219) !important;
        font-weight: bold;
        color: black !important;
    }

    .buses {
        display: flex;
    }

    .railway {
        display: none;
    }

    .select2-container .select2-selection--single {
        background-color: white !important;
        box-shadow: 0 0 10px 2px rgba(158, 231, 217, 0.832);
        border-radius: 10px !important;
        /* padding: 10px !important; */
        height: 44px !important;
        place-content: center;
        border: none !important;
        font-size: 1rem;
        font-weight: 400;
        transition: all 0.3s ease;
    }

    /* On focus */
    .select2-container .select2-selection--single:focus {
        border-color: rgba(158, 231, 217, 0.832) !important;
        /* outline: none ; */
    }

    /* Style the dropdown menu */
    .select2-container .select2-dropdown {
        background-color: white !important;
        border-radius: 10px !important;
        box-shadow: 0 0 10px 2px rgba(158, 231, 217, 0.832);
    }

    /* Style the search box inside the dropdown */
    .select2-container .select2-search--dropdown .select2-search__field {
        background-color: transparent;
        /* border: none; */
        font-size: 1rem;
        padding: 5px;
    }

    .bus-cards .card .header,
    .railway-cards .rail-card .header {
        display: flex;
        justify-content: space-between;
        width: 100%;
        align-items: center;
    }

    .header h2 {
        font-size: 1.8vw;
    }

    .text-container {
        min-width: 0;
        white-space: nowrap;
        overflow: hidden;
        position: relative;
    }

    .text-container span {
        display: inline-block;
    }

    .animate {
        position: relative;
        animation: leftright 3s infinite alternate ease;
    }

    .animaterail {
        position: relative;
        animation: leftright 3s infinite alternate ease;
    }

    @keyframes leftright {

        0%,
        20% {
            transform: translateX(0%);
            left: 0%;
        }

        80%,
        100% {
            transform: translateX(-100%);
            left: 100%;
        }
    }

    .fader {
        position: absolute;
        top: 0;
        height: 100%;
        width: 25px;

        &.fader-left {
            left: 0;
            background: linear-gradient(to left,
                    rgba(255, 255, 255, 0),
                    rgba(255, 255, 255, 1));
        }

        &.fader-right {
            right: 0;
            background: linear-gradient(to right,
                    rgba(255, 255, 255, 0),
                    rgba(255, 255, 255, 1));
        }
    }

    .title {
        width: 75% !important;
    }

    .type {
        color: rgb(5, 99, 101);
        width: 25% !important;
        text-align: end;
    }

    .middle {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .middle h2 {
        font-size: 1.2vw;
        /* padding-top: px; */
    }

    .bottom {
        padding-top: 10px;
    }

    .time {
        color: rgb(109, 10, 53);
    }

    /* .middledown {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .middledown h2 {
        padding: 10px 0;
        font-size: 1.2vw;
    } */

    .places b {
        font-weight: bold;
    }

    .bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .bottom h2 {
        font-size: 1.5vw;
    }

    .status-green {
        color: rgb(10, 109, 10);
    }

    .status-blue {
        color: rgb(5, 78, 91);
    }

    .status-red {
        color: rgb(183, 31, 17);
    }

    .price {
        color: rgb(5, 78, 91);
    }

    .title img {
        height: 3vw;
    }

    .title .text {
        display: flex;
        align-items: center;
        gap: 10px;
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
        padding: 1rem 0.75rem;
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

    .date {
        color: #6d3a0a;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .date img {
        height: 1.5vw;
    }

    .filter-bus,
    .filter-rail {
        text-align: center;
        margin-top: 1rem;
        font-family: 'Unbounded', sans-serif;
    }

    #require_Filter_For_Rail h1,
    #require_Filter_For_Bus h1 {
        font-size: 2.5rem;
    }

    #require_Filter_For_Rail p,
    #require_Filter_For_Bus p {
        font-size: 1rem;
        width: 80%;
        text-align: center;
    }

    #require_Filter_For_Rail,
    #require_Filter_For_Bus {
        display: flex;
        flex-direction: column;
        justify-content: center !important;
        align-items: center !important;
    }


    .card,
    .rail-card {
        display: none;
    }
</style>

<body>
    <?php
        include("includes/header.php");
    ?>
    <div class="main-container">
        <div class="main-head">
            <h1 class="main-title">
                Reach Your Destination On Time
            </h1>
            <p class="main-description">
                Stay on track with precise bus schedules and route information. Navigate your journey with confidence,
                knowing the timings and stops in advance. Make your travel experience smooth and stress-free.
            </p>

            <div class="tag-container">
                <div class="tag tag-pink">
                    🕒 Timely Updates
                </div>
                <div class="tag tag-blue">
                    🛣️ Seamless Routes
                </div>
                <div class="tag tag-purple">
                    ✨ Effortless Journeys
                </div>
            </div>
        </div>
        <div class="upper-section">
            <div class="tabs">
                <div id="bus" class="active">
                    Bus
                </div>
                <div id="train">
                    Railway
                </div>
            </div>
        </div>
        <div class="container">
            <div class="cards buses">
                <!-- <h1 class="h1">Bus Details</h1> -->
                <div class="searchbar">
                    <div
                        style="display: flex; width: 15%; flex-direction: column; justify-content: center; align-items: center; gap: 5px;">
                        <label for="" style="color: rgb(87, 87, 87);">Type</label>
                        <select id="filterSelect">
                            <option value="all">All</option>
                            <option value="Express">Express</option>
                            <option value="Local">Local</option>
                        </select>
                    </div>
                    <div
                        style="display: flex; width: 18%; flex-direction: column; justify-content: center; align-items: center; gap: 5px;">

                        <label for="" style="color: rgb(87, 87, 87);">Starting Point</label>
                        <select id="startingPoint" name="source" style="width: 100%;" onchange="updateDestination()">
                            <option value="NULL" selected disabled>--Select--</option>
                            <?php 
                            $Query = "SELECT DISTINCT source FROM bus_master";
                            $busResult = mysqli_query($conn, $Query);
                            while ($row = mysqli_fetch_assoc($busResult)) {
                            ?>
                            <option value="<?php echo $row['source']; ?>">
                                <?php echo $row['source']; ?>
                            </option>
                            <?php 
                            }
                            ?>
                        </select>
                    </div>

                    <div
                        style="display: flex; width: 18%; flex-direction: column; justify-content: center; align-items: center; gap: 5px;">
                        <label for="" style="color: rgb(87, 87, 87);">Destination Point</label>
                        <select id="destinationPoint" name="destination" style="width: 100%;" onchange="updateStartingPoint()">
                            <option value="NULL" selected disabled>--Select--</option>
                            <?php 
                            $Query = "SELECT DISTINCT destination FROM bus_master";
                            $busResult = mysqli_query($conn, $Query);
                            while ($row = mysqli_fetch_assoc($busResult)) {
                            ?>
                            <option value="<?php echo $row['destination']; ?>">
                                <?php echo $row['destination']; ?>
                            </option>
                            <?php 
                            }
                            ?>
                        </select>
                    </div>
                    <div
                        style="display: flex; width: 15%; flex-direction: column; justify-content: center; align-items: center; gap: 5px;">
                        <label for="Date" style="color: rgb(87, 87, 87);">Date</label>
                        <input type="date" name="date" id="date" onkeydown="return false">
                    </div>

                    <!-- <div
                        style="display: flex; width: 15%; flex-direction: column; justify-content: center; align-items: center; gap: 5px;">
                        <label for="" style="color: rgb(87, 87, 87);">Time</label>
                        <input type="time" name="" id="inTime">
                    </div> -->
                    <button onclick="resetData()">Reset</button>

                </div>

                <div class="no-results">No Buses Available</div>
                <div style="margin-top: 1.5rem;" id="require_Filter_For_Bus">
                    <h1 class="main-title filter-bus">
                        🚌 Explore Available Buses
                    </h1>
                    <p class="main-description filter-bus">
                        Enter your starting point and destination to view all available buses. Quickly find the options
                        that fit your schedule and travel with ease. Your journey begins with just a few clicks!
                    </p>
                </div>
                <div class="bus-cards">

                    <?php
                    function getDayAbbreviation($date) {
                        return date('D', strtotime($date));
                    }
                    
                        $Query = "SELECT * FROM bus_master";
                    
                        $busResult = mysqli_query($conn, $Query);
                        
                        if (!$busResult) {
                            die("Query failed: " . mysqli_error($conn));
                        }
                    
                        if (mysqli_num_rows($busResult) > 0) {
                            while ($row = mysqli_fetch_assoc($busResult)) {
                                $departure = $row['departure']; // e.g., "10:30"
                                $arrival = $row['arrival'];     // e.g., "15:45"

                                // Convert to DateTime objects
                                $departureTime = new DateTime($departure);
                                $arrivalTime = new DateTime($arrival);

                                // Handle cases where arrival time is on the next day
                                if ($arrivalTime < $departureTime) {
                                    $arrivalTime->modify('+1 day');
                                }

                                // Calculate the difference
                                $interval = $departureTime->diff($arrivalTime);

                                // Format the duration as "HH:MM"
                                $duration = $interval->format('%H:%I');
                                echo <<<HTML
                                <a href="#" class="card" data-day="{$row['frequency']}">
                                    <div class="header" style="gap: 20px;">
                                        <h2 class="title text-container" id="title">
                                            <span>
                                                <span class="text">
                                                    <img src="bus.svg" alt="">
                                                    <span class="source">{$row['source']}</span> to 
                                                    <span class="destination">{$row['destination']}</span>
                                                </span>
                                            </span>
                                        </h2>
                                        <h2 class="type">{$row['type']}</h2>
                                    </div>
                                    <div class="middle">
                                        <h2 class="time" id="startingTime">{$row['departure']}<i class="fa-regular fa-clock"></i></h2>
                                        <h2 class="duration">⭕〰️{$duration}hrs〰️⭕</h2>
                                        <h2 class="time" id="endingTime"><i class="fa-regular fa-clock"></i>{$row['arrival']}</h2>
                                    </div>
                                    <div class="bottom">
                                        <h2 class="status-green" id="runningStatus">Running</h2>
                                        <h2 class="status-blue" id="scheduledStatus">Scheduled</h2>
                                        <h2 class="status-red" id="terminatedStatus">Terminated</h2>
                                        <h2 class="date"><img src="calendar.svg" alt="">{$row['frequency']}</h2>
                                        <h2 class="price">₹ {$row['price']}</h2>
                                    </div>
                                </a>
                                HTML;
                            }
                        }        
                    ?>

                </div>
            </div>
            <div class="cards railway">
                <div class="searchbar">
                    <div
                        style="display: flex; width: 15%; flex-direction: column; justify-content: center; align-items: center; gap: 5px;">
                        <label for="" style="color: rgb(87, 87, 87);">Type</label>
                        <select id="filterSelectForRail">
                            <option value="all">All</option>
                            <option value="Express">Express</option>
                            <option value="Local">Local</option>

                        </select>
                    </div>
                    <div
                        style="display: flex; width: 18%; flex-direction: column; justify-content: center; align-items: center; gap: 5px;">
                        <label for="" style="color: rgb(87, 87, 87);">Starting Station</label>
                        <select id="startingPointForRail" style="width: 100%;" onchange="updateDestinationRail()">
                            <option value="NULL" selected disabled>--Select--</option>
                            <?php 
                            $Query = "SELECT DISTINCT source FROM train_master";
                            $busResult = mysqli_query($conn, $Query);
                            while ($row = mysqli_fetch_assoc($busResult)) {
                            ?>
                            <option value="<?php echo $row['source']; ?>">
                                <?php echo $row['source']; ?>
                            </option>
                            <?php 
                            }
                            ?>
                        </select>
                    </div>

                    <div
                        style="display: flex; width: 18%; flex-direction: column; justify-content: center; align-items: center; gap: 5px;">
                        <label for="" style="color: rgb(87, 87, 87);">Destination Station</label>
                        <select id="destinationPointForRail" style="width: 100%;" onchange="updateStartingPointRail()">
                            <option value="NULL" selected disabled>--Select--</option>
                            <?php 
                            $Query = "SELECT DISTINCT destination FROM train_master";
                            $busResult = mysqli_query($conn, $Query);
                            while ($row = mysqli_fetch_assoc($busResult)) {
                            ?>
                            <option value="<?php echo $row['destination']; ?>">
                                <?php echo $row['destination']; ?>
                            </option>
                            <?php 
                            }
                            ?>
                        </select>
                    </div>
                    <div
                        style="display: flex; width: 15%; flex-direction: column; justify-content: center; align-items: center; gap: 5px;">
                        <label for="Date" style="color: rgb(87, 87, 87);">Date</label>
                        <input type="date" name="rail_date" id="dateForRail" onkeydown="return false">
                    </div>
                    <!-- <div
                        style="display: flex; width: 15%; flex-direction: column; justify-content: center; align-items: center; gap: 5px;">
                        <label for="" style="color: rgb(87, 87, 87);">Time</label>
                        <input type="time" name="" id="inTime">
                    </div> -->
                    <button onclick="resetDataForRail()">Reset</button>
                </div>
                <div class="no-results-train">No Trains Available</div>
                <div style="margin-top: 1.5rem;" id="require_Filter_For_Rail">
                    <h1 class="main-title filter-rail">
                        🚆 Discover Available Trains
                    </h1>
                    <p class="main-description filter-rail">
                        Enter your starting station and destination to view all available trains. Find options that suit
                        your travel plans and make your journey convenient and hassle-free. Start exploring now!
                    </p>
                </div>
                <div class="railway-cards">
                    <?php
                        $Query = "SELECT * FROM train_master";
                    
                        $trainResult = mysqli_query($conn, $Query);
                        
                        if (!$trainResult) {
                            die("Query failed: " . mysqli_error($conn));
                        }
                    
                        if (mysqli_num_rows($trainResult) > 0) {
                            while ($row = mysqli_fetch_assoc($trainResult)) {
                                $departure = $row['departure']; // e.g., "10:30"
                                $arrival = $row['arrival'];     // e.g., "15:45"

                                // Convert to DateTime objects
                                $departureTime = new DateTime($departure);
                                $arrivalTime = new DateTime($arrival);

                                // Handle cases where arrival time is on the next day
                                if ($arrivalTime < $departureTime) {
                                    $arrivalTime->modify('+1 day');
                                }

                                // Calculate the difference
                                $interval = $departureTime->diff($arrivalTime);

                                // Format the duration as "HH:MM"
                                $duration = $interval->format('%H:%I');
                                echo <<<HTML
                                <a href="#" class="rail-card" data-day-rail="{$row['frequency']}">
                                    <div class="header" style="gap: 20px;">
                                        <h2 class="title text-container" id="titleforrail">
                                            <span>
                                                <span class="text">
                                                    <img src="train.svg" alt="">
                                                    <span class="sourceforrail">{$row['source']}</span> to 
                                                    <span class="destinationforrail">{$row['destination']}</span>
                                                </span>
                                            </span>
                                        </h2>
                                        <h2 class="type">{$row['type']}</h2>
                                    </div>
                                    <div class="middle">
                                        <h2 class="time">{$row['departure']}<i class="fa-regular fa-clock"></i></h2>
                                        <h2 class="duration">⭕〰️{$duration}hrs hrs 〰️⭕</h2>
                                        <h2 class="time"><i class="fa-regular fa-clock"></i> {$row['arrival']}</h2>
                                    </div>
                                    <div class="bottom">
                                        <h2 style="color: #b04040; display: flex; align-items: center; gap: 5px;">
                                            <img src="trainnumber.svg" alt="" style="height: 1.5vw;">{$row['train_number']}
                                        </h2>
                                        <h2 class="date"><img src="calendar.svg" alt=""> {$row['frequency']}</h2>
                                        <h2 class="price">₹ {$row['price']}</h2>
                                    </div>
                                </a>
                                HTML;
                            }
                        }        
                    ?>
                </div>
            </div>
        </div>
    </div>
        <?php
            include("includes/footer.php");
        ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    // document.getElementById('dateDisplay').textContent = document.getElementById('date').value;
    // const dateInput = document.getElementById('date');
    // const dateDisplay = document.getElementById('dateDisplay');

    // dateInput.addEventListener('change', function() {
    //     const selectedDate = new Date(this.value);
    //     const formattedDate = selectedDate.toLocaleDateString('en-GB', {
    //         day: '2-digit',
    //         month: '2-digit',
    //         year: 'numeric'
    //     });
    //     dateDisplay.textContent = formattedDate;
    // });

    const cards = document.querySelectorAll('.card');
    const noResults = document.querySelector('.no-results');

    // Tab switching functionality
    const busTab = document.getElementById('bus');
    const trainTab = document.getElementById('train');

    const busesSection = document.querySelector('.buses');
    const railwaySection = document.querySelector('.railway');

    // Event listener for Bus tab
    busTab.addEventListener('click', () => {
        busTab.classList.add('active');
        trainTab.classList.remove('active');
        busesSection.style.display = 'flex';
        railwaySection.style.display = 'none';
    });

    // Event listener for Railway tab
    trainTab.addEventListener('click', () => {
        trainTab.classList.add('active');
        busTab.classList.remove('active');
        busesSection.style.display = 'none';
        railwaySection.style.display = 'flex';
        document.querySelectorAll(".card").forEach((card) => {
            let container3 = document.querySelector("#places2");
            let text3 = document.querySelector("#places2 span");

            if (container3.clientWidth < text3.clientWidth) {
                text3.classList.add("animate");
            }

            let container4 = document.querySelector("#title2");
            let text4 = document.querySelector("#title2 span");

            if (container4.clientWidth < text4.clientWidth) {
                text4.classList.add("animate");
            }
        });
    });

    // Attach event listeners to check-in and check-out inputs
    // function updateTime() {
    //     const timeInput = document.getElementById("inTime");
    //     const now = new Date();
    //     const hours = String(now.getHours()).padStart(2, "0");
    //     const minutes = String(now.getMinutes()).padStart(2, "0");
    //     timeInput.value = `${hours}:${minutes}`;
    // }

    // // Update time on page load
    // updateTime();

    function setDateAndLimit() {
        const dateInput = document.getElementById("date");
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, "0"); // Months are 0-indexed
        const day = String(today.getDate()).padStart(2, "0");
        const formattedDate = `${year}-${month}-${day}`;

        // Set current date as the value and the minimum selectable date
        dateInput.value = formattedDate;
        dateInput.min = formattedDate;
    }

    // Set the current date and restrict past dates when the page loads
    setDateAndLimit();

    function setDateAndLimitForRail() {
        const dateInput = document.getElementById("dateForRail");
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, "0"); // Months are 0-indexed
        const day = String(today.getDate()).padStart(2, "0");
        const formattedDate = `${year}-${month}-${day}`;

        // Set current date as the value and the minimum selectable date
        dateInput.value = formattedDate;
        dateInput.min = formattedDate;
    }

    // Set the current date and restrict past dates when the page loads
    setDateAndLimitForRail();



    // 1
    document.querySelectorAll(".card").forEach((card) => {
        // Find the title and its text within the current card
        let container1 = card.querySelector(".title");
        let text1 = card.querySelector(".title span");

        if (container1 && text1 && container1.clientWidth < text1.clientWidth) {
            text1.classList.add("animate");
        }

        // Find the places and its text within the current card
        let container2 = card.querySelector(".places");
        let text2 = card.querySelector(".places span");

        if (container2 && text2 && container2.clientWidth < text2.clientWidth) {
            text2.classList.add("animate");
        }
    });



    // Main functionality for Bus filtering and resetting

    // For Bus: Resetting all filters to default values
    function resetData() {
        // Reset the "Type" dropdown to "All"
        document.getElementById("filterSelect").value = "all";

        // Reset the "Starting Point" and "Destination Point" dropdowns to NULL
        $('#startingPoint').val('NULL').trigger('change');
        $('#destinationPoint').val('NULL').trigger('change');

        // Set the date input to today's date
        const today = new Date().toISOString().split('T')[0];
        document.getElementById("date").value = today;

        // Clear filter input values (if applicable)
        document.getElementById("startingPoint").value = null;
        document.getElementById("destinationPoint").value = null;

        // Hide all bus cards
        const cards = document.querySelectorAll(".card");
        cards.forEach(card => {
            card.style.display = "none"; // Hide all bus cards
        });

        // Hide the "No Buses Available" message
        const noResultsMessage = document.querySelector(".no-results");
        if (noResultsMessage) {
            noResultsMessage.style.display = "none";
        }

        // Show only the #require_Filter_For_Bus div
        const requireFilterMessage = document.querySelector("#require_Filter_For_Bus");
        if (requireFilterMessage) {
            requireFilterMessage.style.display = "flex";
        }

        console.log("All filters reset. Filter inputs set to null. Only require filter message is shown.");
    }


    // For Bus: Filtering logic for bus cards based on selected filters
    function filterBusCards() {
        const selectedType = document.getElementById("filterSelect").value.toLowerCase();
        const selectedStart = $('#startingPoint').val()?.toLowerCase();
        const selectedDest = $('#destinationPoint').val()?.toLowerCase();
        const selectedDate = document.getElementById("date")?.value;

        let selectedDay = null;

        if (selectedDate) {
            const dateObject = new Date(selectedDate);
            if (!isNaN(dateObject)) {
                selectedDay = dateObject.toLocaleDateString("en-US", { weekday: "short" });
            }
        }

        console.log("Selected date: ", selectedDate);
        console.log("Selected day: ", selectedDay);

        const cards = document.querySelectorAll(".card");
        let hasVisibleCard = false;

        const requireFilterMessage = document.querySelector("#require_Filter_For_Bus");
        const noResultsMessage = document.querySelector(".no-results");

        if (!selectedStart || selectedStart === "null" || !selectedDest || selectedDest === "null") {
            cards.forEach(card => {
                card.style.display = "none";
            });

            if (requireFilterMessage) {
                requireFilterMessage.style.display = "flex";
            }
            if (noResultsMessage) {
                noResultsMessage.style.display = "none";
            }

            console.log("Either starting point or destination point not selected. Showing 'Require Filter' message.");
            return;
        }

        const currentDelhiTime = new Date(new Date().toLocaleString("en-US", { timeZone: "Asia/Kolkata" }));

        cards.forEach(card => {
            const sourceText = card.querySelector(".source").textContent.toLowerCase();
            const destinationText = card.querySelector(".destination").textContent.toLowerCase();
            const cardType = card.querySelector(".type").textContent.toLowerCase();
            const cardDays = card.getAttribute("data-day")?.toLowerCase();

            const matchesStart = sourceText.includes(selectedStart);
            const matchesDest = destinationText.includes(selectedDest);
            const matchesType = selectedType === "all" || cardType.includes(selectedType);
            const matchesDay = !selectedDay || cardDays.includes(selectedDay.toLowerCase()) || cardDays.includes("daily");

            if (matchesStart && matchesDest && matchesType && matchesDay) {
                card.style.display = "block";
                hasVisibleCard = true;

                // Fetch Starting and Ending Time from card
                const startingTimeElement = card.querySelector("#startingTime");
                const endingTimeElement = card.querySelector("#endingTime");

                if (startingTimeElement && endingTimeElement) {
                    const departureTime = convertTo24HourFormat(startingTimeElement.textContent.trim());
                    const arrivalTime = convertTo24HourFormat(endingTimeElement.textContent.trim());

                    const departureDelhi = parseDelhiTime(departureTime);
                    const arrivalDelhi = parseDelhiTime(arrivalTime);

                    let status = "";

                    if (currentDelhiTime >= departureDelhi && currentDelhiTime <= arrivalDelhi) {
                        status = "Running";
                    } else if (currentDelhiTime < departureDelhi) {
                        status = "Scheduled";
                    } else {
                        status = "Terminated";
                    }

                    // Hide other statuses and show only the relevant one
                    const runningStatus = card.querySelector("#runningStatus");
                    const scheduledStatus = card.querySelector("#scheduledStatus");
                    const terminatedStatus = card.querySelector("#terminatedStatus");

                    if (runningStatus && scheduledStatus && terminatedStatus) {
                        runningStatus.style.display = "none";
                        scheduledStatus.style.display = "none";
                        terminatedStatus.style.display = "none";

                        if (status === "Running") {
                            runningStatus.style.display = "block";
                        } else if (status === "Scheduled") {
                            scheduledStatus.style.display = "block";
                        } else {
                            terminatedStatus.style.display = "block";
                        }
                    }

                    console.log(`🕒 Current Time: ${formatToHHMMSS(currentDelhiTime)}`);
                    console.log(`🚍 Starting Time: ${formatToHHMMSS(departureDelhi)}`);
                    console.log(`🏁 Ending Time: ${formatToHHMMSS(arrivalDelhi)}`);
                    console.log(`🔵 Status: ${status}`);
                    console.log("----------------------------------------");
                }
            } else {
                card.style.display = "none";
            }
        });

        if (!hasVisibleCard) {
            if (noResultsMessage) {
                noResultsMessage.style.display = "block";
            }
        } else {
            if (noResultsMessage) {
                noResultsMessage.style.display = "none";
            }
        }

        if (requireFilterMessage) {
            requireFilterMessage.style.display = "none";
        }

        console.log(`Filtering buses with: Start=${selectedStart}, Dest=${selectedDest}, Type=${selectedType}, Day=${selectedDay}`);
    }

    function convertTo24HourFormat(timeStr) {
        timeStr = timeStr.trim();
        const match = timeStr.match(/\d{1,2}:\d{2}:\d{2}/);
        if (!match) return "00:00:00";

        let [hours, minutes, seconds] = match[0].split(":").map(Number);
        return `${hours}:${minutes}:${seconds}`;
    }

    function parseDelhiTime(timeStr) {
        let [hours, minutes, seconds] = timeStr.split(":").map(Number);
        const delhiDate = new Date(new Date().toLocaleString("en-US", { timeZone: "Asia/Kolkata" }));
        delhiDate.setHours(hours, minutes, seconds, 0);
        return delhiDate;
    }

    function formatToHHMMSS(date) {
        return date.toLocaleTimeString("en-US", { hour12: false, timeZone: "Asia/Kolkata" });
    }

    document.getElementById("filterSelect").addEventListener("change", function () {
        console.log(`Selected Type: ${this.value}`);
        filterBusCards();
    });

    document.getElementById("date").addEventListener("change", function () {
        console.log(`Selected date  : ${this.value}`);
        filterBusCards();
    });

    $(document).ready(function () {
        $('#startingPoint').select2();
        $('#destinationPoint').select2();

        $('#startingPoint').on('change', function () {
            console.log('Selected Starting Point:', $(this).val());
            filterBusCards();
        });

        $('#destinationPoint').on('change', function () {
            console.log('Selected Destination Point:', $(this).val());
            filterBusCards();
        });
    });


    // Main functionality for Rail filtering and resetting

    // For Rail: Resetting all filters to default values
    function resetDataForRail() {
        // Reset the "Type" dropdown to "All"
        document.getElementById("filterSelectForRail").value = "all";

        // Reset the "Starting Point" and "Destination Point" dropdowns
        $('#startingPointForRail').val('NULL').trigger('change');
        $('#destinationPointForRail').val('NULL').trigger('change');

        // Set the date input to today's date
        const today = new Date().toISOString().split('T')[0];
        document.getElementById("dateForRail").value = today;

        // Hide all rail cards
        const railCards = document.querySelectorAll(".rail-card");
        railCards.forEach(card => {
            card.style.display = "none";  // Hide all train cards after reset
        });

        // Show "Require Filter" message
        const requireFilterMessage = document.querySelector("#require_Filter_For_Rail");
        if (requireFilterMessage) {
            requireFilterMessage.style.display = "flex";
        }

        // Hide "No Trains Available" message
        const noResultsMessage = document.querySelector(".no-results-train");
        if (noResultsMessage) {
            noResultsMessage.style.display = "none";
        }

        console.log("All filters reset. Only 'Require Filter' message is shown.");
    }


    $(document).ready(function () {
        // For Rail: Initializing select2 for dropdowns
        $('#startingPointForRail').select2();
        $('#destinationPointForRail').select2();

        // For Rail: Filtering logic for rail cards
        function filterRailCards() {
            const selectedStart = $('#startingPointForRail').val()?.toLowerCase() || "all";
            const selectedDest = $('#destinationPointForRail').val()?.toLowerCase() || "all";
            const selectedType = document.getElementById("filterSelectForRail").value.toLowerCase();
            const selectedDate = document.getElementById("dateForRail")?.value;

            let selectedDay = null;

            if (selectedDate) {
                const dateObject = new Date(selectedDate);
                // Check if the date is valid
                if (!isNaN(dateObject)) {
                    selectedDay = dateObject.toLocaleDateString("en-US", { weekday: "short" });
                }
            }
            console.log("Selected date: ", selectedDate);
            console.log("Selected day: ", selectedDay);

            const railCards = document.querySelectorAll(".rail-card");
            let hasVisibleCard = false;

            // Condition to check if both inputs are not selected
            if (selectedStart === "all" || selectedDest === "all") {
                // Hide all rail cards
                railCards.forEach(card => card.style.display = "none");

                // Show "Require Filter" message
                document.querySelector("#require_Filter_For_Rail").style.display = "flex";

                // Hide "No Trains Available" message
                document.querySelector(".no-results-train").style.display = "none";

                return; // Stop further execution
            }

            // Hide "Require Filter" message when both filters are selected
            document.querySelector("#require_Filter_For_Rail").style.display = "none";

            // Filtering logic
            railCards.forEach(card => {
                // Extract source, destination, and type text from the card
                const sourceText = card.querySelector(".sourceforrail").textContent.toLowerCase();
                const destinationText = card.querySelector(".destinationforrail").textContent.toLowerCase();
                const cardType = card.querySelector(".type").textContent.toLowerCase();
                const cardDays = card.getAttribute("data-day-rail")?.toLowerCase();
                // Determine visibility based on all three filters
                const matchesStart = sourceText.includes(selectedStart);
                const matchesDest = destinationText.includes(selectedDest);
                const matchesType = selectedType === "all" || cardType.includes(selectedType);
                const matchesDay = !selectedDay || cardDays.includes(selectedDay.toLowerCase()) || cardDays.includes("daily");

                if (matchesStart && matchesDest && matchesType && matchesDay) {
                    card.style.display = "block"; // Show matching cards
                    hasVisibleCard = true;
                } else {
                    card.style.display = "none";
                }
            });

            // Show "No Trains Available" message if no train matches the filters
            document.querySelector(".no-results-train").style.display = hasVisibleCard ? "none" : "block";
        }

        // For Rail: Event listeners for starting point, destination point, and type dropdowns
        $('#startingPointForRail').on('change', filterRailCards);
        $('#destinationPointForRail').on('change', filterRailCards);
        $('#dateForRail').on('change', filterRailCards);
        document.getElementById("filterSelectForRail").addEventListener("change", filterRailCards);
    });

    //Update the destnation dynamically
    function updateDestination() {
        const startingPoint = document.getElementById("startingPoint");
        const destinationPoint = document.getElementById("destinationPoint");

        // Enable all options first (except the first one)
        for (const option of destinationPoint.options) {
            option.disabled = option.value === "NULL"; // Keep "--Select--" disabled
        }

        const selectedSource = startingPoint.value;

        // Disable the option that matches the selected source
        for (const option of destinationPoint.options) {
            if (option.value === selectedSource) {
                option.disabled = true;
            }
        }
    }

    function updateDestinationRail() {
        const startingPoint = document.getElementById("startingPointForRail");
        const destinationPoint = document.getElementById("destinationPointForRail");

        // Enable all options first (except the first one)
        for (const option of destinationPoint.options) {
            option.disabled = option.value === "NULL"; // Keep "--Select--" disabled
        }

        const selectedSource = startingPoint.value;

        // Disable the option that matches the selected source
        for (const option of destinationPoint.options) {
            if (option.value === selectedSource) {
                option.disabled = true;
            }
        }
    }
    
    function updateStartingPoint() {
        const startingPoint = document.getElementById("startingPoint");
        const destinationPoint = document.getElementById("destinationPoint");

        // Enable all options first (except the first one)
        for (const option of startingPoint.options) {
            option.disabled = option.value === "NULL"; // Keep "--Select--" disabled
        }

        const selectedSource = destinationPoint.value;

        // Disable the option that matches the selected source
        for (const option of startingPoint.options) {
            if (option.value === selectedSource) {
                option.disabled = true;
            }
        }
    }

    function updateStartingPointRail() {
        const startingPoint = document.getElementById("startingPointForRail");
        const destinationPoint = document.getElementById("destinationPointForRail");

        // Enable all options first (except the first one)
        for (const option of startingPoint.options) {
            option.disabled = option.value === "NULL"; // Keep "--Select--" disabled
        }

        const selectedSource = destinationPoint.value;

        // Disable the option that matches the selected source
        for (const option of startingPoint.options) {
            if (option.value === selectedSource) {
                option.disabled = true;
            }
        }
    }
</script>


<!-- Initialize Select2 -->
<script>
    $(document).ready(function () {
        $('#startingPoint').select2({
            placeholder: '--Select--',
            allowClear: true
        });
    });

    $(document).ready(function () {
        $('#destinationPoint').select2({
            placeholder: '--Select--',
            allowClear: true
        });
    });

    $(document).ready(function () {
        $('#startingPointForRail').select2({
            placeholder: '--Select--',
            allowClear: true
        });
    });

    $(document).ready(function () {
        $('#destinationPointForRail').select2({
            placeholder: '--Select--',
            allowClear: true
        });
    });
</script>

</html>