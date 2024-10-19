<?php 
if(isset($_POST['change']))
{
    include "includes/config.php";
  if($_POST['password1'] == $_POST['password2'])
  {
    if(strlen($_POST['password1']) >= 8)
    {
    $password=md5($_POST['password1']);
    $uuid=$_POST['uuid'];
    $sql="update user_master set user_password='$password' where unique_user_id='$uuid' and user_roll='User'";
    $done=mysqli_execute_query($conn,$sql);
    if($done)
  {
    ?>
    <script>alert("Update Successfull.");document.location="logout.php"</script>
    <?php
  }
}
else
{
    ?>
    <script>alert("Password Must Be Min(8).");document.location="my-account.php"</script>
    <?php
}
  }
  else
  {
    ?>
    <script>alert("Password Does Not Matched.");document.location="my-account.php"</script>
    <?php
  }
}
?>