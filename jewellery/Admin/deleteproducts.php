<?php
include "include/config.php";
if(isset($_GET['pid']))
{
    $pid=$_GET['pid'];
    $done=mysqli_execute_query($conn,"delete from product_master where product_id='$pid'");
    if($done)
    {
        ?>
        <script>alert("Delete Successfull.");document.location="allproducts.php";</script>
        <?php
    }
    else{
        ?>
        <script>alert("Delete Failed.");document.location="allproducts.php";</script>
        <?php
    }
}
?>