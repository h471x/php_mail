<?php $basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/"; ?>
<?php require_once $basePath . "config/php/connect.php"; ?>
<?php session_destroy(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php_mail/assets/css/form.css">
    <link rel="icon" href="/php_mail/assets/images/mail_white.png">
    <title id="phpmail_signin"></title>
</head>
<body>
  <div class="container">
    <div class="box">
      <div class="header">
        <p id="loginTitle"></p>
        <div class="status">
          <?php echo $status ?>
          <?php echo $error ?>
        </div>
      </div>
      <!-- Form action points to login -->
      <form action="/php_mail/app/controllers/signinCtl.php" class="login-form" method="post">
          <div class="input-box">
              <div class="titleInput">
                  <label for="email" id="useremail"></label>
                  <label for="email" id="username" style="visibility: hidden;"></label>
                  <div id="email-error" style="display: none; color: red;"></div>
              </div>
              <input type="text" class="input-field" id="email" name="email" spellcheck="false" autocomplete="off">
              <div class="toggle-user">
                <i class="bx bx-envelope"></i>
              </div>
          </div>
          <div class="input-box">
              <div class="titleInput">
                  <label for="pass" id="signin_password"></label>
                  <div id="password-error" style="display: none; color: red;"></div>
              </div>
              <input type="password" class="input-field" id="pass" name="password" spellcheck="false">
              <div class="toggle-password">
                  <i class="bx bx-show"></i>
              </div>
          </div>
          <div class="input-box">
              <input type="submit" class="input-submit text" value="" id="login_signin" style="color: white;">
          </div>
      </form>

      <div class="bottom">
        <span id="new_user"></span>&nbsp;&nbsp;
        <span><a href="/php_mail/app/views/register.php" id="signup_link"></a></span>
      </div>
    </div>
    <!-- <div class="wrapper"></div> -->
  </div>
  <script src="/php_mail/assets/js/dictionary.js"></script>
  <script src="/php_mail/assets/js/signin.js"></script>
</body>
</html>
