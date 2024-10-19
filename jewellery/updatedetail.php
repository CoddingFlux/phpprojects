<?php 
if(isset($_POST['update'])){
include "includes/config.php";
$imgdelete=$_POST['imgname'];
$uuid=$_POST['uuid'];
$name=$_POST['name'];
$email=$_POST['email'];
$oldemail=$_POST['oldemail'];
$contact=$_POST['contact'];
$p_img = $_FILES["img"]["name"];
$target_path = "assets/img/profileimg/";
$extension = substr($p_img, strlen($p_img) - 3, strlen($p_img));
$allowed_extensions = array(".jpg", ".jpeg", ".png", ".gif");
$imgnewname = $p_img;
if (in_array($extension, $allowed_extensions)) {
    echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
} else {
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_path . $p_img);
    mysqli_execute_query($conn,"update user_orders set user_id='$email' where user_id='$oldemail'");
    mysqli_execute_query($conn,"update user_address set user_id='$email' where user_id='$oldemail'");
    mysqli_execute_query($conn,"update user_cart set user_id='$email' where user_id='$oldemail'");
    mysqli_execute_query($conn,"update user_wishlist set user_id='$email' where user_id='$oldemail'");
    mysqli_execute_query($conn,"update user_reviews set user_id='$email' where user_id='$oldemail'");
   
$sql="update user_master set user_name='$name',user_img='$imgnewname',user_contact='$contact',user_email='$email' where unique_user_id='$uuid' and user_roll='User'";
$done=mysqli_execute_query($conn,$sql);
if($done)
{
    unlink("assets/img/profileimg/$imgdelete");
?>
<script>alert("Update Successfully.");document.location="logout.php"</script>
<?php
}
else{
    ?>
    <script>alert("Update Failed.");document.location="my-account.php"</script>
    <?php
}
}
}
else
{
    ?>
    <script>alert("Contact to Admin & Active Yout Account");document.location="my-account.php"</script>
    <?php   
}
?>