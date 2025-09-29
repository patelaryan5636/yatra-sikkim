<!DOCTYPE html>
<html lang="en">

<head>
    <?php
            include("head.php");
        ?>
    <title>Edit Hotel Details</title>
</head>
<style>
    input[type="checkbox"] {
        transform: scale(1.3);
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
                        <h4>Edit Deails</h4>
                    </div>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Hotel Name <b style="color:red">*</b></label>
                                        <input type="text" value="PYS" name="h_name" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Owner Name <b style="color:red">*</b></label>
                                        <input type="text" value="Priyanshu" name="h_owner_name" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Number Of Rooms <b style="color:red">*</b></label>
                                        <input type="number" class="form-control" value="5" name="h_rooms" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Mobile Number<b style="color:red">*</b></label>
                                        <input type="tel" name="h_owner_mobile_no" id="mobile-input" class="form-control" value="9978343950" pattern="\d{10}" title="Please enter exactly 10 digits." required>
                                        <span id="error-message" style="color:red;"></span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Email<b style="color:red">*</b></label>
                                        <input type="email" name="h_owner_email" class="form-control"
                                            value="priyanshu2512a@gmail.com" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Hotel Licence Number<b style="color:red">*</b></label>
                                        <input type="text" name="g_licence" class="form-control" value="123456789" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Hotel Address<b style="color:red">*</b></label>
                                        <textarea name="h_address" style="height: 140px;" required>ABCD</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Available Room Types<b style="color:red">*</b></label>
                                        <div class="form-control d-flex" style="flex-wrap: wrap; gap:15px; ">
                                            <div style="display: flex; gap:10px; align-items: center;">
                                                <input type="checkbox" name="roomtype[]" id="sr"><label for="sr" style="margin-top: 5px; cursor: pointer;">Single Room</label>
                                            </div>
                                            <div style="display: flex; gap:10px; align-items: center;">
                                                <input type="checkbox" name="roomtype[]" id="cr"><label for="cr" style="margin-top: 5px; cursor: pointer;">Couple Room</label>
                                            </div>
                                            <div style="display: flex; gap:10px; align-items: center;">
                                                <input type="checkbox" name="roomtype[]" id="ar"><label for="ar" style="margin-top: 5px; cursor: pointer;">AC Room</label>
                                            </div>
                                            <div style="display: flex; gap:10px; align-items: center;">
                                                <input type="checkbox" name="roomtype[]" id="vr"><label for="vr" style="margin-top: 5px; cursor: pointer;">VIP Room</label>
                                            </div>
                                            <div style="display: flex; gap:10px; align-items: center;">
                                                <input type="checkbox" name="roomtype[]" id="lr"><label for="lr" style="margin-top: 5px; cursor: pointer;">Luxury Room</label>
                                            </div>
                                            <div style="display: flex; gap:10px; align-items: center;">
                                                <input type="checkbox" name="roomtype[]" id="ddr"><label for="ddr" style="margin-top: 5px; cursor: pointer;">Deluxe Double Room</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Facilities Provided<b style="color:red">*</b></label>
                                        <div class="form-control d-flex" style="flex-wrap: wrap; gap:15px; ">
                                            <div style="display: flex; gap:10px; align-items: center;">
                                                <input type="checkbox" name="facilities[]" id="wifi"><label for="wifi" style="margin-top: 5px; cursor: pointer;">Wifi</label>
                                            </div>
                                            <div style="display: flex; gap:10px; align-items: center;">
                                                <input type="checkbox" name="facilities[]" id="park"><label for="park" style="margin-top: 5px; cursor: pointer;">Parking</label>
                                            </div>
                                            <div style="display: flex; gap:10px; align-items: center;">
                                                <input type="checkbox" name="facilities[]" id="aircond"><label for="aircond" style="margin-top: 5px; cursor: pointer;">Air Conditioning</label>
                                            </div>
                                            <div style="display: flex; gap:10px; align-items: center;">
                                                <input type="checkbox" name="facilities[]" id="swim"><label for="swim" style="margin-top: 5px; cursor: pointer;">Swimming Pool</label>
                                            </div>
                                            <div style="display: flex; gap:10px; align-items: center;">
                                                <input type="checkbox" name="facilities[]" id="secu"><label for="secu" style="margin-top: 5px; cursor: pointer;">24/7 Security</label>
                                            </div>
                                            <div style="display: flex; gap:10px; align-items: center;">
                                                <input type="checkbox" name="facilities[]" id="rooms"><label for="rooms" style="margin-top: 5px; cursor: pointer;">Room Service</label>
                                            </div>
                                            <div style="display: flex; gap:10px; align-items: center;">
                                                <input type="checkbox" name="facilities[]" id="conf"><label for="conf" style="margin-top: 5px; cursor: pointer;">Conference Hall</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Single Room Price <b style="color:red">*</b></label>
                                        <input type="number" class="form-control" value="500" name="h_single_room" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Couple Room Price <b style="color:red">*</b></label>
                                        <input type="number" class="form-control" value="1000" name="h_couple_room" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>AC Room Price <b style="color:red">*</b></label>
                                        <input type="number" class="form-control" value="1000" name="h_ac_room" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>VIP Room Price <b style="color:red">*</b></label>
                                        <input type="number" class="form-control" value="1000" name="h_vip_room" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Luxury Room Price <b style="color:red">*</b></label>
                                        <input type="number" class="form-control" value="1000" name="h_luxury_room" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Deluxe Room Price <b style="color:red">*</b></label>
                                        <input type="number" class="form-control" value="1000" name="h_deluxe_room" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Owner Image</label>
                                        <div>
                                            <input type="file" accept="image/jpeg, image/jpg, image/png" class="form-control"
                                                name="ownerImage" id="fileUpload">
                                            <b style="color: red;">Image: Hello.jpg</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Hotel Image 1</label>
                                        <div>
                                            <input type="file" accept="image/jpeg, image/jpg, image/png" class="form-control"
                                                name="h_image_one" id="fileUpload">
                                            <b style="color: red;">Image: Hello.jpg</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Hotel Image 2</label>
                                        <div>
                                            <input type="file" accept="image/jpeg, image/jpg, image/png" class="form-control"
                                                name="h_image_two" id="fileUpload">
                                            <b style="color: red;">Image: Hello.jpg</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Hotel Image 3</label>
                                        <div>
                                            <input type="file" accept="image/jpeg, image/jpg, image/png" class="form-control"
                                                name="h_image_three" id="fileUpload">
                                            <b style="color: red;">Image: Hello.jpg</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Hotel Image 4</label>
                                        <div>
                                            <input type="file" accept="image/jpeg, image/jpg, image/png" class="form-control"
                                                name="h_image_four" id="fileUpload">
                                            <b style="color: red;">Image: Hello.jpg</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Hotel Image 5</label>
                                        <div>
                                            <input type="file" accept="image/jpeg, image/jpg, image/png" class="form-control"
                                                name="h_image_five" id="fileUpload">
                                            <b style="color: red;">Image: Hello.jpg</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" value="Submit" name="submit" id="submit-btn"
                                        class="btn btn-submit me-2">
                                    <a href="guidelist" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script>
            const mobileInput = document.getElementById('mobile-input');
            const errorMessage = document.getElementById('error-message');
            const submitBtn = document.getElementById('submit-btn');
    
            // Function to validate the mobile number
            function validateMobileNumber() {
                const mobileNumber = mobileInput.value;
    
                // Check if the input matches the pattern for a 10-digit number
                const isValid = /^\d{10}$/.test(mobileNumber);
    
                if (!isValid) {
                    errorMessage.textContent = 'Please enter a valid 10-digit mobile number.';
                    submitBtn.disabled = true; // Disable submit button
                } else {
                    errorMessage.textContent = '';
                    submitBtn.disabled = false; // Enable submit button
                }
            }
    
            // Attach the validation function to the input event
            mobileInput.addEventListener('input', validateMobileNumber);
    
            // Initial validation in case the field has a default value
            validateMobileNumber();
        </script>

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