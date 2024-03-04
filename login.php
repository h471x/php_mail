<?php
  require "./config/php/connect.php";
// Attempt to connect to the database
try {
  // Create a new PDO instance
  // PHP Dtabase Object is more efficient
  // than mysqli or mysql
  // $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

  // Set PDO error mode to exception
  //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


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

  // Set the message if connected successfully
  $message = '<h1>Connected</h1>';
} catch (PDOException $e) {
  // Set an error message if connection fails
  $message = "Connection failed: " . $e->getMessage();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/boxicons.min.css">
    <link rel="stylesheet" href="./assets/css/login_style.css">
    <title>Login</title>
</head>
<body>
      
    <div class="container">
       <div class="box">
    <div class="header">
        <p>Log In to e-mail</p>
        <h4>Connection : <?php echo $message ?></h4>
    </div>
    <form action="./config/php/login.php" method="post"> 
        <!-- Form action points to login_process.php -->
        <div class="input-box">
            <label for="email">E-Mail</label>
            <input type="email" class="input-field" id="email" name="username" required> <!-- Corrected name attribute to "email" -->
            <i class="bx bx-envelope"></i>
        </div>
        <div class="input-box">
            <label for="pass">Password</label>
            <input type="password" class="input-field" id="pass" name="password" required>
            <i class="bx bx-lock"></i>
        </div>
        <div class="input-box">
            <input type="submit" class="input-submit" value="SIGN IN">
        </div>
    </form>
    <div class="bottom">
        <span><a href="#">Sign Up</a></span>
        <span><a href="#">Forgot Password?</a></span>
    </div>
</div>

       <div class="wrapper"></div>
    </div>

    <script src="./assets/js/success.js"></script>

</body>
</html>
