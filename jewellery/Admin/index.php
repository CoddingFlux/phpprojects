<?php 
session_start();
if ($_SESSION['AdminId'] == "") {
    ?>
    <script type="text/javascript">
        alert("Login Crediential Required");
        document.location = "login.php";
    </script>
    <?php
}
 include "include/header.php";
 include "include/config.php";?>
            <div id="wrapper">
                <div class="content-wrapper container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title">
                                <h1>Dashboard <small></small></h1>
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home"></i></a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- end .page title-->
                    <div class="row">
                        <div class="col-sm-6 col-md-4 margin-b-30">
                            <div class="tile">
                                <?php 
                                totalorders($conn);
                                ?>
                            </div><!-- .tile-->
                        </div><!--end .col-->
                        <div class="col-sm-6 col-md-4 margin-b-30">
                            <div class="tile">
                            <?php
                            totalsales($conn);
                            ?>
                            </div><!-- .tile-->
                        </div><!--end .col-->
                        <div class="col-sm-6 col-md-4 margin-b-30">
                            <div class="tile">
                            <?php   
                            userratio($conn);
                            ?>
                            </div><!-- .tile-->
                        </div><!--end .col-->
                      <!--end .col-->
                    </div><!--end .row-->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-card recent-activites">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">Half year earnings</h4>
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>
                                </div>
                                <div class="panel-body text-center">
                                    <div>
                                        <canvas id="lineChart" height="100"></canvas>
                                    </div>

                                </div>
                            </div><!-- End .panel --> 
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-card ">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title"> Sales & Earnings</h4>
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <canvas id="barChart" height="140"></canvas>
                                    </div>
                                </div>
                            </div><!-- End .panel -->  
                        </div><!--end .col-->
                        <div class="col-md-6">
                            <div class="panel panel-card ">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title"> Last sales locations</h4>
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div id="world-map" style="width: 100%; height: 280px"></div>
                                </div>
                            </div><!-- End .panel -->                       
                        </div><!--end .col-->

                    </div><!--end .row-->


                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-card recent-activites">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title"> Recent Activities</h4>
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>
                                </div>
                                <div class="panel-body pad-0">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <a href="#">Lorem ipsum dolor</a>
                                            <small><i class="fa fa-clock-o"></i> 13/08/2015 04:51:21</small>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">Lorem ipsum dolor</a>
                                            <small><i class="fa fa-clock-o"></i> 13/08/2015 04:51:21</small>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">Lorem ipsum dolor</a>
                                            <small><i class="fa fa-clock-o"></i> 13/08/2015 04:51:21</small>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">Lorem ipsum dolor</a>
                                            <small><i class="fa fa-clock-o"></i> 13/08/2015 04:51:21</small>
                                        </li>                            
                                    </ul>
                                </div>
                            </div><!-- End .panel -->                       
                        </div><!--end .col-->
                        <div class="col-md-8">

                            <div class="panel panel-card recent-activites">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title"> Recent Orders</h4>
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>
                                </div>
                                <div class="panel-body pad-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-recent-orders">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Customer</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                recentorders($conn);
                                                ?>                                 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div><!--end .col-->
                    </div><!--end .row-->
                </div> 
            </div>
        </section>

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/metisMenu.min.js"></script>
        <script src="js/jquery.nanoscroller.min.js"></script>
        <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
        <!-- Flot -->
        <script src="js/flot/jquery.flot.js"></script>
        <script src="js/flot/jquery.flot.tooltip.min.js"></script>
        <script src="js/flot/jquery.flot.resize.js"></script>
        <script src="js/flot/jquery.flot.pie.js"></script>
        <script src="js/chartjs/Chart.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/waves.min.js"></script>
        <script src="js/morris_chart/raphael-2.1.0.min.js"></script>
        <script src="js/morris_chart/morris.js"></script>

        <script src="js/jquery-jvectormap-world-mill-en.js"></script>
        <!--        <script src="js/jquery.nanoscroller.min.js"></script>-->
        <script type="text/javascript" src="js/custom.js"></script>
        <!-- ChartJS-->
        <script src="js/chartjs/Chart.min.js"></script>

        <script>
            $(document).ready(function () {

                var lineData = {
                    labels: ["January", "February", "March", "April", "May"],
                    datasets: [
                        {
                            label: "Example dataset",
                            fillColor: "rgba(0,0,0,0.1)",
                            strokeColor: "rgba(1,168,254,0.6)",
                            labelsColor: "rgba(1,168,254,1)",
                            pointColor: "rgba(1,168,254,0.7)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(1,168,254,1)"
                           
                            
                        },
                        {
                            label: "Example dataset",
                            fillColor: "rgba(1,168,254,0.6)",
                            strokeColor: "rgba(1,168,254,0.7)",
                            pointColor: "rgba(1,168,254,1)",
                            pointStrokeColor: "rgba(1,168,254,0.7)",
                            pointHighlightFill: "rgba(1,168,254,0.7)",
                            pointHighlightStroke: "rgba(1,168,254,1)",
                            data: [28, 48, 40, 19, 86],
                             gridTextColor: '#fff',
                       
                        }
                    ]
                };
                
                var lineOptions = {
                    scaleShowGridLines: true,
                    scaleGridLineColor: "rgba(0,0,0,.05)",
                    scaleGridLineWidth: 1,
                    bezierCurve: true,
                    bezierCurveTension: 0.4,
                    pointDot: true,
                    pointDotRadius: 4,
                    pointDotStrokeWidth: 1,
                    pointHitDetectionRadius: 20,
                    datasetStroke: true,
                    datasetStrokeWidth: 2,
                    datasetFill: true,
                    responsive: true,
                    scaleFontColor:'#949ba2'
                   

                };


                var ctx = document.getElementById("lineChart").getContext("2d");
                var myNewChart = new Chart(ctx).Line(lineData, lineOptions);

            });
        </script>


        <script type="text/javascript">
            $(function () {

                var barData = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(1,168,254,0.4)",
                            strokeColor: "rgba(1,168,254,0.6)",
                            highlightFill: "rgba(1,168,254,0.75)",
                            highlightStroke: "rgba(1,168,254,1)",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(1,168,254,0.5)",
                            strokeColor: "rgba(1,168,254,0.8)",
                            highlightFill: "rgba(1,168,254,0.75)",
                            highlightStroke: "rgba(1,168,254,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };

                var barOptions = {
                    scaleBeginAtZero: true,
                    scaleShowGridLines: true,
                    scaleGridLineColor: "rgba(1,168,254,0.1)",
                    scaleGridLineWidth: 1,
                    barShowStroke: true,
                    barStrokeWidth: 2,
                    barValueSpacing: 5,
                    barDatasetSpacing: 1,
                    responsive: true,
                    scaleFontColor:'#949ba2'
                };


                var ctx = document.getElementById("barChart").getContext("2d");
                var myNewChart = new Chart(ctx).Bar(barData, barOptions);

            });
        </script>
    </body>

<!-- Mirrored from html.designstream.co.in/horizon/php/default/light-blue/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Aug 2023 04:32:22 GMT -->
</html>
