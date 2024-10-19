<?php
include "includes/config.php";
$id=$_GET['del'];
$sql="DELETE from addbooks where Id=$id";
$query=mysqli_query($conn,$sql);
if($query)
{
    header("location:addbook.php");
}
else{
    mysqli_connect_error($query);
}

?>