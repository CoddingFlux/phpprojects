<?php
include "includes/config.php";
$bid=$_GET['id'];
$sql="DELETE FROM issuedbook WHERE Bookid=$bid";
$query=mysqli_query($conn,$sql);
if($query)
{
    header("location:manageissue.php");
}
else{
    mysqli_connect_error($query);
}
?>