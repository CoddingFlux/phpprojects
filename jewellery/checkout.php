<?php
include "includes/header.php";
include "includes/config.php";
include "includes/function.php";
//error_reporting(0);
if ($_SESSION['userid'] == "") {
    ?>
    <script type="text/javascript">
        alert("Login Crediential Required");
        document.location = "login-register.php";
    </script>
    <?php
}

if(isset($_POST['check']))
{
    $filename = "includes/idgenerator/addressid.txt";
    $myfile = fopen($filename, "r");
    $in = fread($myfile, filesize($filename));
    $a_id = ++$in;

    $myfile1 = fopen($filename, "w");
    fwrite($myfile1, $a_id);
    fclose($myfile);
    fclose($myfile1);
$name=$_POST['name'];
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$street=$_POST['street'];
$contact=$_POST['contact'];
$email=$_SESSION['userid'];

$sql1="insert into user_address(address_id,user_name,user_country,user_state,user_city,user_street,user_contact,user_id)values('$a_id','$name','$country','$state','$city','$street','$contact','$email')";
$inadd=mysqli_query($conn,$sql1);
if ($inadd) {
    ?>
    <script>
        confirm("Billing Address Save Successfully ");
        document.location="checkout.php";
    </script>
    <?php
} else {
    ?>
    <script>
        alert("Billing Address Does Not Save,try again?");
    </script>
    <?php

}
}
if(isset($_POST['order']))
{
placeorder($conn,$_SESSION['userid']);
}
?>
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">Checkout </li>
            </ul>
        </div>
    </div>
</div>
<div class="checkout-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="billing-info-wrap">
                    <h3>Billing Details</h3>
                    <form method="post">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Buyer Name</label>

                                    <input type="text" name="name" placeholder="Buyer name" autocomplete="off"
                                        required>

                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="billing-select mb-20">
                                    <label>Country</label>
                                    <select name="country">
                                        <option>Select a country</option>
                                        <option>India</option>
                                        <option>America</option>
                                        <option>Japan</option>
                                        <option>Rasia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>State / County</label>
                                    <input type="text" name="state" placeholder="State / County" autocomplete="off"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Town / City</label>
                                    <input type="text" name="city" placeholder="Town / City" autocomplete="off"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Street Address</label>
                                    <input class="billing-address"  type="text" name="street" placeholder="House number and street name Apartment, suite, unit etc." autocomplete="off" required >
                                </div>
                            </div>



                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Contact No</label>
                                    <input type="text"   name="contact" placeholder="Contact No" autocomplete="off"
                                        required>
                                </div>
                            </div>
                            
                        </div>
                        <div>
                            <button style="width:100%;" type="submit" class="btn btn-primary"  name="check" value="submit">Add Billing Address</button>
                        </div>
                        <!-- <div class="checkout-account mb-50">
                        <input class="checkout-toggle2" type="checkbox">
                        <span>Create an account?</span>
                    </div>
                    <div class="checkout-account-toggle open-toggle2 mb-30">
                        <input placeholder="Email address" type="email">
                        <input placeholder="Password" type="password">
                        <button class="btn-hover checkout-btn" type="submit">register</button>
                    </div>
                    <div class="additional-info-wrap">
                        <h4>Additional information</h4>
                        <div class="additional-info">
                            <label>Order notes</label>
                            <textarea placeholder="Notes about your order, e.g. special notes for delivery. " name="message"></textarea>
                        </div>
                    </div>
                    <div class="checkout-account mt-25">
                        <input class="checkout-toggle" type="checkbox">
                        <span>Ship to a different address?</span>
                    </div>
                    <div class="different-address open-toggle mt-30">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>Enter Your Name</label>
                                    <input type="text">
                                </div>
                            </div>
                           
                            <div class="col-lg-12">
                                <div class="billing-select mb-20">
                                    <label>Country</label>
                                    <select>
                                        <option>Select a country</option>
                                        <option>Azerbaijan</option>
                                        <option>Bahamas</option>
                                        <option>Bahrain</option>
                                        <option>Bangladesh</option>
                                        <option>Barbados</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>State / County</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Town / City</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Street Address</label>
                                    <input class="billing-address" placeholder="House number and street name" type="text">
                                    <input placeholder="Apartment, suite, unit etc." type="text">
                                </div>
                            </div>
                           
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>Contact No</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>Email Address</label>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                </form>
            </div>
            <div class="col-lg-5">
                <div class="your-order-area">
                    <h3>Your order</h3>
                    <div class="your-order-wrap gray-bg-4">
                        <div class="your-order-product-info">
                            <div class="your-order-top">
                                <ul>
                                    <li>Product</li>
                                    <li>Total</li>
                                </ul>
                            </div>
                            <form method="post">
                            <div class="your-order-middle">
                                <ul>
                                    <?php
                                totalcart($conn,$_SESSION['userid'])
                                
                                ?>
                                <input type="hidden" value="<?php echo $_GET['charges']?>" name="charg">
                                </ul>
                            </div>
                            <div class="your-order-bottom">
                                <ul>
                                    <li class="your-order-shipping">Shipping</li>
                                    <li>Free shipping</li>
                                </ul>
                            </div>
                            <div class="your-order-total">
                                <ul>
                                    <li class="order-total">Total</li>
                                    <li>INR
                                    <?php 
                                    if(isset($_GET['total']))
                                    {echo $_GET['total'];}
                                    else
                                    {?>
                                    <script>document.location="cart-page.php";</script>
                                    <?php }?></li>
                                    <input type="hidden" value=<?php echo $_GET['total'];?> name="totalp"/>
                                </ul>
                            </div>
                            <h3>Your Billing Address</h3>
                            <div class="your-order-total"><?php address($conn,$_SESSION['userid']);?></div>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion element-mrg">
                                <div class="panel-group" id="accordion">
                                   <select name="paymethod">
                                 <option>UPI</option>
                                 <option>PAYTM</option>
                                 <option>CASH ON DELIVERY</option>
                                   </select>
                                    <!-- <div class="panel payment-accordion">
                                        <div class="panel-heading" id="method-one">
                                            <h4 class="panel-title">
                                                <a data-bs-toggle="collapse" href="#method1">
                                                    Direct bank transfer
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="method1" class="panel-collapse collapse show"
                                            data-bs-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store
                                                    State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel payment-accordion">
                                        <div class="panel-heading" id="method-two">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-bs-toggle="collapse" href="#method2">
                                                    Check payments
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="method2" class="panel-collapse collapse" data-bs-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store
                                                    State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel payment-accordion">
                                        <div class="panel-heading" id="method-three">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-bs-toggle="collapse" href="#method3">
                                                    Cash on delivery
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="method3" class="panel-collapse collapse" data-bs-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store
                                                    State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Place-order mt-25">
                        <!-- <a class="btn-hover" href="#">Place Order</a> -->
                        <div>
                            <button style="width:100%;" type="submit" class="btn btn-primary"  name="order" value="submit">Place Order</button>
                        </div>

                    </div>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "includes/footer.php";
?>