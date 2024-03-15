<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/font.css"/>
    <link rel="stylesheet" href="../assets/css/mail.css" />
    <link rel="icon" href="../assets/images/mail_white.png">
    <title>Php Mail</title>
  </head>
  <body>
    <iframe src="../controllers/inbox.php" class="iframe" frameborder="0"></iframe>
    <?php require_once "./header.php"; ?>
    <div class="main__body">
      <?php require_once "./sidebar.php"; ?>
      <?php require_once "../controllers/inbox.php" ?>
    </div>
  </body>
  <script src="../assets/js/theme.js"></script>
  <script src="../assets/js/sidebar.js"></script>
  <script src="../assets/js/logout.js"></script>
  <script src="../assets/js/dictionary.js"></script>
  <script src="../assets/js/language.js"></script>
  <script src="../assets/js/inbox.js"></script>
</html>
