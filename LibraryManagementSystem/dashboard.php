<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
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
    <title>Online Library Management System | User Dash Board</title>
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
<?php include('includes/header.php')?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
          
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">User DASHBOARD</h4>
                
                            </div>

        </div>
<div class="row">
               
               <a href="listed-books.php">
               <div class="col-md-4 col-sm-4 col-xs-6">
                <div class="alert alert-success back-widget-set text-center">
                <i class="fa fa-book fa-5x"></i>
               <?php 
               $sql ="SELECT * from addbooks ";
               $query=mysqli_query($conn,$sql);
               $results=mysqli_fetch_array($query);
               $listdbooks=mysqli_num_rows($query);
               ?>
               <h3><?php echo $listdbooks;?></h3>
               Books Listed
               </div>
              </div>
            </a>
             
  <div class="col-md-4 col-sm-4 col-xs-6">
    <div class="alert alert-warning back-widget-set text-center">
          <i class="fa fa-recycle fa-5x"></i>
          <?php 
          $rsts=0;
           $sid=$_SESSION['std'];
          $sql2 ="SELECT Id from issuedbook where Studentid='$sid'";
          $query2 =mysqli_query($conn,$sql2);
          
          $results2=mysqli_fetch_array($query2);
          $returnedbooks=mysqli_num_rows($query2);
          ?>
          
           <h3><?php echo $returnedbooks;?></h3>
          Books Not Returned Yet
    </div>
  </div>
  <div class="row">
          <a href="issue.php">
          <div class="col-md-4 col-sm-4 col-xs-6">
           <div class="alert alert-success back-widget-set text-center">
           <i class="fa fa-book fa-5x"></i>
                <h3>&nbsp;</h3>
          Issued Books
          </div></div></a>
  </div>   
</div>
     <!-- CONTENT-WRAPPER SECTION END-->
<?php include "includes/footer.php";?>
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
