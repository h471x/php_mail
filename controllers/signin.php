<?php
  // Get the database connection instance
  $basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/";
  require_once $basePath . "config/php/connect.php";

  try{
    // Data from the form
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO user(mail, password) VALUES (:mail, :password)");

    // Bind parameters
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':password', $password);

    // Execute the statement
    $stmt->execute();

    // Redirect back to index.php with success message
    header("Location: ../../php_mail/views/mail.php?success=true");
    exit; // Ensure script stops here to prevent further output
  }catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  // Close the connection
  $pdo = null;
?>