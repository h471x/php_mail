<?php
// Get the database connection instance
$basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/";
require_once $basePath . "config/php/connect.php";

// Start the session
session_start();

try {
    // Data from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $stmt = $pdo->prepare("SELECT * FROM user WHERE email_user = :email");

    // Bind parameters
    $stmt->bindParam(':email', $email);

    // Execute the statement
    $stmt->execute();

    // Fetch the user record
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify if user exists and password matches
    if ($user && password_verify($password, $user['user_password'])) {
        // Store the username in session
        $_SESSION['username'] = $user['username_user'];
        // Redirect to success page with username
        header("Location: ../../php_mail/views/mail.php?success=true&username=" . urlencode($user['username_user']));
        exit;
    } else {
        // Redirect to login page with error message
        $error_message = "InvalidCredentials";
        header("Location: ../../php_mail/views/login.php?error=$error_message");
        exit;
    }
} catch (PDOException $e) {
    // Send error message to browser console
    echo "<script>console.error('Database Error: " . $e->getMessage() . "');</script>";

    // Redirect to login page with generic error message
    $error_message = "DatabaseError";
    header("Location: ../../php_mail/views/login.php?error=$error_message");
    exit;
}

// Close the connection
$pdo = null;
?>
