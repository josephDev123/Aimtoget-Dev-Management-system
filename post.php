
<?php session_start(); ?>

    <!-- header -->

<?php include 'includes/header.php'; ?>
    <!-- Navigation -->

<?php include 'includes/Navigation.php'; ?>

<?php include 'admin\functions.php'; ?>



  <!-- likes  session -->
    <?php
  
    if(isset($_POST['liked'])){
        //number of post for specify post
         $postId = $_GET['post_id'];
            $sql = mysqli_query($conn, "SELECT likes FROM post_table WHERE post_id = '{$postId}'");
            $row = mysqli_fetch_assoc($sql);
            $numPost = $row['likes'];
            $numPost++;

    //username of the person that post it
            $sql = mysqli_query($conn, "SELECT post_users FROM post_table WHERE post_id = '{$postId}'");
            $row = mysqli_fetch_assoc($sql);
            $postUser = $row['post_users'];
        
//select user_id from users's table
            $sql = mysqli_query($conn, "SELECT users_id FROM users_table WHERE users_username = '{$postUser}'");
            $row = mysqli_fetch_assoc($sql);
            $UserId = $row['users_id'];
           



            //updated the post likes
          
                $like = $_POST['liked'];
                $post_id = $_POST['post_id'];
                 $sql = mysqli_query($conn, "UPDATE post_table SET likes = '{$numPost}' WHERE post_id = '{$post_id}' ");

                //insert into like table
                $sql = mysqli_query($conn, "INSERT INTO likes(post_id, users_id)VALUE('{$post_id}', '{$UserId}')");
                   
        }




        // unlike session
        if(isset($_POST['unliked'])){
                //number of post for specify post
                $post_id = $_POST['post_id'];
                $sql = mysqli_query($conn, "SELECT likes FROM post_table WHERE post_id = '{$postId}'");
                $row = mysqli_fetch_assoc($sql);
                $numPost = $row['likes'];
                $numPost--;

                //username of the person that post it
                $sql = mysqli_query($conn, "SELECT post_users FROM post_table WHERE post_id = '{$postId}'");
                $row = mysqli_fetch_assoc($sql);
                $postUser = $row['post_users'];

                //select user_id from users's table
                $sql = mysqli_query($conn, "SELECT users_id FROM users_table WHERE users_username = '{$postUser}'");
                $row = mysqli_fetch_assoc($sql);
                $UserId = $row['users_id'];



            $like = $_POST['liked'];
            $post_id = $_POST['post_id'];
             $sql = mysqli_query($conn, "UPDATE post_table SET likes = '{$numPost}' WHERE post_id = '{$post_id}' ");

            //delete from like table
            $sql = mysqli_query($conn, "DELETE FROM likes WHERE post_id = '{$post_id}'");
               
    }
    ?>






    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text </small>
                
                </h1> -->

                <!-- First Blog Post -->
                <?php

                 if (isset($_GET['post_id'])) {
                    $post_id = $_GET['post_id'];

                    // if (isset($_SESSION['users_role']) && $_SESSION['users_role'] == 'admin') {
                    //     $sql = "SELECT * FROM post_table WHERE post_id = $post_id";
                    // }else{
                    //     $sql = "SELECT * FROM post_table WHERE post_id = $post_id AND post_status = 'publish'";
                    // }
               
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
           

            <!-- likes section -->
           <?php

            if(isset($_SESSION['username'])){
            ?>  
                <div class="row">
              <?php  
            if(!userId($_SESSION['users_id'])){
                    ?>
                    <p class="pull-right"><a class="like" href="">Like</a></p>
                    <?php
                }else{
                    ?>
                    <p class="pull-right"><a class="unlike" href="">Unlike</a></p>
                    <?php
                }
                        ?>
                    </div>
                

                    <!-- number of likes section -->
                    <div class="row">
                        <p class="pull-right">Like: <?php echo numOfLike($post_id); ?></p>
                    </div>

                    <div class="row">
                        <p class="pull-right">Views: <?php echo $post_views; ?></p>
                    </div>
                    
                   
                <?php
              
            }else{
                
                    echo '<div class="row">
                    <hr>
                    <p class="pull-right"><a class="alert alert-danger" href="newLogin.php">login to see Like, unlike and likewise number of views for the post</a></p>
                    </div>';
            }
              ?> 
                
               
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
<hr>
                    <?php
                    if(!$_SESSION['username']){
                        ?>
                        <div class="row">
                            <p> <a class="alert alert-danger" href="newLogin.php">To see the comment, login and approve it in the Admin</a></p>
                        </div>;
                    <?php
                    }
                    ?>
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

</div>
                
        <!-- Footer -->
      <?php include 'includes/footer.php'; ?>

      <script>
    $(document).ready(function(){
        $('.like').click(function(){
            const post_id = <?php echo $post_id; ?>;
            // const user_id = 14;

            $.ajax({
                url: 'post.php?post_id=<?php echo  $post_id; ?>',
                type: 'post',
                data: {
                    'liked': 1,
                    // 'user_id': user_id,
                    'post_id': post_id
                }
            })

        })


        $('.unlike').click(function(){
            const post_id = <?php echo $post_id; ?>;
            // const user_id = 14;

            $.ajax({
                url: 'post.php?post_id=<?php echo  $post_id; ?>',
                type: 'post',
                data: {
                    'unliked': 1,
                    'post_id': post_id
                }
            })

        })



    })
    
    
    
    </script>