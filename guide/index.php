<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Index</title>
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
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count">
                            <div class="dash-counts">
                                <h4>1000</h4>
                                <h5 class="gray">Total Visitors</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das1">
                            <div class="dash-counts">
                                <h4>200</h4>
                                <h5 class="gray">Solo Tours</h5>
                            </div>
                            <div class="dash-imgs">
                                <img src="../assets/img/icons/solo.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das2">
                            <div class="dash-counts">
                                <h4>100</h4>
                                <h5 class="gray">Group Tours</h5>
                            </div>
                            <div class="dash-imgs">
                                <img src="../assets/img/icons/group.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das3">
                            <div class="dash-counts">
                                <h4>₹ 1,75,520</h4>
                                <h5 class="gray">Wallet</h5>
                            </div>
                            <div class="dash-imgs">
                                <img src="../assets/img/icons/money.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12 d-flex">
                        <div class="card flex-fill bord" style="overflow: hidden; margin: 0;">
                            <div class="card-body">
                                <h4 class="card-title mb-0">Monthly Visitors Chart</h4>
                                <div id="chartContainer" style="height: 100%; width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12 d-flex">
                        <div class="card flex-fill bord" style="margin: 0;">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Latest Tours</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive dataview">
                                    <table class="table datatable ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Visitor Name</th>
                                                <th>Contact</th>
                                                <th>Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Priyanshu Pithadiya</td>
                                                <td>9978343950</td>
                                                <td>Group</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>PYS</td>
                                                <td>9978343950</td>
                                                <td>Group</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>PYS</td>
                                                <td>9978343950</td>
                                                <td>Group</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>PYS</td>
                                                <td>9978343950</td>
                                                <td>Group</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>PYS</td>
                                                <td>9978343950</td>
                                                <td>Group</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>PYS</td>
                                                <td>9978343950</td>
                                                <td>Group</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>PYS</td>
                                                <td>9978343950</td>
                                                <td>Group</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>PYS</td>
                                                <td>9978343950</td>
                                                <td>Group</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
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

    <script src="../assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="../assets/plugins/apexchart/chart-data.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../assets/js/scriptForChart.js"></script>

    <script src="../assets/js/script.js"></script>
    <script type="text/javascript" src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer",
                {
                    axisX: {
                        lineColor: "Gray", // Change the color of the X-axis bar
                        gridColor: "gray",
                        labelFontColor: "Gray" // Optionally change the label color
                    },
                    axisY: {
                        lineColor: "gray",
                        gridColor: "gray", // Change the color of the Y-axis bar
                        labelFontColor: "gray" // Optionally change the label color
                    },
                    data: [
                        {
                            type: "splineArea",
                            dataPoints: [
                                { x: new Date(2025, 1), y: 10 },
                                { x: new Date(2025, 2), y: 40 },
                                { x: new Date(2025, 3), y: 30 },
                                { x: new Date(2025, 4), y: 45 },
                                { x: new Date(2025, 5), y: 45 },
                                { x: new Date(2025, 6), y: 45 },
                                { x: new Date(2025, 7), y: 25 },
                                { x: new Date(2025, 8), y: 45 },
                                { x: new Date(2025, 9), y: 65 },
                                { x: new Date(2025, 10), y: 75 },
                            ]
                        }
                    ]
                });

            chart.render();
        }
    </script>
</body>

</html>