<?php 
if(isset($_POST['update'])){
include "include/config.php";
$imgdelete=$_POST['img'];
$name=$_POST['name'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$p_img = $_FILES["imgname"]["name"];
$target_path = "images/";
$extension = substr($p_img, strlen($p_img) - 3, strlen($p_img));
$allowed_extensions = array(".jpg", ".jpeg", ".png", ".gif");
$imgnewname = $p_img;
if (in_array($extension, $allowed_extensions)) {
    echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
} else {
    move_uploaded_file($_FILES["imgname"]["tmp_name"], $target_path . $p_img);

   
$sql="update user_master set user_name='$name',user_img='$imgnewname',user_contact='$contact' where user_email='$email' and user_roll='Admin'";
$done=mysqli_execute_query($conn,$sql);
if($done)
{
    unlink("images/$imgdelete");
?>
<script>alert("Update Successfully.");document.location="user_profile.php"</script>
<?php
}
else{
    ?>
    <script>alert("Update Failed.");document.location="user_profile.php"</script>
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