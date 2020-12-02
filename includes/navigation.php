    
<?php 


//   $_SESSION['username'] = null;
//     $_SESSION['users_password'] =null;
//     $_SESSION['users_firstname'] = null;
//     $_SESSION['users_lastname'] = null;
//     $_SESSION['users_role'] = null;

// ?>


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


                        <?php
                        // adding active class to link for activeness
                                        
                                        $Link = basename($_SERVER['PHP_SELF']);
                                        $registration = 'registration.php';
                                        $contact_link = 'contact.php';
            
                                        $contact_class = '';
                                        $active_class = '';
                                        $registration_class = '';
            
            
                                        if(isset($_GET['cart_id']) &&  $_GET['cart_id'] == $cart_id) {
                                            $active_class = 'active';
                                        }else if ($Link == $registration) {
                                            $registration_class = 'active';
                                        }else if ($Link == $contact_link) {
                                            $contact_class = 'active';
                                        }
            
                                        ?>
            

                           <li class="<?php echo $active_class ?>" >
                                <a href="category.php?cart_id=<?php echo $cart_id; ?>"><?php echo $cart_title; ?></a>
                            </li>

                          <?php  
                       }
                       ?>


                            <li class='<?php echo $registration_class ?>'>
                                <a href="registration.php">Registration</a>
                            </li>

                            
                            <li class='<?php echo $contact_class ?>'>
                                <a href="contact.php">Contact.php</a>
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