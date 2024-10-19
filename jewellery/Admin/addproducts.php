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
addproduct($conn);
?>

            <div id="wrapper">
                <div class="content-wrapper container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title">
                                <h1>Add Products<small></small></h1>
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home"></i></a></li>
                                    <li class="active">Add Products</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- end .page title-->


                    <!-- <div class="col-md-4 margin-b-30">
                        <div class="profile-overview">
                            <div class="avtar text-center">
                                <img src="images/avtar-1.jpg" alt="" class="img-thumbnail">
                                <h3>Peter Emrald</h3>
                                <hr>
                                <ul class="socials list-inline">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                                </ul>
                                <hr>                               
                            </div>
                            <table class="table profile-detail table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="3">Contact Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>url</td>
                                        <td>
                                            <a href="#">
                                                www.example.com
                                            </a></td>
                                        <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>email:</td>
                                        <td>
                                            <a href="#">
                                                peter@example.com
                                            </a></td>
                                        <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>phone:</td>
                                        <td>(641)-734-4763</td>
                                        <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>skye</td>
                                        <td>
                                            <a href="#">
                                                peterclark82
                                            </a></td>
                                        <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table profile-detail table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="3">General information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Position</td>
                                        <td>UI Designer</td>
                                        <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>Last Logged In</td>
                                        <td>56 min</td>
                                        <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>Position</td>
                                        <td>Senior Marketing Manager</td>
                                        <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>Supervisor</td>
                                        <td>
                                            <a href="#">
                                                Kenneth Ross
                                            </a></td>
                                        <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td><span class="label label-sm label-info">Administrator</span></td>
                                        <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div> -->
                    <div class="col-md-8 margin-b-30">
                    <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form class="form" method="post" enctype="multipart/form-data">
                                            <label>Product Img :</label>
                                            <div
                                                style="height:auto;width:100%;border:1px solid #ebebeb;background-color:#eceff8;margin-bottom:30px;">
                                                <input type="file" name="p_img" autocomplete="off" required>
                                            </div>

                                            <label>Product Name :</label>
                                            <div
                                                style="height:auto;width:100%;border:1px solid #ebebeb;background-color:#eceff8;margin-bottom:30px;">
                                                <input type="text" name="p_name" placeholder="Enter Product name"
                                                    autocomplete="off" required>
                                            </div>

                                            <label> Product Type:</label><br />
                                            <div
                                                style="height:60px;width:100%;overflow:scroll;border:1px solid #ebebeb;background-color:#eceff8;margin-bottom:30px;">
                                                <?php
                                                $sq = "select Type_Id from product_category";
                                                $donesq = mysqli_execute_query($conn, $sq);
                                                $arrayval = array();
                                                while ($cat = mysqli_fetch_array($donesq)) {
                                                    $arrayval = array_merge($arrayval, explode("|", $cat['Type_Id']));
                                                }
                                                $arruni = array_unique($arrayval);
                                                foreach ($arruni as $a) 
                                                {
                                                        // $sqlc = "select Type_Name from category_type where Type_Id IN (select Type_Id from product_category where Sub_Category='" .$a. "')";
                                                        $sqlc="select Type_Name from category_type where Type_Id='$a'";
                                                        // $donec = mysqli_execute_query($conn, $sqlc);
                                                        $donec=mysqli_execute_query($conn,$sqlc);
                                                        $result=mysqli_fetch_array($donec);
                                                        foreach($result as $val)
                                                        {
                                                            ?>
                                                            <input type="checkbox" name="p_type"
                                                                value="<?php echo $val; ?>" /><?php echo $val ?>
                                                            <br />
                                                            <?php  
                                                        break;  
                                                        }
                                                        // $arrayval1=array();
                                                        
                                                        // while ($result = mysqli_fetch_array($donec))
                                                        // {
                                                        //     $arrayval1=array_merge($arrayval1,explode("|",$result['Type_Name']));
                                                        // }
                                                        // $arruni1 = array_unique($arrayval1);
                                                        // foreach($arruni1 as $a1) 
                                                        // {
                                                        //     echo " ".$a1;
                                                        // }
                                                }
                                                ?>
                                            </div><br />

                                            <label>Product Category :</label> <br />
                                            <div
                                                style="height:100px;width:100%;overflow:scroll;border:1px solid #ebebeb;background-color:#eceff8;margin-bottom:30px;">
                                                <?php
                                                $sqlc = "select Sub_Category from product_category";
                                                $donec = mysqli_execute_query($conn, $sqlc);
                                                $arrayval1=array();
                                                while ($results = mysqli_fetch_array($donec))
                                                {
                                                    $arrayval1 = array_merge($arrayval1, explode("|", $results['Sub_Category']));   
                                                }
                                                $arrayuni=array_unique($arrayval1);
                                                foreach($arrayuni as $val1) {
                                                    ?>
                                                    <input type="checkbox" name="p_category"
                                                        value="<?php echo $val1;?>"/><?php echo $val1;?>
                                                    <br/>
                                                    <?php
                                                }
                                                ?>
                                            </div>

                                            <label>Product Price:</label>
                                            <div
                                                style="height:auto;width:100%;border:1px solid #ebebeb;background-color:#eceff8;margin-bottom:30px;">
                                                <input type="number" name="p_price" placeholder="Enter Price"
                                                    autocomplete="off" required>
                                            </div>

                                            <label>Product Detail:</label>
                                            <div
                                                style="height:auto;width:100%;border:1px solid #ebebeb;background-color:#eceff8;margin-bottom:30px;">
                                                <input type="text" name="p_detail" placeholder="Enter Product Detail"
                                                    autocomplete="off" required>
                                            </div>

                                            <label>Product Additional Detail:</label>
                                            <div
                                                style="height:auto;width:100%;border:1px solid #ebebeb;background-color:#eceff8;margin-bottom:30px;">
                                                <input type="text" name="p_additional_detail" placeholder="Enter Product Additional Detail"
                                                    autocomplete="off" required>
                                            </div>

                                            <label>Product Description:</label>
                                            <div
                                                style="height:auto;width:100%;border:1px solid #ebebeb;background-color:#eceff8;margin-bottom:30px;">
                                                <input type="text" name="p_description" placeholder="Enter Product Description"
                                                    autocomplete="off" required>
                                            </div>

                                            <label>Product Color:</label>
                                            <div
                                                style="height:50px;width:100%;border:1px solid #ebebeb;overflow:scroll;background-color:#eceff8;margin-bottom:30px;">
                                                <input type="checkbox" name="p_color" value="white" placeholder="Enter Product Color"
                                                autocomplete="off" >white<br/>
                                                <input type="checkbox" name="p_color"   value="black" placeholder="Enter Product Color"
                                                autocomplete="off" >black</br>
                                                <input type="checkbox" name="p_color"  value="yellow" placeholder="Enter Product Color"
                                                autocomplete="off" >yellow
                                            </div>

                                            <label>Product Size:</label>
                                            <div
                                                style="height:auto;width:100%;border:1px solid #ebebeb;background-color:#eceff8;margin-bottom:30px;">
                                                <input type="text" name="p_size" placeholder="Enter Product Size"
                                                    autocomplete="off" required>
                                            </div>

                                            <label>Product Weight:</label>
                                            <div
                                                style="height:auto;width:100%;border:1px solid #ebebeb;background-color:#eceff8;margin-bottom:30px;">
                                                <input type="text" name="p_weight" placeholder="Enter Product Weight"
                                                    autocomplete="off" required>
                                            </div>

                                            <label>Product In Stock.. ? :</label>
                                            <div
                                                style="height:auto;width:100%;overflow:auto;border:1px solid #ebebeb;background-color:#eceff8;margin-bottom:30px;">
                                                <input type="number" name="p_stock" value=1 autocomplete="off" required>
                                            </div>
                                            <div
                                                style="padding:10px;height:auto;width:100%;border:1px solid #ebebeb;background-color:#eceff8;margin:auto;">
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                            </div>
                                        </form>

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

<!-- Mirrored from html.designstream.co.in/horizon/php/default/light-blue/user_profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Aug 2023 04:35:07 GMT -->
</html>
