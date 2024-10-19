<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>RKU Library Management System | Students Updation</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />  

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">User Update</h4>
                
                            </div>

        </div>
             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           UPDATION FORM
                        </div>
                        <div class="panel-body">
                            <form name="signup" method="get">
          
<div class="form-group">
<label>Student Id</label>
<input class="form-control" type="text" name="s_id" value="<?php error_reporting(0); echo $_GET['sid'];?>" />
</div>

<div class="form-group">
<label>Enter Full Name</label>
<input class="form-control" type="text" name="fullname" value="<?php error_reporting(0); echo $_GET['fname'];?>" />
</div>


<div class="form-group">
<label>Mobile Number :</label>
<input class="form-control" type="text" name="mobileno" value="<?php error_reporting(0); echo $_GET['mo'];?>" />
</div>
                                        
<div class="form-group">
<label>Enter Email</label>
<input class="form-control" type="email" name="email" value="<?php error_reporting(0); echo $_GET['em'];?>"  />
   <span id="user-availability-status" style="font-size:12px;"></span> 
</div>
                             
<button type="submit" name="update" class="btn btn-danger" >Update Now </button>

                                    </form>
                            </div>
                        </div>
                            </div>
        </div>
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>

<?php
include "includes/config.php";
if(isset($_GET["update"]))
{
$sid=$_GET['s_id'];
$fname=$_GET['fullname'];
$mo=$_GET['mobileno'];
$em=$_GET['email'];

$sql="UPDATE Studetail set Fullname='$fname', Monumber='$mo' , Emailid='$em' WHERE Stuid='$sid'";

$query=mysqli_query($conn,$sql);
header('location:dashboard.php');



}
?>
