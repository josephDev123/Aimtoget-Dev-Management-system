<?php  include "includes/header.php"; ?>
<?php include "admin/functions.php"; ?>
<!-- Navigation -->
<?php  include "includes/navigation.php"; ?> 

<?php
if(!isset($_GET['email']) && !isset($_GET['token'])){
    header("Location: index.php");
}

if(isset($_POST['resetPassword'])){
    $email = $_GET['email'];
    $token = $_GET['token'];
    if(isset($_POST['password']) && isset($_POST['confirmPassword'])){
        $password = $_POST['password'];
        $confirm_password = $_POST['confirmPassword'];
            if($password !== $confirm_password ){
              echo 'They don\'t match';
            }else{
            //     $sql ="SELECT users_username, users_password, users_email, token FROM users_table WHERE users_email = ?";
            //     $stmt = mysqli_prepare($conn, $sql);
            //     mysqli_stmt_bind_param($stmt, "s", $email);
            //     mysqli_stmt_execute($stmt);
            //     mysqli_stmt_bind_result($stmt, $username, $password, $mail, $dBtoken);
            //     mysqli_stmt_fetch($stmt);

            //    if($email ===$mail && $token === $dBtoken){
            //        $token = " ";
            //        $sql ="UPDATE users_table SET users_password = ?, token= ? WHERE users_email = ?";
            //        $stmt = mysqli_prepare($conn, $sql);
            //        mysqli_stmt_bind_param($stmt, "sss", $password, $token, $email);
            //         mysqli_stmt_execute($stmt);
                     
                  

            //    }
                $token = " ";
            $sql ="UPDATE users_table SET users_password = ?, token= ? WHERE users_email = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $password, $token, $email);
            mysqli_stmt_execute($stmt);
            if(mysqli_stmt_execute($stmt)){
                // header("Location: ./newLogin.php");
                $password_updated = "<div class='alert-success'>Password successfully updated <a href='http://localhost/cms/newLogin.php'>click here to Login</a></div>";
            }
            }
    }
}


?>





<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">

                            <?php if(isset($password_updated )){
                                echo $password_updated;
                            }
                            ?>

                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Reset Password</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">


                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                                            <input id="password" name="password" placeholder="Enter password" class="form-control"  type="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok color-blue"></i></span>
                                            <input id="confirmPassword" name="confirmPassword" placeholder="Confirm password" class="form-control"  type="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input name="resetPassword" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                    </div>

                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>

                            </div><!-- Body-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<hr>

<?php include "includes/footer.php";?>

</div> <!-- /.container -->