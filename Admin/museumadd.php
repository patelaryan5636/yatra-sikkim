<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Add Museum</title>
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
                        <h4>Add Museum</h4>
                    </div>
                </div>
                <form action="./add_event_manually.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Event Name <b style="color:red">*</b></label>
                                        <input type="text" name="e_name" require>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Tagline <b style="color:red">*</b></label>
                                        <input type="text" name="e_tagline" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                    <label>Department Name</label>
                                        <select class="select" name="e_dept_id">
                                            <option value=1>
                                                Computer Engineering
                                            </option>
                                            <option value=2>
                                                Information Technology
                                            </option>
                                            <option value=3>
                                                Mechnical Engineering
                                            </option>
                                            <option value=4>
                                                Electrical Engineering
                                            </option>
                                            <option value=5>
                                                EC Engineering
                                            </option>
                                            <option value=6>
                                                Civil Engineering
                                            </option>
                                            <option value=7>
                                                Automobile Engineering
                                            </option>
                                            <option value=8>
                                                MBA Department
                                            </option>
                                            <option value=9>
                                                MCA Department
                                            </option>
                                            <option value=10>
                                                 Science and Humanities
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Team Leader Mobile No.<b style="color:red">*</b></label>
                                        <input type="number" name="team_leader_number" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Team Name <b style="color:red">*</b></label>
                                        <input type="text" name="e_team" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Participation Price <b style="color:red">*</b></label>
                                        <input type="number" name="e_participation_price" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Team Participation Price <b style="color:red">*</b></label>
                                        <input type="number" name="e_team_par_price" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Total members</label>
                                        <select class="select" name="e_total_member">
                                            <option value="1">
                                                1
                                            </option>
                                            <option value="2">
                                                2
                                            </option>
                                            <option value="3">
                                                3
                                            </option>
                                            <option value="4">
                                                4
                                            </option>
                                            <option value="5">
                                                5
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>1st Winner Price<b style="color:red">*</b></label>
                                        <input type="number" name="e_win1" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>2nd Winner Price<b style="color:red">*</b></label>
                                        <input type="number" name="e_win2" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>3rd Winner Price<b style="color:red">*</b></label>
                                        <input type="number" name="e_win3" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Event Location<b style="color:red">*</b></label>
                                        <input type="text" name="e_location" require>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Event Date<b style="color:red">*</b></label>
                                        <input type="date" name="e_date" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-lg4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Event Discription<b style="color:red">*</b></label>
                                        <textarea name="e_desc" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Event Rules<b style="color:red">*</b></label>
                                        <textarea name="e_rules" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 1 Title<b style="color:red">*</b></label>
                                        <input type="text" name="e_round1_title" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 1 Description<b style="color:red">*</b></label>
                                        <textarea name="e_round1_desc" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 2 Title</label>
                                        <input type="text" name="e_round2_title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 2 Description<b style="color:red">*</b></label>
                                        <textarea name="e_round2_desc" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 3 Title</label>
                                        <input type="text" name="e_round3_title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 3 Description</label>
                                        <textarea name="e_round3_desc" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 4 Title</label>
                                        <input type="text" name="e_round4_title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 4 Description</label>
                                        <textarea name="e_round4_desc" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 5 Title</label>
                                        <input type="text" name="e_round5_title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 5 Description</label>
                                        <textarea name="e_round5_desc" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Max Tickets</label>
                                        <input type="number" name="e_max_ticket" class="form-control" value=0 require>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Event Image</label>
                                        <div>
                                            <input type="file" accept="image/jpeg, image/jpg" class="form-control"
                                                name="productImage" id="fileUpload" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" value="Submit" name="submit" class="btn btn-submit me-2">
                                    <a href="eventlist.php" class="btn btn-cancel">Cancel</a>
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