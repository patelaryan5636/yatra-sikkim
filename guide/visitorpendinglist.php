<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Guide List</title>
</head>
<style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type="number"] {
        -moz-appearance: textfield; /* For Firefox */
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
                                        <th>Visitor Name</th>
                                        <th>Mobile no.</th>
                                        <th>Gender</th>
                                        <th>Type</th>
                                        <th>Members</th>
                                        <th>Date</th>
                                        <th>Time Slot</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Priyanshu Pithadiya
                                        </td>
                                        <td>
                                            9978343950
                                        </td>
                                        <td>
                                            Male
                                        </td>
                                        <td>
                                            Solo
                                        </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            25-12-2005
                                        </td>
                                        <td>
                                            10:00AM - 12:00PM
                                        </td>
                                        <td><span class="bg-lightgreen badges">Active</span></td>
                                        <td>
                                            <a class='me-3' href="#">
                                                <img src='../assets/img/icons/enable.svg' data-bs-toggle="modal"
                                                data-bs-target="#create" style="height: 24px;"
                                                    alt='img'>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Aryan Patel
                                        </td>
                                        <td>
                                            6633554422
                                        </td>
                                        <td>
                                            Male
                                        </td>
                                        <td>
                                            Group
                                        </td>
                                        <td>
                                            5
                                        </td>
                                        <td>
                                            12-12-2005
                                        </td>
                                        <td>
                                            1:00PM - 3:00PM
                                        </td>
                                        <td><span class="bg-lightred badges">Expired</span></td>
                                        <td>
                                            <a class='me-3' href="#">
                                                <img src='../assets/img/icons/delete.svg' style="height: 24px;"
                                                    alt='img'>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Mihir Amin
                                        </td>
                                        <td>
                                            6633554422
                                        </td>
                                        <td>
                                            Male
                                        </td>
                                        <td>
                                            Group
                                        </td>
                                        <td>
                                            5
                                        </td>
                                        <td>
                                            12-12-2005
                                        </td>
                                        <td>
                                            1:00PM - 3:00PM
                                        </td>
                                        <td><span class="bg-lightgreen badges">Active</span></td>
                                        <td>
                                            <a class='me-3' href="#">
                                                <img src='../assets/img/icons/enable.svg' data-bs-toggle="modal"
                                                    data-bs-target="#create" style="height: 24px;" alt='img'>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="#" class="modal fade" id="create" tabindex="-1" aria-labelledby="create"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Enter OTP</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- <div class="alert alert-danger" role="alert">
                                            Wront OTP Please Try Again
                                        </div> -->
                                        <div class="row">
                                                <div class="col-lg-12 col-sm-12 col-12">
                                                    <div class="form-group d-flex gap-2">
                                                        <input type="number" class="form-control digit-input"
                                                            style="text-align: center;" maxlength="1" required>
                                                        <input type="number" class="form-control digit-input"
                                                            style="text-align: center;" maxlength="1" required>
                                                        <input type="number" class="form-control digit-input"
                                                            style="text-align: center;" maxlength="1" required>
                                                        <input type="number" class="form-control digit-input"
                                                            style="text-align: center;" maxlength="1" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 d-flex justify-content-center">
                                                <input type="submit" class="btn btn-submit me-2"/>
                                                <input type="reset" class="btn btn-cancel"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Select all inputs with the class 'digit-input'
        const inputs = document.querySelectorAll(".digit-input");
    
        inputs.forEach((input, index) => {
            input.setAttribute("maxlength", "1"); // Limit input to one character
            input.addEventListener("input", (e) => {
                const value = e.target.value;
                // Allow only a single digit
                if (!/^\d$/.test(value)) {
                    e.target.value = ""; // Clear the invalid input
                } else if (index < inputs.length - 1) {
                    // Move focus to the next input if valid digit is entered
                    inputs[index + 1].focus();
                }
            });
    
            input.addEventListener("keydown", (e) => {
                if (e.key === "Backspace" && index > 0 && e.target.value.length === 0) {
                    // Move focus to the previous input when Backspace is pressed
                    inputs[index - 1].focus();
                }
            });
        });
    
        // Automatically focus on the first input when the modal is shown
        const modalBody = document.querySelector(".modal-body");
        modalBody.addEventListener("shown.bs.modal", () => {
            if (inputs.length > 0) {
                inputs[0].focus();
            }
        });
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