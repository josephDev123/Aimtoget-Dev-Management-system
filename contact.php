
<?php session_start();  ?>

<!-- header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/Navigation.php'; ?>

<?php

if (isset($_POST['contact-btn'])) {

  $subject = $_POST['subject'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $result = '';
  $to = 'josephuzuegbu55@gmail.com';
  $header = 'from: '.$email;

  if (empty($subject) || empty($email) || empty($message)) {
    $result .= '<div class=\'alert alert-danger\'>Field must not be empty</div>';
  }else{
    // mail($to, $message, $subject,   $header);
    
    $result .= '<div class=\'alert alert-success\'>Mail sent</div>';
  }


}


?>



<div class="col-xs-6 col-xs-offset-3">
<?php echo isset($result)? $result: null?>
  <div class="form-wrap">
  <h2>Contact us</h2>
    <form method='POST'>

      <div class="form-group">
          <label for="subject">Subject</label>
          <input type="text" class="form-control" name='subject' id="subject" aria-describedby="subjectHelp">
          
        </div>

       <div class="form-group">
          <label for="Email">Email address</label>
          <input type="email" class="form-control"  name='email' id="Email" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div>

        <div class="form-group">
          <label for="message">Message</label>
          <textarea class='form-control' name="message" id="message" cols="30" rows="10"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your message with anyone else.</small>
        </div>

        <button type="submit" class="btn btn-primary" name='contact-btn'>Submit</button>

    </form>
  </div>

</div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
  <?php include 'includes/footer.php'; ?>