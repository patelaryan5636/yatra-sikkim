<?php 
session_start();
require '../includes/scripts/connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM store_master WHERE is_confirmed = 1");
$stmt->execute();
$result = $stmt->get_result();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Guide List</title>
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
                        <h4>Guide List</h4>
                        <h6>Manage Guides</h6>
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
                                        <th>Store Name</th>
                                        <th>Type</th>
                                        <!-- <th>Years in Business</th> -->
                                        <th>Owner Name</th>
                                        <th>Contact no.</th>
                                        <th>Online Order</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php 
                                    while( $store = $result->fetch_assoc()){
                                ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo $store['store_name']; ?>
                                        </td>
                                        <td>
                                        <?php echo $store['store_type']; ?>
                                        </td>
                                        <!--  <td>
                                        <?php
                                        //  echo $store['store_name']; 
                                         ?> 
                                        </td> -->
                                        <td>
                                        <?php echo $store['owner_name']; ?>
                                        </td>
                                        <td>
                                        <?php echo $store['owner_mobile_number']; ?>
                                        </td>
                                        <td>
                                            Yes Static
                                        </td>
                                        <td>
                                        <?php
                                            echo "<a class='me-3' href=storeedit.php?id=".$store['store_id'].">
                                                <img src='../assets/img/icons/edit.svg' alt='img'>
                                            </a>
                                            <a class='me-3' href=storedetails.php?id=".$store['store_id'].">
                                                <img src='../assets/img/icons/eye.svg' alt='img'>
                                            </a>
                                            <a class='me-3' href='store_status_update.php?action=con_delete&id={$store['store_id']}'>
                                                <img src='../assets/img/icons/delete.svg' alt='img'>
                                            </a>"
                                        ?>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php 
                                    } 
                                ?>
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