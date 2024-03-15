<?php $basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/"; ?>
<?php require_once $basePath . "config/php/connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php_mail/assets/css/login.css">
    <link rel="icon" href="/php_mail/assets/images/mail_white.png">
    <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="box">
      <div class="header">
        <p id="loginTitle">Login to e-mail</p>
        <div class="status">
          <?php echo $status ?>
          <?php echo $error ?>
        </div>
      </div>
      <!-- Form action points to login -->
      <form action="/php_mail/config/php/signin.php" class="login-form" method="post"> 
        <div class="input-box">
          <label for="email">User e-mail</label>
          <input type="text" class="input-field" id="email" name="mail" spellcheck="false" autocomplete="off">
          <i class="bx bx-envelope"></i>
          <div id="email-error" style="display: none; color: red;"></div>
        </div>
        <div class="input-box">
          <label for="pass">Password</label>
          <input type="password" class="input-field" id="pass" name="password" spellcheck="false">
          <div class="toggle-password">
            <i class="bx bx-show"></i>
          </div>
          <div id="password-error" style="display: none; color: red;"></div>
        </div>
        <div class="input-box">
          <input type="submit" class="input-submit text" value="Sign In" style="color: white;">
        </div>
      </form>
      <div class="bottom">
        <span>New to e-mail?</span>&nbsp;&nbsp;
        <span><a href="">Sign Up</a></span>
      </div>
    </div>
    <!-- <div class="wrapper"></div> -->
  </div>
  <script src="/php_mail/assets/js/password.js"></script>
  <script src="/php_mail/assets/js/theme.js"></script>
  <!-- <script src="/php_mail/assets/js/language.js"></script>
  <script src="/php_mail/assets/js/dictionary.js"></script> -->
</body>
</html>