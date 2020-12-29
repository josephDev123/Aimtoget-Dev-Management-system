
 
 <?php  include "includes/header.php"; ?>
 <?php session_start(); ?>
<!-- Navigation -->
<?php  include "includes/navigation.php"; ?> 
<?php include 'admin/functions.php'; ?>


<section id="login">
    <div class="container">
        <div class="row">
        
        <?php

        if (isset($_POST['new_submit'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username) || empty($password)) {
            echo "<div class='alert alert-danger text-center' role='alert'>Fields are empty. Kindly fill it</div>";
        }else{
            
            if(userLogin($username, $password)){
                header('Location: admin');
            }else{
                header('Location: index.php');
            }
 
        }
    }
?>
      
      
            <div class="col-xs-6 col-xs-offset-3">

                <div class="form-wrap">

                <h1>Login</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                        
                         <div class="form-group">
                            <label for="password" class="">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="new_submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Login">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


<?php include "includes/footer.php";?>