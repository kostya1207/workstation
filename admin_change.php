<?php
	include("database.php");
	$id = $_POST['id'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$country_code = $_POST['country_code'];
	$phone_no = $_POST['phone_no'];
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	// SQL query to fetch information of registerd users and finds user match.
	if($new_password != ""){
		$sql = "UPDATE user SET username = '$username',country_code = '$country_code',phone_no = '$phone_no',password = '$new_password' WHERE id = ".$id;
	}else{
		$sql = "UPDATE user SET username = '$username',country_code = '$country_code',phone_no = '$phone_no' WHERE id = ".$id;
	}
	
	$result = mysqli_query($conn,$sql);
	
	header("Location: admin.php?change_setting=".$result); // Redirecting To Other Page	
?>
