<?php $basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/"; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/php_mail/assets/css/mail.css" />
    <link rel="stylesheet" href="/php_mail/assets/css/compose.css" />
    <link rel="icon" href="/php_mail/assets/images/mail_white.png">
    <title>Php Mail</title>
  </head>
  <body>
    <?php require_once $basePath . "views/header.php"; ?>
    <?php require_once $basePath . "views/compose.php"; ?>
    <div class="main__body" id="mainBody">
      <?php require_once $basePath . "views/sidebar.php"; ?>
      <div class="content">
        <?php require_once $basePath . "controllers/inbox.php"; ?>
      </div>
    </div>
  </body>
  <script src="/php_mail/assets/js/dictionary.js"></script>
  <!-- <script src="/php/mail/assets/js/header.js"></script> -->
  <script src="/php_mail/assets/js/sidebar.js"></script>
  <script src="/php_mail/assets/js/logout.js"></script>
  <script src="/php_mail/assets/js/mail.js"></script>
  <script src="/php_mail/assets/js/theme.js"></script>
  <script src="/php_mail/assets/js/compose.js"></script>
</html>
