<?php
include "includes/header.php";
include "includes/config.php";
include "includes/function.php";
//error_reporting(0);
if($_SESSION['userid'] == "")
{
    ?>
    <script type="text/javascript">
        alert("Login Crediential Required");
        document.location="login-register.php";
    </script>
    <?php
}
if(isset($_POST['submit']))
{
    $filename = "includes/idgenerator/reviewsid.txt";
    $myfile = fopen($filename, "r");
    $in = fread($myfile, filesize($filename));
    $u_id = ++$in;

    $myfile1 = fopen($filename, "w");
    fwrite($myfile1, $u_id);
    fclose($myfile);
    fclose($myfile1);

    $userid=$_SESSION['userid'];
    $productid=$_GET['id'];
    $reviewtotal=$_POST['rate'];
    $comment=$_POST['YourReview'];

    $sql="insert into user_reviews(user_reviews_id,user_id,product_id,review_total,user_comment)values('$u_id','$userid','$productid','$reviewtotal','$comment')";
    $done=mysqli_execute_query($conn,$sql);
    if($done)
    {
        ?>
        <script type="text/javascript">document.location="index.php";</script>
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
                <li class="active">Shop Details</li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <?php

            if(isset($_GET['id']) != "")
            {
              
            while ($result = mysqli_fetch_array(detail($_GET['id'],$conn))) {
                echo '
            <div class="col-lg-6 col-md-6">
                <div class="product-details">
                    <div class="product-details-img">
                        <div class="tab-content jump"> 
                            <div id="shop-details-1" class="tab-pane large-img-style">
                                <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                                <span class="dec-price">-10%</span>
                                <div class="img-popup-wrap">
                                    <a class="img-popup" href="assets/img/product/' . $result['product_img'] . '"><i class="pe-7s-expand1"></i></a>
                                </div>
                            </div>
                            <div id="shop-details-2" class="tab-pane active large-img-style">
                                <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                                <span class="dec-price">-10%</span>
                                <div class="img-popup-wrap">
                                    <a class="img-popup" href="assets/img/product/' . $result['product_img'] . '"><i class="pe-7s-expand1"></i></a>
                                </div>
                            </div>
                            <div id="shop-details-3" class="tab-pane large-img-style">
                                <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                                <span class="dec-price">-10%</span>
                                <div class="img-popup-wrap">
                                    <a class="img-popup" href="assets/img/product/' . $result['product_img'] . '"><i class="pe-7s-expand1"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="shop-details-tab nav">
                            <a class="shop-details-overly" href="#shop-details-1" data-bs-toggle="tab">
                                <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                            </a>
                            <a class="shop-details-overly active" href="#shop-details-2" data-bs-toggle="tab">
                                <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                            </a>
                            <a class="shop-details-overly" href="#shop-details-3" data-bs-toggle="tab">
                                <img src="assets/img/product/' . $result['product_img'] . '" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product-details-content ml-70">
                    <h2>' . $result['product_name'] . '</h2>
                    <div class="product-details-price">
                        <span>INR ' . $result['product_price'] . ' </span>
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
                        <span><a href="#">3 Reviews</a></span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco</p>
                    <div class="pro-details-list">
                        <ul>
                            <li>' . $result['product_size'] . '</li>
                            <li>' . $result['product_weight'] . '</li>
                            <li>- Very modern style  </li>
                        </ul>
                    </div>
                    <div class="pro-details-size-color">
                        <div class="pro-details-color-wrap">
                            <span>Color</span>
                            <div class="pro-details-color-content">
                                <ul>
                                    <li class="' . $result['product_color'] . '"></li>
                                  <!--  <li class="maroon active"></li>
                                    <li class="gray"></li>
                                    <li class="green"></li>
                                    <li class="yellow"></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="pro-details-size">
                            <span>Size</span>
                            <div class="pro-details-size-content">
                                <ul>
                                    <li><a href="#">' . $result['product_size'] . '</a></li>
                                    <!--<li><a href="#">m</a></li>
                                    <li><a href="#">l</a></li>
                                    <li><a href="#">xl</a></li>
                                    <li><a href="#">xxl</a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pro-details-quality">
                        <div >
                            <input type="text" oninput="qty()" id="quantity" name="qtybutton" value="1">
                        </div>
                        ';
                        $cid=$result['product_id'];
                       // alreadyaddfromcartformodel($conn,$_SESSION["pcid$cid"],$result['product_id']);
                        if($_SESSION["pcid$cid"] != $result['product_id'])
                        {
                            echo'
                            <div class="pro-details-cart btn-hover">
                            <a href="cart-page.php?pid='.$result['product_id'].'&wid=one">Add To Cart</a>
                        </div>';
                        } 
                        else {
                          
                            echo '
                            <div class="pro-details-cart btn-hover">
                            <a href="cart-page.php">Remove Cart</a>
                        </div>';
                        }
                        //alreadyaddfromwishlistformodel($conn,$_SESSION["pwid$cid"],$result['product_id']);
                        if($_SESSION["pwid$cid"] != $result['product_id'])
                        {
                            echo'
                            <div class="pro-same-action pro-wishlist">
                            <a title="Wishlist" href="wishlist.php?pid='.$result['product_id'].'&wid=one""><i class="pe-7s-like"></i></a>
                           </div>';
                        } 
                        else {
                          
                            echo '
                            <div class="pro-same-action pro-wishlist">
                            <a title="Remove Wishlist" href="wishlist.php"><i class="fa fa-times"></i></a>
                           </div>';
                        }
                        echo'
                        <div class="pro-details-compare">
                            <a href="#"><i class="pe-7s-shuffle"></i></a>
                        </div>
                    </div>
                    <div class="pro-details-meta">
                        <span>Categories :</span>
                        <ul>
                            <li><a href="#">' . $result['product_category'] . '</a></li>
                           <!-- <li><a href="#">Furniture,</a></li>
                            <li><a href="#">Fashion</a></li>-->
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
<div class="description-review-area pb-90">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a data-bs-toggle="tab" href="#des-details1">Additional information</a>
                <a class="active" data-bs-toggle="tab" href="#des-details2">Description</a>
                <a data-bs-toggle="tab" href="#des-details3">Reviews (2)</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p>' . $result['product_description'] . '</p>
                    </div>
                </div>
                <div id="des-details1" class="tab-pane ">
                    <div class="product-anotherinfo-wrapper">
                        <ul>
                            <li><span>Weight</span>' . $result['product_weight'] . '</li>
                            <li><span>Dimensions</span>' . $result['product_size'] . '</li>
                            <li><span>Materials</span>' . $result['product_detail'] . '</li>
                            <li><span>Other Info</span>' . $result['product_additional_detail'] . '</li>
                        </ul>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="review-wrapper">
                                <div class="single-review">
                                    <div class="review-img">
                                        <img src="assets/img/testimonial/1.jpg" alt="">
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="review-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-review child-review">
                                    <div class="review-img">
                                        <img src="assets/img/testimonial/2.jpg" alt="">
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="review-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper euismod vehicula. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="ratting-form-wrapper pl-50">
                                <h3>Add a Review</h3>
                                <div class="ratting-form">
                                    <form method="post">
                                        <div class="star-box">
                                            <span>Your rating:</span>
                                            <div class="rate">
                                            <input type="radio" id="star5" name="rate" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rate" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rate" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rate" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rate" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                          </div>
                                        </div>
                                        <div class="row">
                                        <!--<div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Name" name="name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Email" type="email">
                                                </div>
                                            </div>-->
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="YourReview" placeholder="Message"></textarea>
                                                    <button class="btn btn-primary" type="submit" name="submit">SAVE REVIEWS</button>
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
</div>';

 break;
            }
            ?>
            <div class="related-product-area pb-95">
                <div class="container">
                    <div class="section-title text-center mb-50">
                        <h2>Related products</h2>
                    </div>
                    <div class="related-product-active owl-carousel owl-dot-none">
                        <?php
                        
                           
                             $cat=$_GET['cat'];
                             $type=$_GET['type'];
                             $sql = "select * from product_master where product_type='$type' and product_category='$cat'";
                             $execute = mysqli_execute_query($conn, $sql);
                         
                        while ($result = mysqli_fetch_array($execute)) {
                            echo '   
        <div class="product-wrap">
                <div class="product-img">
                    <a href="product-details.php?id='.$result['product_id'].'&cat='.$result['product_category'].'&type='.$result['product_type'].'">
                        <img class="default-img" src="assets/img/product/'.$result['product_img'].'" alt="">
                        <img class="hover-img" src="assets/img/product/'.$result['product_img'].'" alt="">
                    </a>
                    <span class="pink">-10%</span>
                    <div class="product-action">
                    ';
                    $cid=$result['product_id'];
                    alreadyaddfromwishlist($conn,$_SESSION["pwid$cid"],$result['product_id']);
                    alreadyaddfromcart($conn,$_SESSION["pcid$cid"],$result['product_id']);
                    echo'
                        <div class="pro-same-action pro-quickview">
                            <a title="Quick View" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-look"></i></a>
                        </div>
                    </div>
                </div>
                <div class="product-content text-center">
                    <h3><a href="product-details.php?id='.$result['product_id'].'&cat='.$result['product_category'].'&type='.$result['product_type'].'">'.$result['product_category'].'</a></h3>
                    <div class="product-rating">
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="product-price">
                        <span>INR '.$result['product_price'].'</span>
                        <span class="old">$ 60.00</span>
                    </div>
                </div>
            </div>';
                     break;  }}
                        ?>
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
                                            <a data-bs-toggle="tab" href="#pro-2"><img
                                                    src="assets/img/product/quickview-s2.jpg" alt=""></a>
                                            <a data-bs-toggle="tab" href="#pro-3"><img
                                                    src="assets/img/product/quickview-s3.jpg" alt=""></a>
                                            <a data-bs-toggle="tab" href="#pro-4"><img
                                                    src="assets/img/product/quickview-s2.jpg" alt=""></a>
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
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut
                                            labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud
                                            exercitation ullamco</p>
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
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton"
                                                    value="2">
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