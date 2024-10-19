<?php 
include "includes/header.php";
include "includes/function.php";
include "includes/config.php";
?>
<head>
<script>
// Set the date we're counting down to
var countDownDate = new Date("Nov , 2023 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = '<span class="cdown day">D<p>'+days+'</p></span> <span class="cdown hour">H <p>'+hours+'</p></span> <span class="cdown minutes">M <p>'+minutes+'</p></span class="cdown second"> <span>S <p>'+seconds+'</p></span>'
//     days + "d " + hours + "h "
//   + minutes + "m " + seconds + "s ";
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
</head>
<div class="slider-area">
    <div class="slider-active owl-carousel nav-style-1 owl-dot-none">
        <div class="single-slider-2 slider-height-22 d-flex align-items-center bg-img"
            style="background-image:url(assets/img/slider/slider-1.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider-content-22 slider-content-22-white slider-animated-1">
                            <h3 class="animated">2023 Latest Collection</h3>
                            <h1 class="animated">-10% Offer for <br>New Jewellery Product</h1>
                            <div class="slider-btn-round slider-btn-round-white btn-hover">
                                <a class="animated" href="shop.php">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider-2 slider-height-22 d-flex align-items-center bg-img"
            style="background-image:url(assets/img/slider/slider-2.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider-content-22 slider-content-22-white slider-animated-1">
                            <h3 class="animated">2020 Latest Collection</h3>
                            <h1 class="animated">-40% Offer All <br>New Book</h1>
                            <div class="slider-btn-round slider-btn-round-white btn-hover">
                                <a class="animated" href="shop.php">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="banner-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="single-banner mb-30">
                    <a href="product-details.php"><img  style="border-radius:40px 40px 40px 40px;" src="assets/img/banner/banner-70.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="single-banner mb-30">
                    <a href="product-details.php"><img  style="border-radius:50px 50px 50px 50px;" src="assets/img/banner/banner-71.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pb-70">
    <div class="container">
        <div class="product-tab-list nav pb-55 text-center">
            <a href="#product-1" data-bs-toggle="tab">
                <h4>New Arrivals</h4>
            </a>
            <a class="active" href="#product-2" data-bs-toggle="tab">
                <h4>Best Sellers</h4>
            </a>
            <a href="#product-3" data-bs-toggle="tab">
                <h4>Sale Items </h4>
            </a>
        </div>
        <div class="tab-content jump">
            <div class="tab-pane" id="product-1">
                <div class="row">
                    <?php
                   
                    $select = "select * from product_master where product_stock between 1 and 201 order by product_id ASC limit 8";
                    //$select = "select * user_reviews.review_total from user_reviews INNER JOIN product_master ON user_reviews.product_id=product_master.product_id order by product_id desc limit 8";
                    $execute = mysqli_execute_query($conn, $select);
                    while ($result = mysqli_fetch_array($execute)) {
                        echo '
                    <div class="col-xl-2 col-md-6 col-lg-4 col-sm-6">
                        <div class="product-wrap mb-25">
                            <div class="product-img">
                                <a href="product-details.php?id='.$result['product_id'].'&cat='.$result['product_category'].'&type='.$result['product_type'].'">
                                    <img  style="border-radius:40px 40px 40px 40px;" class="default-img" src="assets/img/product/' . $result['product_img'] . '" alt="">
                                    <img class="hover-img" src="assets/img/product/' . $result['product_img'] . '" alt="">
                                </a>
                                <span class="pink">-10%</span>
                                <div class="product-action">
                                   
                                    ';
                                    $cid=$result['product_id'];
                                    alreadyaddfromwishlist($conn,$_SESSION["pwid$cid"],$result['product_id']);
                                    alreadyaddfromcart($conn,$_SESSION["pcid$cid"],$result['product_id']);
                                    echo'
                                    <div class="pro-same-action pro-quickview">
                                        <a title="Quick View" href="#" data-bs-toggle="modal"
                                            data-bs-target="#Modal1'. $result['product_id'] . '"><i class="pe-7s-look"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content text-center">
                                <h3><a href="product-details.php">'.$result['product_name'].'</a></h3>
                               ';
                               review($result["product_id"],$conn);
                               echo '
                                <div class="product-price">
                                    <span>INR '.$result['product_price'].'</span>
                                    <span class="old">$ 60.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
<div class="modal fade" id="Modal1' . $result['product_id'] . '" tabindex="-1" role="dialog">
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
                                <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                            </div>
                            <div id="pro-2" class="tab-pane fade">
                                <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                            </div>
                            <div id="pro-3" class="tab-pane fade">
                                <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                            </div>
                            <div id="pro-4" class="tab-pane fade">
                                <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                            </div>
                        </div>
                        <!-- Thumbnail Large Image End -->
                        <!-- Thumbnail Image End -->
                        <div class="quickview-wrap mt-15">
                            <div class="quickview-slide-active owl-carousel nav nav-style-1" role="tablist">
                                <a class="active" data-bs-toggle="tab" href="#pro-1"><img
                                        src="assets/img/product/' . $result['product_img'] . '" alt=""></a>
                                <a data-bs-toggle="tab" href="#pro-2"><img src="assets/img/product/' . $result['product_img'] . '"
                                        alt=""></a>
                                <a data-bs-toggle="tab" href="#pro-3"><img src="assets/img/product/' . $result['product_img'] . '"
                                        alt=""></a>
                                <a data-bs-toggle="tab" href="#pro-4"><img src="assets/img/product/' . $result['product_img'] . '"
                                        alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="product-details-content quickview-content">
                            <h2>' . $result['product_name'] . '</h2>
                            <div class="product-details-price">
                                <span>₹' . $result['product_price'] . '</span>
                                <span class="old">₹20.00 </span>
                            </div>
                            ';
                           echo modelreview($result["product_id"],$conn);
                            echo '
                            <p>' . $result['product_description'] . '</p>
                            <div class="pro-details-list">
                                <ul>
                                    <li>' . $result['product_size'] . '</li>
                                    <li>' . $result['product_weight'] . '</li>
                                    <li>- Very modern style </li>
                                </ul>
                            </div>
                            <div class="pro-details-size-color">
                                <div class="pro-details-color-wrap">
                                    <span>Color</span>
                                    <div class="pro-details-color-content">
                                        <ul>
                                            <li class="' . $result['product_color'] . '"></li>
                                            <!--<li class="maroon active"></li>
                                            <li class="gray"></li>
                                            <li class="green"></li>
                                            <li class="yellow"></li>
                                            <li class="white"></li>-->
                                        </ul>
                                    </div>
                                </div>
                                <div class="pro-details-size">
                                    <span>Size</span>
                                    <div class="pro-details-size-content">
                                        <ul>
                                        <li><a href="#">' . $result['product_size'] . '</a></li>
                                            <!--<li><a href="#">s</a></li>
                                            <li><a href="#">m</a></li>
                                            <li><a href="#">l</a></li>
                                            <li><a href="#">xl</a></li>
                                            <li><a href="#">xxl</a></li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-details-quality">
                            <!--<div >
                            <input type="text" oninput="qty()" id="quantity" name="qtybutton" value="1">
                        </div>-->
                        ';
                        $cid=$result['product_id'];
                        alreadyaddfromcartformodel($conn,$_SESSION["pcid$cid"],$result['product_id']);
                        alreadyaddfromwishlistformodel($conn,$_SESSION["pwid$cid"],$result['product_id']);
                        echo'
                                <div class="pro-details-compare">
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                </div>
                            </div>
                            <div class="pro-details-meta">
                                <span>Categories :</span>
                                <ul>
                                    <li><a href="#">' . $result['product_category'] . '</a></li>
                                    <!--<li><a href="#">Furniture,</a></li>
                                    <li><a href="#">Electronic</a></li>-->
                                </ul>
                            </div>
                            <div class="pro-details-meta">
                                <span>Tag :</span>
                                <ul>
                                    <!--<li><a href="#">Fashion, </a></li>
                                    <li><a href="#">Furniture,</a></li>
                                    <li><a href="#">Electronic</a></li>-->
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
                    ';
                    }
                    ?>
                </div>
            </div>
            <div class="tab-pane active" id="product-2">
                <div class="row">
                    <?php
                 
                    $select = "select * from product_master where product_stock between 1 and 201 order by product_id desc limit 2";
                    $execute = mysqli_execute_query($conn, $select);
                    while ($result = mysqli_fetch_array($execute)) {
                        echo '
                    <div class="col-xl-2 col-md-6 col-lg-4 col-sm-6">
                        <div class="product-wrap mb-25">
                            <div class="product-img">
                                <a href="product-details.php?id='.$result['product_id'].'&cat='.$result['product_category'].'&type='.$result['product_type'].'">
                                    <img  style="border-radius:40px 40px 40px 40px;" class="default-img" src="assets/img/product/' . $result['product_img'] . '" alt="">
                                    <img class="hover-img" src="assets/img/product/' . $result['product_img'] . '" alt="">
                                </a>
                                <span class="pink">-10%</span>
                                <div class="product-action">
                                ';
                                $cid=$result['product_id'];
                                alreadyaddfromwishlist($conn,$_SESSION["pwid$cid"],$result['product_id']);
                                alreadyaddfromcart($conn,$_SESSION["pcid$cid"],$result['product_id']);
                                echo'
                                    <div class="pro-same-action pro-quickview">
                                        <a title="Quick View" href="#" data-bs-toggle="modal"
                                            data-bs-target="#Modal2'.$result['product_id'].'"><i class="pe-7s-look"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content text-center">
                                <h3><a href="product-details.php">'.$result['product_name'].'</a></h3>
                                ';
                                review($result["product_id"],$conn);
                                echo '
                                <div class="product-price">
                                    <span>INR '.$result['product_price'].'</span>
                                    <span class="old">$ 60.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="Modal2' . $result['product_id'] . '" tabindex="-1" role="dialog">
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
                                                    <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                                                </div>
                                                <div id="pro-2" class="tab-pane fade">
                                                    <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                                                </div>
                                                <div id="pro-3" class="tab-pane fade">
                                                    <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                                                </div>
                                                <div id="pro-4" class="tab-pane fade">
                                                    <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                                                </div>
                                            </div>
                                            <!-- Thumbnail Large Image End -->
                                            <!-- Thumbnail Image End -->
                                            <div class="quickview-wrap mt-15">
                                                <div class="quickview-slide-active owl-carousel nav nav-style-1" role="tablist">
                                                    <a class="active" data-bs-toggle="tab" href="#pro-1"><img
                                                            src="assets/img/product/' . $result['product_img'] . '" alt=""></a>
                                                    <a data-bs-toggle="tab" href="#pro-2"><img src="assets/img/product/' . $result['product_img'] . '"
                                                            alt=""></a>
                                                    <a data-bs-toggle="tab" href="#pro-3"><img src="assets/img/product/' . $result['product_img'] . '"
                                                            alt=""></a>
                                                    <a data-bs-toggle="tab" href="#pro-4"><img src="assets/img/product/' . $result['product_img'] . '"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-12 col-xs-12">
                                            <div class="product-details-content quickview-content">
                                                <h2>' . $result['product_name'] . '</h2>
                                                <div class="product-details-price">
                                                    <span>₹' . $result['product_price'] . '</span>
                                                    <span class="old">₹20.00 </span>
                                                </div>
                                                ';
                                               echo modelreview($result["product_id"],$conn);
                                                echo '
                                                <p>' . $result['product_description'] . '</p>
                                                <div class="pro-details-list">
                                                    <ul>
                                                        <li>' . $result['product_size'] . '</li>
                                                        <li>' . $result['product_weight'] . '</li>
                                                        <li>- Very modern style </li>
                                                    </ul>
                                                </div>
                                                <div class="pro-details-size-color">
                                                    <div class="pro-details-color-wrap">
                                                        <span>Color</span>
                                                        <div class="pro-details-color-content">
                                                            <ul>
                                                                <li class="' . $result['product_color'] . '"></li>
                                                                <!--<li class="maroon active"></li>
                                                                <li class="gray"></li>
                                                                <li class="green"></li>
                                                                <li class="yellow"></li>
                                                                <li class="white"></li>-->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="pro-details-size">
                                                        <span>Size</span>
                                                        <div class="pro-details-size-content">
                                                            <ul>
                                                            <li><a href="#">' . $result['product_size'] . '</a></li>
                                                                <!--<li><a href="#">s</a></li>
                                                                <li><a href="#">m</a></li>
                                                                <li><a href="#">l</a></li>
                                                                <li><a href="#">xl</a></li>
                                                                <li><a href="#">xxl</a></li>-->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pro-details-quality">
                                               <!-- <div >
                                                <input type="text" oninput="qty()" id="quantity" name="qtybutton" value="1">
                                            </div>-->
                                            ';
                                            $cid=$result['product_id'];
                                            alreadyaddfromcartformodel($conn,$_SESSION["pcid$cid"],$result['product_id']);
                                            alreadyaddfromwishlistformodel($conn,$_SESSION["pwid$cid"],$result['product_id']);
                                            echo'
                                                    <div class="pro-details-compare">
                                                        <a href="#"><i class="pe-7s-shuffle"></i></a>
                                                    </div>
                                                </div>
                                                <div class="pro-details-meta">
                                                    <span>Categories :</span>
                                                    <ul>
                                                        <li><a href="#">' . $result['product_category'] . '</a></li>
                                                        <!--<li><a href="#">Furniture,</a></li>
                                                        <li><a href="#">Electronic</a></li>-->
                                                    </ul>
                                                </div>
                                                <div class="pro-details-meta">
                                                    <span>Tag :</span>
                                                    <ul>
                                                        <!--<li><a href="#">Fashion, </a></li>
                                                        <li><a href="#">Furniture,</a></li>
                                                        <li><a href="#">Electronic</a></li>-->
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
                    ';
                    }
                    ?>
                </div>
            </div>
            <div class="tab-pane" id="product-3">
                <div class="row">
                <?php
     
                    $select = "select * from product_master where product_stock between 1 and 201 order by product_id desc limit 1";
                    $execute = mysqli_execute_query($conn, $select);
                    while ($result = mysqli_fetch_array($execute)) {
                        echo '
                    <div class="col-xl-2 col-md-6 col-lg-4 col-sm-6">
                        <div class="product-wrap mb-25">
                            <div class="product-img">
                                <a href="product-details.php?id='.$result['product_id'].'&cat='.$result['product_category'].'&type='.$result['product_type'].'">
                                    <img  style="border-radius:40px 40px 40px 40px;" class="default-img" src="assets/img/product/' . $result['product_img'] . '" alt="">
                                    <img class="hover-img" src="assets/img/product/' . $result['product_img'] . '" alt="">
                                </a>
                                <span class="pink">-10%</span>
                                <div class="product-action">
                                ';
                                $cid=$result['product_id'];
                                alreadyaddfromwishlist($conn,$_SESSION["pwid$cid"],$result['product_id']);
                                alreadyaddfromcart($conn,$_SESSION["pcid$cid"],$result['product_id']);
                                echo'
                                    <div class="pro-same-action pro-quickview">
                                        <a title="Quick View" href="#" data-bs-toggle="modal"
                                            data-bs-target="#Modal3'.$result['product_id'].'"><i class="pe-7s-look"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content text-center">
                                <h3><a href="product-details.php">'.$result['product_name'].'</a></h3>
                                ';
                                review($result["product_id"],$conn);
                                echo '
                                <div class="product-price">
                                    <span>INR '.$result['product_price'].'</span>
                                    <span class="old">$ 60.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="Modal3' . $result['product_id'] . '" tabindex="-1" role="dialog">
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
                                                    <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                                                </div>
                                                <div id="pro-2" class="tab-pane fade">
                                                    <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                                                </div>
                                                <div id="pro-3" class="tab-pane fade">
                                                    <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                                                </div>
                                                <div id="pro-4" class="tab-pane fade">
                                                    <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                                                </div>
                                            </div>
                                            <!-- Thumbnail Large Image End -->
                                            <!-- Thumbnail Image End -->
                                            <div class="quickview-wrap mt-15">
                                                <div class="quickview-slide-active owl-carousel nav nav-style-1" role="tablist">
                                                    <a class="active" data-bs-toggle="tab" href="#pro-1"><img
                                                            src="assets/img/product/' . $result['product_img'] . '" alt=""></a>
                                                    <a data-bs-toggle="tab" href="#pro-2"><img src="assets/img/product/' . $result['product_img'] . '"
                                                            alt=""></a>
                                                    <a data-bs-toggle="tab" href="#pro-3"><img src="assets/img/product/' . $result['product_img'] . '"
                                                            alt=""></a>
                                                    <a data-bs-toggle="tab" href="#pro-4"><img src="assets/img/product/' . $result['product_img'] . '"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-12 col-xs-12">
                                            <div class="product-details-content quickview-content">
                                                <h2>' . $result['product_name'] . '</h2>
                                                <div class="product-details-price">
                                                    <span>₹' . $result['product_price'] . '</span>
                                                    <span class="old">₹20.00 </span>
                                                </div>
                                                ';
                                               echo modelreview($result["product_id"],$conn);
                                                echo '
                                                <p>' . $result['product_description'] . '</p>
                                                <div class="pro-details-list">
                                                    <ul>
                                                        <li>' . $result['product_size'] . '</li>
                                                        <li>' . $result['product_weight'] . '</li>
                                                        <li>- Very modern style </li>
                                                    </ul>
                                                </div>
                                                <div class="pro-details-size-color">
                                                    <div class="pro-details-color-wrap">
                                                        <span>Color</span>
                                                        <div class="pro-details-color-content">
                                                            <ul>
                                                                <li class="' . $result['product_color'] . '"></li>
                                                                <!--<li class="maroon active"></li>
                                                                <li class="gray"></li>
                                                                <li class="green"></li>
                                                                <li class="yellow"></li>
                                                                <li class="white"></li>-->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="pro-details-size">
                                                        <span>Size</span>
                                                        <div class="pro-details-size-content">
                                                            <ul>
                                                            <li><a href="#">' . $result['product_size'] . '</a></li>
                                                                <!--<li><a href="#">s</a></li>
                                                                <li><a href="#">m</a></li>
                                                                <li><a href="#">l</a></li>
                                                                <li><a href="#">xl</a></li>
                                                                <li><a href="#">xxl</a></li>-->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pro-details-quality">
                                               <!-- <div >
                                                <input type="text" oninput="qty()" id="quantity" name="qtybutton" value="1">
                                            </div>-->
                                            ';
                                            $cid=$result['product_id'];
                                            alreadyaddfromcartformodel($conn,$_SESSION["pcid$cid"],$result['product_id']);
                                            alreadyaddfromwishlistformodel($conn,$_SESSION["pwid$cid"],$result['product_id']);
                                            echo'
                                                    <div class="pro-details-compare">
                                                        <a href="#"><i class="pe-7s-shuffle"></i></a>
                                                    </div>
                                                </div>
                                                <div class="pro-details-meta">
                                                    <span>Categories :</span>
                                                    <ul>
                                                        <li><a href="#">' . $result['product_category'] . '</a></li>
                                                        <!--<li><a href="#">Furniture,</a></li>
                                                        <li><a href="#">Electronic</a></li>-->
                                                    </ul>
                                                </div>
                                                <div class="pro-details-meta">
                                                    <span>Tag :</span>
                                                    <ul>
                                                        <!--<li><a href="#">Fashion, </a></li>
                                                        <li><a href="#">Furniture,</a></li>
                                                        <li><a href="#">Electronic</a></li>-->
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
                    ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="deal-area pb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="common-deal-img">
                    <a href="#"><img  style="border-radius:40px 40px 40px 40px;" class="wow fadeInLeft" src="assets/img/banner/deal-9.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="funfact-content funfact-res text-center">
                    <h2>Deal of the day</h2>
                    <div class="timer">
                        <!-- <div data-countdown="2022/06/01"></div> -->
                        <div id="demo"></div>
                    </div>
                    <div class="funfact-btn btn-only-round funfact-btn-red-2 btn-hover">
                        <a href="shop.php">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="suppoer-area pb-90">
    <div class="container padding-10-row-col">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="support-wrap-3 support-bg-color-1 text-center mb-10">
                    <div class="support-icon-2">
                        <img class="animated" src="assets/img/icon-img/support-5.png" alt="">
                    </div>
                    <div class="support-content-3">
                        <img src="assets/img/icon-img/support-8.png" alt="">
                        <p>Free shipping on all order</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="support-wrap-3 support-bg-color-2 text-center mb-10">
                    <div class="support-icon-2">
                        <img class="animated" src="assets/img/icon-img/support-6.png" alt="">
                    </div>
                    <div class="support-content-3">
                        <img src="assets/img/icon-img/support-9.png" alt="">
                        <p>Back guarantee under 5 days</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="support-wrap-3 support-bg-color-3 text-center mb-10">
                    <div class="support-icon-2">
                        <img class="animated" src="assets/img/icon-img/support-7.png" alt="">
                    </div>
                    <div class="support-content-3">
                        <img src="assets/img/icon-img/support-10.png" alt="">
                        <p>Onevery order over $150</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog-area pb-70">
    <div class="container">
        <div class="section-title-6 mb-50 text-center">
            <h2>Latest News</h2>
            <p>But I must explain to you how all this mistaken idea of denouncing. </p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog-wrap mb-30 scroll-zoom">
                    <div   style="border-radius:40px 40px 40px 40px;" class="blog-img mb-10">
                        <a href=""><img style="border-radius:40px 40px 40px 40px;" src="assets/img/blog/blog-10.jpg" alt=""></a>
                        <span class="red">Lifestyle</span>
                    </div>
                    <div  style="border-radius:40px 40px 40px 40px;" class="blog-content-3 text-center">
                        <h3><a href="">Lorem ipsum dolor sit amet cons adipisic elit.</a></h3>
                        <span>By: <a href="#">Shop Admin</a></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog-wrap mb-30 scroll-zoom">
                    <div  style="border-radius:40px 40px 40px 40px;" class="blog-img mb-10">
                        <a href=""><img style="border-radius:40px 40px 40px 40px;" src="assets/img/blog/blog-11.jpg" alt=""></a>
                        <span class="red">Lifestyle</span>
                    </div>
                    <div  style="border-radius:40px 40px 40px 40px;" class="blog-content-3 text-center">
                        <h3><a href="">Lorem ipsum dolor sit amet cons adipisic elit.</a></h3>
                        <span>By: <a href="#">Shop Admin</a></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog-wrap mb-30 scroll-zoom">
                    <div   style="border-radius:40px 40px 40px 40px;" class="blog-img mb-10">
                        <a href=""><img  style="border-radius:40px 40px 40px 40px;" src="assets/img/blog/blog-12.jpg" alt=""></a>
                        <span class="red">Lifestyle</span>
                    </div>
                    <div  style="border-radius:40px 40px 40px 40px;" class="blog-content-3 text-center">
                        <h3 ><a href="">Lorem ipsum dolor sit amet cons adipisic elit.</a></h3>
                        <span>By: <a href="#">Shop Admin</a></span>
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