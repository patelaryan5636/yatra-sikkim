<!-- Last updated by
    Mihir Amin
-->


<?php 
require '../includes/scripts/connection.php'; 

function decryptId($encryptedId) {
    $key = "yatra99"; // Must match encryption key
    $iv = "1234567891011121"; // Must match encryption IV

    return openssl_decrypt(base64_decode($encryptedId), "AES-128-CTR", $key, 0, $iv);
}

$id = decryptId($_GET['id']);
$query = "SELECT * FROM `guide_master` WHERE guide_id = '$id'";
    $result = mysqli_query($conn, $query);

    
    if($result){
    $guidedata = mysqli_fetch_assoc($result);

    $name = $guidedata['full_name'];
    $dob = $guidedata['birth_date'];
    $gender = $guidedata['gender'];
    $address = $guidedata['address'];
    $nationality = $guidedata['nationality'];
    $mobile = $guidedata['mobile_number'];
    $Alt_mobile = $guidedata['alternative_mobile'];
    $added_by = $guidedata['added_by'];

    $email_query = "SELECT email FROM `user_master` WHERE user_id = '$added_by'";  
    $email_result = mysqli_query($conn, $email_query);

    $email = $email_result ? mysqli_fetch_assoc($email_result)['email'] : 'Email not found';
    
    $exp = $guidedata['experience'];
    $availbility = $guidedata['available_days'];
    $time_slot = $guidedata['preferred_time'];

    $photo = $guidedata['passport_photo'];

     // Get tour fees
     $solo_fee = $guidedata['solo_tour_fee'];
     $group_fee = $guidedata['group_tour_fee'];
     $vip_fee = $guidedata['vip_tour_fee'];
 
     // Determine available tour types
     $available_tours = [];
     if ($solo_fee > 0) $available_tours[] = "Solo Tour";
     if ($group_fee > 0) $available_tours[] = "Group Tour";
     if ($vip_fee > 0) $available_tours[] = "VIP Tour";
    

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Guide Details</title>
    <?php
        include("head.php");
    ?>
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
                        <h4>Guide Details</h4>
                        <h6>Full details of a Guide</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="productdetails">
                                    <ul class="product-bar">
                                        <li>
                                            <h4>Guide Name</h4>
                                            <h6>
                                            <?php echo $name; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Date Of Birth</h4>
                                            <h6>
                                            <?php echo $dob; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Gender</h4>
                                            <h6>
                                            <?php echo $gender; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Address</h4>
                                            <h6>
                                            <?php echo $address; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Nationality</h4>
                                            <h6>
                                            <?php echo $nationality; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Mobile Number</h4>
                                            <h6>
                                            <?php echo $mobile; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Alternate Mobile Number</h4>
                                            <h6>
                                            <?php echo $Alt_mobile; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Email</h4>
                                            <h6>
                                            <?php echo $email; ?>
                                                
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Languages Spoken</h4>
                                            <h6>
                                                <li>English</li>
                                                <li>Gujarati</li>
                                                <li>Hindi</li>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Years Of Experience</h4>
                                            <h6>
                                            <?php echo $exp; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Certification or Training in Tourism</h4>
                                            <h6>
                                                <li>Raj Pipla Palace</li>
                                                <li>SSIP</li>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Salary</h4>
                                            <h6>
                                                30,000
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Availability</h4>
                                            <h6>
                                            <?php echo $availbility; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Time Slot</h4>
                                            <h6>
                                            <?php echo $time_slot; ?>
                                            </h6>
                                        </li>
                                        <li>
                                        <?php if (!empty($available_tours)) {  ?>
                                            <h4>Tour Type</h4>
                                            <h6>
                                                <?php 
                                                foreach ($available_tours as $tour) {
                                                    echo "<li>$tour</li>";
                                                }
                                                ?>
                                                <!-- <li>Group</li>
                                                <li>School Tours</li> -->
                                            </h6>
                                            <?php } ?>
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
                                            <img src=<?php echo '../uploads/guides_documents/'.$photo; ?> alt='<?php
                                            echo $photo; ?>'>
                                            <h4>Guide Image</h4>
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