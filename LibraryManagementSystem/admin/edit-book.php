<?php
include "includes/config.php";
$bookid=$_GET['bid'];
$sql1="SELECT * FROM addbooks where Bookid='$bookid'";
$query1=mysqli_query($conn,$sql1);
$results=mysqli_fetch_array($query1);

if(isset($_POST["change"]))
{
$id=$results['Id'];
$bname=$_POST['bookname'];
$aname=$_POST['authorname'];
$bprice=$_POST['bookprice'];
$bookimgs=basename($_FILES['bookimg']['name']);
$path=("bookimg/".$bookimgs);
if(move_uploaded_file($_FILES['bookimg']['tmp_name'],$path))
{
  echo"file upload";
}
else{
    echo"file not upload";
}

$sql="UPDATE addbooks set Bookname='$bname', Authorname='$aname', Bookprice='$bprice', Bookimg='$path' WHERE Id='$id'";
$query=mysqli_query($conn,$sql);
if($query)
{
    echo"upload";
}
else{
header("location:edit-book.php");
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
    <title>RKU Library Management System | Edit Book</title>
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
                <h4 class="header-line">Add Book</h4>
                
                           </di v>
                            <div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           Add Books Info
                        </div>
                     <div class="panel-body">
                     <form  method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label>Enter Bookid:</label>
                        <input class="form-control" disabled type="text" name="bookid" value="<?php  echo $results['Bookid'];?>"/>
                        </div>
                        
                        
                        <div class="form-group">
                        <label>Enter Bookname:</label>
                        <input class="form-control" type="text" name="bookname" value="<?php echo $results['Bookname'];?>"/>
                        </div>

                        <div class="form-group">
                        <label>Enter Authorname:</label>
                        <input class="form-control" type="text" name="authorname" value="<?php echo $results['Authorname'];?>"  />
                        </div>
                                                                
                        <div class="form-group">
                        <label>Enter Bookprice</label>
                        <input class="form-control" type="text" name="bookprice" value="<?php echo $results['Bookprice'];?>" />
                           <span id="user-availability-status" style="font-size:12px;"></span> 
                        </div>
                        
                        <div class="col-md-6">  
                         <div class="form-group">
                         <label>Book Picture<span style="color:red;">*</span></label>
                         <input class="form-control" type="file" name="bookimg"/>
                         </div>
                        </div>       
                        </div>
                    <div class="panel-body">
                    <button type="submit" name="change" class="btn btn-info">EDIT </button>
                     </div>                
                   </form>
                  
                </div> 
            </div>
        </div>
    </div>
    </div>

</div>
<div class="row">
<div class="col-md12 col-sm-12 col-xs-12">
<div class="panel panel-info">
<div class="panel-heading">
Book Info
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
