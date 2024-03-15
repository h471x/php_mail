<?php

// Get the database connection instance
require_once "./connect.php";

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
  header("Location: ../../views/mail.php?success=true");
  exit; // Ensure script stops here to prevent further output
}catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
