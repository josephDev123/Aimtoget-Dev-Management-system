

<!-- admin header -->

<?php include 'includes/admin_header.php'; ?>

<!---- function------->

<?php include 'admin_function.php'; ?>




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

                    <div class="col-sm-6">

                       <?php 
                       //INSERTING CATEGORIES INTO CATEGORIES TABLE/admin section/ query
                      add_categories();
                         ?>


                        <!---- ADD CATEGORIES FORM---->

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="add_cat">Add Categories</label>
                                <input type="text" class="form-control" name="add_cat">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="add_cat_btn" value="Add Categories">
                            </div>
                        </form>



                        
                        <?php

                        //EDITTING SQL query/admin section

                        if (isset($_GET['edit'])) {
                            $edit_cat_value = $_GET['edit'];
                            $sql = "SELECT * FROM cart_table WHERE id =' $edit_cat_value'";
                            $result_edit = mysqli_query($conn, $sql);
                            if ($result_edit) {
                               while($row = mysqli_fetch_assoc($result_edit)){
                                $cart_title = $row['cart_title'];
                               }                           
                           }
                        }


                        ?>


                        <?php
                        //update categories
                        update_categories();
                        ?>

                        <!---UPDATE  CATEGORIES FORM---->

                          <form action="" method="post">
                            <div class="form-group">
                                <label for="add_cat">Update Categories</label>
                                <input type="text" class="form-control" name="edit_cat_value" value="<?php if(isset($cart_title)) echo $cart_title ?>">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="edit_cat_btn" value="Update Categories">
                            </div>
                        </form>
                        
                    </div>




                     <div class="col-sm-6">

                          <?php
                          //deleting categories query
                          delete_categories();
                        ?>

                        <?php 

                         //SELECTING FROM CATEGORIES TABLE query/admin section
                            $sql = "SELECT * FROM cart_table";
                            $result_select_categories = mysqli_query($conn, $sql);

                        ?>
                       <table class="table table-bordered table-hover">
                           
                           <thead>
                               <tr>
                                   <th>Cart_id</th>
                                    <th>Categories Title</th>
                               </tr>
                           </thead>

                           <tbody>

                                <?php 

                                $num_of_rows = mysqli_num_rows($result_select_categories);
                                 if ($num_of_rows > 0) {
                                while($row = mysqli_fetch_assoc($result_select_categories)){

                                    ?>
                               <tr>
                               
                                   <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['cart_title']; ?></td>
                                    <td><a href="admin_categories.php?delete=<?php echo $row['id']; ?>">Delete</a></td>
                                    <td><a href="admin_categories.php?edit=<?php echo $row['id']; ?>">Edit</a></td>

                                    <?php
                                }
                            }

                                ?>
                                   
                               </tr>


                           </tbody>
                       </table>
                      
                        
                    </div>

                </div>
                <!-- /.row -->
            
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
