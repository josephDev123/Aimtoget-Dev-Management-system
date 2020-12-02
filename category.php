



<?php session_start();  ?>

    <!-- header -->

<?php include 'includes/header.php'; ?>


    <!-- Navigation -->

<?php include 'includes/Navigation.php'; ?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
<!-- 
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->

                <!-- First Blog Post -->
                <?php

                if (isset($_GET['cart_id'])) {
                	$cart_id = $_GET['cart_id'];

                }
                
                // if (isset($_SESSION['users_role']) && $_SESSION['users_role'] == 'admin') {
                //     $sql = "SELECT * FROM post_table WHERE post_id = $post_id";
                // }else{
                //     $sql = "SELECT * FROM post_table WHERE post_category_id = $cart_id AND post_status = 'publish'";
                // }
               
                     $sql = "SELECT * FROM post_table WHERE post_category_id = $cart_id AND post_status = 'publish'";
                      $result = mysqli_query($conn, $sql);
                      $nums_of_rows = mysqli_num_rows($result);
                	  if ($nums_of_rows > 0) {
                	  	while($row = mysqli_fetch_assoc($result)){
                            $post_id = $row['post_id'];
                	  		$post_title = $row['post_title'];
                	  		$post_author = $row['post_author'];
                	  		$post_date = $row['post_date'];
                	  		$post_image = $row['post_image'];
                	  		$post_content = $row['post_content'];
                	  		$post_post_tag = $row['post_tag'];
                	  		?>

                	  		  <h2>
                    <a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?post_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="cms project image">
                </a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>


                	  		<?php
                	  	}
                	  }else{
                          echo '<h1 class="text-center">NO CATEGORY POST</h1>';
                      }

                ?>


                <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

            </div>


       <!-- Blog Sidebar && Widgets Column -->
     <?php include 'includes/Sidebar.php'; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      <?php include 'includes/footer.php'; ?>