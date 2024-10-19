<head>
        <script type='text/javascript'>
               function qty()
                {
                    qty=1;
                     qty =document.getElementById("quantity").value;
                     document.cookie="qty="+qty;
                }
    </script>
    </head>
<?php
// Simulated product data
session_start();
include "includes/config.php";
include "includes/function.php";
error_reporting(0);
if ($_POST['category'] != "none") {
    $categoryFilter = $_POST['category'];
    if ($categoryFilter != 1) {
        $sql = "select * from product_master where product_stock between 1 and 201 order by product_name " . $categoryFilter;
    } else {
        $sql = "select * from product_master  where product_stock between ".$categoryFilter." and 201";
    }
    $done = mysqli_execute_query($conn, $sql);

    while ($result = mysqli_fetch_array($done)) {
        echo '
                    <div class="col-xl-2 col-md-6 col-lg-4 col-sm-6">
                        <div class="product-wrap mb-25">
                            <div class="product-img">
                                <a href="product-details.php?id=' . $result['product_id'] . '&cat=' . $result['product_category'] . '&type=' . $result['product_type'] . '">
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
                                            data-bs-target="#Modal4' . $result['product_id'] . '"><i class="pe-7s-look"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content text-center">
                                <h3><a href="product-details.php">' . $result['product_name'] . '</a></h3>
                               
                                <div class="product-price">
                                    <span>INR' . $result['product_price'] . '</span>
                                    <span class="old">$ 60.00</span>
                                </div>
                            </div>
                            '; 
                            review($result['product_id'],$conn);
        echo '
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="Modal4' . $result['product_id'] . '" tabindex="-1" role="dialog">
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
} else {
    $sql = "select * from product_master where product_stock between 1 and 201 order by product_name ASC";
    $done = mysqli_execute_query($conn, $sql);
    while ($result = mysqli_fetch_array($done)) {
        echo '
 <div class="col-xl-2 col-md-6 col-lg-4 col-sm-6">
                                        <div class="product-wrap mb-25">
                                            <div class="product-img">
                                                <a href="product-details.php?id=' . $result['product_id'] . '&cat=' . $result['product_category'] . '&type=' . $result['product_type'] . '">
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
                                                            data-bs-target="#Modal4' . $result['product_id'] . '"><i class="pe-7s-look"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <h3><a href="product-details.php">' . $result['product_name'] . '</a></h3>
                                               
                                                <div class="product-price">
                                                    <span>INR' . $result['product_price'] . '</span>
                                                    <span class="old">$ 60.00</span>
                                                </div>
                                            </div>
                                            ';
        review($result['product_id'], $conn);
        echo '
          </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="Modal4' . $result['product_id'] . '" tabindex="-1" role="dialog">
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
                                          <!--  <div >
                                            <input type="text" oninput="qty()" id="quantity" name="qtybutton"  disabled />
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
}
?>