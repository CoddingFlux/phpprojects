<?php
include "includes/Config.php";
session_start();
$pid=$_GET['pid'];
$uid=$_GET['uid'];
unset($_SESSION["pcid$pid"]);
$remove="delete from user_cart where product_id='$pid' and user_id='$uid'";
$remoexe=mysqli_execute_query($conn,$remove);
if($remoexe)
{ 
        ?>
        <script>document.location="cart-page.php";</script>
        <?php
}
?>