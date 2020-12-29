<?php
ob_start();
session_start(); 
include "../admin/functions.php";
include 'dB.php';


if (isset($_POST['user_login'])) {
	$user_username = mysqli_real_escape_string($conn, $_POST['username']);
	$user_password = mysqli_real_escape_string($conn, $_POST['user_password']);
	if(isset($user_username) && isset($user_password)){
		if(userLogin($user_username, $user_password)){
			header('Location: ../admin');
		}else{
			header('Location: ../index.php');
		}
	}
	

}

?>