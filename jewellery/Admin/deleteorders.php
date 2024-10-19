<?php
include "include/config.php";
if(isset($_GET['oid']))
{
    $oid=$_GET['oid'];
    $done=mysqli_execute_query($conn,"delete from user_orders where order_id='$oid'");
    if($done)
    {
        ?>
        <script>alert("Delete Successfull.");document.location="orders.php";</script>
        <?php
    }
    else{
        ?>
        <script>alert("Delete Failed.");document.location="orders.php";</script>
        <?php
    }
}
?>