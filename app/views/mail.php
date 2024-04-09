<?php
  $basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/";
  session_start();
  // If we're not logged in redirect to index.php
  if(!isset($_SESSION['username'])){
    header("Location: ../../index.php");
  }
?>

<html>
  <head>
    <link rel="stylesheet" href="/php_mail/assets/css/mail.css" />
    <link rel="stylesheet" href="/php_mail/assets/css/compose.css" />
    <link rel="icon" href="/php_mail/assets/images/mail_white.png" />
    <title>Php Mail</title>
  </head>
  <body>
    <div class="overlay" style="visibility: hidden;"></div>
    <?php require_once $basePath . "app/views/header.php"; ?>
    <?php require_once $basePath . "app/views/compose.php"; ?>
    <div class="main__body" id="mainBody">
      <?php require_once $basePath . "app/views/sidebar.php"; ?>
      <div class="content">
        <?php require_once $basePath . "app/controllers/inboxCtl.php"; ?>
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