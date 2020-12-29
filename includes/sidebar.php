  

  <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                        <div class="input-group">
                        
                            <input type="text" class="form-control" name="search_input">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" name="search_btn">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                       
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>



                 <!-- login form -->
                <div class="well">

                    <?php
                        if(isset($_SESSION['username'])){
                            echo 'logged-in as ' .strtoupper($_SESSION['username']) . ' <a href="includes/logout.php" class="btn btn-primary">Log-out</a>';
                        }else{
                            ?>
                            <h4>Login</h4>
                            <form action="includes/login.php" method="post" >
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username">
                                </div>
        
                                <div class="form-group">
                                    <label for="user_password">Password</label>
                                    <input type="Password" class="form-control" name="user_password">
                                </div>

                                <div class="form-group">
                                    <a href="includes/forgot.php">Forgot Password</a>
                                </div>
        
                                 <div class="form-group">
                                    <button class="btn btn-success" name="user_login" type="submit">Login</button>
                                </div>   
                            </form>
        
                            <!-- /.input-group -->
                        </div>
                        <?php
                        }

                    ?>
           





                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">

                        <?php

                            //selecting categories from table

                            $sql = "SELECT * FROM cart_table";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                               while($row = mysqli_fetch_assoc($result)){
                                      $cart_id = $row['id'];
                                   $cart_title = $row['cart_title'];
                                   ?>

                        <div class="col-lg-12">

                            <ul class="list-unstyled">
                                <li><a href="category.php?cart_id=<?php echo $cart_id; ?>"><?Php echo $cart_title ?></a>
                                </li>
                               
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                       <!-- <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>-->
                        <!-- /.col-lg-6 -->
                                   <?php
                               }
                            }


                         ?>
                        </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <!-- <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div> -->

            </div>