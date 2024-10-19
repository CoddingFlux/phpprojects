<?php
include "include/header.php";
include "include/config.php";
if ($_SESSION['AdminId'] == "") {
   ?>
   <script type="text/javascript">
       alert("Login Crediential Required");
       document.location = "login.php";
   </script>
   <?php
}
?>
<div id="wrapper">
    <div class="content-wrapper container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    <h1>Products <small></small></h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i></a></li>
                        <li class="active">Products</li>
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
                                    <strong>NAME</strong>
                                </th>
                                <th>
                                    <strong>DESCRIPTION</strong>
                                </th>
                                <th>
                                    <strong>PRICE</strong>
                                </th>
                                <th style="width:80px">
                                    <strong>QUANTITY</strong>
                                </th>
                                <th class="text-center">
                                    <strong>STATUS</strong>
                                </th>
                                <th>
                                    <strong>ADDED</strong>
                                </th>
                                <th>
                                    <strong>Manage</strong>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            allproducts($conn);
                            ?>
                            <!-- <tr>
                        <td>0002</td>
                        <td>Product 2</td>
                        <td>Description for Product</td>
                        <td>$ 13.20</td>
                        <td>243</td>
                        <td class="text-center">
                           <span class="label label-success">Stock</span>
                        </td>
                        <td>04/10/2015</td>
                        
                     </tr>
                     <tr>
                        <td>0003</td>
                        <td>Product 3</td>
                        <td>Description for Product</td>
                        <td>$ 14.20</td>
                        <td>253</td>
                        <td class="text-center">
                           <span class="label label-danger">Removed</span>
                        </td>
                        <td>04/10/2015</td>
                        
                     </tr>
                     <tr>
                        <td>0004</td>
                        <td>Product 4</td>
                        <td>Description for Product</td>
                        <td>$ 15.20</td>
                        <td>263</td>
                        <td class="text-center">
                           <span class="label label-warning">Out of Stock</span>
                        </td>
                        <td>04/10/2015</td>
                        
                     </tr>
                     <tr>
                        <td>0005</td>
                        <td>Product 5</td>
                        <td>Description for Product</td>
                        <td>$ 16.20</td>
                        <td>273</td>
                        <td class="text-center">
                           <span class="label label-danger">Removed</span>
                        </td>
                        <td>04/10/2015</td>
                        
                     </tr>
                     <tr>
                        <td>0006</td>
                        <td>Product 6</td>
                        <td>Description for Product</td>
                        <td>$ 17.20</td>
                        <td>283</td>
                        <td class="text-center">
                           <span class="label label-success">Stock</span>
                        </td>
                        <td>04/10/2015</td>
                        
                     </tr>
                     <tr>
                        <td>0007</td>
                        <td>Product 7</td>
                        <td>Description for Product</td>
                        <td>$ 18.20</td>
                        <td>293</td>
                        <td class="text-center">
                           <span class="label label-danger">Removed</span>
                        </td>
                        <td>04/10/2015</td>
                       
                     </tr>
                     <tr>
                        <td>0008</td>
                        <td>Product 8</td>
                        <td>Description for Product</td>
                        <td>$ 19.20</td>
                        <td>2103</td>
                        <td class="text-center">
                           <span class="label label-warning">Out of Stock</span>
                        </td>
                        <td>04/10/2015</td>
                        
                     </tr>
                     <tr>
                        <td>0009</td>
                        <td>Product 9</td>
                        <td>Description for Product</td>
                        <td>$ 110.20</td>
                        <td>2113</td>
                        <td class="text-center">
                           <span class="label label-danger">Removed</span>
                        </td>
                        <td>04/10/2015</td>
                        
                     </tr>
                     <tr>
                        <td>00010</td>
                        <td>Product 10</td>
                        <td>Description for Product</td>
                        <td>$ 111.20</td>
                        <td>2123</td>
                        <td class="text-center">
                           <span class="label label-success">Stock</span>
                        </td>
                        <td>04/10/2015</td>
                        
                     </tr>
                     <tr>
                        <td>00011</td>
                        <td>Product 11</td>
                        <td>Description for Product</td>
                        <td>$ 112.20</td>
                        <td>2133</td>
                        <td class="text-center">
                           <span class="label label-success">Stock</span>
                        </td>
                        <td>04/10/2015</td>
                        
                     </tr>
                     <tr>
                        <td>00012</td>
                        <td>Product 12</td>
                        <td>Description for Product</td>
                        <td>$ 113.20</td>
                        <td>2143</td>
                        <td class="text-center">
                           <span class="label label-warning">Out of Stock</span>
                        </td>
                        <td>04/10/2015</td>
                       
                     </tr>
                     <tr>
                        <td>00013</td>
                        <td>Product 13</td>
                        <td>Description for Product</td>
                        <td>$ 114.20</td>
                        <td>2153</td>
                        <td class="text-center">
                           <span class="label label-success">Stock</span>
                        </td>
                        <td>04/10/2015</td>
                        
                     </tr>
                     <tr>
                        <td>00014</td>
                        <td>Product 14</td>
                        <td>Description for Product</td>
                        <td>$ 115.20</td>
                        <td>2163</td>
                        <td class="text-center">
                           <span class="label label-success">Stock</span>
                        </td>
                        <td>04/10/2015</td>
                        
                     </tr>
                     <tr>
                        <td>00015</td>
                        <td>Product 15</td>
                        <td>Description for Product</td>
                        <td>$ 116.20</td>
                        <td>2173</td>
                        <td class="text-center">
                           <span class="label label-success">Stock</span>
                        </td>
                        <td>04/10/2015</td>
                       
                     </tr> -->
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
<script src="js/metisMenu.min.js"></script>
<script src="js/jquery.nanoscroller.min.js"></script>
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
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
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

<!-- Mirrored from html.designstream.co.in/horizon/php/default/light-blue/products.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Aug 2023 04:35:06 GMT -->

</html>