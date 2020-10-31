<?php

include 'dB.php';

 session_start(); 

if (isset($_POST['user_login'])) {
	$user_username = mysqli_real_escape_string($conn, $_POST['username']);
	$user_password = mysqli_real_escape_string($conn, $_POST['user_password']);
	

$sql = "SELECT * FROM users_table WHERE users_username = '$user_username' && users_password = '$user_password'";
$select_users_table_query = mysqli_query($conn, $sql);
$num_of_rows = mysqli_num_rows($select_users_table_query);
if ($num_of_rows > 0) {
	while($row = mysqli_fetch_assoc($select_users_table_query)){
		$db_users_username = $row['users_username'];
		$db_users_password = $row['users_password'];
		$db_users_firstname = $row['users_firstname'];
		$db_users_lastname = $row['users_lastname'];
		$db_users_role = $row['users_role'];


			if ($user_username == $db_users_username && $user_password == $db_users_password) {
		// if ($user_username === $db_users_username && password_verify($user_password, $db_users_password)) {
		
			$_SESSION['username'] = $user_username;
			$_SESSION['users_password'] = $user_password;
			$_SESSION['users_firstname'] = $db_users_firstname;
			$_SESSION['users_lastname'] = $db_users_lastname;
			$_SESSION['users_role'] = $db_users_role;
			
	
			header('Location: ../admin');
	
		}else{
			header('Location: ../index.php');
		}
	}	

	
}
	


	

}

?>