<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dreams Pos admin template</title>
    <?php
        include("head.php");
    ?>
</head>
<style>
    input[type="checkbox"]{
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

                <div class="card">
                    <form action="#" method="post" enctype="multipart/form-data" class="card-body">
                        <div class="profile-set">
                            <div class="profile-head"></div>
                            <div class="profile-top">
                                <div class="profile-content">
                                    <div class="profile-contentimg">
                                        <img src="../assets/img/SSIP_logo.png" alt="img" id="blah">
                                        <div class="profileupload">
                                            <input type="file" id="imgInp">
                                            <a href="javascript:void(0);"><img src="../assets/img/icons/edit-set.svg"
                                                alt="img" style="height: 20px;" accept="image/*"></a>
                                        </div>
                                    </div>
                                    <div class="profile-contentname">
                                        <h2>Priyanshu Pithadiya</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" value="Priyanshu Pithadiya" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Date Of Birth<b style="color:red">*</b></label>
                                    <input type="date" class="form-control" name="g_dob" id="g_dob" value="2005-12-25" required>
                                    <span id="error-message" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Mobile Number<b style="color:red" >*</b></label>
                                    <input type="tel" name="g_mobile_no" class="form-control" value="9978343950" pattern="\d{10}" title="Please enter exactly 10 digits." required>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="priyanshu2512a@gmail.com" disabled required>
                                    <span style="color: red;">You Can't Change Your Email</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Address<b style="color:red">*</b></label>
                                    <textarea name="g_address" required>A-Z</textarea>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Available Days<b style="color:red">*</b></label>
                                            <div class="form-control d-flex" style="flex-wrap: wrap; gap:15px; ">
                                                <div style="display: flex; gap:10px; align-items: center;">
                                                    <input type="checkbox" name="available_days[]" id="mon"><label for="mon" style="margin-top: 5px; cursor: pointer;">Monday</label>
                                                </div>
                                                <div style="display: flex; gap:10px; align-items: center;">
                                                    <input type="checkbox" name="available_days[]" id="tue"><label for="tue" style="margin-top: 5px; cursor: pointer;">Tuesday</label>
                                                </div>
                                                <div style="display: flex; gap:10px; align-items: center;">
                                                    <input type="checkbox" name="available_days[]" id="wed"><label for="wed" style="margin-top: 5px; cursor: pointer;">Wednesday</label>
                                                </div>
                                                <div style="display: flex; gap:10px; align-items: center;">
                                                    <input type="checkbox" name="available_days[]" id="thur"><label for="thur" style="margin-top: 5px; cursor: pointer;">Thursday</label>
                                                </div>
                                                <div style="display: flex; gap:10px; align-items: center;">
                                                    <input type="checkbox" name="available_days[]" id="fri"> <label style="margin-top: 5px; cursor: pointer;">Friday</label>
                                                </div>
                                                <div style="display: flex; gap:10px; align-items: center;">
                                                    <input type="checkbox" name="available_days[]" id="sat"><label for="sat" style="margin-top: 5px; cursor: pointer;">Saturday</label>
                                                </div>
                                                <div style="display: flex; gap:10px; align-items: center;">
                                                    <input type="checkbox" name="available_days[]" id="sun"><label for="sun" style="margin-top: 5px; cursor: pointer;">Sunday</label>
                                                </div>
                                                
                                            </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="submit" class="btn btn-submit me-2"/>
                                <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
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
    <script>
        const dobInput = document.getElementById('g_dob');
        const submitBtn = document.getElementById('submit-btn');
        const errorMessage = document.getElementById('error-message');

        // Set the max date to 18 years ago
        const today = new Date();
        const maxEligibleDate = new Date();
        maxEligibleDate.setFullYear(today.getFullYear() - 18);
        dobInput.setAttribute('max', maxEligibleDate.toISOString().split('T')[0]);

        dobInput.addEventListener('change', function () {
            const dob = new Date(dobInput.value);
            if (isNaN(dob)) {
                // Handle invalid date input
                errorMessage.textContent = 'Please select a valid date.';
                submitBtn.disabled = true;
                return;
            }

            // Calculate the date the guide turns 18
            const eighteenYearsLater = new Date(dob);
            eighteenYearsLater.setFullYear(eighteenYearsLater.getFullYear() + 18);

            if (today < eighteenYearsLater) {
                dobInput.setAttribute('title', 'You are not eligible to be a guide');
                errorMessage.textContent = 'You are not eligible to be a guide.';
                submitBtn.disabled = true; // Disable submit button
            } else {
                dobInput.removeAttribute('title');
                errorMessage.textContent = '';
                submitBtn.disabled = false; // Enable submit button
            }
        });

        // Initially validate the input and disable the button if necessary
        if (dobInput.value) {
            dobInput.dispatchEvent(new Event('change'));
        }
    </script>
</body>

</html>