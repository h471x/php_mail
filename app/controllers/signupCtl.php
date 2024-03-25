<?php
  // Start the session
  session_start();

  // Store form data in session variables
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['mail'] = $_POST['newmail'];
  $_SESSION['hashed_password'] = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);

  // Set destination email address
  $destination = $_POST['newmail'];
  $name = $_POST['name'];

  // Set email subject
  $subject = "Bienvenue sur php-mail";

  // Set email message
  $message = "
  <html>
  <head>
    <title>Utiliser php-mail</title>
  </head>
  <body style='font-family: Arial, sans-serif;'>
    <p style='font-size: 16px;'>Salutations $name,</p>
    <p style='margin-bottom: 0; font-size: 16px;'>
      Nous avons besoin de votre 
      <span style='text-decoration: underline;color:#007bff ;'>code d'authentification à 2 facteurs</span>
      <br> pour envoyer et recevoir des mails via votre nouveau compte.<br>
      Veuiller le 
      <span style='text-decoration: underline;color:#007bff ;'>coller sur le formulaire</span> 
      de php-mail afin de terminer votre inscription.
    </p><br>
    <button id='2faButton'
        style='background-color: #007bff; border: none; color: white; padding: 10px 20px;
                    text-align: center; text-decoration: none; display: inline-block; font-size: 16px;
                    margin: 8px 2px; cursor: pointer;'>
          <a href='https://myaccount.google.com/security?authuser=$destination'
             style='color: white; text-decoration: none;'>
             Obtenir 2FA
          </a>
        </button>
  </body>
  </html>";

  // Set additional headers for HTML email
  $headers = "From: Php Mail\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

  // Attempt to send email
  if(mail($destination, $subject, $message, $headers)) {
    header("Location: /php_mail/app/views/authenticate.php");
    exit;
  } else {
      header("Location: /php_mail/app/views/authenticate.php?authentification=false&" . error_get_last());
  }
?>
