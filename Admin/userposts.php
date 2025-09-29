<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>All Posts</title>

</head>
<style>
    .br {
        border-radius: 15px;
        overflow: hidden;
    }

    .crsimg {
        border-radius: 50%;
        height: 30px !important;
        width: 30px !important;
    }

    .crscon {
        color: black;
        display: flex;
        align-items: center;
    }

    .aed {
        display: flex;
        justify-content: center;
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px dashed gray;
    }

    .card-img-top {
        height: 200px !important;
    }

    .truncate-3-lines {
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 3;
  overflow: hidden;
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
                <div class="page-header">
                    <div class="page-title">
                        <h4>User Posts</h4>
                        <h6>Manage all Posts</h6>
                    </div>
                    <div class="page-btn">
                        <a href="addpost" class="btn btn-added">
                            <img src="../assets/img/icons/plus.svg" alt="img">Add New Post
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12 col-md-6 col-lg-4 d-flex">
                                <div class="card flex-fill br" style="background-color: #f8f8f8;">
                                    <img alt="../assets/img/notfound.png"
                                        src="../assets/img/Places/Betla_National_Park.png" class="card-img-top">
                                    <div class="card-body"
                                        style="display: flex; flex-direction: column; justify-content: space-between; background-color: #f8f8f8;">
                                        <h6>User Name</h6>
                                        <p class="card-text truncate-3-lines" style="color: black;">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum maxime libero
                                            totam architecto ex dolorem nulla labore dolorum iusto ad?
                                        </p>
                                        <div class="aed">
                                            <a href="editpost" class="card-link">
                                                <img src="../assets/img/icons/edit.svg" alt="img">
                                            </a>
                                            <a href="deletepost" class="card-link">
                                                <img src="../assets/img/icons/delete.svg" alt="img">
                                            </a>
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

    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../assets/plugins/sweetalert/sweetalerts.min.js"></script>



    <script src="../assets/js/script.js"></script>
</body>

</html>