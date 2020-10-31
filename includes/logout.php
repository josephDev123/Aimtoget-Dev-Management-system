

<?php


session_start(); 

	$_SESSION['username'] = null;
	$_SESSION['users_password'] = null;
	$_SESSION['users_firstname'] = null;
	$_SESSION['users_lastname'] = null;
	$_SESSION['users_role'] = null;
	header('Location: ../index.php');


?>