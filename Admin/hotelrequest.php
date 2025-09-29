<!-- Last updated by
    Mihir Amin
-->

<?php 
session_start();
require '../includes/scripts/connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM `hotel_master` WHERE `is_confirmed` = 0");
$stmt->execute();
$result = $stmt->get_result();

function encryptId($id) {
    $key = "yatra99"; // Use a secure key
    $iv = "1234567891011121"; // IV must be 16 bytes for AES-128-CTR

    return base64_encode(openssl_encrypt($id, "AES-128-CTR", $key, 0, $iv));
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Guide List</title>
    <style>
        .checktoggle {
            height: 18px !important;
            width: 37px !important;
        }

        .checktoggle::after {
            height: 15px !important;
            width: 15px !important;
        }
    </style>
</head>

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
                <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Je lakhvu hoy</strong> te lakho.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->
                <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Je lakhvu hoy</strong> te lakho.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->
                <!-- alert-box End -->
                <div class="page-header">
                    <div class="page-title">
                        <h4>Hotel List</h4>
                        <h6>Manage the Hotels Nearby</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img src="../assets/img/icons/search-white.svg"
                                            alt="img"></a>
                                </div>
                            </div>
                            <div class="wordset">
                                <ul>
                                    <li>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                src="../assets/img/icons/pdf.svg" alt="img"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table  datanew">
                                <thead>
                                    <tr>
                                        <th>Hotel Name</th>
                                        <th>Owner Name</th>
                                        <th>Contact Number</th>
                                        <th>Number of Rooms</th>
                                        <th>Address</th>
                                        <th>Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php 
                                    while( $hotels = $result->fetch_assoc()){
                                ?>
                                <tbody>
                                    <tr>
                                        <td>
                                        <?php 
                                            echo $hotels['hotel_name']; 
                                        ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $hotels['owner_name']; 
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $hotels['contact_number']; 
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $hotels['num_rooms']; 
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $hotels['hotel_address']; 
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                echo "<a class='me-3' href=hotel_req_details.php?id=".encryptId($hotels['hotel_id']).">
                                                    <img src='../assets/img/icons/eye.svg' alt='img'>
                                                </a>
                                                "
                                            ?>
                                        </td>
                                        <td>
                                            <form action="hotel_status_update.php" method="POST" style="display:inline;">
                                                <input type="hidden" name="id" value="<?php echo $hotels['hotel_id'];?>">
                                                <button type="submit" name="enable" style="border: none; background: transparent;">
                                            <a class='me-3' href="#" id="enableBtn">
                                                <img src='../assets/img/icons/enable.svg' alt='img' style="width: 24px;">
                                            </a>
                                            </button>
                                            </form>
                                            <?php
                                            echo "<a class='me-3' href='hotel_status_update.php?action=delete&id={$hotels['hotel_id']}' id='disableBtn'>
                                            <img src='../assets/img/icons/disable.svg' alt='img' style='width: 25px;'>
                                            </a>";
                                            ?>
                                        </td>
                                        <!-- <td>
        
            <img src="../assets/img/icons/enable.svg" alt="Enable" style="width: 24px;">
        
                                        </td> -->

                                    </tr>
                                </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/js/feather.min.js"></script>

    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="../assets/js/script.js"></script>

</body>

</html>