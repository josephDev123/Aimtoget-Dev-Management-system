<?php  include "includes/header.php"; ?>
<?php include "admin/functions.php"; ?>
<!-- Navigation -->
<?php  include "includes/navigation.php"; ?> 
<?php 
// Load Composer's autoloader
 require 'vendor/autoload.php';
include "vendor/phpmailer/phpmailer/src/PHPMailer.php";
include "classes/mailtrapclass.php";
 // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\SMTP;
     use PHPMailer\PHPMailer\Exception;

 ?> 


<?php 
    if(!isset($_GET['forget'])){
        header("Location: index.php");
    }

    if(isset($_POST['recover-submit'])){
        if(isset($_POST['email'])){
            if(isEmail($_POST['email'])){
                $email = $_POST['email'];
                //Generate a random string.
                $token = openssl_random_pseudo_bytes(16);
                
                //Convert the binary data into hexadecimal representation.
                $token = bin2hex($token);
           
              $sql ="UPDATE users_table SET token = ? WHERE users_email = ?";
              $stmt =mysqli_prepare($conn, $sql);
              mysqli_stmt_bind_param($stmt, "ss", $token, $email);
              mysqli_stmt_execute($stmt);

              
              // Instantiation and passing `true` enables exceptions
              $mail = new PHPMailer(true);
          
              
              try {
                  //Server settings
                  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                  $mail->isSMTP();                                            // Send using SMTP
                  $mail->Host       = Mailtrapcredential::HOST;                   // Set the SMTP server to send through
                  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                  $mail->Username   = Mailtrapcredential::USERNAME;           // SMTP username
                  $mail->Password   =  Mailtrapcredential::PASSWORD;          // SMTP password
                  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                  $mail->Port       = Mailtrapcredential::PORT;           // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
              
                  //Recipients
                  $mail->setFrom('josephuzuegbu55@gmail.com', 'Mailer');
                  $mail->addAddress($email, 'Joe User');     // Add a recipient
                //   $mail->addAddress('ellen@example.com');               // Name is optional
                //   $mail->addReplyTo('info@example.com', 'Information');
                //   $mail->addCC('cc@example.com');
                //   $mail->addBCC('bcc@example.com');
              
            
                  // Content
                  $mail->isHTML(true);                                  // Set email format to HTML
                  $mail->Subject = 'Rest Password by clicking the link';
                  $mail->Body    = "<p><a href='http://localhost/cms/reset.php?email={$email}&&token={$token}'>Click here to reset your Password </a></p>";
                //   $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
              
                  $mail->send();
                //   echo 'Message has been sent';
                $emailSent = true;
              } catch (Exception $e) {
                  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
              }
              



            }
        }   
        
    }


?>



<!-- Page Content -->
<div class="container">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">

                        <?php
                            if(!isset($emailSent)){

                                ?>
                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Forgot Password?</h2>
                                <p>You can reset your password here.</p>
                                <div class="panel-body">

                                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Confirm Email" type="submit">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
                                    </form>

                                </div><!-- Body-->
                                <?php

                            }else{
                                ?>
                                <h2>Please check your email</h2>

                                <?php
                            }
                               
?>
                                

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <?php include "includes/footer.php";?>

</div> <!-- /.container -->