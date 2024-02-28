<?php
require_once "./connect.php";

try {
    // Data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO users(username, password) VALUES (:username, :password)");

    // Bind parameters
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    // Execute the statement
    $stmt->execute();

    // Redirect back to index.php with success message
    header("Location: ../../index.php?success=true");
    exit; // Ensure script stops here to prevent further output

    // echo "New record inserted successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close statement
// $stmt->close(); // Ensure to close the statement properly

// Close connection (use $pdo instead of $conn)
$pdo = null;
?>
