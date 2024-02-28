<?php
// Database credentials
$host = 'localhost';
$dbname = 'mail';
$username = 'emailAdmin';
$password = 'rootemail';

// Attempt to connect to the database
try {
  // Create a new PDO instance
  // PHP Dtabase Object is more efficient
  // than mysqli or mysql
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

  // Set PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Set the message if connected successfully
  $message = '<h1>Connected</h1>';
} catch (PDOException $e) {
  // Set an error message if connection fails
  $message = "Connection failed: " . $e->getMessage();
}
?>
