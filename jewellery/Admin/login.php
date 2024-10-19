<?php
include "include/config.php";
session_start();
if (isset($_POST['goto'])) {
    $u_name = $_POST['Username'];
   
    $u_pass = md5($_POST['Password']);
    $l_sql = "select user_roll from user_master where user_email='$u_name' and user_password='$u_pass'";
    $l_execute=mysqli_execute_query($conn,$l_sql);
   
    $l_array=mysqli_fetch_array($l_execute);
    if($l_array != "")
    {
    foreach($l_array as $l_value)
    {
        
        if ($l_value == "Admin") {
            $_SESSION['AdminId']=$u_name;
            ?>
            <script type="text/javascript">document.location = ('index.php');</script>
            <?php
        }
    }
}
else
{
    ?>
    <script type="text/javascript">alert("Enter Right Privileges");</script>
    <?php
}
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.designstream.co.in/horizon/php/default/light-blue/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Aug 2023 04:33:20 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Horizon-Admin - Admin</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/waves.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="css/nanoscroller.css">
    <!--        <link rel="stylesheet" href="css/nanoscroller.css">-->
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="account">
    <div class="container">
        <div class="row">
            <div class="account-col text-center">
                <h1>Golden-Admin</h1>
                <h3>Login As Admin</h3>
                <form class="m-t" role="form" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block " name="goto">Login</button>
                     <a href="#"><small>Forgot password?</small></a>
                   <!-- <p class=" text-center"><small>Do not have an account?</small></p>
                    <a class="btn  btn-default btn-block" href="register.php">Create an account</a> -->
                    <p>Admin &copy; 2023</p>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/pace.min.js"></script>
</body>

<!-- Mirrored from html.designstream.co.in/horizon/php/default/light-blue/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Aug 2023 04:33:20 GMT -->

</html>