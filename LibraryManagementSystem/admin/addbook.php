<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else
{
    if(isset($_POST['add']))
    {
    $bid=$_POST['bookid'];
    $bname=$_POST['bookname'];
    $aname=$_POST['authorname'];
    $bprice=$_POST['bookprice'];
    $bookimgs=basename($_FILES["bookimg"]["name"]);
    $path1=("bookimg/".$bookimgs);
    $path="C:/xampp/htdocs/my workstation/my own lms/admin/bookimg/";
    $path=$path.basename($_FILES["bookimg"]["name"]);
    if(move_uploaded_file($_FILES['bookimg']['tmp_name'],$path))
    {
      echo"file upload";
    }
    else{
        echo"file not upload";
    }
    
    $sql="INSERT INTO  addbooks(Bookid,Bookname,Authorname,Bookprice,Bookimg) VALUES('$bid','$bname','$aname','$bprice','$path1')";
    $query = mysqli_query($conn,$sql);
    $lastInsertId = mysqli_insert_id($conn);
       if($lastInsertId)
        {
        echo "<script>alert('Book Listed successfully');</script>";
        echo "<script>window.location.href='manage-books.php'</script>";
        }
        else 
        {
        echo "<script>alert('Something went wrong. Please try again');</script>";    
        echo "<script>window.location.href='manage-books.php'</script>";
        }
    }
}
?>
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
    <title>RKU Library Management System | Student Signup</title>
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
                <h4 class="header-line">Add books</h4>
           </div>
        </div>
             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           Add Books Info
                        </div>
                     <div class="panel-body">
                     <form  method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label>Enter Bookid:</label>
                        <input class="form-control" type="text" name="bookid" autocomplete="off" required />
                        </div>
                        
                        
                        <div class="form-group">
                        <label>Enter Bookname:</label>
                        <input class="form-control" type="text" name="bookname" autocomplete="off" required />
                        </div>

                        <div class="form-group">
                        <label>Enter Authorname:</label>
                        <input class="form-control" type="text" name="authorname" autocomplete="off" required />
                        </div>
                                                                
                        <div class="form-group">
                        <label>Enter Bookprice</label>
                        <input class="form-control" type="number" name="bookprice"   autocomplete="off" required  />
                           <span id="user-availability-status" style="font-size:12px;"></span> 
                        </div>
                        
                        <div class="col-md-6">  
                         <div class="form-group">
                         <label>Book Picture<span style="color:red;">*</span></label>
                         <input class="form-control" type="file" name="bookimg" autocomplete="off"   required="required" />
                         </div>
                        </div>       
                        </div>
                    <div class="panel-body">
                    <button type="submit" name="add" class="btn btn-info">Add Books </button>
                    <button type="reset"  class="btn btn-danger">Reset Info</button>
                     </div>                
                   </form>
                  
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
