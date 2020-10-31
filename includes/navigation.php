    
<?php 


  $_SESSION['username'] = null;
    $_SESSION['users_password'] =null;
    $_SESSION['users_firstname'] = null;
    $_SESSION['users_lastname'] = null;
    $_SESSION['users_role'] = null;

?>


    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <?php 
                   $sql = 'SELECT * FROM cart_table';
                   $result_cart = mysqli_query($conn, $sql);
                   if (mysqli_num_rows($result_cart) > 0) {
                       while ($row =mysqli_fetch_assoc($result_cart)) {
                          $cart_id = $row['id'];
                           $cart_title = $row['cart_title'];
                           ?>
                           <li>
                                <a href="category.php?cart_id=<?php echo $cart_id; ?>"><?php echo $cart_title; ?></a>
                            </li>

                          <?php  
                       }
                       ?>

                            <!-- <li>
                                <a href="admin">Admin</a>
                            </li> -->

                            <li>
                                <a href="registration.php">Registration</a>
                            </li>

                            <?php 
                   }

                     ?>
                             <!-- <li>
                                <a href="uploadFile.php">Uploaded Files</a>
                            </li> -->
    
                </ul>
            </div>
            <!-- /.navbar-collapse -->

        </div>
        <!-- /.container -->
    </nav>