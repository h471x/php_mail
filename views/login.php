<?php require "./config/php/connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/icons.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="icon" href="./assets/images/mail_white.png">
    <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="box">
      <div class="header">
        <p>Log In to e-mail</p>
        <h4>Connection : <?php echo $message ?></h4>
      </div>
      <!-- Form action points to login -->
      <form action="config/php/signin.php" method="post"> 
        <div class="input-box">
          <label for="email">E-Mail</label>
          <input type="email" class="input-field" id="email" name="mail" required>
          <i class="bx bx-envelope"></i>
        </div>
        <div class="input-box">
          <label for="pass">Password</label>
          <input type="password" class="input-field" id="pass" name="password" required>
          <i class="bx bx-lock"></i>
        </div>
        <div class="input-box">
          <input type="submit" class="input-submit" value="SIGN IN">
        </div>
      </form>
      <div class="bottom">
        <span><a href="#">Sign Up</a></span>
        <span><a href="#">Forgot Password?</a></span>
      </div>
    </div>
    <!-- <div class="wrapper"></div> -->
  </div>
</body>
</html>
