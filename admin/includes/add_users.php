

<?php
	if (isset($_POST['submit_users'])) {
		

		$users_firstname= $_POST['users_firstname'];
		$users_lastname = $_POST['users_lastname'];
		$users_username = $_POST['users_username'];
		$users_role = $_POST['users_role'];

		/*$post_image = $_FILES['post_image']['name'];
		$image_tmp = $_FILES['post_image']['tmp_name'];*/


		$users_password = $_POST['users_password'];
		$users_email = $_POST['users_email'];
		$users_rand = $_POST['users_rand'];
		$users_image = $_POST['users_image'];
		
		if(empty($users_firstname)||empty($users_lastname) ||empty($users_username) ||empty($users_role) ||empty($users_password) ||empty($users_email) ||empty($users_rand) ||empty($users_image)){
			echo "<div class='alert alert-success' Role='alert'>  Users fields are empty. kindly fill it</div>";
		}else{

		//move_uploaded_file($image_tmp, "../images/".$post_image);
		

		$sql = "INSERT INTO users_table (users_firstname, users_lastname, users_username, users_role, users_password, users_email, users_rand, users_image)VALUES('$users_firstname', '$users_lastname', '$users_username ', '$users_role', '$users_password', '$users_email', '$users_rand', '$users_image')";
		$insert_users_table_query = mysqli_query($conn, $sql);

		if (!$insert_users_table_query) {
			echo "<div class='alert alert-success' Role='alert'>".'Post unsuccessful. <a href="users.php">view all users</a>'."</div>";
		}else{
			echo "<div class='alert alert-success' Role='alert'>".'post Successful. <a href="users.php">view all users</a>'."</div>";
		}
	}
	}

?>

<form method="post" class="" enctype="multipart/form-data">
	<div class="form-group">
		<label for="users_firstname">Users firstname</label>
		<input type="text" class="form-control" name="users_firstname">
	</div>


<!---<div class="form-group">
    <label for="post_category_id">post_category_id</label>
    <select class="form-control" name="post_category_id">

    	<?php
    		/*$Sql ="SELECT * FROM cart_table";
    		$check = mysqli_query($conn, $Sql);
    		$num_of_data_cat_table = mysqli_num_rows($check);

    		if ($num_of_data_cat_table > 0) {
    			while($row = mysqli_fetch_assoc($check)){
    				$cat_id = $row['id'];
    				$cart_title = $row['cart_title'];

    				?>

    				 <option value="<?php echo $cat_id ?>"><?php echo $cart_title ?></option>
				      

    				<?php
    			}
    		}

*/
    	?>

    </select>
  </div>
-->


	<div class="form-group">
		<label for="users_lastname">Users Lastname</label>
		<input type="text" class="form-control" name="users_lastname">
	</div>

	<div class="form-group">
		<label for="users_username">Users Username</label>
		<input type="text" class="form-control" name="users_username">
	</div>

	<div class="form-group">
    <label for="users_role">Users Role</label>
	    <select class="form-control" name="users_role">
	    	<option value="admin">Admin</option>
	    	<option value="subscriber">subscriber</option>

	    </select>
  	</div>

	
	<div class="form-group">
		<label for="users_password">User Password</label>
		<input type="password" class="form-control" name="users_password">
	</div>

	<div class="form-group">
		<label for="users_email">User Email</label>
		<input type="email" class="form-control" name="users_email">
	</div>

	<div class="form-group">
		<label for="users_rand">User rand</label>
		<input type="text" class="form-control" name="users_rand">
	</div>

	<div class="form-group">
		<label for="users_image">User Image</label>
		<input type="text" class="form-control" name="users_image">
	</div>

		
		<button type="submit" class="btn btn-primary" name="submit_users">Add users</button>

</form>
            
 












































