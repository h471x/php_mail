<?php
require_once "./connect.php";
/*Class user */

try {
    // Data from the form
    $mail = $_POST['username'];
    $password = $_POST['password'];
    // echo $mail.$password;

    // // Prepare SQL statement
    $stmt = $pdo->prepare("SELECT mail FROM user WHERE password=:password");

    // Bind parameters
    // $stmt->bindParam(':username', $mail);
    $stmt->bindParam(':password', $password);
    //
    // // Execute the statement
    $stmt->execute();
    // echo "<pre>";
    // print_r($stmt->fetch(PDO::FETCH_ASSOC))
    // echo "</pre>";
    //
    // // Redirect back to index.php with success message
    // // header("Location: ../../index.php?success=true");
    // // exit; // Ensure script stops here to prevent further output
    //
    // // echo "New record inserted successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close statement
// $stmt->close(); // Ensure to close the statement properly

// Close connection (use $pdo instead of $conn)
$pdo = null;
?>
