<?php
  $basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/";
  require_once $basePath . 'config/php/config.php';

  try {
    // Create a new PDO instance
    $pdo = new PDO($database, $username, $password, $options);

    //  Create Database
     $pdo->exec($mail_database);

    // Create users table
    $pdo->exec($user);

    // Set the message if connected successfully
    $status = '<div class="status connected"></div>';
    $error = '<span class="tooltip">Connected</span>';
  } catch (PDOException $e) {
    // Default error handling
    $status = '<div class="disconnected"></div>';
    $error = '<span class="tooltip">Server Issue</span>';
    $error_message = addslashes($e->getMessage());

    // Check for specific error conditions and update variables accordingly
    if (strpos($error_message, 'SQLSTATE[HY000] [2002]') !== false) {
        $status = '<div class="status disconnected"></div>';
        $error = '<span class="tooltip">Disconnected</span>';
        $error_message = "SQL Server is not running.";
    } elseif (strpos($error_message, 'Access denied') !== false) {
        $status = '<div class="status wrong"></div>';
        $error = '<span class="tooltip">Access Denied</span>';
        $error_message = "Wrong Database Credentials.";
    }
    echo '<script>console.error("Error !! ' . $error_message . '");</script>';
  }
?>
