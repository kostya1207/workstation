<?php 
	session_start();
	unset($_SESSION["login_user_id"]);
	unset($_SESSION["login_user"]);
	unset($_SESSION["login_email"]);
	unset($_SESSION["login_phone_no"]);
	unset($_SESSION["login_area"]);
	unset($_SESSION["login_phone"]);
	unset($_SESSION["login_password"]);
	session_destroy();
	header('Location: login.php');
?>