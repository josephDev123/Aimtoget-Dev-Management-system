

<?php session_start(); ?>

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

                 if (isset($_GET['post_id'])) {
                    $post_id = $_GET['post_id'];


               
                      $sql = "SELECT * FROM post_table WHERE post_id = $post_id AND post_status = 'publish'";
                      $result = mysqli_query($conn, $sql);
                      if ($result) {
                        while($row = mysqli_fetch_assoc($result)){
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $post_post_tag = $row['post_tag'];
                            $post_views = $row['post_view'];
                            ?>

                              <h2>
                    <a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="cms project image">
                <hr>
                <p><?php echo $post_content ?></p>
                

                <hr>


                            <?php

                            // post views sql

$sql = "UPDATE post_table SET post_view = $post_views + 1 WHERE post_id = $post_id";
$update_post_view_on_db= mysqli_query($conn, $sql);
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
     <?php include 'includes/Sidebar.php'; ?>



        </div>
        <!-- /.row -->


                <!-- Blog Comments -->
                <?php

                    if (isset($_POST['comment_submit'])) {
                          $post_id = $_GET['post_id'];

                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];
                        $comment_date = date('Y:m:d');
                  
                  $sql = "INSERT INTO comments_table( comment_post_id, comment_author, comment_email, comment_status, comment_date, comment_content)VALUES($post_id, '$comment_author', '$comment_email', 'Unapproved', '$comment_date', '$comment_content')";

                  $comment_insert_table = mysqli_query($conn, $sql);
                  if (!$comment_insert_table) {
                     echo "Insert into database failed:".mysqli_error($conn);
                  }



                    }


                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">

                          <div class="form-group">
                            <label for="comment_author">Author</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>

                          <div class="form-group">
                            <label for="comment_email">Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>

                        <div class="form-group">
                            <label for="comment_content">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content" ></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" name="comment_submit">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php
                    $sql = " SELECT * FROM comments_table WHERE comment_post_id = $post_id AND comment_status = 'approved'";
                    $select_comment_table_sql = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($select_comment_table_sql) > 0) {
                        while($row = mysqli_fetch_assoc($select_comment_table_sql)){

                            $comment_author = $row['comment_author'];
                            $comment_date = $row['comment_date'];
                            $comment_content = $row['comment_content'];
?>

           <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;?>
                            <small><?php echo $comment_date;  ?></small>
                        </h4>
                        <?php echo $comment_content;  ?>
                    </div>
                </div>

        <hr>


            <?php
                        }
                    }

                ?>

     

        <!-- Footer -->
      <?php include 'includes/footer.php'; ?>