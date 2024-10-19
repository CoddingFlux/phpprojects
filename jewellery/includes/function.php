<head>
    <style>
        .img1 {
            width: 100px;
            height: 125px;
        }
    </style>

</head>
<?php
function review($id, $conn)
{
    $select2 = "select avg(review_total) as rt from user_reviews where product_id='$id'";
    $done2 = mysqli_execute_query($conn, $select2);
    $result2 = mysqli_fetch_array($done2);
    $value = $result2['rt'];
    ?>

    <div class="product-rating">
        <div class="rate">
            <input type="checkbox" id="star5" name="rate" value="1" <?php if ($value >= 5) {
                echo 'checked="checked"';
            } else {
                echo '';
            } ?> />
            <label for="star5" title="text"></label>
            <input type="checkbox" id="star4" name="rate" value="2" <?php if ($value >= 4) {
                echo 'checked="checked"';
            } else {
                echo '';
            } ?> />
            <label for="star4" title="text"></label>
            <input type="checkbox" id="star3" name="rate" value="3" <?php if ($value >= 3) {
                echo 'checked="checked"';
            } else {
                echo '';
            } ?> />
            <label for="star3" title="text"></label>
            <input type="checkbox" id="star2" name="rate" value="4" <?php if ($value >= 2) {
                echo 'checked="checked"';
            } else {
                echo '';
            } ?> />
            <label for="" title="text"></label>
            <input type="checkbox" id="star1" name="rate" value="5" <?php if ($value >= 1) {
                echo 'checked="checked"';
            } else {
                echo '';
            } ?> />
            <label for="star1" title="text"></label>
        </div>
    </div>
    <?php
}

function modelreview($id, $conn)
{


    $select2 = "select avg(review_total) as rt from user_reviews where product_id='$id'";
    $done2 = mysqli_execute_query($conn, $select2);
    $result2 = mysqli_fetch_array($done2);
    $value = $result2['rt'];
    ?>

    <div class="product-rating">
        <div class="rate">
            <input type="checkbox" id="star5" name="rate" value="1" <?php if ($value >= 5) {
                echo 'checked="checked"';
            } else {
                echo '';
            } ?> />
            <label for="star5" title="text"></label>
            <input type="checkbox" id="star4" name="rate" value="2" <?php if ($value >= 4) {
                echo 'checked="checked"';
            } else {
                echo '';
            } ?> />
            <label for="star4" title="text"></label>
            <input type="checkbox" id="star3" name="rate" value="3" <?php if ($value >= 3) {
                echo 'checked="checked"';
            } else {
                echo '';
            } ?> />
            <label for="star3" title="text"></label>
            <input type="checkbox" id="star2" name="rate" value="4" <?php if ($value >= 2) {
                echo 'checked="checked"';
            } else {
                echo '';
            } ?> />
            <label for="" title="text"></label>
            <input type="checkbox" id="star1" name="rate" value="5" <?php if ($value >= 1) {
                echo 'checked="checked"';
            } else {
                echo '';
            } ?> />
            <label for="star1" title="text"></label>
        </div>
        <span>
            <?php echo $value . " Reviews" ?>
        </span>
    </div>
    <?php
}
function detail($id, $conn)
{

    $sql = "select * from product_master where product_id='$id'";
    $exedetail = mysqli_execute_query($conn, $sql);
    return $exedetail;
}

function shopfilter($type, $category, $price, $conn)
{
    preg_match_all('!\d+!', $price, $matches);
    foreach ($matches as $val) {
        $min = $val[0];
        $max = $val[1];
    }
    if ($type != "none" and $category != "none") {
        $sql = "select * from product_master where product_stock between 1 and 201 and product_type='$type' and product_category='$category' and product_price between '$min' and '$max' ";
    } else if ($type == "none" and $category != "none") {
        $sql = "select * from product_master where product_stock between 1 and 201 and product_category='$category' and product_price between '$min' and '$max' ";
    } else if ($type != "none" and $category == "none") {
        $sql = "select * from product_master where product_stock between 1 and 201 and product_type='$type' and product_price between '$min' and '$max' ";
    } else if ($type == "none" and $category == "none") {
        $sql = "select * from product_master where product_stock between 1 and 201 and product_price between '$min' and '$max' ";
    }

    $done = mysqli_execute_query($conn, $sql);
    while ($result = mysqli_fetch_array($done)) {
        echo '   
    <div class="col-xl-2 col-md-6 col-lg-6 col-sm-6">
    <div class="product-wrap mb-25 scroll-zoom">
        <div class="product-img">
            <a href="product-details.php?id=' . $result['product_id'] . '&cat=' . $result['product_category'] . '&type=' . $result['product_type'] . '">
                <img  style="border-radius:40px 40px 40px 40px;" class="default-img" src="assets/img/product/' . $result['product_img'] . '" alt="">
                <img class="hover-img" src="assets/img/product/' . $result['product_img'] . '" alt="">
            </a>
            <span class="pink">-10%</span>
            <div class="product-action">
            ';
        $cid = $result['product_id'];
        alreadyaddfromwishlist($conn, $_SESSION["pwid$cid"], $result['product_id']);
        alreadyaddfromcart($conn, $_SESSION["pcid$cid"], $result['product_id']);
        echo '
                <div class="pro-same-action pro-quickview">
                    <a title="Quick View" href="#" data-bs-toggle="modal" data-bs-target="#Modal1' . $result['product_id'] . '"><i class="pe-7s-look"></i></a>
                </div>
            </div>
        </div>
        <div class="product-content text-center">
            <h3><a href="product-details.php">' . $result['product_name'] . '</a></h3>
           ';
        review($result['product_id'], $conn);
        echo '
            <div class="product-price">
                <span>$' . $result['product_price'] . '</span>
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
        echo modelreview($result["product_id"], $conn);
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
        $cid = $result['product_id'];
        alreadyaddfromcartformodel($conn, $_SESSION["pcid$cid"], $result['product_id']);
        alreadyaddfromwishlistformodel($conn, $_SESSION["pwid$cid"], $result['product_id']);
        echo '
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

function shopfilter1($type, $category, $price, $conn)
{
    preg_match_all('!\d+!', $price, $matches);
    foreach ($matches as $val) {
        $min = $val[0];
        $max = $val[1];
    }
    if ($type != "none" and $category != "none") {
        $sql = "select * from product_master where product_stock between 1 and 201 and product_type='$type' and product_category='$category' and product_price between '$min' and '$max' ";
    } else if ($type == "none" and $category != "none") {
        $sql = "select * from product_master where product_stock between 1 and 201 and product_category='$category' and product_price between '$min' and '$max' ";
    } else if ($type != "none" and $category == "none") {
        $sql = "select * from product_master where  product_stock between 1 and 201 and product_type='$type' and product_price between '$min' and '$max' ";
    } else if ($type == "none" and $category == "none") {
        $sql = "select * from product_master where product_stock between 1 and 201 and product_price between '$min' and '$max' ";
    }

    $done = mysqli_execute_query($conn, $sql);
    while ($result = mysqli_fetch_array($done)) {
        echo '   
    <div class="col-xl-3 col-lg-9 col-md-5 col-sm-6">
    <div class="product-wrap">
        <div class="product-img">
            <a href="product-details.php?id=' . $result['product_id'] . '&cat=' . $result['product_category'] . '&type=' . $result['product_type'] . '">
                <img  style="border-radius:40px 40px 40px 40px;" class="default-img" src="assets/img/product/' . $result['product_img'] . '" alt="">
                <img class="hover-img" src="assets/img/product/' . $result['product_img'] . '" alt="">
            </a>
            <span class="purple">New</span>
        </div>
    </div>
</div>
<div class="col-xl-3 col-lg-9 col-md-4 col-sm-6">
    <div class="shop-list-content">
        <h3><a href="#">Products Name Here</a></h3>
        <div class="product-list-price">
            <span>$ ' . $result['product_price'] . '</span>
        </div>
      ';
        modelreview($result['product_id'], $conn);
        echo '
        <p>Lorem ipsum dolor sit amet, consecteto adipisic elit eiusm tempor incidid ut labore et dolore magna aliqua Ut enim ad minim </p>
        ';
        $cid = $result['product_id'];
        //alreadyaddfromwishlist($conn,$_SESSION["pwid$cid"],$result['product_id']);
        alreadyaddfromcart($conn, $_SESSION["pcid$cid"], $result['product_id']);
        echo '
    </div>
</div>

';
    }
}

function cart($conn, $uid)
{

    $sqlcart = "select product_master.*,user_cart.product_quantity from product_master inner join user_cart on product_master.product_id=user_cart.product_id where user_cart.user_id='$uid'";
    $executecart = mysqli_execute_query($conn, $sqlcart);
    while ($result1 = mysqli_fetch_array($executecart)) {
        $cid = $result1['product_id'];
        $_SESSION["pcid$cid"] = $cid;

        echo '
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="product-details.php?id=' . $result1['product_id'] . '&cat=' . $result1['product_category'] . '&type=' . $result1['product_type'] . '"><img class="img1" src="assets/img/product/' . $result1['product_img'] . '" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="#">' . $result1['product_name'] . '</a></td>
                                    <td class="product-price-cart"><span class="amount">INR' . $result1['product_price'] . '</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box"  type="text" name="qtybutton" value=' . $result1['product_quantity'] . '>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">INR' . $result1['product_price'] * $result1['product_quantity'] . '</td>
                                    <td class="product-remove">
                                        <!--<a href="#"><i class="fa fa-pencil"></i></a>-->
                                        <a href="cartremove.php?pid=' . $result1['product_id'].'&uid='.$_SESSION['userid'].'"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                 ';
    }
}

function addcart($uid, $conn, $qty, $pid, $ex)
{
    if (isset($pid)) {
        $filename = "includes/idgenerator/cartid.txt";
        $myfile = fopen($filename, "r");
        $in = fread($myfile, filesize($filename));
        $u_id = ++$in;

        $myfile1 = fopen($filename, "w");
        fwrite($myfile1, $u_id);
        fclose($myfile);
        fclose($myfile1);
        if ($ex == "one") {
            $sqlcart = "insert into user_cart(cart_id,product_id,user_id,product_quantity)values('$u_id','$pid','$uid','$qty')";
        } else {
            $sqlcart = "insert into user_cart(cart_id,product_id,user_id,product_quantity)values('$u_id','$pid','$uid',$qty)";
        }
        $executesql = mysqli_execute_query($conn, $sqlcart);
        if ($executesql) {
            ?>
            <script type="text/javascript">document.location = "cart-page.php";</script>

            <?php

        } else {
            ?>
            <script type="text/javascript">document.location = "cart-page.php";</script>
            <?php
        }
    }
}
function addcartoneitem($uid, $conn, $qty, $pid, $ex)
{
    if (isset($pid)) {
        $filename = "includes/idgenerator/cartid.txt";
        $myfile = fopen($filename, "r");
        $in = fread($myfile, filesize($filename));
        $u_id = ++$in;

        $myfile1 = fopen($filename, "w");
        fwrite($myfile1, $u_id);
        fclose($myfile);
        fclose($myfile1);
        if ($qty == "only") {
            $sqlcart = "insert into user_cart(cart_id,product_id,user_id,product_quantity)values('$u_id','$pid','$uid',1)";
        }
        $executesql = mysqli_execute_query($conn, $sqlcart);
        if ($executesql) {
            ?>
            <script type="text/javascript">document.location = "cart-page.php";</script>

            <?php

        } else {
            ?>
            <script type="text/javascript">document.location = "cart-page.php";</script>
            <?php
        }
    }
}

function wishlist($uid, $conn)
{
    $sqlcart = "select product_master.*,user_wishlist.product_quantity from product_master inner join user_wishlist on product_master.product_id=user_wishlist.product_id where user_wishlist.user_id='$uid'";
    $executecart = mysqli_execute_query($conn, $sqlcart);
    while ($result = mysqli_fetch_array($executecart)) {
        $cid = $result['product_id'];
        $_SESSION["pwid$cid"] = $cid;
        echo '
    <tr>
    <td class="product-thumbnail">
        <a href="product-details.php?id=' . $result['product_id'] . '&cat=' . $result['product_category'] . '&type=' . $result['product_type'] . '"><img class="img1" src="assets/img/product/' . $result['product_img'] . '" alt=""></a>
    </td>
    <td class="product-name"><a href="#">' . $result['product_name'] . '</a></td>
    <td class="product-price-cart"><span class="amount">INR' . $result['product_price'] . '</span></td>
    <td class="product-quantity">
        <div class="cart-plus-minus">
            <input class="cart-plus-minus-box" type="text" name="qtybutton" value=' . $result['product_quantity'] . '>
        </div>
    </td>
    <td class="product-subtotal">INR' . $result['product_price'] * $result['product_quantity'] . '</td>
    <td class="product-wishlist-cart">
        <a href="cart-page.php?pid=' . $result['product_id'] . '&quantity=' . $result['product_quantity'] . '">add to cart</a>
   </td>
   <td class="product-remove">
   <!--<a href="#"><i class="fa fa-pencil"></i></a>-->
   <a href="wishlistremove.php?pid=' . $result['product_id'].'&uid='.$_SESSION['userid'].'"><i class="fa fa-times"></i></a>
</td>
</tr>';
    }
}

function addwishlist($uid, $conn, $qty, $pid, $ex)
{
    if (isset($pid)) {
        $filename = "includes/idgenerator/wishlistid.txt";
        $myfile = fopen($filename, "r");
        $in = fread($myfile, filesize($filename));
        $u_id = ++$in;

        $myfile1 = fopen($filename, "w");
        fwrite($myfile1, $u_id);
        fclose($myfile);
        fclose($myfile1);

        if ($ex != "one") {
            $sqlwishlist = "insert into user_wishlist(wishlist_id,product_id,user_id,product_quantity)values('$u_id','$pid','$uid',1)";
        } else {
            $sqlwishlist = "insert into user_wishlist(wishlist_id,product_id,user_id,product_quantity)values('$u_id','$pid','$uid','$qty')";
        }
        $executesql = mysqli_execute_query($conn, $sqlwishlist);
        if ($executesql != "") {
            ?>
            <script type="text/javascript">document.location = "wishlist.php";</script>
            <?php
        } else {
            echo "hello";
        }


    }
}
function headcart($uid)
{
    include "includes/config.php";
    $sql = "select * from product_master where product_id In (select product_id from user_wishlist where user_id='$uid'";
    $done = mysqli_execute_query($conn, $sql);
    while ($result = mysqli_fetch_array($done)) {
        echo '
    <li class="single-shopping-cart">
                                        <div class="shopping-cart-img">
                                            <a href="#"><img alt="" src="assets/img/cart/cart-1.png"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="#">T- Shart & Jeans </a></h4>
                                            <h6>Qty: 02</h6>
                                            <span>$260.00</span>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fa fa-times-circle"></i></a>
                                        </div>
                                    </li>
    ';
    }
}

function carttotal($conn, $uid)
{

    $sql = "select sum(product_master.product_price*user_cart.product_quantity) as total_price from product_master inner join user_cart on product_master.product_id=user_cart.product_id where product_master.product_id In (select product_id from user_cart where user_id='$uid')";
    $done = mysqli_execute_query($conn, $sql);
    $result = mysqli_fetch_array($done);

    echo '
 <h5>Total products <span>INR' . $result['total_price'] . '</span></h5>
 <form method="get" action="checkout.php">
 <div class="total-shipping">
     <h5>Total shipping</h5>
     <ul>
         <li><input type="checkbox" name="charges"  value="20.00">Extra For Replacement<span>INR20.00</span></li>
         <!--<li><input type="radio" name="charges" value="0">no Replacement<span>INR30.00</span></li>-->
     </ul>
 </div>
 <h4 class="grand-totall-title">Grand Total <span>INR' . $result['total_price'] . '</span></h4>
 <input type="hidden" name="total" value=' . $result['total_price'] . '/>
 
 <button  class="btn btn-primary" type="submit" name="checkout" value="submit">Proceed to Checkout</button>
 </form>
 ';
}

function address($conn, $uid)
{
    $sqladd = "select * from user_address where user_id='$uid' limit 1";
    $doneadd = mysqli_execute_query($conn, $sqladd);

    $result = mysqli_fetch_array($doneadd);
    echo '<input type="hidden" value="' . $result['address_id'] . '" name="addid">';
    echo
        "Full Name:" . $result['user_name'] . "<br/>" .
        "Country : " . $result['user_country'] . "<br/>" .
        "State : " . $result['user_state'] . "<br/>" .
        "City : " . $result['user_city'] . "<br/>" .
        "Street : " . $result['user_street'] . "<br/>" .
        "Contact : " . $result['user_contact'] . "<br/>" .
        "Email Id : " . $result['user_id'];
}

function collection($conn, $type, $category)
{
    if ($category != "") {
        $sql = "select * from product_master where product_stock between 1 and 201 and product_type='$type' and product_category='$category'";
    } else if ($category == "") {
        $sql = "select * from product_master where product_stock between 1 and 201 and product_type='$type'";
    }
    if ($type == "ok" and $category == "ok") {
        $sql = "select * from product_master where product_stock between 1 and 201";
    }


    $done = mysqli_execute_query($conn, $sql);
    while ($result = mysqli_fetch_array($done)) {
        echo '   
    <div class="col-xl-2 col-md-6 col-lg-6 col-sm-6">
    <div class="product-wrap mb-25 scroll-zoom">
        <div class="product-img">
            <a href="product-details.php?id=' . $result['product_id'] . '&cat=' . $result['product_category'] . '&type=' . $result['product_type'] . '">
                <img  style="border-radius:40px 40px 40px 40px;" class="default-img" src="assets/img/product/' . $result['product_img'] . '" alt="">
                <img class="hover-img" src="assets/img/product/' . $result['product_img'] . '" alt="">
            </a>
            <span class="pink">-10%</span>
            <div class="product-action">
            ';
        $cid = $result['product_id'];
        alreadyaddfromwishlist($conn, $_SESSION["pwid$cid"], $result['product_id']);
        alreadyaddfromcart($conn, $_SESSION["pcid$cid"], $result['product_id']);
        echo '
                <div class="pro-same-action pro-quickview">
                    <a title="Quick View" href="#" data-bs-toggle="modal" data-bs-target="#Modal1' . $result['product_id'] . '"><i class="pe-7s-look"></i></a>
                </div>
            </div>
        </div>
        <div class="product-content text-center">
            <h3><a href="product-details.php">' . $result['product_name'] . '</a></h3>
           ';
        review($result['product_id'], $conn);
        echo '
            <div class="product-price">
                <span>INR' . $result['product_price'] . '</span>
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
        echo modelreview($result["product_id"], $conn);
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
        $cid = $result['product_id'];
        alreadyaddfromcartformodel($conn, $_SESSION["pcid$cid"], $result['product_id']);
        alreadyaddfromwishlistformodel($conn, $_SESSION["pwid$cid"], $result['product_id']);
        echo '
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

function alreadyaddfromcart($conn, $pcid, $pid)
{
    if ($pcid != $pid) {
        echo '
  <div class="pro-same-action pro-cart">
  <a title="Add To Cart" href="cart-page.php?pid=' . $pid . '&only"><i class="pe-7s-cart"></i></a>
</div>';
    } else {

        echo '
        <div class="pro-same-action pro-cart">
        <a title="Remove Cart" href="cart-page.php"><i class="fa fa-times"></i></a>
      </div>';
    }

}
function alreadyaddfromcartformodel($conn, $pcid, $pid)
{
    if ($pcid != $pid) {
        echo '
        <div class="pro-details-cart btn-hover">
        <a href="cart-page.php?pid=' . $pid . '&only">Add To Cart</a>
    </div>';
    } else {

        echo '
        <div class="pro-details-cart btn-hover">
        <a href="cart-page.php">Remove Cart</a>
    </div>';
    }

}
function alreadyaddfromwishlist($conn, $pwid, $pid)
{
    if ($pwid != $pid) {
        echo '
        <div class="pro-same-action pro-wishlist">
        <a title="Wishlist" href="wishlist.php?pid=' . $pid . '"><i class="pe-7s-like"></i></a>
       </div>';
    } else {

        echo '
        <div class="pro-same-action pro-wishlist">
        <a title="Remove Wishlist" href="wishlist.php"><i class="fa fa-times"></i></a>
       </div>';
    }

}
function alreadyaddfromwishlistformodel($conn, $pwid, $pid)
{
    if ($pwid != $pid) {
        echo '
        <div class="pro-details-wishlist">
        <a href="wishlist.php?pid=' . $pid . '"><i class="fa fa-heart-o"></i></a>
    </div>';
    } else {

        echo '
        <div class="pro-details-wishlist">
        <a href="wishlist.php"><i class="fa fa-times"></i></a>
        </div>';
    }

}

function totalcart($conn, $eid)
{

    $sql = "select product_master.product_id,product_master.product_name,product_master.product_price,user_cart.product_quantity from product_master inner join user_cart on product_master.product_id=user_cart.product_id where user_cart.user_id='$eid'";
    $done = mysqli_execute_query($conn, $sql);
    $pid = "pid00";
    $pqty = "pqid00";
    while ($result = mysqli_fetch_array($done)) {
        // echo'<input type="hidden" value="'.$result['product_id'].'" name="'.++$pid.'">
        // <input type="hidden" value="'.$result['product_quantity'].'" name="'.++$pqty.'">';
        echo '
    <li><span class="order-middle-left">' . $result['product_name'] . ' X  INR' . $result['product_price'] . '(' . $result['product_quantity'] . ')</span> <span
    class="order-price">INR' . $result['product_price'] * $result['product_quantity'] . '</span></li>
    ';
    }
}

function placeorder($conn, $uid)
{
    $filename = "includes/idgenerator/orderid.txt";
    $myfile = fopen($filename, "r");
    $in = fread($myfile, filesize($filename));
    $o_id = ++$in;

    $myfile1 = fopen($filename, "w");
    fwrite($myfile1, $o_id);
    fclose($myfile);
    fclose($myfile1);
    $pid = array();
    $pqty = array();
    $sql = "select product_master.product_id,user_cart.product_quantity from product_master inner join user_cart on product_master.product_id=user_cart.product_id where user_cart.user_id='$uid'";
    $done = mysqli_execute_query($conn, $sql);
    $pid1 = "";
    $pqty1 = "";
    $index = 0;

    while ($result = mysqli_fetch_array($done)) {
        $pid[$index] = $result['product_id'];
        $pqty[$index] = $result['product_quantity'];
        $pid1 = $pid1 . "," . $pid[$index];
        $pqty1 = $pqty1 . "," . $pqty[$index];
        ++$index;
    }
    echo "<h1>$pid1.''.$pqty1<h1>";
    $sellprice = $_POST['totalp'];
    $upaymethod = $_POST['paymethod'];
    $addid = $_POST['addid'];

    if (isset($_POST['charg'])) {
        $charg = $_POST['charg'];
        $insert = "insert into user_orders(order_id,user_id,product_id,product_selling_price,product_quantity,replacement_charges,user_payment_method,user_bill_address_id)values('$o_id','$uid','$pid1','$sellprice','$pqty1','$charg','$upaymethod','$addid')";
    } else {
        $insert = "insert into user_orders(order_id,user_id,product_id,product_selling_price,product_quantity,user_payment_method,user_bill_address_id)values('$o_id','$uid','$pid1','$sellprice','$pqty1','$upaymethod','$addid')";
    }
    $done = mysqli_execute_query($conn, $insert);
    if ($done) {
        ?>
        <script>confirm("Order Confirmed");
            document.location = "checkout.php"</script>
        <?php
    }
}


function myaccount($conn)
{
    $uid = $_SESSION['userid'];
    $sql = "select * from user_master where user_email='$uid' and user_status=1";
    $done = mysqli_execute_query($conn, $sql);
    $result = mysqli_fetch_array($done);
    echo '
    <div id="faq" class="panel-group">
    <div class="panel panel-default single-my-account">
        <div class="panel-heading my-account-title">
            <h3 class="panel-title"><span>1 .</span> <a data-bs-toggle="collapse" href="#my-account-1">Edit your account information </a></h3>
        </div>
        <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">
            <div class="panel-body">
                <div class="myaccount-info-wrapper">
                    <div class="account-info-wrapper">
                        <h4>My Account Information</h4>
                        <h5>Your Personal Details</h5>
                    </div>
                <form action="updatedetail.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="billing-info">
                               <img  class="img1" src="assets/img/profileimg/' . $result['user_img'] . '" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                        <div class="billing-info">
                                <label>Profile Img :</label>
                                <input type="hidden" name="imgname" value="'.$result['user_img'].'"/>
                                <input type="hidden" name="uuid" value="'.$result['unique_user_id'].'"/>
                                <input type="file" name="img"  required/>
                            </div>
                            <div class="billing-info">
                                <label>First Name :</label>
                                <input type="text" name="name" value="' . $result['user_name'] . '" required/>
                            </div>
                            <div class="billing-info">
                            <label>Email Id :</label>
                            <input type="email" name="email" value="' . $result['user_email'] . '"required />
                            <input type="hidden" name="oldemail" value="'.$result['user_email'].'"/>
                        </div>
                        <div class="billing-info">
                            <label>Contact No :</label>
                            <input type="text"  name="contact" value="' . $result['user_contact'] . '" required />
                        </div>
                        </div>
                    
                    </div>
                    <div class="billing-back-btn">
                        <div class="billing-back">
                            <a href="#"><i class="fa fa-arrow-up"></i> back</a>
                        </div>
                        ';
                        if($result != null)
                        {
                        echo '<div class="billing-btn">
                            <button type="submit" name="update">Update</button>
                        </div>';
                        }
                        else
                        {
                            echo '<div class="billing-btn">
                            <button type="submit" name="none">Active Your Account </button>
                        </div>';
                        }
                        echo '
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default single-my-account">
        <div class="panel-heading my-account-title">
            <h3 class="panel-title"><span>2 .</span> <a data-bs-toggle="collapse" href="#my-account-2">Change your password </a></h3>
        </div>
        <div id="my-account-2" class="panel-collapse collapse" data-bs-parent="#faq">
            <div class="panel-body">
                <div class="myaccount-info-wrapper">
                    <div class="account-info-wrapper">
                        <h4>Change Password</h4>
                        <h5>Your Password</h5>
                    </div>
                    <div class="row">
                    <form action="changepassword.php" method="post">
                        <div class="col-lg-12 col-md-12">
                            <div class="billing-info">
                                <label>Password</label>
                                <input type="password" name="password1" required />
                                <input type="hidden" name="uuid" value="'.$result['unique_user_id'].'"/>
                               
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="billing-info">
                                <label>Password Confirm</label>
                                <input type="password" name="password2" required />
                            </div>
                        </div>
                  
                    </div>
                    <div class="billing-back-btn">
                        <div class="billing-back">
                            <a href="#"><i class="fa fa-arrow-up"></i> back</a>
                        </div>
                        <div class="billing-btn">
                            <button type="submit" name="change">Update</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="panel panel-default single-my-account">
        <div class="panel-heading my-account-title">
            <h3 class="panel-title"><span>3 .</span> <a href="wishlist.php">Modify your wish list   </a></h3>
        </div>
    </div>
</div>
';
}
?>