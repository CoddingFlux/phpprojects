<?php
$conn=mysqli_connect("127.0.0.1","root","","lms");
if(!$conn)
{
    echo"not connected";
}
else
{
    echo"connected successfully";
}
?>