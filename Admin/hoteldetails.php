<?php
require '../includes/scripts/connection.php'; 
$id = $_GET['id'];

$query = "SELECT * FROM `hotel_master` WHERE hotel_id = '$id'";
$result = mysqli_query($conn, $query);

    
    if($result){
    $hoteldata = mysqli_fetch_assoc($result);

        $name = $hoteldata['hotel_name'];
        $type = $hoteldata['hotel_name'];
        $total_room = $hoteldata['num_rooms'];
        $room_types = $hoteldata['room_types'];
        $facilities = $hoteldata['facilities'];
        $price_single = $hoteldata['single_room_price'];
        $price_couple = $hoteldata['couple_room_price'];
        $price_AC = $hoteldata['ac_room_price'];
        $price_VIP = $hoteldata['vip_room_price'];
        $price_Luxury = $hoteldata['luxury_room_price'];
        $price_Delux = $hoteldata['deluxe_room_price'];
        $hotel_add = $hoteldata['hotel_address'];
        $owner_name = $hoteldata['owner_name'];
        $email = $hoteldata['email'];
        $contact = $hoteldata['contact_number'];
        $license_no = $hoteldata['license_number'];
        $patment_methods = $hoteldata['payment_method'];  

        // PHOTOS
        $image1 = $hoteldata['hotel_image1'];
        $image2 = $hoteldata['hotel_image2'];
        $image3 = $hoteldata['hotel_image3'];
        $image4 = $hoteldata['hotel_image4'];
        $image5 = $hoteldata['hotel_image5'];


    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Hotel Details</title>
</head>
<style>
    h6 li{
        list-style:disc;
        border: none !important;
        margin-left: 16px;
    }
</style>
<body>
    <div class="main-wrapper">

        <?php 
            include("header.php");
        ?>


        <?php
            include("sidebar.php");
        ?>

        <div class="page-wrapper">
            <div class="content">
                <!-- alert-box -->
                <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Je lakhvu hoy</strong> te lakho.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->
                <!-- alert-box End -->
                <div class="page-header">
                    <div class="page-title">
                        <h4>Hotel Details</h4>
                        <h6>Full details of a Hotel</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="productdetails">
                                    <ul class="product-bar">
                                        <li>
                                            <h4>Hotel Name</h4>
                                            <h6>
                                                <?php echo $name ?>
                                            </h6>
                                        </li>
                                        <!-- <li>
                                            <h4>Type</h4>
                                            <h6>
                                                
                                            </h6>
                                        </li> -->
                                        <li>
                                            <h4>Total Rooms</h4>
                                            <h6>
                                            <?php echo $total_room  ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Room Types</h4>
                                            <h6>
                                            <?php 
                                                $room_types_array = explode(',', $room_types); // Split by comma
                                                foreach ($room_types_array as $type) {
                                                    echo "<li>" . trim($type) . "</li>"; // Trim to remove extra spaces
                                                }
                                            ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Facilities</h4>
                                            <h6>
                                            <?php 
                                                $faclilities_array = explode(',', $facilities); // Split by comma
                                                foreach ($faclilities_array as $type) {
                                                    echo "<li>" . trim($type) . "</li>"; // Trim to remove extra spaces
                                                }
                                            ?>
                                            </h6>
                                        </li>
                                        <!-- <li>
                                            <h4>Check-in & Check-out </h4>
                                            <h6>
                                                N/A
                                            </h6>
                                        </li> -->
                                        <li>
                                            <h4>Single Room Price</h4>
                                            <h6>
                                            <?php echo $price_single ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Couple Room Price</h4>
                                            <h6>
                                            <?php echo $price_couple ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>AC Room Price</h4>
                                            <h6>
                                            <?php echo $price_AC ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>VIP Room Price</h4>
                                            <h6>
                                            <?php echo $price_VIP ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Luxury Room Price</h4>
                                            <h6>
                                            <?php echo $price_Luxury ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Deluxe Room Price</h4>
                                            <h6>
                                            <?php echo $price_Delux ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Hotel Address</h4>
                                            <h6>
                                            <?php echo $hotel_add ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Owner Name</h4>
                                            <h6>
                                            <?php echo $owner_name ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Contact no.</h4>
                                            <h6>
                                            <?php echo $contact ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Email</h4>
                                            <h6>
                                            <?php echo $email ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Hotel Licence Number</h4>
                                            <h6><?php echo $license_no ?></h6>
                                        </li>
                                        <li>
                                            <h4>Payment Methods</h4>
                                            <h6>
                                            <?php 
                                                $payment_array = explode(',', $patment_methods); // Split by comma
                                                foreach ($payment_array as $type) {
                                                    echo "<li>" . trim($type) . "</li>"; // Trim to remove extra spaces
                                                }
                                            ?>
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="slider-product-details">
                                    <div class="owl-carousel owl-theme product-slide">
                                        <div class="slider-product">
                                            <img src=<?php echo '../uploads/hotels/'.$image1; ?> alt='<?php
                                            echo $image1; ?>'>
                                            <h4>Hotel Image</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src=<?php echo '../uploads/hotels/'.$image2; ?> alt='<?php
                                            echo $image2; ?>'>
                                            <h4>Hotel Image</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src=<?php echo '../uploads/hotels/'.$image3; ?> alt='<?php
                                            echo $image3; ?>'>
                                            <h4>Hotel Image</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src=<?php echo '../uploads/hotels/'.$image4; ?> alt='<?php
                                            echo $image4; ?>'>
                                            <h4>Hotel Image</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src=<?php echo '../uploads/hotels/'.$image5; ?> alt='<?php
                                            echo $image5; ?>'>
                                            <h4>Hotel Image</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/js/feather.min.js"></script>

    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/plugins/owlcarousel/owl.carousel.min.js"></script>

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>