<!-- Last updated by
    Mihir Amin
-->

<?php 
session_start();
require_once '../includes/scripts/connection.php';

function decryptId($encryptedId) {
    $key = "yatra99"; // Must match encryption key
    $iv = "1234567891011121"; // Must match encryption IV

    return openssl_decrypt(base64_decode($encryptedId), "AES-128-CTR", $key, 0, $iv);
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$encryptedId = $_GET['id'];
$id = decryptId($encryptedId);
$stmt = $conn->prepare("SELECT * FROM `hotel_master` WHERE `hotel_id` = $id");
$stmt->execute();
$result = $stmt->get_result();

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
                                    <?php 
                                        while($hotels = $result->fetch_assoc()){
                                            $ownerphoto = $hotels['owner_photo'];
                                            $owneradhar = $hotels['owner_aadhar_doc'];
                                            $ownerpan = $hotels['owner_pan_doc'];
                                            $ownerlicense = $hotels['hotel_license_doc'];
                                            $hotel_image_1 = $hotels['hotel_image1'];
                                            $hotel_image_2 = $hotels['hotel_image2'];
                                            $hotel_image_3 = $hotels['hotel_image3'];
                                            $hotel_image_4 = $hotels['hotel_image4'];
                                            $hotel_image_5 = $hotels['hotel_image5'];
                                    ?>
                                        <li>
                                            <h4>Hotel Name</h4>
                                            <h6>
                                                <?php echo $hotels['hotel_name']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Total Rooms</h4>
                                            <h6>
                                                <?php echo $hotels['num_rooms']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Room Types</h4>
                                            <h6>
                                                <?php 
                                                    $room_types = explode(",", $hotels['room_types']);
                                                    foreach ($room_types as $rooms) {
                                                        echo "<li>$rooms</li>";
                                                    }
                                                ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Facilities</h4>
                                            <h6>
                                            <?php 
                                                    $facilities = explode(",", $hotels['facilities']);
                                                    foreach ($facilities as $facility) {
                                                        echo "<li>$facility</li>";
                                                    }
                                                ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Check-in & Check-out </h4>
                                            <h6>
                                                N/A
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Single Room Price</h4>
                                            <h6>
                                                <?php echo $hotels['single_room_price']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Couple Room Price</h4>
                                            <h6>
                                                <?php echo $hotels['couple_room_price']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>AC Room Price</h4>
                                            <h6>
                                                <?php echo $hotels['ac_room_price']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>VIP Room Price</h4>
                                            <h6>
                                                <?php echo $hotels['vip_room_price']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Luxury Room Price</h4>
                                            <h6>
                                                <?php echo $hotels['luxury_room_price']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Deluxe Room Price</h4>
                                            <h6>
                                                <?php echo $hotels['deluxe_room_price']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Hotel Address</h4>
                                            <h6>
                                                <?php echo $hotels['hotel_address']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Owner Name</h4>
                                            <h6>
                                                <?php echo $hotels['owner_name']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Contact no.</h4>
                                            <h6>
                                                <?php echo $hotels['contact_number']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Email</h4>
                                            <h6>
                                                <?php echo $hotels['email']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Hotel Licence Number</h4>
                                            <h6>
                                                <?php echo $hotels['license_number']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Payment Methods</h4>
                                            <h6>
                                                <?php
                                                    $payment_method = explode(",", $hotels['payment_method']);
                                                    foreach ($payment_method as $payment) {
                                                        echo "<li>$payment</li>";
                                                    }
                                                ?>
                                            </h6>
                                        </li>
                                        <?php 
                                            }
                                        ?>
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
                                            <img src="../uploads/documents/<?php echo $ownerphoto;?>" alt='img'>
                                            <h4>Owner Image</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src="../uploads/documents/<?php echo $owneradhar;?>" alt='img'>
                                            <h4>owner Adharcard</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src="../uploads/documents/<?php echo $ownerpan;?>" alt='img'>
                                            <h4>owner Pancard</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src="../uploads/documents/<?php echo $ownerlicense;?>" alt='img'>
                                            <h4>owner hotel license</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src="../uploads/hotels/<?php echo $hotel_image_1;?>" alt='img'>
                                            <h4>Hotel Image 1</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src="../uploads/hotels/<?php echo $hotel_image_2;?>" alt='img'>
                                            <h4>Hotel Image 2</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src="../uploads/hotels/<?php echo $hotel_image_3;?>" alt='img'>
                                            <h4>Hotel Image 3</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src="../uploads/hotels/<?php echo $hotel_image_4;?>" alt='img'>
                                            <h4>Hotel Image 4</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src="../uploads/hotels/<?php echo $hotel_image_5;?>" alt='img'>
                                            <h4>Hotel Image 5</h4>
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