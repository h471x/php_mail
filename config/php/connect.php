<?php
// Database credentials

// $host = 'localhost';
// $dbname = 'mail';
$DB_DSN = "mysql:host=localhost;dbname=mail";
$username = 'root';
$password = '#sudorshacker88';
// Attempt to connect to the database
try {
  // Create a new PDO instance
  // PHP Dtabase Object is more efficient
  // than mysqli or mysql
  // $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

  // Set PDO error mode to exception
  // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  //RSH VERSION 
  $option=
  [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', /*Set up the encodage used in php */
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,// Set PDO error mode to exception
    PDO::ATTR_EMULATE_PREPARES => false, /*No emulation of Query*/
  ];
  $pdo=new PDO($DB_DSN,$username,$password,$option);

  // Create the database if it doesn't exist
  $pdo->exec("CREATE DATABASE IF NOT EXISTS mail");

  // Select the database
  $pdo->exec("USE mail");

  // Create users table
  $pdo->exec("CREATE TABLE IF NOT EXISTS users (
              id INT AUTO_INCREMENT PRIMARY KEY,
              userame VARCHAR(50) NOT NULL,
              password VARCHAR(255) NOT NULL)");

  // // Set the message if connected successfully
  $message = '<h1>Connected</h1>';
} catch (PDOException $e) {
  // Set an error message if connection fails
  $message = "Connection failed: " . $e->getMessage();
}

?>
