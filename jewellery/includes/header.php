<?php 
session_start();
error_reporting(0);
?>
<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/flone/flone/index-28.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Aug 2023 13:33:38 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Flone - Minimal eCommerce HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icon-img/favicon.ico">

    <!-- CSS
    ============================================ -->
    <head>
        <script type='text/javascript'>
               function qty()
                {
                    var qty=1;
                     qty =document.getElementById("quantity").value;
                     document.cookie="qty="+qty;
                }
    </script>
</head>
<style>
    .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

</style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/icons.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="header-area clearfix header-hm8">
        <div class="header-top-area">
            <div class="container">
                <div class="header-top-wap">
                    <div class="language-currency-wrap">
                        <div class="same-language-currency language-style">
                            <a href="#">English <i class="fa fa-angle-down"></i></a>
                            <div class="lang-car-dropdown">
                                <ul>
                                    <li><a href="#">Arabic </a></li>
                                    <li><a href="#">Bangla </a></li>
                                    <li><a href="#">Hindi </a></li>
                                    <li><a href="#">Spanish </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="same-language-currency use-style">
                            <a href="#">USD <i class="fa fa-angle-down"></i></a>
                            <div class="lang-car-dropdown">
                                <ul>
                                    <li><a href="#">Taka (BDT) </a></li>
                                    <li><a href="#">Riyal (SAR) </a></li>
                                    <li><a href="#">Rupee (INR) </a></li>
                                    <li><a href="#">Dirham (AED) </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="same-language-currency">
                            <p>Call Us 3965410</p>
                        </div>
                    </div>
                    <div class="header-right-wrap">
                        <div class="same-style header-search">
                            <a class="search-active" href="#"><i class="pe-7s-search"></i></a>
                            <div class="search-content">
                                <form action="#">
                                    <input type="text" placeholder="Search" />
                                    <button class="button-search"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="same-style account-satting">
                            <a class="account-satting-active" href="#"><i class="pe-7s-user-female"></i></a>
                            <div class="account-dropdown">
                                <ul>
                                <?php
                                if($_SESSION['userid'] == "")
                                {
                                    echo '
                                    <li><a href="login-register.php">Login&Register</a></li>
                                    <li><a href="Admin/login.php">Admin</a></li>
                                    <li><a href="wishlist.php">Wishlist </a></li>';
                                }
                                else
                                {
                                   echo '
                                    <li><a href="my-account.php">my account</a></li>
                                    <li><a href="logout.php">Log Out</a></li>';
                                }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="same-style header-wishlist">
                            <a href="wishlist.php"><i class="pe-7s-like"></i></a>
                        </div>
                        <div class="same-style cart-wrap">
                            <button class="icon-cart">
                                <i class="pe-7s-shopbag"></i>
                                <span class="count-style">02</span>
                            </button>
                            <div class="shopping-cart-content">
                                <ul>
                                    <?php
                                    function printqc()
                                    {
                                        include "includes/config.php";
                                    $uid=$_SESSION['userid'];
                                    $qc="select product_master.product_id,product_master.product_img,product_master.product_name,product_master.product_price,user_cart.product_quantity from product_master inner join user_cart on product_master.product_id=user_cart.product_id where user_cart.user_id='$uid';";
                                    $qcdone=mysqli_execute_query($conn,$qc);
                                    
                                    while($result = mysqli_fetch_array($qcdone))
                                    {
                                    echo '
                                    <li class="single-shopping-cart">
                                        <div class="shopping-cart-img">
                                            <a href="#"><img style="height:90px;width:90px" alt="" src="assets/img/product/'.$result['product_img'].'"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="#">'.$result['product_name'].'</a></h4>
                                            <h6>Qty: '.$result['product_quantity'].'</h6>
                                            <span>$'.$result['product_price'].'</span>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="cartremove.php?pid='.$result['product_id'].'"><i class="fa fa-times-circle"></i></a>
                                        </div>
                                    </li>
                                    ';
                                }
                               $sqlon= "select sum(product_master.product_price*user_cart.product_quantity) as total_price from product_master inner join user_cart on product_master.product_id=user_cart.product_id where product_master.product_id In (select product_id from user_cart where user_id='$uid')";
                               $sqldo=mysqli_execute_query($conn,$sqlon);
                               $result1 = mysqli_fetch_array($sqldo);
                              echo'
                                </ul>

                                <div class="shopping-cart-total">
                                   <!-- <h4>Shipping : <span>$20.00</span></h4>-->
                                    <h4>Total : <span class="shop-total">$'.$result1['total_price'].'</span></h4>
                                </div>
                                <div class="shopping-cart-btn btn-hover text-center">
                                    <a class="default-btn" href="cart-page.php">view cart</a>
                                    <a class="default-btn" href="checkout.php">checkout</a>
                                </div>';
                            }
                             printqc();
                             ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom sticky-bar header-res-padding header-padding-2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-1 col-lg-1 col-md-6 col-4">
                        <div class="logo text-center">
                            <a href="index.php">
                                <img  style="height:125px;width:125px; mix-blend-mode:multiply;" alt="" src="assets/img/logo/logo-1.jpg">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-11 col-lg-11 d-none d-lg-block">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="index.php">Category<i class="fa fa-angle-down"></i></a>
                                        <ul class="mega-menu mega-menu-padding">
                                            <li>
                                                <ul>
                                                <li class="mega-menu-title"><a href="collection.php?type=Gold">Gold</a></li>
                                                    <li><a href="collection.php?type=Gold&category=Bangle">Bangle</a></li>
                                                    <li><a href="collection.php?type=Gold&category=Pendant">Pendant</a></li>
                                                    <li><a href="collection.php?type=Gold&category=Neckless">Neckless</a></li>
                                                    <li><a href="collection.php?type=Gold&category=Ring">Ring</a></li>
                                                    <li><a href="collection.php?type=Gold&category=Bracelet">Brecelet</a></li>
                                                    <li><a href="collection.php?type=Gold&category=Earring">Earring</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                            <ul>
                                                <li class="mega-menu-title"><a href="collection.php?type=Silver">Silver</a></li>
                                                    <li><a  href="collection.php?type=Silver&category=Bangle">Bangle</a></li>
                                                    <li><a  href="collection.php?type=Silver&category=Pendant">Pendant</a></li>
                                                    <li><a  href="collection.php?type=Silver&category=Neckless">Neckless</a></li>
                                                    <li><a  href="collection.php?type=Silver&category=Ring">Ring</a></li>
                                                    <li><a  href="collection.php?type=Silver&category=Brecelet">Brecelet</a></li>
                                                    <li><a  href="collection.php?type=Silver&category=Earring">Earring</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                            <ul>
                                                <li class="mega-menu-title"><a href="collection.php?type=Platinum">Platinum</a></li>
                                                    <li><a href="collection.php?type=Platinum&category=Bangle">Bangle</a></li>
                                                    <li><a href="collection.php?type=Platinum&category=Pendant">Pendant</a></li>
                                                    <li><a href="collection.php?type=Platinum&category=Neckless">Neckless</a></li>
                                                    <li><a href="collection.php?type=Platinum&category=Ring">Ring</a></li>
                                                    <li><a href="collection.php?type=Platinum&category=Brecelet">Brecelet</a></li>
                                                    <li><a href="collection.php?type=Platinum&category=Earring">Earring</a></li>
                                                </ul>
                                            </li>

                                        </ul>
                                    </li>
                                    <li><a href="shop.php"> Shop <!--<i class="fa fa-angle-down"></i>--> </a>
                                        <!-- <ul class="mega-menu">
                                            <li>
                                                <ul>
                                                    <li class="mega-menu-title"><a href="#">shop layout</a></li>
                                                    <li><a href="shop.php">standard style</a></li>
                                                    <li><a href="shop-filter.php">Grid filter style</a></li>
                                                    <li><a href="shop-grid-2-col.php">Grid 2 column</a></li>
                                                <li><a href="shop-no-sidebar.php">Grid No sidebar</a></li>
                                                <li><a href="shop-grid-fw.php">Grid full wide </a></li>
                                                <li><a href="shop-right-sidebar.php">Grid right sidebar</a></li>
                                                <li><a href="shop-list.php">list 1 column box </a></li>
                                                <li><a href="shop-list-fw.php">list 1 column full wide </a></li>
                                                <li><a href="shop-list-fw-2col.php">list 2 column  full wide</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="mega-menu-title"><a href="#">product details</a></li>
                                                    <li><a href="product-details.php">tab style 1</a></li>
                                                <li><a href="product-details-2.php">tab style 2</a></li>
                                                <li><a href="product-details-3.php">tab style 3</a></li>
                                                <li><a href="product-details-4.php">sticky style</a></li>
                                                <li><a href="product-details-5.php">gallery style </a></li>
                                                <li><a href="product-details-slider-box.php">Slider style</a></li>
                                                    <li><a href="product-details-affiliate.php">affiliate style</a></li>
                                                    <li><a href="product-details-6.php">fixed image style </a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="mega-menu-img"><a href="shop.php"><img
                                                                src="assets/img/banner/banner-12.png" alt=""></a></li>
                                                </ul>
                                            </li>
                                        </ul> -->
                                    </li>
                                    <li><a href="collection.php">Collection</a></li>
                                    <li><a href="#"> Pages <i class="fa fa-angle-down"></i></a>
                                        <ul class="submenu">
                                            <!-- <li><a href="about.php">about us</a></li> -->
                                            <li><a href="cart-page.php">cart page</a></li>
                                            <li><a href="checkout.php">checkout </a></li>
                                            <!-- <li><a href="wishlist.php">wishlist </a></li>
                                        <li><a href="my-account.php">my account</a></li>
                                        <li><a href="login-register.php">login / register </a></li>
                                        <li><a href="contact.php">contact us </a></li>
                                        <li><a href="404.php">404 page </a></li> -->
                                        </ul>
                                    </li>
                                    <!-- <li><a href="blog.php">Blog <i class="fa fa-angle-down"></i></a> -->
                                        <!-- <ul class="submenu">
                                        <li><a href="blog.php">blog standard</a></li>
                                        <li><a href="blog-no-sidebar.php">blog no sidebar</a></li>
                                        <li><a href="blog-right-sidebar.php">blog right sidebar</a></li>
                                        <li><a href="blog-details.php">blog details 1</a></li>
                                        <li><a href="blog-details-2.php">blog details 2</a></li>
                                        <li><a href="blog-details-3.php">blog details 3</a></li>
                                    </ul> -->
                                    </li>
                                    <li><a href="about.php"> About </a></li>
                                    <li><a href="contact.php"> Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-area">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                <li><a href="index.php">HOME</a>
                                    <ul>
                                        <li><a href="#">Category (GOLD)</a>
                                            <ul>
                                            <li class="mega-menu-title"><a href="collection.php?type=Gold">Gold</a></li>
                                                    <li><a href="collection.php?type=Gold&category=Bangle">Bangle</a></li>
                                                    <li><a href="collection.php?type=Gold&category=Pendant">Pendant</a></li>
                                                    <li><a href="collection.php?type=Gold&category=Neckless">Neckless</a></li>
                                                    <li><a href="collection.php?type=Gold&category=Ring">Ring</a></li>
                                                    <li><a href="collection.php?type=Gold&category=Bracelet">Brecelet</a></li>
                                                    <li><a href="collection.php?type=Gold&category=Earring">Earring</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Category (SILVER)</a>
                                            <ul>
                                            <li class="mega-menu-title"><a href="collection.php?type=Silver">Silver</a></li>
                                                    <li><a  href="collection.php?type=Silver&category=Bangle">Bangle</a></li>
                                                    <li><a  href="collection.php?type=Silver&category=Pendant">Pendant</a></li>
                                                    <li><a  href="collection.php?type=Silver&category=Neckless">Neckless</a></li>
                                                    <li><a  href="collection.php?type=Silver&category=Ring">Ring</a></li>
                                                    <li><a  href="collection.php?type=Silver&category=Brecelet">Brecelet</a></li>
                                                    <li><a  href="collection.php?type=Silver&category=Earring">Earring</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Category (PLATINUM)</a>
                                            <ul>
                                            <li class="mega-menu-title"><a href="collection.php?type=Platinum">Platinum</a></li>
                                                    <li><a href="collection.php?type=Platinum&category=Bangle">Bangle</a></li>
                                                    <li><a href="collection.php?type=Platinum&category=Pendant">Pendant</a></li>
                                                    <li><a href="collection.php?type=Platinum&category=Neckless">Neckless</a></li>
                                                    <li><a href="collection.php?type=Platinum&category=Ring">Ring</a></li>
                                                    <li><a href="collection.php?type=Platinum&category=Brecelet">Brecelet</a></li>
                                                    <li><a href="collection.php?type=Platinum&category=Earring">Earring</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="shop.php">Shop</a>
                                    <!-- <ul>
                                        <li><a href="#">shop layout</a>
                                            <ul>
                                                <li><a href="shop.php">standard style</a></li>
                                                <li><a href="shop-filter.php">Grid filter style</a></li>
                                                <li><a href="shop-grid-2-col.php">Grid 2 column</a></li>
                                                <li><a href="shop-no-sidebar.php">Grid No sidebar</a></li>
                                                <li><a href="shop-grid-fw.php">Grid full wide </a></li>
                                                <li><a href="shop-right-sidebar.php">Grid right sidebar</a></li>
                                                <li><a href="shop-list.php">list 1 column box </a></li>
                                                <li><a href="shop-list-fw.php">list 1 column full wide </a></li>
                                                <li><a href="shop-list-fw-2col.php">list 2 column full wide</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">product details</a>
                                            <ul>
                                                 <li><a href="product-details.php">tab style 1</a></li>
                                            <li><a href="product-details-2.php">tab style 2</a></li>
                                            <li><a href="product-details-3.php">tab style 3</a></li>
                                            <li><a href="product-details-4.php">sticky style</a></li>
                                            <li><a href="product-details-5.php">gallery style </a></li>
                                            <li><a href="product-details-slider-box.php">Slider style</a></li>
                                                <li><a href="product-details-affiliate.php">affiliate style</a></li>
                                                <li><a href="product-details-6.php">fixed image style </a></li>
                                            </ul>
                                        </li>
                                    </ul>  -->
                                </li>
                                <li><a href="collection.php">Collection</a></li>
                                <li><a href="#">Pages</a>
                                     <ul>
                                        <li><a href="cart-page.php">cart page</a></li>
                                        <li><a href="checkout.php">checkout </a></li>
                                       <!-- <li><a href="about.php">about us</a></li>
                                        <li><a href="cart-page.php">cart page</a></li>
                                        <li><a href="checkout.php">checkout </a></li>
                                        <li><a href="wishlist.php">wishlist </a></li>
                                        <li><a href="my-account.php">my account</a></li>
                                        <li><a href="login-register.php">login / register </a></li>
                                        <li><a href="contact.php">contact us </a></li>
                                        <li><a href="404.php">404 page </a></li>-->
                                    </ul> 
                                </li>
                                <li><a href="blog.php">Blog</a>
                                    <!-- <ul>
                                    <li><a href="blog.php">blog standard</a></li>
                                    <li><a href="blog-no-sidebar.php">blog no sidebar</a></li>
                                    <li><a href="blog-right-sidebar.php">blog right sidebar</a></li>
                                    <li><a href="blog-details.php">blog details 1</a></li>
                                    <li><a href="blog-details-2.php">blog details 2</a></li>
                                    <li><a href="blog-details-3.php">blog details 3</a></li>
                                </ul> -->
                                </li>
                                <li><a href="about.php">About us</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>