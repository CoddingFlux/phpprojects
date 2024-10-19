<?php
include "include/header.php";
include "include/config.php";
?>
            <div id="wrapper">
                <div class="content-wrapper container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title">
                                <h1>Orders <small></small></h1>
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home"></i></a></li>
                                    <li class="active">Orders</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- end .page title-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive table-commerce">
                                <table id="basic-datatables" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width:80px">
                                                <strong>ID</strong>
                                            </th>
                                            <th>
                                                <strong>PURCHASED ON</strong>
                                            </th>
                                            <th>
                                                <strong>CLIENT NAME</strong>
                                            </th>
                                            <th>
                                                <strong>AMOUNT</strong>
                                            </th>
                                            <th>
                                                <strong>QUANTITY</strong>
                                            </th>
                                            <th>
                                                <strong>SHIPMENT</strong>
                                            </th>
                                            <th class="text-center">
                                                <strong>STATUS</strong>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($_GET['oid']))
                                        {
                                    allordersmanagement($conn,$_GET['oid']);
                                        }
                                        else
                                        {
                                            allordersmanagement($conn,"");
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </section>

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/metisMenu.min.js"></script><script src="js/jquery.nanoscroller.min.js"></script>
        <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/waves.min.js"></script>
        <script src="js/jquery-jvectormap-world-mill-en.js"></script>
        <!--        <script src="js/jquery.nanoscroller.min.js"></script>-->
        <script type="text/javascript" src="js/custom.js"></script>
        <!--page scripts-->
        <script src="js/data-tables/jquery.dataTables.js"></script>
        <script src="js/data-tables/dataTables.tableTools.js"></script>
        <script src="js/data-tables/dataTables.bootstrap.js"></script>
        <script src="js/data-tables/dataTables.responsive.js"></script>
        <script src="js/data-tables/tables-data.js"></script>
        <!-- Google Analytics:  -->
        <script>
            (function (i, s, o, g, r, a, m)
            {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function ()
                {
                    (i[r].q = i[r].q || []).push(arguments);
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '../../../../../www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-3560057-28', 'auto');
            ga('send', 'pageview');
        </script>
    </body>

<!-- Mirrored from html.designstream.co.in/horizon/php/default/light-blue/orders.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Aug 2023 04:35:06 GMT -->
</html>
