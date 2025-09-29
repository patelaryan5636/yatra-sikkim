<?php
require '../includes/scripts/connection.php'; 
$id = $_GET['id'];

$query = "SELECT * FROM `store_master` WHERE store_id = '$id'";
$result = mysqli_query($conn, $query);

if($result){
    $storedata = mysqli_fetch_assoc($result);

    $name = $storedata['store_name'];;
    $type = $storedata['store_type'];
    $owner_name = $storedata['owner_name'];
    $mobile = $storedata['owner_mobile_number'];
    $email = $storedata['owner_email'];
    // $address = $storedata['store_address'];
    $availability = $storedata['business_days'];
    $opening_time = $storedata['opening_time'];
    $closing_time = $storedata['closing_time'];

    $owner_image = $storedata['owner_image'];
    $image1 = $storedata['store_image'];
    $image2 = $storedata['store_image2'];
    $image3 = $storedata['store_image3'];
    $image4 = $storedata['store_image4'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Store Details</title>
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
                        <h4>Store Details</h4>
                        <h6>Full details of a Store</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="productdetails">
                                    <ul class="product-bar">
                                        <li>
                                            <h4>Store Name</h4>
                                            <h6>
                                                <?php echo $name; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Type</h4>
                                            <h6>
                                                <?php echo $type; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Owner Name</h4>
                                            <h6>
                                                <?php echo $owner_name; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Mobile Number</h4>
                                            <h6>
                                                <?php echo $mobile; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Email</h4>
                                            <h6>
                                                <?php echo $email; ?>
                                            </h6>
                                        </li>
                                        <!-- <li>
                                            <h4>Address</h4>
                                            <h6>
                                                <?php echo $address; ?>
                                            </h6>
                                        </li> -->
                                        <li>
                                            <h4>Availability</h4>
                                            <h6>
                                                <?php 
                                                    $availability_array = explode(',', $availability); // Split by comma
                                                    foreach ($availability_array as $day) {
                                                        echo "<li>" . trim($day) . "</li>"; // Trim to remove extra spaces
                                                    }
                                                ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Time</h4>
                                            <h6>
                                                <?php echo $opening_time; ?> - <?php echo $closing_time; ?>
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
                                            <img src=<?php echo $owner_image; ?> alt='<?php
                                            echo $owner_image; ?>'>
                                            <h4>Owner Image</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src=<?php echo $image1; ?> alt='<?php
                                            echo $image1; ?>'>
                                            <h4>Store Image 1</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src=<?php echo $image2; ?> alt='<?php
                                            echo $image2; ?>'>
                                            <h4>Store Image 2</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src=<?php echo $image3; ?> alt='<?php
                                            echo $image3; ?>'>
                                            <h4>Store Image 3</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src=<?php echo $image4; ?> alt='<?php
                                            echo $image4; ?>'>
                                            <h4>Store Image 4</h4>
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