




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



<!-------updating the post---->

<?php
	if (isset($_POST['post_update'])) {
		$post_id = $_GET['p_id'];


		$post_title = $_POST['post_title'];
		$post_category_id = $_POST['post_category_id'];
		$post_users = $_POST['post_users'];

		$post_image = $_FILES['post_image']['name'];
		$image_tmp = $_FILES['post_image']['tmp_name'];


		$post_tag = $_POST['post_tag'];
		$post_date = $_POST['post_date'];
		$post_comment = $_POST['post_comment'];
		$post_content = $_POST['post_content'];
		$post_status = $_POST['post_status'];


		$sql = "UPDATE post_table SET post_title ='$post_title', post_users ='$post_users', post_date = '$post_date', post_image ='$post_image', post_content = '$post_content', post_tag ='$post_tag', post_status = '$post_status', post_category_id = '$post_category_id', post_comment_count ='$post_comment' WHERE post_id = '$post_id' ";

		$update_sql_check = mysqli_query($conn, $sql);

		if ($update_sql_check) {
			echo "<div class='alert alert-success' Role='alert'>".'Update successful. <a href="post.php">view all post</a>'."</div>";
		}else{
			echo "<div class='alert alert-success' Role='alert'>".'Update failed. <a href="post.php">view all post</a>'."</div>";
		}
	}

?>







<?php

//editting the post

if (isset($_GET['p_id'])) {
	$post_id = $_GET['p_id'];

	$sql = "SELECT * FROM post_table WHERE post_id = {$post_id} ";
	$sql_edit = mysqli_query($conn, $sql);
	$num_of_data = mysqli_num_rows($sql_edit);

	if ($num_of_data > 0) {
		while($row = mysqli_fetch_assoc($sql_edit)){

			$post_id = $row['post_id'];
			$post_title = $row['post_title'];
			// $post_author = $row['post_author'];
			$post_users = $row['post_users'];
			$post_date = $row['post_date'];
			$post_image = $row['post_image'];
			$post_content = $row['post_content'];
			$post_tag = $row['post_tag'];
			$post_status = $row['post_status'];
			$post_category_id = $row['post_category_id'];
			$post_comment_count = $row['post_comment_count'];

?>



<form method="post" class="" enctype="multipart/form-data">
	<div class="form-group">
		<label for="post_title">Post Title</label>
		<input type="text" class="form-control" name="post_title" value="<?php echo $post_title;?>">
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
		<label for="post_author">Post Users</label>
		<input type="text" class="form-control" name="post_users" value='<?php echo $post_users; ?>'>
	</div>

	<div class="form-group">

		<?php
		if (empty($post_image)) {
			$sql ="SELECT * FROM post_table WHERE post_id=$post_id";
			$select_img_query= mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($select_img_query)){

				$post_img =  $row['post_image'];


			}
		}

		?>
		<img src="../images/<?php echo $post_image; ?>" width="100px;">
		<label for="post_image">Post Image</label>
		<input type="file" class="form-control" name="post_image" value=' <?php echo $post_image; ?>'>
	</div>

	<div class="form-group">
		<label for="post_tag">Post Tag</label>
		<input type="text" class="form-control" name="post_tag" value='<?php echo $post_tag; ?>'>
	</div>

	<div class="form-group">
		<label for="post_tag">Post Status</label>
		<input type="text" class="form-control" name="post_status" value='<?php echo $post_status; ?>'>
	</div>

	<div class="form-group">
		<label for="post_date">Post Date</label>
		<input type="date" class="form-control" name="post_date" value='<?php echo $post_date; ?>'>
	</div>

	<div class="form-group">
	    <label for="post_comment">Post Comment</label>
	    <textarea class="form-control" id="" name="post_comment" rows="3" value='' ><?php echo $post_comment_count; ?></textarea> 
  </div>

	<div class="form-group">
	    <label for="post_content">Post Content</label>
	    <textarea class="form-control" id="" name="post_content" rows="3" value=''><?php echo $post_content; ?></textarea> 
  </div>
		
		<button type="submit" class="btn btn-primary" name="post_update">Update Post</button>

</form>



<?php



		}
	}


}
	

?>




            
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

</body>

</html>











