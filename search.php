

<?php session_start(); ?> 

<?php include 'includes/dB.php'; ?>

    <!-- header -->

<?php include 'includes/header.php'; ?>


    <!-- Navigation -->

<?php include 'includes/Navigation.php'; ?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php

                if (isset($_POST['search_btn'])) {
                    $search_input = $_POST['search_input'];
                   if (empty($search_input)) {
                      echo "<h2>THE SEARCH FIELD IS EMPTY. KINDLY FILL IT</h2>";
                   } else {
                        
                      $sql = "SELECT * FROM post_table WHERE post_tag LIKE '%$search_input%'";
                      $result_search = mysqli_query($conn, $sql);
                     
                      if (mysqli_num_rows($result_search) == 0) {
                        echo "<h2>NO RESULT</h2>";
                      } else {
                        while($row = mysqli_fetch_assoc($result_search)){
                            $post_value = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                          


                    ?>

                <h2>
                    <a href="#"><?php echo $post_value; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="cms project image">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>


                            <?php
                        }
                      }


                   }



                }
            ?>


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>


    <!-- Blog Sidebar && Widgets Column -->
     <?php include 'includes/Sidebar.php'?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      <?php include 'includes/footer.php'?>