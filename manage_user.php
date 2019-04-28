<?php
	include ('database.php');
	$type = $_GET["type"];
	
	if($type == "delete"){
		$id = $_GET["id"];
		$sql = "delete from user where id = ".$id;
		$result = mysqli_query($conn,$sql);
		if($result == ""){
			$result = 0;
		}
		echo "<script>window.location.href = 'admin.php?page=manage&delete=".$result."'</script>";
	}else{
		$id = $_POST["id1"];
		$email = $_POST['email1'];
		$username = $_POST['username1'];
		$country_code = $_POST['country_code1'];
		$phone_no = $_POST['phone_no1'];
		$new_password = $_POST['new_password1'];
		// SQL query to fetch information of registerd users and finds user match.
		if($new_password != ""){
			$sql = "UPDATE user SET username = '$username',email_address = '$email',country_code = '$country_code',phone_no = '$phone_no',password = '$new_password' WHERE id = ".$id;
		}else{
			$sql = "UPDATE user SET username = '$username',email_address = '$email',country_code = '$country_code',phone_no = '$phone_no' WHERE id = ".$id;
		}
		$result = mysqli_query($conn,$sql);
		
		header("Location: admin.php?change_user=".$result);	
	}

	
	
?>