



<!--<div class="container-fluid">
    <div class="row">-->


        <?php

        //deleting comment from comment table database
            if (isset($_POST['delete_comment_btn'])) {
             $comment_id = $_POST['delete'];

             $sql = "DELETE FROM comments_table WHERE comment_id = $comment_id";
             $delete_comment_table = mysqli_query($conn, $sql);

             if (!$delete_comment_table) {
                echo "delete failed:".mysqli_error($conn);
                header('Location: comments.php');
             }

            }



    //unapprove comment from database
              if (isset($_GET['unapprove'])) {
             $comment_id = $_GET['unapprove'];

             $sql = "UPDATE comments_table SET comment_status = 'Unapproved' WHERE comment_id = $comment_id"; 
             $unapprove_comment_table = mysqli_query($conn, $sql);

             if (! $unapprove_comment_table) {
                echo "Uapprove failed:".mysqli_error($conn);
                header('Location: comments.php');
             }

            }



    //approve comment from database
              if (isset($_GET['approve'])) {
             $comment_id = $_GET['approve'];

             $sql = "UPDATE comments_table SET comment_status = 'approved' WHERE comment_id = $comment_id"; 
             $approve_comment_table = mysqli_query($conn, $sql);

             if (! $approve_comment_table) {
                echo "approve failed:".mysqli_error($conn);
                header('Location: comments.php');
             }

            }


        ?>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>comment_id</th>
                            <th>comment_author</th>
                            <th>comment_email</th>
                            <th>comment_status</th>
                            <th>comment_date</th>
                            <th>comment_content</th>
                            <!-- <th>In_reponse_to</th> -->
                            <th>Approve</th>
                            <th>Unapprove</th>
                            <th>Delete</th>

                        </tr>
                    </thead>

                    <tbody>
                    
                            <?php

                            $sql = "SELECT * FROM comments_table";
                            $result_select_all_comment = mysqli_query($conn,  $sql);
                            $check_result = mysqli_num_rows( $result_select_all_comment);

                            if ($check_result > 0) {
                               while($row=mysqli_fetch_assoc( $result_select_all_comment)){

                                $comment_id = $row['comment_id'];
                                $comment_post_id = $row['comment_post_id'];
                                $comment_author = $row['comment_author'];
                                $comment_email = $row['comment_email'];
                                $comment_status = $row['comment_status'];
                                $comment_date = $row['comment_date'];
                                $comment_content = $row['comment_content'];



                                ?>
                             <tr>

                            <td><?php echo $comment_id ; ?></td>
                           
                            <td><?php echo  $comment_author ; ?></td>
                            <td><?php echo $comment_email ; ?></td>
                            <td><?php echo $comment_status ; ?></td>
                            <td><?php echo $comment_date ; ?></td>
                            <td><?php echo $comment_content ; ?></td>

                            <?php

                          $sql="SELECT * FROM post_table WHERE post_id = $comment_post_id";
                            $sql_confirm_select_comment_post_id = mysqli_query($conn, $sql);
                            if ($sql_confirm_select_comment_post_id) {
                               while($row =mysqli_fetch_assoc($sql_confirm_select_comment_post_id)) {
                                $post_id =$row['post_id'];
                                $post_title =$row['post_title'];
                                ?>

                                 <td><a href="../post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></td>

                                 <?php

                               }
                            }
                       

                            ?>
                            

                            <td><a href="comments.php?approve=<?php echo $comment_id ?>"class="btn btn-success" onClick="javascript: return confirm('Do you want to Approve comment')" >Approve</a></td>

                            <td><a href="comments.php?unapprove=<?php echo $comment_id ?>" class="btn btn-warning" onClick="javascript: return confirm('Do you want to Unapprove comment')">Unapprove</a></td>

                            <form method="POST" action="">
                                <input type="hidden" name="delete" value="<?php echo $comment_id ?>">
                                <td><button type="submit" name="delete_comment_btn" class="btn btn-danger" onClick="javascript: return confirm('Please confirm deletion')" >Delete</button></td>

                            </form>
                            <!-- <td><a href="comments.php?delete=<?php echo $comment_id ?>">Delete</a></td> -->

                        </tr>

                            <?php

                               }
                            }


                            ?>

                        


                    </tbody>

                </table>
<!--</div>

</div>-->
            