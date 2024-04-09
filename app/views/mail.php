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
    <link rel="icon" href="/php_mail/assets/images/mail_white.png">
    <title>Php Mail</title>
  </head>
  <body>
    <div class="overlay" style="visibility: hidden;"></div>
    <?php require_once $basePath . "app/views/header.php"; ?>
    <?php require_once $basePath . "app/views/compose.php"; ?>
    <div class="main__body" id="mainBody">
        <?php require_once $basePath . "app/views/sidebar.php"; ?>
        <div class="content">
          <div class="emailList" id="inbox">
            <div class="emailList__list">
              <?php require_once $basePath . "app/controllers/inboxCtl.php"; ?>
              <div class="emailContent" style="visibility: hidden;">
                <div class="contentHeader">
                  <button class="return">
                    <span class="material-icons">keyboard_arrow_left</span>
                  </button>
                  <button class="delete">
                    <span class="material-icons">delete</span>
                  </button>
                </div>
                <div class="contentBody">
                  <h2 class="emailContent__message"></h2><br>
                  <div class="mail_info">
                    <h4 class="emailContent__title"></h4>
                    <h5 class="emailContent__time"></h5>
                  </div>
                  <div class="emailContent__body" style="margin-top: 2rem;"></div>
                </div>
              </div>
           </div>
          </div>
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