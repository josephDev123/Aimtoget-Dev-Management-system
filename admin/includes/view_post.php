
                <?php

                //delete post
                if (isset($_POST['delete_post_btn'])) {
                    $post_id = $_POST['delete_post'];

                    $sql = "DELETE  FROM post_table WHERE post_id = '$post_id'";
                    $post_delete_check = mysqli_query($conn, $sql);
                    header('Location: post.php');
                    
                }


                    if(isset($_POST['apply_post_status'])){
                        
                        if(isset($_POST['checkbox'])){
                            $post_id = $_POST['checkbox'];
                            $change_post_status = $_POST['select_post_status'];

                            $sql = "UPDATE post_table SET post_status = '$change_post_status' WHERE post_id =  $post_id";
                            $confirm_sql_on_db = mysqli_query($conn, $sql);

                        }
                    }

                ?>

               
                <?php
                //  <!-- change to publish and draft sql -->
                    if(isset($_GET['publish'])){
                        $publish_id = $_GET['publish'];

                        $sql = "UPDATE post_table SET post_status ='publish' WHERE post_id ='$publish_id'"; 
                        $confirm_publish_to_db =mysqli_query($conn, $sql);
                    }


                    if(isset($_GET['draft'])){
                        $draft_id = $_GET['draft'];

                        $sql = "UPDATE post_table SET post_status ='draft' WHERE post_id =' $draft_id'"; 
                        $confirm_publish_to_db =mysqli_query($conn, $sql);
                    }
                ?>

<!-- <div id="wrapper"> -->
<!-- <div id="page-wrapper">  -->

<div class="container-fluid">

                 <form action="" method="post">
                 
                        <div class="col-sm-3">
                            <select class="form-control" name="select_post_status" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <option selected>Choose...</option>
                                <option value="Publish">Publish</option>
                                <option value="Draft">Draft</option> 
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <input class="btn btn-success" type="submit" name="apply_post_status" value="Apply">
                        </div>
              
                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th><input type="checkbox"  id="checkboxArr"></th>
                            <th>p_id</th>
                            <th>post_user</th>
                            <!-- <th>post_title</th> -->
                            <th>post_category</th>
                            <th>post_status</th>
                            <th>post_image</th>
                            <th>post_tag</th>
                            <th>p_comm_count</th>
                            <th>Publish post</th>
                            <th>Draft post</th>
                            <th>Date</th>
                            <th>View post</th>
                             <th>Edit</th>
                             <th>Delete</th>
                             <th>post Views</th>

                        </tr>
                    </thead>

                    <tbody>
                    
                            <?php

                            $sql = "SELECT * FROM post_table";
                            $result_select_all_post = mysqli_query($conn,  $sql);
                            $check_result = mysqli_num_rows($result_select_all_post);

                            if ($check_result > 0) {
                               while($row=mysqli_fetch_assoc($result_select_all_post)){
                             
                                $post_id = $row['post_id'];
                                // $post_author = $row['post_author'];
                                $post_users = $row['post_users'];
                                $post_title = $row['post_title'];
                                $post_category_id = $row['post_category_id'];
                                $post_status = $row['post_status'];
                                $post_image = $row['post_image'];
                                $post_tag = $row['post_tag'];
                                $post_comment = $row['post_comment_count'];
                                $post_date = $row['post_date'];
                                $post_views = $row['post_view'];


?>
                             <tr>
                            <td><input type="checkbox" name="checkbox" id="checkboxVal" value="<?php echo $post_id; ?>"></td>
                            <td><?php echo $post_id; ?></td>
                            <td><?php echo $post_users; ?></td>
                           

                            <?php

                            $sql="SELECT * FROM cart_table WHERE id =  $post_category_id";
                            $sql_confirm = mysqli_query($conn, $sql);
                            if ($sql_confirm) {
                               while($row =mysqli_fetch_assoc($sql_confirm)) {
                                $cart_id =$row['id'];
                                $cart_title =$row['cart_title'];
                                ?>

                                 <td><?php echo $cart_title; ?></td>

                                 <?php

                               }
                            }


                            ?>


                            <td><?php echo $post_status; ?></td>
                            <td><img src="../images/<?php echo $post_image; ?>" width="100px;"></td>
                            <td><?php echo $post_tag; ?></td>

                            <?php  
                                $sql = "SELECT * FROM comments_table WHERE comment_post_id = '$post_id'";
                                $check_query_on_db = mysqli_query($conn, $sql);
                                $num_of_post_comment = mysqli_num_rows($check_query_on_db);

                            ?>
                         
                            <td><?php echo $num_of_post_comment; ?></td>

                            <td><a href="post.php?publish=<?php echo $post_id ?>" class="btn btn-success" onClick="javascript: return confirm('Do you want to change post to publish')">Publish post</a></td>

                            <td><a href="post.php?draft=<?php echo $post_id ?>" class="btn btn-primary" onClick="javascript: return confirm('Do you want to change post to draft')">Draft post</a></td>

                            <td><?php echo $post_date; ?></td>

                            <td><a href="../post.php?post_id=<?php echo $post_id ?>" class="btn btn-info" onClick="javascript: return confirm('Do you want to view the post')">post</a></td>

                            <td><a href="post_edit.php?p_id=<?php echo $post_id ?>" class="btn btn-warning" onClick="javascript: return confirm('Do you want to edit')">Edit</a></td>


                           <form method="POST" action="">
                                <input type="hidden" name="delete_post" value="<?php echo $post_id; ?>">
                                
                                <td><button type="submit" class="btn btn-danger" name="delete_post_btn" onClick="javascript: return confirm('Please confirm deletion')">Delete</button></td>   
                            </form>


                            <td class="btn btn-primary"><?php echo $post_views; ?></td>

                        </tr>

                            <?php

                               }
                            }


                            ?>

                    

                    </tbody>
                  
                </table>
                </form>
                
                </div>
            <!-- /.container-fluid -->

        <!-- </div> -->
        <!-- /#page-wrapper -->

    <!-- </div> -->
    <!-- /#wrapper -->
     