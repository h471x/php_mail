<?php
  // Get the database connection instance
  $basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/";
  require_once $basePath . "config/php/connect.php";

  // start the session
  session_start();

  $email_propriate = $_SESSION['mail'];
  $email_contact = $_POST['email_contact'];

  echo "<h1>To : ". $email_contact .", from " . $email_propriate ."</h1>";
?>