<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Add Post</title>
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
                <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Je lakhvu hoy</strong> te lakho.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->
                <!-- alert-box End -->
                <div class="page-header">
                    <div class="page-title">
                        <h4>Add Post</h4>
                    </div>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Post Image</label>
                                        <div>
                                            <input type="file" accept="image/jpeg, image/jpg" class="form-control"
                                                name="postImage" id="fileUpload" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="postDesc" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" value="Submit" name="submit" class="btn btn-submit me-2">
                                    <a href="userposts" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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