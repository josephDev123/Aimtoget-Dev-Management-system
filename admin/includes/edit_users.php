


<!-------updating the users---->

<?php
	if (isset($_POST['update_users'])) {
		$users_id = $_GET['edit'];


		$users_firstname= $_POST['users_firstname'];
		$users_lastname = $_POST['users_lastname'];
		$users_username = $_POST['users_username'];

		/*$post_image = $_FILES['post_image']['name'];
		$image_tmp = $_FILES['post_image']['tmp_name'];*/


		$users_role = $_POST['users_role'];
		$users_password = $_POST['users_password'];
		$users_email = $_POST['users_email'];
		$users_rand = $_POST['users_rand'];
		$users_image = $_POST['users_image'];


		$sql = "UPDATE users_table SET users_firstname ='$users_firstname', users_lastname ='$users_lastname', users_username = '$users_username', users_role ='$users_role', users_password = '$users_password', users_email ='$users_email', users_rand = '$users_rand', users_image = '$users_image' WHERE users_id = $users_id  ";

		$update_users_sql = mysqli_query($conn, $sql);

		if ($update_users_sql) {
			echo "<div class='alert alert-success' Role='alert'>".'Update successful. <a href="users.php">View all users</a>'."</div>";
		}else{
			echo "<div class='alert alert-success' Role='alert'>".'Update failed. <a href="users.php">View all users</a>'."</div>";
		}
	}

?>


<?php

//editting the users

if (isset($_GET['edit'])) {
	$users_id = $_GET['edit'];

	$sql = "SELECT * FROM users_table WHERE users_id = $users_id ";
	$select_users_query = mysqli_query($conn, $sql);
	$num_of_data = mysqli_num_rows($select_users_query);

	if ($num_of_data > 0) {
		while($row = mysqli_fetch_assoc($select_users_query)){

			$users_firstname = $row['users_firstname'];
			$users_lastname = $row['users_lastname'];
			$users_username = $row['users_username'];
			$users_role = $row['users_role'];
			$users_password = $row['users_password'];
			$users_email = $row['users_email'];
			$users_rand = $row['users_rand'];
			$users_image = $row['users_image'];
			
		}
	}
}
?>

<form method="post" class="" enctype="multipart/form-data">
	<div class="form-group">
		<label for="users_firstname">Users firstname</label>
		<input type="text" class="form-control" name="users_firstname"  value="<?php echo $users_firstname; ?>">
	</div>

	<div class="form-group">
		<label for="users_lastname">Users Lastname</label>
		<input type="text" class="form-control" name="users_lastname" value="<?php echo $users_lastname; ?>">
	</div>

	<div class="form-group">
		<label for="users_username">Users Username</label>
		<input type="text" class="form-control" name="users_username" value="<?php echo $users_username; ?>">
	</div>

	<div class="form-group">
    <label for="users_role">Users Role</label>
	    <select class="form-control" name="users_role">

	    	<?php
    		$Sql ="SELECT * FROM users_table WHERE users_id = $users_id";
    		$select_users_role_query = mysqli_query($conn, $Sql);
    		$num_of_data_cat_table = mysqli_num_rows($select_users_role_query);

    		if ($num_of_data_cat_table > 0) {
    			while($row = mysqli_fetch_assoc($select_users_role_query)){
    				$users_role= $row['users_role'];
    				$users_id= $row['users_id'];
    				?>

    				<option value="<?php echo $users_id; ?>"><?php echo $users_role; ?></option>
				      
    				<?php
    			}
    		}


    	?>
	    	<option value="admin">Admin</option>
	    	<option value="subscriber">subscriber</option>

	    </select>
  	</div>

	
	<div class="form-group">
		<label for="users_password">User Password</label>
		<input type="password" class="form-control" name="users_password" value="<?php echo $users_password; ?>">
	</div>

	<div class="form-group">
		<label for="users_email">User Email</label>
		<input type="email" class="form-control" name="users_email" value="<?php echo $users_email; ?>">
	</div>

	<div class="form-group">
		<label for="users_rand">User rand</label>
		<input type="text" class="form-control" name="users_rand" value="<?php echo $users_rand; ?>">
	</div>

	<div class="form-group">
		<label for="users_image">User Image</label>
		<input type="text" class="form-control" name="users_image" value="<?php echo $users_image; ?>">
	</div>

		
		<button type="submit" class="btn btn-primary" name="update_users">Edit users</button>

</form>
            
 

