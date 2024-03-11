<?php

// include the database configurations
require_once 'config.php';

try {
  // Create a new PDO instance
  $pdo = new PDO($database, $username, $password, $options);

  // Create the database if it doesn't exist
  $pdo->exec("CREATE DATABASE IF NOT EXISTS mail");

  // Select the database
  $pdo->exec("USE mail");

  // Create users table
  $pdo->exec("CREATE TABLE IF NOT EXISTS user (
              user_id INTEGER PRIMARY KEY AUTO_INCREMENT,
              name VARCHAR(50),
              firstName VARCHAR(60),
              mail VARCHAR(100) NOT NULL,
              password VARCHAR(20) NOT NULL)");

  // Set the message if connected successfully
  $message = '<h1>Connected</h1>';
} catch (PDOException $e) {
  // Set an error message if connection fails
  $message = "Connection failed: " . $e->getMessage();
}

?>
