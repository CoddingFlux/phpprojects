<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>RKU Library Management System | Manage Reg Students</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                <h4 class="header-line">Manage Reg Students</h4>
    </div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Reg Students
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email id </th>
                                            <th>Reg Date</th>
                                            <th>Updation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT * from Studetail";
$query = mysqli_query($conn,$sql);

if(mysqli_num_rows($query) > 0)
{
while($results=mysqli_fetch_array($query))
{               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo $results['Id'];?></td>
                                            <td class="center"><?php echo $results['Stuid'];?></td>
                                            <td class="center"><?php echo $results['Fullname'];?></td>
                                            <td class="center"><?php echo $results['Monumber'];?></td>
                                            <td class="center"><?php echo $results['Emailid'];?></td>
                                             <td class="center"><?php echo $results['Regdate'];?></td>
                                             <td class="center"><?php echo $results['Updationdate'];?></td>
                                             <td class="center" ><a class="btn btn-primary" href="Update.php?sid=<?php echo $results['Stuid'];?> & fname=<?php echo $results['Fullname'];?> & mo=<?php echo $results['Monumber'];?> & em=<?php echo $results['Emailid'];?>">Update</a>
                                             <a class="btn btn-danger" href="Delete.php?id=<?php echo $results['Id'];?>">Delete</a>
                                             <a href="history.php?std=<?php echo $results['Stuid'];?>"><button class="btn btn-success"> Details</button> 
                                              </td>
                                        </tr>     
<?php } } ?>                                 
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>


            
    </div>
    </div>

     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
