<?php 
if(isset($_POST['change']))
{
    
    include "include/config.php";
  if($_POST['password'] == $_POST['newpassword'])
  {
    if(strlen($_POST['password']) >= 8)
    {
        session_start();
    $password=md5($_POST['password']);
    $uid=$_SESSION['AdminId'];
    $sql="update user_master set user_password='$password' where user_email='$uid' and user_roll='Admin'";
    $done=mysqli_execute_query($conn,$sql);
    if($done)
  {
    echo $uid;
    ?>
   <script>alert("Update Successfull.");document.location="logout.php"</script>
    <?php
  }
}
else
{
    ?>
    <script>alert("Password Must Be Min(8).");document.location="user_profile.php"</script>
    <?php
}
  }
  else
  {
    ?>
    <script>alert("Password Does Not Matched.");document.location="user_profile.php"</script>
    <?php
  }
}
?>