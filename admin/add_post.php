

<!-- admin header -->


<?php include 'includes/admin_header.php'; ?>

    <div id="wrapper">

 <!-- admin navigation -->

<?php include 'includes/admin_navigation.php'; ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                      
                    </div>
                </div>
                <!-- /.row -->


<!---posting post -->
<?php
	if (isset($_POST['post_submit'])) {
		

		$post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
		$post_category_id = mysqli_real_escape_string($conn, $_POST['post_category_id']);
		$post_author = mysqli_real_escape_string($conn, $_POST['post_author']);
		$post_user = mysqli_real_escape_string($conn, $_POST['post_user']);

		$post_image = $_FILES['post_image']['name'];
		$image_tmp = $_FILES['post_image']['tmp_name'];

		$post_tag = mysqli_real_escape_string($conn, $_POST['post_tag']);
		$post_date = mysqli_real_escape_string($conn, $_POST['post_date']);
		$post_comment = mysqli_real_escape_string($conn, strip_tags($_POST['post_comment']) );
		$post_content = mysqli_real_escape_string($conn, strip_tags($_POST['post_content']));
		$post_status = mysqli_real_escape_string($conn, $_POST['post_status']);

if(empty($post_title)||empty($post_author)||empty($post_category_id) ||empty($post_user) ||empty($post_image) ||empty($image_tmp) ||empty($post_tag) ||empty($post_date) ||empty($post_comment)||empty($post_content) ||empty($post_status) ){
	echo "<div class='alert alert-success' Role='alert'> Post Failed: post fields are empty. kindly fill it</div>";
}else{
		move_uploaded_file($image_tmp, "../images/".$post_image);
		

		$sql = "INSERT INTO post_table (post_title, post_author, post_users, post_date, post_image, post_content, post_tag, post_status, post_category_id, post_comment_count)VALUES('$post_title', '$post_author',
		'$post_user', '$post_date', '$post_image', '$post_content', '$post_tag', '$post_status', '$post_category_id', '$post_comment')";
		$sql_check = mysqli_query($conn, $sql);

		if (!$sql_check) {
			echo "<div class='alert alert-success' Role='alert'>".'Post Failed. <a href="post.php">view all post</a>'."</div>";
		}else{
			echo "<div class='alert alert-success' Role='alert'>".'post Successful. <a href="post.php">view all post</a>'."</div>";
		}
	}
}

?>




<form method="post" class="" enctype="multipart/form-data">
	<div class="form-group">
		<label for="post_title">Post Title</label>
		<input type="text" class="form-control" name="post_title">
	</div>


<div class="form-group">
    <label for="post_category_id">post_category_id</label>
    <select class="form-control" name="post_category_id">

    	<?php
    		$Sql ="SELECT * FROM cart_table";
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


    	?>
    </select>
  </div>

	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input type="text" class="form-control" name="post_author">
	</div>


	<div class="form-group">
    <label for="post_category_id">post_user</label>
    <select class="form-control" name="post_user">

    	<?php
    		$Sql ="SELECT * FROM users_table";
    		$check = mysqli_query($conn, $Sql);
    		$num_of_data_cat_table = mysqli_num_rows($check);

    		if ($num_of_data_cat_table > 0) {
    			while($row = mysqli_fetch_assoc($check)){
    				$users_id = $row['users_id'];
    				$users_surname = $row['users_username'];

    				?>
    				 <option value="<?php echo $users_surname ?>"><?php echo $users_surname ?></option>
    				<?php
    			}
    		}
    	?>

    </select>
  </div>


	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" class="form-control" name="post_image">
	</div>

	<div class="form-group">
		<label for="post_tag">Post Tag</label>
		<input type="text" class="form-control" name="post_tag">
	</div>

<label for="post_date">Post Status</label>
	<select class="form-group form-control"  name="post_status">
		<label for="post_tag">Post Status</label>
		<option value="draft">Draft</option>
		<option value="publish">Publish</option>
	</select>

	<div class="form-group">
		<!--<label for="post_date">Post Date</label>-->
		<input type="hidden" class="form-control" name="post_date" value="<?php echo date('Y-m-d')?>">
	</div>

	<div class="form-group">
	    <label for="post_comment">Post Comment</label>
	    <textarea class="form-control" id="editor" name="post_comment" rows="3"></textarea>
  </div>

	<div class="form-group">
	    <label for="post_content">Post Content</label>
	    <textarea class="form-control" id="editors" name="post_content" rows="3"></textarea>
  </div>
		
		<button type="submit" class="btn btn-primary" name="post_submit">Submit Post</button>

</form>
            
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

	<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
		} );
		
		ClassicEditor
        .create( document.querySelector( '#editors' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

</body>

</html>


