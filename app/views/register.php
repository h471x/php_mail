<?php $basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/"; ?>
<?php require_once $basePath . "config/php/connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php_mail/assets/css/form.css">
    <link rel="icon" href="/php_mail/assets/images/mail_white.png">
    <title id="phpmail_signup"></title>
</head>
<body>
  <div class="container">
    <div class="signup-box">
      <div class="signup-header">
        <p id="signupTitle"></p>
        <div class="status">
          <?php echo $status ?>
          <?php echo $signup_error ?>
        </div>
      </div>
      <!-- Form action points to login -->
      <form action="/php_mail/app/controllers/registerCtl.php" class="login-form" method="post">
        <div class="inputContainer">
          <div class="leftInput">
            <div class="input-box">
              <div class="titleInput">
                <label for="email" id="signup_name"></label>
                <div id="name-error" style="display: none; color: red;"></div>
              </div>
              <input type="text" class="input-field" id="name" name="name" spellcheck="false" autocomplete="off">
              <i class="material-icons">person</i>
            </div>

            <div class="input-box">
              <div class="titleInput">
                <label for="email" id="signup_username"></label>
                <div id="user-error" style="display: none; color: red;"></div>
              </div>
              <input type="text" class="input-field" id="username" name="username" spellcheck="false" autocomplete="off">
              <i class="material-icons">person</i>
              </div>

            <div class="input-box">
              <div class="titleInput">
                <label for="email" id="useremail"></label>
                <div id="email-error" style="display: none; color: red;"></div>
              </div>
              <input type="text" class="input-field" id="signup-email" name="newmail" spellcheck="false" autocomplete="off">
              <i class="bx bx-envelope"></i>
            </div>
          </div>

          <div class="rightInput">
            <div class="input-box">
              <div class="titleInput">
                <label for="pass" id="signup_password"></label>
                <div id="password-error" style="display: none; color: red;"></div>
              </div>
              <input type="password" class="input-field" id="signup-pass" name="newpassword" spellcheck="false">
              <div class="toggle-password">
                <i class="bx bx-show"></i>
              </div>
            </div>

            <div class="input-box">
              <div class="titleInput">
                <label for="pass" id="signup_confirm"></label>
                <div id="confirm-error" style="display: none; color: red;"></div>
              </div>
              <input type="password" class="input-field" id="confirm-pass" name="confirm-password" spellcheck="false">
              <div class="toggle-confirm">
                <i class="bx bx-show"></i>
              </div>
              
            </div>

            <div class="input-box">
              <input type="submit" class="input-submit-signup text" value="" id="signup" style="color: white;">
            </div>
          </div>
        </div> 
      </form>
      <div class="signup-bottom">
        <span id="signup_account"></span>&nbsp;&nbsp;
        <span><a href="/php_mail/app/views/login.php" id="signin_link"></a></span>
      </div>
    </div>
  </div>
  <script src="/php_mail/assets/js/dictionary.js"></script>
  <script src="/php_mail/assets/js/signup.js"></script>
</body>
</html>