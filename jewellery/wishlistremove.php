<?php
session_start();
include "includes/Config.php";
$pid=$_GET['pid'];
$uid=$_GET['uid'];
unset($_SESSION["pwid$pid"]);
$remove="delete from user_wishlist where product_id='$pid' and  user_id='$uid'";
$remoexe=mysqli_execute_query($conn,$remove);
if($remoexe)
{
    {
        ?>
        <script>document.location="wishlist.php";</script>
        <?php
        }
}
?>