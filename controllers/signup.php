<?php
// Get the database connection instance
$basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/";
require_once $basePath . "config/php/connect.php";

// Start the session
session_start();

try {
    // Data from the form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $mail = $_POST['newmail'];
    $password = $_POST['newpassword'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement to insert data
    $stmt = $pdo->prepare("INSERT INTO user (fullname_user, username_user, email_user, user_password, inscription_date) 
    VALUES (:fullname, :username, :email, :password, CURDATE())");

    // Bind parameters
    $stmt->bindParam(':fullname', $name);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $mail);
    $stmt->bindParam(':password', $hashed_password);

    // Execute the prepared statement
    $stmt->execute();

    // Store the user informations in session
    $_SESSION['username'] = $username;
    $_SESSION['fullname'] = $name;
    $_SESSION['mail'] = $mail;

    // Redirect back to index.php with success message
    header("Location: ../../php_mail/views/mail.php?signup=true&username=" . urlencode($username));
    exit;
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>