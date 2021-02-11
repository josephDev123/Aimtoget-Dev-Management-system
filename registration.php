

 <?php  include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php  include "includes/navigation.php"; ?> 
 
    <!-- Page Content -->
    <div class="container">
    

<section id="login">
    <div class="container">
        <div class="row">
        
        <?php

        if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username) || empty($email) || empty($password)) {
            echo "<div class='alert alert-danger text-center' role='alert'>Fields are empty. Kindly fill it</div>";
        }else{       
            $sql = "SELECT * FROM users_table WHERE users_username = '$username' || users_email = ' $email'";
            $confirm_on_db = mysqli_query($conn, $sql);
            $db_num = mysqli_num_rows($confirm_on_db);

        if ($db_num > 0) {
            // while($db_row = mysqli_fetch_assoc($confirm_on_db)){
            //     $db_username = $db_row['users_username'];
            //     $db_email = $db_row['users_email'];
                
            //     if ($db_username == $username || $db_email == $email) {
                    echo "<div class='alert alert-danger text-center' role='alert'> $username and $email have been registered before</div>";
            // }
            
        // }
        }else{
            // $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users_table(users_username, users_email, users_password)VALUES('$username', '$email', '$password')";
            $confirm_on_db2 = mysqli_query($conn, $sql);

            if ($confirm_on_db2) {
                echo "<div class='alert alert-success text-center' role='alert'> $username and $email have been successfully registered</div>";
            }else{
                echo "<div class='alert alert-danger text-center' role='alert'> Registration failed. try again</div>";
            }

        }


        }


        }
?>
      
      
            <div class="col-xs-6 col-xs-offset-3">

                <div class="form-wrap">

                <h1>Register</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
