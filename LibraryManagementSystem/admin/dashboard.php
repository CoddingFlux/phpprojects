<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{?>
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
    <title>RKU Library Management System | Admin Dash Board</title>
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
<?php include('includes/header.php');
$id=$_SESSION['stdid'];
echo"$id";?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
     <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">ADMIN DASHBOARD</h4>
            </div>
        </div>
      </div>

<div class="row" align="center">
  <a href="reg-students.php">
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-users fa-5x"></i>
                            <?php 
$sql1 ="SELECT id from studetail";
$query1 = mysqli_query($conn,$sql1);

$results1=mysqli_fetch_array($query1);
$regstds1=mysqli_num_rows($query1);
?>
                            <h3><?php echo $regstds1;?></h3>
                           Registered Users
                        </div>
                    </div></a>



     <a href="manage-books.php">
        <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="alert alert-success back-widget-set text-center">
               <i class="fa fa-book fa-5x"></i>
               <?php 
                $sql2 ="SELECT id from addbooks ";
                $query2 = mysqli_query($conn,$sql2);
                
                $results2=mysqli_fetch_array($query2);
                $listdbooks2=mysqli_num_rows($query2)
                ?>
                <h3><?php echo htmlentities($listdbooks2);?></h3>
                Books Listed
            </div>
          </div></a>
</div>
                    
     <!-- CONTENT-WRAPPER SECTION END-->
<?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
