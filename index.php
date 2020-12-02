

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

                <!-- <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->

                <!-- First Blog Post -->
                <?php
                    $sql = "SELECT * FROM post_table";
                    $confirm_on_db = mysqli_query($conn, $sql);
                    $num_post_nums= mysqli_num_rows($confirm_on_db);
                    $num_post_nums = $num_post_nums/2;
                    

                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    }else {
                        $page = '';
                    }

                    if ($page == ''|| $page == 1) {
                        $page_1 = 0;
                    }else{
                        $page_1 = ($page * 2) - 2;
                    }

                    // if (isset($_SESSION['users_role']) && $_SESSION['users_role'] == 'admin') {
                    //     $sql = "SELECT * FROM post_table";
                    // }else{
                    //     $sql = "SELECT * FROM post_table WHERE post_status = 'publish' LIMIT $page_1, 3";
                    // }
                        
                    $sql = "SELECT * FROM post_table WHERE post_status = 'publish' LIMIT $page_1, 3";
                      $result = mysqli_query($conn, $sql);
                      $num =mysqli_num_rows($result);
                	  if ($num > 0) {
                	  	while($row = mysqli_fetch_assoc($result)){
                            $post_id = $row['post_id'];
                	  		$post_title = $row['post_title'];
                              // $post_author = $row['post_author'];
                              $post_user = $row['post_users']; 
                	  		$post_date = $row['post_date'];
                	  		$post_image = $row['post_image'];
                	  		$post_content = $row['post_content'];
                	  		$post_post_tag = $row['post_tag'];
                	  		?>

                	  		 
                 <h2>
                    <a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="author.php?author=<?php echo $post_user; ?>&post_id=<?php echo $post_id; ?>"><?php echo $post_user; ?></a>
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
                          echo '<h1 class="text-center">NO POST<h1>';
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

                <ul class="pagination">
                 <?php
                    for($i=1; $i<=$num_post_nums; $i++){
                        echo "<li class='page-item'><a class='page-link' href='index.php?page=$i'>$i</a></li>";
                    }
                ?>
            </ul>

            </div>

           
       <!-- Blog Sidebar && Widgets Column -->
     <?php include 'includes/Sidebar.php'; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      <?php include 'includes/footer.php'; ?>