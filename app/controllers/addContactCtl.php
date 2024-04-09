<?php
  // Get the database connection instance
  $basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/";
  require_once $basePath . "config/php/connect.php";

  // start the session
  session_start();

  $email_propriate = $_SESSION['mail'];
  $email_contact = $_POST['email_contact'];

  // Check if the contact already exists for the given user
  $stmt = $pdo->prepare("SELECT * FROM contact WHERE email_propriate = :email_propriate AND email_contact = :email_contact");
  $stmt->execute(['email_propriate' => $email_propriate, 'email_contact' => $email_contact]);
  $existingContact = $stmt->fetch();

  // Delete if it is from the contact and add if not
  if ($existingContact) {
    $stmt = $pdo->prepare("DELETE FROM contact WHERE email_propriate = :email_propriate AND email_contact = :email_contact");
    $stmt->execute(['email_propriate' => $email_propriate, 'email_contact' => $email_contact]);
  } else {
    $stmt = $pdo->prepare("INSERT INTO contact (email_propriate, email_contact) VALUES (:email_propriate, :email_contact)");
    $stmt->execute(['email_propriate' => $email_propriate, 'email_contact' => $email_contact]);
  }
?>