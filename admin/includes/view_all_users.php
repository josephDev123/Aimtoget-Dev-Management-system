<?php

// the two code are correct. You can either of the two below

// if($_SESSION['users_role'] !=='admin'){
//    header('Location: ../admin');
// }

// if(isAdmin($_SESSION['username'])); correct
if(!isAdmin($_SESSION['username'])){
   header('Location: ../admin');
}
?>



<!--<div class="container-fluid">
    <div class="row">-->


        <?php

        //deleting users from users table database
            if (isset($_POST['delete_users_btn'])) {
             $users_id = $_POST['delete'];

             $sql = "DELETE FROM users_table WHERE users_id = $users_id";
             $delete_users_tableP_query = mysqli_query($conn, $sql);

             if (!$delete_users_tableP_query ) {
                echo "delete failed:".mysqli_error($conn);
                header('Location: users.php');
             }

            }



    //update to admin in user roles column  from database in user_table
              if (isset($_GET['change_to_admin'])) {
             $users_id = $_GET['change_to_admin'];

             $sql = "UPDATE users_table SET users_role = 'admin' WHERE users_id =   $users_id"; 
             $change_userrole_table_query = mysqli_query($conn, $sql);

             if (!$change_userrole_table_query ) {
                echo "Uapprove failed:".mysqli_error($conn);
                header('Location: users.php');
             }

            }



    if (isset($_GET['change_to_subscriber'])) {
             $users_id = $_GET['change_to_subscriber'];

             $sql = "UPDATE users_table SET users_role = 'subscriber' WHERE users_id =   $users_id"; 
             $change_userrole_table_query = mysqli_query($conn, $sql);

             if (!$change_userrole_table_query ) {
                echo "Uapprove failed:".mysqli_error($conn);
                header('Location: users.php');
             }

            }


    //approve comment from database
              /*if (isset($_GET['approve'])) {
             $comment_id = $_GET['approve'];

             $sql = "UPDATE comments_table SET comment_status = 'approved' WHERE comment_id = $comment_id"; 
             $approve_comment_table = mysqli_query($conn, $sql);

             if (! $approve_comment_table) {
                echo "approve failed:".mysqli_error($conn);
                header('Location: comments.php');
             }

            }*/


        ?>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>users_id</th>
                            <th>users_Firstname</th>
                            <th>users_Lastname</th>
                            <th>users_username</th>
                            <th>users_role</th>
                            <th>users_email</th>
                            <th>users_image</th>
                            <th>change_roles</th>
                            <th>change_roles</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                    
                            <?php

                            $sql = "SELECT * FROM users_table";
                            $select_all_users_query = mysqli_query($conn,  $sql);
                            $check_result = mysqli_num_rows($select_all_users_query);

                            if ($check_result > 0) {
                               while($row=mysqli_fetch_assoc($select_all_users_query)){

                                $users_id = $row['users_id'];
                                $users_firstname = $row['users_firstname'];
                                $users_lastname = $row['users_lastname'];
                                $users_username = $row['users_username'];
                                $users_role = $row['users_role'];
                                $users_email = $row['users_email'];
                                $users_image = $row['users_image'];



                                ?>
                             <tr>

                            <td><?php echo  $users_id; ?></td>
                           
                            <td><?php echo  $users_firstname ; ?></td>
                            <td><?php echo $users_lastname ; ?></td>
                            <td><?php echo $users_username ; ?></td>
                            <td><?php echo $users_role ; ?></td>
                            <td><?php echo $users_email ; ?></td>
                             <td><?php echo $users_image ; ?></td>

                            <?php

                         /* $sql="SELECT * FROM post_table WHERE post_id = $comment_post_id";
                            $sql_confirm_select_comment_post_id = mysqli_query($conn, $sql);
                            if ($sql_confirm_select_comment_post_id) {
                               while($row =mysqli_fetch_assoc($sql_confirm_select_comment_post_id)) {
                                $post_id =$row['post_id'];
                                $post_title =$row['post_title'];
                                ?>

                                 <td><a href="../post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></td>

                                 <?php

                               }
                            }*/
                       

                            ?>
                            
                             <td><a href="users.php?change_to_admin=<?php echo $users_id ?>" class="btn btn-success" onClick="javascript: return confirm('Do you want to change the role to Admin')" >admin</a></td>
                            <td><a href="users.php?change_to_subscriber=<?php echo $users_id ?>"class="btn btn-warning" onClick="javascript: return confirm('Do you want to change the role to Subscriber')" >subscriber</a></td>
                            <td><a href="users.php?source=edit_users&edit=<?php echo $users_id ?>" class="btn btn-info" onClick="javascript: return confirm('Do you want to edit')" > edit</a></td>


                            <form method="POST" action="">
                              <input type="hidden" name="delete" value="<?php echo  $users_id ?>">
                              <td><button type="submit" name="delete_users_btn" onClick="javascript: return confirm('Do you want to delete')" class="btn btn-danger">Delete</button></td> 
                            </form>
                            <!-- <td><a href="users.php?delete=<?php echo  $users_id ?>">Delete</a></td> -->

                        </tr>

                            <?php

                               }
                            }


                            ?>

                        


                    </tbody>

                </table>
<!--</div>

</div>-->
            