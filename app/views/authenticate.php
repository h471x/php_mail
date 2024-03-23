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
  <title id="phpmail_auth"></title>
</head>
<body>
  <div class="container">
    <div class="auth-box">
      <div class="header">
        <p id="authTitle"></p>
        <div class="status">
          <?php echo $status ?>
          <?php echo $auth_error ?>
        </div>
      </div>
      <!-- Form action points to authenticate -->
      <form action="/php_mail/app/controllers/registerCtl.php" class="login-form" method="post">
          <br><div class="input-box">
            <div class="description" style="text-align: center;">
              <span id="auth_desc_title"></span>
              <span id="auth_desc"></span>
            </div>
          </div>
          <div class="bottom">
            <span id="mail_auth"></span>&nbsp;&nbsp;
            <span><a href="/php_mail/app/controllers/resendAuth.php" id="resend_link"></a></span>
          </div><br>
          <div class="input-box">
              <div class="titleInput">
                  <label for="pass" id="auth_password"></label>
                  <div id="auth-error" style="display: none; color: red;"></div>
              </div>
              <input type="password" class="input-field" id="auth_pass" name="two_factor" spellcheck="false" maxlength="16">
              <div class="toggle-auth">
                  <i class="bx bx-show"></i>
              </div>
          </div>
          <div class="input-box">
              <input type="submit" class="input-submit text" value="" id="auth_btn" style="color: white;">
          </div>
      </form>
  </div>
  <script src="/php_mail/assets/js/dictionary.js"></script>
  <script src="/php_mail/assets/js/authenticate.js"></script>
</body>
</html>