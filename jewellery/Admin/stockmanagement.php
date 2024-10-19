<?php
if(isset($_GET['pid']))
{
  include "include/config.php";
  $pid=$_GET['pid'];
  if(isset($_GET['in']))
  {
  $upstock="update product_master set product_stock=0 where product_id='$pid'";
  }
  else
  {
    $upstock="update product_master set product_stock=1 where product_id='$pid'";
  }
  $upstockdone=mysqli_execute_query($conn,$upstock);
  if($upstockdone)
  {
    ?>
    <script>alert("Update Successfully");document.location="allproducts.php";</script>
    <?php
  }
}
?>