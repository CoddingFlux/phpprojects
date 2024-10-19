<?php
include "includes/config.php";
$id=$_GET['id'];
$sql="DELETE from Studetail where Id='$id'";
$query=mysqli_query($conn,$sql);
if($query)
{
    header("location:reg-students.php");
}
else
{
    die("Error Is :<br/>");
    mysqli_connect_error($query);
}
?>