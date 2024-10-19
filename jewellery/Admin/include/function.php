<?php
function user()
{
    if ($_SESSION['AdminId'] != "") {
        include "config.php";
        $id = $_SESSION['AdminId'];
        $fetchuser = "select * from user_master where user_email ='$id' and user_roll='Admin'";
        $executeuser = mysqli_execute_query($conn, $fetchuser);
        $u_array = mysqli_fetch_array($executeuser);

        echo '
                                <span style="display: block;">
                                    <img alt="image" class="img-circle" src="images/' . $u_array['user_img'] . '" width="40">
                                </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="clear" style="display: block;"> <span class="block m-t-xs"> <strong
                                                class="font-bold">' . $u_array['user_name'] . '<b class="caret"></b></strong>
                                        </span></span> </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a href="user_profile.php"><i class="fa fa-user"></i>My Profile</a></li>
                                    <li><a href="#"><i class="fa fa-calendar"></i>My Calendar</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i>My Inbox</a></li>
                                    <li><a href="#"><i class="fa fa-barcode"></i>My Task</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="fa fa-lock"></i>Screen lock</a></li>
                                    <li><a href="../logout.php"><i class="fa fa-key"></i>Logout</a></li>
                                </ul>';
    }
}

function addproduct($conn)
{
    if (isset($_POST["submit"])) {
        //for product id
        $filename = "include/idgenerator/productid.txt";
        $myfile = fopen($filename, "r");
        $in = fread($myfile, filesize($filename));
        $p_id = ++$in;

        $myfile1 = fopen($filename, "w");
        fwrite($myfile1, $p_id);
        fclose($myfile);
        fclose($myfile1);

        //for uploaded product information
        $p_name = $_POST['p_name'];
        $p_img = $_FILES["p_img"]["name"];
        $p_type = $_POST['p_type'];
        $p_category = $_POST['p_category'];
        $target_path = "../assets/img/product/" . $p_type . "/" . $p_category . "/";
        $p_price = $_POST['p_price'];
        $p_detail = $_POST['p_detail'];
        $p_addi_detail = $_POST['p_additional_detail'];
        $p_description = $_POST['p_description'];
        $p_color = $_POST['p_color'];
        $p_size = $_POST['p_size'];
        $p_weight = $_POST['p_weight'];
        $p_stock = $_POST['p_stock'];
        $extension = substr($p_img, strlen($p_img) - 3, strlen($p_img));
        $allowed_extensions = array(".jpg", ".jpeg", ".png", ".gif");
        $imgnewname = $p_type . "/" . $p_category . "/" . $p_img;
        // Code for move image into directory

        if (in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            move_uploaded_file($_FILES["p_img"]["tmp_name"], $target_path . $p_img);
            $s = "insert into product_master(product_id,product_img,product_name,product_type,product_category,product_price,product_detail,product_additional_detail,product_description,product_color,product_size,product_weight,product_stock)
    values('$p_id','$imgnewname','$p_name','$p_type','$p_category','$p_price','$p_detail','$p_addi_detail','$p_description','$p_color','$p_size','$p_weight','$p_stock')";
            $done1 = mysqli_query($conn, $s);
            $lastinsertid = mysqli_insert_id($conn);
            if ($done1) {
                ?>
                <script>
                    confirm("Product Add Successfull?");
                    document.location = "addproducts.php";
                </script>
                <?php
                exit();
            } else {
                ?>
                <script>
                    alert("Product Add failed try again?");
                </script>
                <?php

            }
        }
    }
}

function allproducts($conn)
{
    $allsql = "select * from product_master";
    $alldone = mysqli_execute_query($conn, $allsql);
    while ($result = mysqli_fetch_array($alldone)) {
        echo '
  <tr>
  <td>' . $result['product_id'] . '</td>
  <td>' . $result['product_name'] . '</td>
  <td>' . $result['product_description'] . '</td>
  <td>' . $result['product_price'] . '</td>
  <td>' . $result['product_stock'] . '</td>
  <td class="text-center">
    ';
        if ($result['product_stock'] >= "1") {
            echo '
            <a href="stockmanagement.php?pid='.$result['product_id'].'&in">  <span class="label label-success">In Stock</span></a>';
        } else {
            echo '
            <a href="stockmanagement.php?pid='.$result['product_id'].'"> <span class="label label-warning">Out of Stock</span></a>';
        }
        echo '
  </td>
  <td>' . $result['product_time'] . '</td>
  <td><a href="deleteproducts.php?pid='.$result['product_id'].'"> <div class="label label-danger">Click To Delete</div></a></td>
  </tr>

';
    }
}

function userprofile($conn, $id)
{
    $sql = "select * from user_master where user_email='$id'";
    $done = mysqli_execute_query($conn, $sql);
    $result = mysqli_fetch_array($done);
    echo '
 <div class="avtar text-center">

     <img src="images/' . $result['user_img'] . '" alt="" class="img-thumbnail">
     <h3>' . $result['user_name'] . '</h3>
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
         <td>Contact</td>
         <td>
             <a href="#">
             ' . $result['user_contact'] . '
             </a></td>
         <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
     </tr>
     <tr>
         <td>email:</td>
         <td>
             <a href="#">
             ' . $result['user_email'] . '
             </a></td>
         <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
     </tr>
     <tr>
         <td>User Roll</td>
         <td>' . $result['user_roll'] . '</td>
         <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
     </tr>
     <tr>
         <td>User Register Time</td>
         <td>
             <a href="#">
             ' . $result['user_signup_time'] . '
             </a></td>
         <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
     </tr>
     </tbody>
 </table>
';

}

function userratio($conn)
{
    $sql = "select * from user_master where user_roll='User'";
    $done = mysqli_execute_query($conn, $sql);
    $rows = mysqli_num_rows($done);
    $ratio = ($rows / 1000000 * 100);
    echo '
    <div class="tile-title clearfix">
                                    User
                                    <span class="pull-right"><i class="fa fa-caret-up">' . $ratio . '%</i></span>
                                </div><!--.tile-title-->
                                <div class="tile-body clearfix">
                                    <i class="fa fa-credit-card"></i>
                                    <h4 class="pull-right">' . $rows . '</h4>
                                </div><!--.tile-body-->
                                <div class="tile-footer">
                                    <a href="user_list.php">View Details...</a>
                                </div><!--.tile footer-->
';
}

function alluser($conn)
{

    $sql = "select * from user_master where user_roll='User' ";
    $done = mysqli_execute_query($conn, $sql);
    while ($result = mysqli_fetch_array($done)) {
        echo ' <div class="col-md-12">
    <div class="user-col">
        <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object img-circle" src="../assets/img/profileimg/'.$result['user_img'] . '" alt="100x100" data-src="holder.js/100x100" style="width: 100px; height: 100px;">
        </a>
        <div class="media-body">
            <h3 class="follower-name">'.$result['user_name'].'</h3>
            <div><i class="fa fa-map-marker"></i> San Francisco, California, USA</div>
            <div><i class="fa fa-briefcase"></i> Software Engineer at <a href="#">SomeCompany, Inc.</a></div>

            <div style="height: 20px;"></div>

            <div class="btn-toolbar">
                <div class="btn-group">
                    <button class="btn btn-info btn-3d btn-sm"><i class="fa fa-envelope-o"></i> Send Message</button>
                </div><!-- btn-group -->
                <div class="btn-group">
                    <button class="btn btn-success btn-3d btn-sm"><i class="fa fa-check"></i> Following</button>
                    <button class="btn btn-primary btn-3d btn-sm"><i class="fa fa-check"></i> Followers</button>
                </div><!-- btn-group -->
                ';
                if($result['user_status'] == 1){

                echo '
                <div class="col-sm-8">
                    <a href="update_user_status.php?uid='.$result['unique_user_id'].'&ch"><div class="label label-success">Click To IN-Active</div></a>
                </div>';
                  }
else{
echo'
<div class="col-sm-8">
<a href="update_user_status.php?uid='.$result['unique_user_id'].'&ustatus&ch"> <div class="label label-danger">Click To Active</div></a>
</div>';
}
echo'
            </div><!-- btn-toolbar -->
        </div><!-- media-body -->
    </div>
    </div>
</div><!--.col-6-->';
    }
}


function allorders($conn)
{
    $sql = "select * from user_orders";
    $done = mysqli_execute_query($conn, $sql);
    while ($result = mysqli_fetch_array($done)) {
        echo '
     <tr>
    <td>' . $result['order_id'] . '</td>
    <td>' . $result['order_time_stemp'] . '</td>
    <td>' . $result['user_id'] . '</td>
    <td>INR' . $result['product_selling_price'] . '</td>
    <td>' . $result['product_quantity'] . '</td>
    <td>04/10/2015</td>
    ';
        if ($result['order_confirm_status'] == 0) {
            echo '                                       <td class="text-center">
            <a href="order-view.php?oid=' . $result['order_id'] . '"><span class="label label-purple">Pending</span></a>
            <a href="deleteorders.php?oid='.$result['order_id'].'"> <div class="label label-danger">Delete</div></a>
                                        </td>';
        } else if ($result['order_confirm_status'] == 1) {
            echo '
                                        <td class="text-center">
                                        <a href="order-view.php?oid=' . $result['order_id'] . '"><span class="label label-success">Confirmed</span></a>
                                        <a href="deleteorders.php?oid='.$result['order_id'].'"> <div class="label label-danger">Delete</div></a>
                                    </td>';
        } else if ($result['order_confirm_status'] == -1) {
            echo '
            <td class="text-center">
            <a href="order-view.php?oid=' . $result['order_id'] . '"><span class="label label-inverse">Canceled</span></a>  
            <a href="deleteorders.php?oid='.$result['order_id'].'"> <div class="label label-danger">Delete</div></a>               
                                            </td>';
        } else {
            echo '
               <td class="text-center">
               <a href="order-view.php?oid=' . $result['order_id'] . '"><span class="label label-danger">Rejected</span></a>
               <a href="deleteorders.php?oid='.$result['order_id'].'"> <div class="label label-danger">Delete</div></a>
                                </td>
            ';
        }
        echo '
                                
</tr>';
    }
}

function allordersmanagement($conn,$oid)
{
    if(isset($_GET['oid']))
    {
    $sql = "select * from user_orders where order_id='$oid'";
    }
    else
    {
        $sql="select * from user_orders";
    }
    $done = mysqli_execute_query($conn, $sql);
    while ($result = mysqli_fetch_array($done)) {
        echo '
     <tr>
    <td>' . $result['order_id'] . '</td>
    <td>' . $result['order_time_stemp'] . '</td>
    <td>' . $result['user_id'] . '</td>
    <td>INR' . $result['product_selling_price'] . '</td>
    <td>' . $result['product_quantity'] . '</td>
    <td>04/10/2015</td>
    ';
        
            echo '     
        <td class="text-center">
        <form action="ordermanage.php" method="post">
        <input type="radio" name="con" value=1/>Confirm
        <input type="radio" name="con" value=/>Rejected
        <input type="radio" name="con" value=-1/>Cancled
        <input type="hidden" name="orid" value="'.$result['order_id'].'"/>
        <div align="center">
        <button class="btn btn-primary" name="submit" type="submit"><span>Click</span></button>
        </div>
       </form>                                   
        </td>
                                    
</tr>';
    }
}

function orderview($conn, $oid)
{
    if(isset($_GET['oid']))
    {
    $sql = "select * from user_orders inner join user_master on user_orders.user_id=user_master.user_email inner join user_address on user_master.user_email=user_address.user_id where user_orders.order_id='$oid';";
    $done = mysqli_execute_query($conn, $sql);
    $result = mysqli_fetch_array($done);

    echo '
    <div class="row">
    ' . $result['order_confirm_status'] . '
                        <div class="col-md-6">
                            <div class="order-view-box">
                                <h3>Details</h3>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-4">Order ID:</div>
                                        <div class="col-sm-8">
                                            <strong>' . $result['order_id'] . '</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Purchased On:</div>
                                        <div class="col-sm-8">
                                            <strong>' . $result['order_time_stemp'] . '</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Client Name:</div>
                                        <div class="col-sm-8">
                                            <strong>' . $result['user_id'] . '</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Total Products_ID:</div>
                                        <div class="col-sm-8">
                                            <strong>' . $result['product_id'] . '</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Items:</div>
                                        <div class="col-sm-8">
                                            <strong>' . $result['product_quantity'] . '</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Amount:</div>
                                        <div class="col-sm-8">
                                            <strong>INR ' . $result['product_selling_price'] . '</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Shipment:</div>
                                        ';
    if ($result['order_confirm_status'] == 1) {
        echo '
                                        <div class="col-sm-8">
                                            <strong>' . date('Y-m-d', strtotime(date("Y/m/d") . ' + 6 days')) . '</strong>
                                        </div>';
    }
    echo '
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Status</div>
                                        ';
    if ($result['order_confirm_status'] == 0) {
        echo '
                                        <div class="col-sm-8">
                                        <a href="ordermanagement.php?oid=' . $result['order_id'] . '"><div class="label label-purple">Pending</div></a></a>
                                        </div>';
    } else if ($result['order_confirm_status'] == 1) {
        echo '
                                        <div class="col-sm-8">
                                        <a href="ordermanagement.php?oid=' . $result['order_id'] . '">  <div class="label label-success">Shipped</div></a>
                                    </div>';
    } else if ($result['order_confirm_status'] == -1) {
        echo '
                                    <div class="col-sm-8">
                                    <a href="ordermanagement.php?oid=' . $result['order_id'] . '">  <div class="label label-danger">Cancled</div></a>
                                </div>';
    } else {
        echo '
                                <div class="col-sm-8">
                                <a href="ordermanagement.php?oid=' . $result['order_id'] . '"><div class="label label-info">Rejected</div></a>
                            </div>';
    }
    echo '
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="order-view-box">
                                <h3>Client:</h3>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-4">Client ID:</div>
                                        <div class="col-sm-8">
                                            <strong>'.$result['unique_user_id'].'</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Name:</div>
                                        <div class="col-sm-8">
                                            <strong>'.$result['user_name'].'</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Email:</div>
                                        <div class="col-sm-8">
                                            <strong>'.$result['user_id'].'</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Company:</div>
                                        <div class="col-sm-8">
                                            <strong>Horizon-Admin co.</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Phone:</div>
                                        <div class="col-sm-8">
                                            <strong>'.$result['user_contact'].'</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Status</div>
                                        ';
                                        if($result['user_status'] == 1){

                                        echo '
                                        <div class="col-sm-8">
                                            <a href="update_user_status.php?uid='.$result['unique_user_id'].'"><div class="label label-success">Click To IN-Active</div></a>
                                        </div>';
                                          }
else{
    echo'
    <div class="col-sm-8">
    <a href="update_user_status.php?uid='.$result['unique_user_id'].'&ustatus"> <div class="label label-danger">Click To Active</div></a>
</div>';
}
echo'
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="order-view-box">
                                <h3>Billing Address:</h3>
                             <form class="form-horizontal">
                           <div class="form-group">
                              <div class="col-sm-4">Full Name:</div>
                              <div class="col-sm-8">
                                 <strong>'.$result['user_name'].'</strong>
                              </div>
                           </div>
                          
                           <div class="form-group">
                              <div class="col-sm-4">Address:</div>
                              <div class="col-sm-8">
                                 <strong>'.$result['user_street'].'</strong>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-4">City:</div>
                              <div class="col-sm-8">
                                 <strong>'.$result['user_city'].'</strong>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-4">State</div>
                              <div class="col-sm-8">
                                 <strong>'.$result['user_state'].'</strong>
                              </div>
                           </div>
                           
                           <div class="form-group">
                              <div class="col-sm-4">Country</div>
                              <div class="col-sm-8">
                                 <strong>'.$result['user_country'].'</strong>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-4">Phone</div>
                              <div class="col-sm-8">
                                 <strong>'.$result['user_contact'].'</strong>
                              </div>
                           </div>
                        </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="order-view-box">
                                <h3>Shipping Address:</h3>
                                <form class="form-horizontal">
                                <div class="form-group">
                                <div class="col-sm-4">Full Name:</div>
                                <div class="col-sm-8">
                                   <strong>'.$result['user_name'].'</strong>
                                </div>
                             </div>
                            
                             <div class="form-group">
                                <div class="col-sm-4">Address:</div>
                                <div class="col-sm-8">
                                   <strong>'.$result['user_street'].'</strong>
                                </div>
                             </div>
                             <div class="form-group">
                                <div class="col-sm-4">City:</div>
                                <div class="col-sm-8">
                                   <strong>'.$result['user_city'].'</strong>
                                </div>
                             </div>
                             <div class="form-group">
                                <div class="col-sm-4">State</div>
                                <div class="col-sm-8">
                                   <strong>'.$result['user_state'].'</strong>
                                </div>
                             </div>
                             
                             <div class="form-group">
                                <div class="col-sm-4">Country</div>
                                <div class="col-sm-8">
                                   <strong>'.$result['user_country'].'</strong>
                                </div>
                             </div>
                             <div class="form-group">
                                <div class="col-sm-4">Phone</div>
                                <div class="col-sm-8">
                                   <strong>'.$result['user_contact'].'</strong>
                                </div>
                             </div>
                        </form>
                            </div>
                        </div>
                    </div>';
}
}

function totalsales($conn)
{
    $sql = "select * from user_orders where order_confirm_status=1";
    $done = mysqli_execute_query($conn, $sql);
    $rows = mysqli_num_rows($done);
    $ratio = ($rows / 1000000 * 100);
    echo '
    <div class="tile-title clearfix">
    Total Sales
    <span class="pull-right"><i class="fa fa-caret-up"></i>'.$ratio.'%</span>
</div><!--.tile-title-->
<div class="tile-body clearfix">
    <i class="fa fa-credit-card"></i>
    <h4 class="pull-right">'.$rows.'</h4>
</div><!--.tile-body-->
<div class="tile-footer">
    <a href="orders.php">View Details...</a>
</div><!--.tile footer-->
';
}

function totalorders($conn)
{
    $sql = "select * from user_orders";
    $done = mysqli_execute_query($conn, $sql);
    $rows = mysqli_num_rows($done);
    $ratio = ($rows / 1000000 * 100);
    echo'
    <div class="tile-title clearfix">
                                    Total orders
                                    <span class="pull-right"><i class="fa fa-caret-up"></i>'.$ratio.'%</span>
                                </div><!--.tile-title-->
                                <div class="tile-body clearfix">
                                    <i class="fa fa-cart-plus"></i>
                                    <h4 class="pull-right">'.$rows.'</h4>
                                </div><!--.tile-body-->
                                <div class="tile-footer">
                                    <a href="orders.php">View Details...</a>
                                </div><!--.tile footer-->
';
                            }

function recentorders($conn)
{ 
    $sql = "select * from user_orders";
    $done = mysqli_execute_query($conn, $sql);
    while ($result = mysqli_fetch_array($done)) {
        echo '
     <tr>
    <td>' . $result['order_id'] . '</td>
    <td>' . $result['user_id'] . '</td>
    ';
    if ($result['order_confirm_status'] == 0) {
        echo '                                       <td class="text-center">
        <a href="order-view.php?oid=' . $result['order_id'] . '"><span class="label label-purple">Pending</span></a>
        <a href="deleteorders.php?oid='.$result['order_id'].'"> <div class="label label-danger">Delete</div></a>
                                    </td>';
    } else if ($result['order_confirm_status'] == 1) {
        echo '
                                    <td class="text-center">
                                    <a href="order-view.php?oid=' . $result['order_id'] . '"><span class="label label-success">Confirmed</span></a>
                                    <a href="deleteorders.php?oid='.$result['order_id'].'"> <div class="label label-danger">Delete</div></a>
                                </td>';
    } else if ($result['order_confirm_status'] == -1) {
        echo '
        <td class="text-center">
        <a href="order-view.php?oid=' . $result['order_id'] . '"><span class="label label-inverse">Canceled</span></a>  
        <a href="deleteorders.php?oid='.$result['order_id'].'"> <div class="label label-danger">Delete</div></a>               
                                        </td>';
    } else {
        echo '
           <td class="text-center">
           <a href="order-view.php?oid=' . $result['order_id'] . '"><span class="label label-danger">Rejected</span></a>
           <a href="deleteorders.php?oid='.$result['order_id'].'"> <div class="label label-danger">Delete</div></a>
                            </td>
        ';
    }
    echo '
    <td>' . $result['order_time_stemp'] . '</td>
    <td>$' . $result['product_selling_price'] . '</td>
    <td><span class="action-icon"><a href="orders.php" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-xs btn-primary"><i class="fa fa-eye-slash"></i></a></span></td>
   
                                
</tr>';
    }
}
?>