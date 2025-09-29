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
$stmt = $conn->prepare("SELECT * FROM `store_master` WHERE `store_id` = $id");
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>store Details</title>
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
                        <h4>store Details</h4>
                        <h6>Full details of a store</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="productdetails">
                                    <ul class="product-bar">
                                    <?php 
                                        while($stores = $result->fetch_assoc()){
                                            $ownerphoto = $stores['owner_image'];
                                            $ownerpan = $stores['pan_image'];
                                            $owneradhar = $stores['aadhar_image'];
                                            $ownershoplicense = $stores['shop_license'];

                                            $storeimage1 = $stores['store_image'];
                                            $storeimage2 = $stores['store_image2'];
                                            $storeimage3 = $stores['store_image3'];
                                            $storeimage4 = $stores['store_image4'];
                                    ?>
                                        <li>
                                            <h4>Store Name</h4>
                                            <h6>
                                                <?php echo $stores['store_name']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Store Type</h4>
                                            <h6>
                                                <?php echo $stores['store_type']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Owner Name</h4>
                                            <h6>
                                                <?php echo $stores['owner_name']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Aadhar Number</h4>
                                            <h6>
                                                <?php echo $stores['owner_aadhar_number']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>PAN Number</h4>
                                            <h6>
                                                <?php echo $stores['owner_pan_number']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Contact no.</h4> 
                                            <h6>
                                                <?php echo $stores['owner_mobile_number']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Email</h4>
                                            <h6>
                                                <?php echo $stores['owner_email']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Working Days</h4>
                                            <h6>
                                                <?php
                                                    $working_days = explode(",", $stores['business_days']);
                                                    foreach ($working_days as $days) {
                                                        echo "<li>$days</li>";
                                                    }
                                                ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Opening Time</h4>
                                            <h6>
                                                <?php echo $stores['opening_time']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Closing Time</h4>
                                            <h6>
                                                <?php echo $stores['closing_time']; ?>
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
                                            <img src="<?php echo $ownerphoto;?>" alt='img'>
                                            <h4>Owner Image</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src="<?php echo $owneradhar;?>" alt='img'>
                                            <h4>Owner Adhar</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src="<?php echo $ownerpan;?>" alt='img'>
                                            <h4>Owner Pancard</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src="<?php echo $ownershoplicense;?>" alt='img'>
                                            <h4>Owner shop license</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src="<?php echo $storeimage1?>" alt='img'>
                                            <h4>store Image 1</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src="<?php echo $storeimage2?>" alt='img'>
                                            <h4>store Image 2</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src="<?php echo $storeimage3?>" alt='img'>
                                            <h4>store Image 3</h4>
                                        </div>
                                        <div class="slider-product">
                                            <img src="<?php echo $storeimage4?>" alt='img'>
                                            <h4>store Image 4</h4>
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