
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>RKU Library Management System | Manage Books</title>
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
<?php include "includes/config.php";?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Books</h4>
    </div>
  


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Books Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Book Id</th>
                                            <th>Book Name</th>
                                            <th>Author Name</th>
                                            <th>Book Price</th>
                                            <th>Book Img</th>
                                            <th>Is Issued</th>
                                            <th>Reg Date</th>
                                            <th>Updation Date</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT * FROM addbooks";
$query = mysqli_query($conn,$sql);


if(mysqli_num_rows($query) > 0)
{
while($results=mysqli_fetch_array($query))
{               ?>                                      
                                        <tr class="odd gradeX">
                                           <td class="center"><?php echo $results['Id'];?></td>
                                            <td class="center"><?php echo $results['Bookid'];?></td>
                                          <td class="center"><?php echo $results['Bookname'];?></td>
                                            <td class="center"><?php echo $results['Authorname'];?></td>
                                            <td class="center"><?php echo $results['Bookprice'];?></td>
                                            <td class="center" width="300">
                                          <img src="<?php echo ($results['Bookimg']);?>" width="100px"></td>
                                            <td class="center"><?php echo $results['Isisued'];?></td>
                                            <td class="center"><?php echo $results['Regdate'];?></td>
                                            <td class="center"><?php echo $results['Updationdate'];?></td>
                                            <td class="center">
                                            <a href="edit-book.php? id=<?php echo $results['Id'];?> & bid=<?php echo $results['Bookid'];?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a></td>
                                         <td class="center"> <a href="delete-book.php?del=<?php echo $results['Id'];?>" >  <button class="btn btn-danger" onclick='return confirm("Are you sure you want to delete?");'><i class="fa fa-pencil"></i> Delete</button></a>
                                            </td>
                                        </tr>
 <?php }} ?>                              
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
<?php  ?>
