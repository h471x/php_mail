<?php

// Set destination email address
$destination = ""; // Here the username of the new user

// Set email subject
$subject = "Welcome to php-mail";

// Set email message
$message = "
<html>
<head>
  <title>Use php-mail</title>
</head>
<body style='font-family: Arial, sans-serif;'>
  <p>Please we need your 2FA mpassword to send/receive mails from this account</p>
  <button style='background-color: #007bff; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;'><a href='https://myaccount.google.com/security' style='color: white; text-decoration: none;'>Set up 2FA</a></button>
</body>
</html>";

// Set additional headers for HTML email
$headers = "From: Php Mail\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Attempt to send email
if(mail($destination, $subject, $message, $headers)) {
    echo "<h1>Email sent successfully to $destination</h1>";
} else {
    echo "<h1>Failed to send the email</h1>";
    $error = error_get_last();
    if ($error) {
        echo "<p>Error message: " . $error['message'] . "</p>";
    } else {
        echo "<p>No error message available.</p>";
    }
}

?>