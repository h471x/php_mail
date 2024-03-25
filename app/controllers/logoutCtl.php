<?php
  // Start the session
  session_start();

  // Unset the credentials if set
  if (isset($_SESSION['username'])) {
      unset($_SESSION['username']);
  }

  // Redirect to login page
  header("Location: /php_mail/app/views/login.php");
?>