<?php
if(isset($_POST['submit']))
{
    include "include/config.php";
$value=$_POST['con'];
$orid=$_POST['orid'];
$sql1="update user_orders set order_confirm_status='$value' where order_id='$orid'";
$done=mysqli_execute_query($conn,$sql1);
if($done)
{
    ?>
    <script>document.location="orders.php";</script>
    <?php
}
else{
    ?>
    <script>
    alert("Value Not Updated");
    document.location="orders.php";</script>
    <?php
}
}
?>