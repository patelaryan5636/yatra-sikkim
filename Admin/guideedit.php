<?php 
require '../includes/scripts/connection.php'; 

function decryptId($encryptedId) {
    $key = "yatra99"; // Must match encryption key
    $iv = "1234567891011121"; // Must match encryption IV

    return openssl_decrypt(base64_decode($encryptedId), "AES-128-CTR", $key, 0, $iv);
}

$id = decryptId($_GET['id']);

$query = "SELECT * FROM guide_master WHERE guide_id = ? AND is_confirm = 1";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$guide = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['g_name'];
    $dob = $_POST['g_dob'];
    $gender = $_POST['g_gender'];
    $nationality = $_POST['g_nationality'];
    $mobile = $_POST['g_mobile_no'];
    $alt_mobile = $_POST['g_alt_mob'];
    // $email = $_POST['g_email'];
    // $languages = $_POST['g_lang'];
    $experience = $_POST['g_experience'];
    $address = $_POST['g_address'];
    $solo_tour = $_POST['g_solo_tour'];
    $group_tour = $_POST['g_group_tour'];
    $vip_tour = $_POST['g_vip_tour'];
    $from_time = $_POST['g_prefer_time'];
    $licence = $_POST['g_licence'];
    $available_days = isset($_POST['available_days']) ? implode(",", $_POST['available_days']) : "";

   

    // Update query
    $update_query = "UPDATE guide_master SET full_name=?, birth_date=?, gender=?, nationality=?, mobile_number=?, alternative_mobile=?, experience=?, address=?, solo_tour_fee=?, group_tour_fee=?, vip_tour_fee=?,preferred_time=?, guide_license_number=? WHERE guide_id=?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param('ssssiissiiisii', $name, $dob, $gender, $nationality, $mobile, $alt_mobile, $experience, $address, $solo_tour, $group_tour, $vip_tour, $from_time, $licence, $id);
    $stmt->execute();

    $sql = "UPDATE `guide_master` SET `available_days`='$available_days' WHERE `guide_id` = $id"; 
    $result = mysqli_query($conn,$sql);
    
    header("Location: guidelist.php");
    exit();
}

$stmt->close();
$conn->close();
?>

?>
   <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php
            include("head.php");
        ?>
        <title>Edit Guide Details</title>
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
                                            <label>Guide Name <b style="color:red">*</b></label>
                                            <input type="text"  name="g_name" value=<?php echo $guide['full_name'] ?> required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Date Of Birth<b style="color:red">*</b></label>
                                            <input type="date" class="form-control" name="g_dob" id="g_dob" value=<?php echo $guide['birth_date'] ?> required>
                                            <span id="error-message" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                        <label>Gender<b style="color:red">*</b></label>
                                            <select class="select" name="g_gender"  required>
                                                <option value="Male" <?php if($guide['gender'] == "Male"){echo "selected";}?>>
                                                    Male
                                                </option>
                                                <option value="Female" <?php if($guide['gender'] == "Female"){echo "selected";}?>>
                                                    Female
                                                </option>
                                                <option value="Other" <?php if($guide['gender'] == "Other"){echo "selected";}?>>
                                                    Other
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Nationality <b style="color:red">*</b></label>
                                            <select class="select" name="g_nationality" required>
                                                <option value="Indian" <?php if($guide['nationality'] == "Indian"){echo "selected";}?>>
                                                    Indian
                                                </option>
                                                <option value="NRI" <?php if($guide['nationality'] == "NRI"){echo "selected";}?>>
                                                    NRI
                                                </option>
                                                <option value="Other" <?php if($guide['nationality'] == "Other"){echo "selected";}?>>
                                                    Other
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Mobile Number<b style="color:red" >*</b></label>
                                            <input type="tel" name="g_mobile_no" class="form-control" value=<?php echo $guide['mobile_number'] ?> pattern="\d{10}" title="Please enter exactly 10 digits." required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Alternate Mobile Number</label>
                                            <input type="number" name="g_alt_mob" class="form-control"value=<?php echo $guide['alternative_mobile'] ?>  pattern="\d{10}" title="Please enter exactly 10 digits.">
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Email<b style="color:red">*</b></label>
                                            <input type="email" name="g_email" class="form-control" value= required>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Languages Spoken<b style="color:red">*</b></label>
                                            <input type="text" name="g_lang" class="form-control" value="Gujarati, English, Hindi" required>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Years Of Experience<b style="color:red">*</b></label>
                                            <select class="select" name="g_experience" required>
                                                <option value="1 - 3 Years" <?php if($guide['experience'] == "1-3 Years"){echo "selected";}?>>
                                                    1 - 3 Years
                                                </option>
                                                <option value="3 - 5 Years" <?php if($guide['experience'] == "3-5 Years"){echo "selected";}?>>
                                                    3 - 5 Years
                                                </option>
                                                <option value="5+ Years" <?php if($guide['experience'] == "5+ Years"){echo "selected";}?>>
                                                    5+ Years
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Address<b style="color:red">*</b></label>
                                            <textarea name="g_address"  value=<?php echo $guide['address'] ?>required><?php echo $guide['address'] ?></textarea>
                                        </div>
                                    </div>
                                    <?php 
                                    // echo $guide['available_days']; 
                                    ?>
                                    <!-- <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Available Days<b style="color:red">*</b></label>
                                            <div class="form-control d-flex" style="flex-wrap: wrap; gap:15px; ">
                                                <div style="display: flex; gap:10px; align-items: center;">
                                                    <input type="checkbox" name="available_days[]" id="mon" <?php 
                                                    // if(strpos($guide['available_days'],"Monday")){echo "checked";}
                                                    ?> value="Monday"><label for="mon" style="margin-top: 5px; cursor: pointer;">Monday</label>
                                                </div>
                                                <div style="display: flex; gap:10px; align-items: center;">
                                                    <input type="checkbox" name="available_days[]" id="tue" <?php
                                                    //  if(strpos($guide['available_days'],"Tuesday")){echo "checked";}
                                                     ?> value="Tuesday"><label for="tue" style="margin-top: 5px; cursor: pointer;">Tuesday</label>
                                                </div>
                                                <div style="display: flex; gap:10px; align-items: center;">
                                                    <input type="checkbox" name="available_days[]" id="wed" <?php 
                                                    // if(strpos($guide['available_days'],"Wednesday")){echo "checked";}
                                                    ?> value="Wednesday"><label for="wed" style="margin-top: 5px; cursor: pointer;">Wednesday</label>
                                                </div>
                                                <div style="display: flex; gap:10px; align-items: center;">
                                                    <input type="checkbox" name="available_days[]" id="thur" <?php 
                                                    // if(strpos($guide['available_days'],"Thursday")){echo "checked";}
                                                    ?> value="Thursday"><label for="thur" style="margin-top: 5px; cursor: pointer;">Thursday</label>
                                                </div>
                                                <div style="display: flex; gap:10px; align-items: center;">
                                                    <input type="checkbox" name="available_days[]" id="fri" <?php 
                                                    // if(strpos($guide['available_days'] ,"Friday")){echo "checked";}
                                                    ?>><label for="fri" style="margin-top: 5px; cursor: pointer;">Friday</label>
                                                </div>
                                                <div style="display: flex; gap:10px; align-items: center;">
                                                    <input type="checkbox" name="available_days[]" id="sat" <?php
                                                    //  if(strpos($guide['available_days'] ,"Saturday")){echo "checked";}
                                                     ?> value="Saturday"><label for="sat" style="margin-top: 5px; cursor: pointer;">Saturday</label>
                                                </div>
                                                <div style="display: flex; gap:10px; align-items: center;">
                                                    <input type="checkbox" name="available_days[]" id="sun" <?php 
                                                    // if(strpos($guide['available_days'] ,"Sunday")){echo "checked";}
                                                    ?> value="Sunday"><label for="sun" style="margin-top: 5px; cursor: pointer;">Sunday</label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Available Days<b style="color:red">*</b></label>
                                            <div class="form-control d-flex" style="flex-wrap: wrap; gap:15px;">
                                                <?php
                                                $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
                                                foreach ($days as $day) {
                                                    $checked = strpos($guide['available_days'], $day) !== false ? "checked" : "";
                                                    echo "
                                                        <div style='display: flex; gap:10px; align-items: center;'>
                                                            <input type='checkbox' name='available_days[]' id='".strtolower($day)."' value='$day' $checked>
                                                            <label for='".strtolower($day)."' style='margin-top: 5px; cursor: pointer;'>$day</label>
                                                        </div>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Solo Tour Fee<b style="color:red">*</b></label>
                                            <input type="number" class="form-control" name="g_solo_tour" value=<?php echo $guide['solo_tour_fee'] ?>>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Group Tour Fee<b style="color:red">*</b></label>
                                            <input type="number" class="form-control" name="g_group_tour" value=<?php echo $guide['group_tour_fee']?>>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>VIP Tour Fee<b style="color:red">*</b></label>
                                            <input type="number" class="form-control" name="g_vip_tour" value=<?php echo $guide['vip_tour_fee']?> >
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Prefered time<b style="color:red">*</b></label>
                                            <input type="text" name="g_prefer_time" value="<?php echo $guide['preferred_time']?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>To<b style="color:red">*</b></label>
                                            <input type="time" name="g_to_time" value="01:30" class="form-control" required>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Guide Licence Number<b style="color:red">*</b></label>
                                            <input type="text" name="g_licence" class="form-control" value=<?php echo $guide['guide_license_number']?> required>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Guide Image</label>
                                            <div>
                                                <input type="file" accept="image/jpeg, image/jpg, image/png" class="form-control"
                                                    name="productImage" id="fileUpload">
                                                <b style="color: red;">Image: Hello.jpg</b>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-12">
                                        <input type="submit" value="Submit" name="submit" id="submit-btn" class="btn btn-submit me-2">
                                        <a href="guidelist" class="btn btn-cancel">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

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