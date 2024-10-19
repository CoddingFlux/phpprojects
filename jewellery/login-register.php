<?php
error_reporting(0);
include "includes/header.php";
include "includes/config.php";
if (isset($_POST["submit"])) {

    if ($_POST['password'] == $_POST['confirmpassword']) {
        if ($_POST['password'] >= 8) {
            $filename = "includes/idgenerator/userid.txt";
            $myfile = fopen($filename, "r");
            $in = fread($myfile, filesize($filename));
            $u_id = ++$in;

            $myfile1 = fopen($filename, "w");
            fwrite($myfile1, $u_id);
            fclose($myfile);
            fclose($myfile1);

            $u_name = $_POST['user-name'];
            $p_img = $_FILES["p_img"]["name"];
            $target_path = "assets/img/profileimg/";
            $u_con = $_POST['user-contact'];
            $u_em = $_POST['user-email'];
            $u_pass = md5($_POST['password']);
            $u_ro = $_POST['user-roll'];
            $extension = substr($p_img, strlen($p_img) - 3, strlen($p_img));
            $allowed_extensions = array(".jpg", ".jpeg", ".png", ".gif");
            $imgnewname = $p_img;

            if (in_array($extension, $allowed_extensions)) {
                echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
            } else {
                move_uploaded_file($_FILES["p_img"]["tmp_name"], $target_path . $p_img);
                if ($u_ro == "") {
                    $i = "insert into User_Master(unique_user_id,user_name,user_img,user_contact,user_email,user_password)
        values('$u_id','$u_name','$imgnewname','$u_con','$u_em','$u_pass')";
                } else {
                    $i = "insert into User_Master(unique_user_id,user_name,user_img,user_contact,user_email,user_password,user_roll)
   values('$u_id','$u_name','$imgnewname','$u_con','$u_em','$u_pass','$u_ro')";
                }
                $done1 = mysqli_query($conn, $i);
                $lastinsertid = mysqli_insert_id($conn);
                if ($done1) {
                    ?>
                    <script>
                        confirm("Registration Successfull.");
                        document.location = "login-register.php";
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert("Registration failed try again ?");
                    </script>
                    <?php

                }
            }
        } else {
            ?>
            <script>alert("Password Must Be Min(8)");</script>
            <?php
        }
    } else {
        ?>
        <script>alert("Password Does Not Matched");</script>
        <?php
    }
}

?>
<?php

if (isset($_POST["submit1"])) {

    $u_passes = $_POST['user-password-l'];
    if (strlen($u_passes) >= 8) {
        $u_name1 = $_POST["user-name-l"];
        $u_pass1 = md5($_POST['user-password-l']);
        $s = "select user_roll,user_status from user_master where user_email='$u_name1' and user_password='$u_pass1'";
        $done2 = mysqli_execute_query($conn, $s);
        $results = mysqli_fetch_array($done2);

        // if ($results['user_roll'] == "Admin" && $results['user_status'] == 1) {
        //     ?>
        <!--      <script type="text/javascript">document.location = ('admin/Dashboard.php');</script> -->
        //
        <?php
        // }
        if ($results['user_roll'] == "User" && $results['user_status'] == 1) {
            $_SESSION["userid"] = $u_name1;
            ?>
            <script type="text/javascript">document.location = ('index.php');</script>
            <?php
        }
        if ($results['user_roll'] == "Designer" && $results['user_status'] == 1) {
            $_SESSION["userid"] = $u_name1;
            ?>
            <script type="text/javascript">document.location = ('Designer/designer.php');</script>
            <?php
        } else {
            ?>
            <script type="text/javascript">alert("ID OR PASSWORD ARE NOT VALID OR USER NOT ACTIVE CONTACT TO ADMIN:");
                document.location = "login-register.php";</script>
            <?php
        }

        if ($results['user_roll'] == "" && $results['user_status'] == "") {
            ?>
            <script type="text/javascript">alert("ID  OR PASSWORD ARE NOT VALID OR USER NOT ACTIVE CONTACT TO ADMIN:");
                document.location = "login-register.php";</script>
            <?php
        }
    } else {
        ?>
        <script type="text/javascript">alert("Password Must Be Min(8)");
        </script>
        <?php
    }
}
?>

<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">login/Register </li>
            </ul>
        </div>
    </div>
</div>
<div class="login-register-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-11 col-md-11 ms-auto me-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-bs-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                        <a data-bs-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <input type="text" name="user-name-l" placeholder="Username" required>
                                        <input type="password" name="user-password-l" placeholder="Password" required>

                                        <div class="login-toggle-btn">
                                            <input type="checkbox">
                                            <label>Remember me</label>
                                        </div>
                                        <div align="center">
                                            <button class="btn btn-primary" name="submit1"
                                                type="submit"><span>Login</span></button>
                                            <button type="reset" class="btn btn-danger"
                                                name="Reset"><span>Reset</span></button>
                                        </div>
                                        <div align="right">
                                            <a href="#">Forgot Password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div>
                                                    <input type="text" name="user-name" placeholder="Username"
                                                        autocomplete="off" required>
                                                </div>
                                                <div>
                                                    <input type="file" name="p_img" autocomplete="off">
                                                </div>

                                                <div>
                                                    <input type="email" name="user-email" placeholder="Email Id"
                                                        id="emailid" onBlur="checkAvailability()" autocomplete="off"
                                                        required />
                                                </div>
                                                <div><span id="user-availability-status" style="font-size:12px;"></span>
                                                </div>
                                                <div align="left" style="border-style:groove;padding:7px;">
                                                    <label>User As Designer:</label>
                                                    <input type="checkbox" name="user-roll" value="Designer"
                                                        autocomplete="off">
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <input type="password" name="password" id="pswd1"
                                                        placeholder="Password" autocomplete="off" required>
                                                </div>
                                                <div>
                                                    <input type="password" id="pswd2" name="confirmpassword"
                                                        placeholder="Confirm Password" onchange="matchPassword()"
                                                        autocomplete="off" required><span id="message"
                                                        style="color:red">
                                                    </span><span id="message1" style="color:green"> </span>
                                                </div>
                                                <div>
                                                    <input type="number" name="user-contact" placeholder="Contact No"
                                                        autocomplete="off" required>
                                                </div>

                                                <div align="center" style="border-style: groove;">
                                                    <button type="submit" class="btn btn-primary"
                                                        name="submit"><span>Register</span></button>
                                                    <button type="reset" class="btn btn-danger"
                                                        name="Reset"><span>Reset</span></button>
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
        </div>
    </div>
</div>
<?php
include "includes/footer.php";
?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="tab-content quickview-big-img">
                            <div id="pro-1" class="tab-pane fade show active">
                                <img src="assets/img/product/quickview-l1.jpg" alt="">
                            </div>
                            <div id="pro-2" class="tab-pane fade">
                                <img src="assets/img/product/quickview-l2.jpg" alt="">
                            </div>
                            <div id="pro-3" class="tab-pane fade">
                                <img src="assets/img/product/quickview-l3.jpg" alt="">
                            </div>
                            <div id="pro-4" class="tab-pane fade">
                                <img src="assets/img/product/quickview-l2.jpg" alt="">
                            </div>
                        </div>
                        <!-- Thumbnail Large Image End -->
                        <!-- Thumbnail Image End -->
                        <div class="quickview-wrap mt-15">
                            <div class="quickview-slide-active owl-carousel nav nav-style-1" role="tablist">
                                <a class="active" data-bs-toggle="tab" href="#pro-1"><img
                                        src="assets/img/product/quickview-s1.jpg" alt=""></a>
                                <a data-bs-toggle="tab" href="#pro-2"><img src="assets/img/product/quickview-s2.jpg"
                                        alt=""></a>
                                <a data-bs-toggle="tab" href="#pro-3"><img src="assets/img/product/quickview-s3.jpg"
                                        alt=""></a>
                                <a data-bs-toggle="tab" href="#pro-4"><img src="assets/img/product/quickview-s2.jpg"
                                        alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="product-details-content quickview-content">
                            <h2>Products Name Here</h2>
                            <div class="product-details-price">
                                <span>$18.00 </span>
                                <span class="old">$20.00 </span>
                            </div>
                            <div class="pro-details-rating-wrap">
                                <div class="pro-details-rating">
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <span>3 Reviews</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore et
                                dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco</p>
                            <div class="pro-details-list">
                                <ul>
                                    <li>- 0.5 mm Dail</li>
                                    <li>- Inspired vector icons</li>
                                    <li>- Very modern style </li>
                                </ul>
                            </div>
                            <div class="pro-details-size-color">
                                <div class="pro-details-color-wrap">
                                    <span>Color</span>
                                    <div class="pro-details-color-content">
                                        <ul>
                                            <li class="blue"></li>
                                            <li class="maroon active"></li>
                                            <li class="gray"></li>
                                            <li class="green"></li>
                                            <li class="yellow"></li>
                                            <li class="white"></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pro-details-size">
                                    <span>Size</span>
                                    <div class="pro-details-size-content">
                                        <ul>
                                            <li><a href="#">s</a></li>
                                            <li><a href="#">m</a></li>
                                            <li><a href="#">l</a></li>
                                            <li><a href="#">xl</a></li>
                                            <li><a href="#">xxl</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-details-quality">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                </div>
                                <div class="pro-details-cart btn-hover">
                                    <a href="#">Add To Cart</a>
                                </div>
                                <div class="pro-details-wishlist">
                                    <a href="#"><i class="fa fa-heart-o"></i></a>
                                </div>
                                <div class="pro-details-compare">
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                </div>
                            </div>
                            <div class="pro-details-meta">
                                <span>Categories :</span>
                                <ul>
                                    <li><a href="#">Minimal,</a></li>
                                    <li><a href="#">Furniture,</a></li>
                                    <li><a href="#">Electronic</a></li>
                                </ul>
                            </div>
                            <div class="pro-details-meta">
                                <span>Tag :</span>
                                <ul>
                                    <li><a href="#">Fashion, </a></li>
                                    <li><a href="#">Furniture,</a></li>
                                    <li><a href="#">Electronic</a></li>
                                </ul>
                            </div>
                            <div class="pro-details-social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->