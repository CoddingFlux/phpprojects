<?php 
require_once("includes/config.php");
// code user email availablity
if(!empty($_POST["emailid"])) {
	$email= $_POST["emailid"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "error : You did not enter a valid email.";
	}
	else {
		$sql ="SELECT user_email FROM user_master WHERE user_email='$email'";

/*$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
*/
$query = mysqli_query($conn,$sql);
$results=mysqli_fetch_all($query,MYSQLI_ASSOC);
$cnt=1;
$row = mysqli_num_rows($query);
if($row > 0)
{
// echo "<span style='color:red'> Email already exists .</span>";
//  echo "<script>$('#submit').prop('disabled',true);</script>";
echo "<script>alert('Email already exists.');</script>";
} else{
	
	echo "<span style='color:green'> Email available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}


?>
