<?php
 include "include/config.php";

 
 $uid=$_GET['uid'];

 if(isset($_GET['ustatus']))
 {
 $updateuserstatus="update user_master set user_status=1 where unique_user_id='$uid'";
 }
 else
 {
    $updateuserstatus="update user_master set user_status=0 where unique_user_id='$uid'";
 }

 $updatedone=mysqli_execute_query($conn,$updateuserstatus);
 if(isset($_GET['ch']))
 {?>
   <script>document.location="user_list.php";</script>
   <?php
   }
  else{
 ?>
 <script>document.location="orders.php";</script>
 <?php
  }
?>