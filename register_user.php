<?php
	include ('database.php');
	$username = $_POST["username"];		
	$email_address = $_POST["email"];
	$password = $_POST["password"];
	$country_code = $_POST["country_code"];
	$phone_no = $_POST["phone_no"];

	$query = "select * from user where email_address = '$email_address'";
	$result = mysqli_query($conn,$query);
	$rows_num = mysqli_num_rows($result);
	if($rows_num == 0){
		$sql = "INSERT INTO user (username,email_address,password,country_code,phone_no) VALUES ('$username','$email_address','$password','$country_code','$phone_no')";
		$result = mysqli_query($conn,$sql);
		if($result == "")
		{
			$result = 0;
		}
		header('Location: login.php?user_register='.$result);
	}else{
		header('Location: login.php?user_repeat=0');
	}
	
?>