<?php
	include("database.php");
	$email = $_POST['email'];
	$password = $_POST['password'];
	// SQL query to fetch information of registerd users and finds user match.
	$query = "select * from user where password = '$password' AND email_address = '$email'";
	$result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);
	$resultant = mysqli_fetch_assoc($result);
	if ($rows > 0) {
		session_start();
		$_SESSION["login_user_id"] = $resultant["id"];	
		$_SESSION["login_user"] = $resultant["username"];
		$_SESSION["login_email"] = $resultant["email_address"];
		$_SESSION["login_area"] = $resultant["country_code"];
		$_SESSION["login_phone"] = $resultant["phone_no"];
		$_SESSION["login_password"] = $resultant["password"];
		$_SESSION["login_phone_no"] = $resultant["country_code"].$resultant["phone_no"]; // Initializing Session
		if($email == "admin@manager.com"){
			header("Location: admin.php"); // Redirecting To Other Page
		}else{
			header("Location: first_call.php?page=input"); // Redirecting To Other Page
		}
		
	}else{
		session_start();
		$_SESSION["login_user_id"] = 1;	
		$_SESSION["login_user"] = 1;
		$_SESSION["login_email"] = $email;
		$_SESSION["login_area"] = 1;
		$_SESSION["login_phone"] = 1;
		$_SESSION["login_password"] = $password;
		$_SESSION["login_phone_no"] = 1;
		header("Location: first_call.php?page=input");
		//header("Location: login.php?login_error=1"); // Redirecting To Other Page	
	}
?>

