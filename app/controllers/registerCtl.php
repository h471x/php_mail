<?php
// Get the database connection instance
$basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/";
require_once $basePath . "config/php/connect.php";

// Start the session
session_start();

try {
    // Retrieve form data from session variables
    $name = $_SESSION['name'];
    $username = $_SESSION['username'];
    $mail = $_SESSION['mail'];
    $hashed_password = $_SESSION['hashed_password'];
    $two_factor_raw = $_POST['two_factor'];

    // Regular expression pattern to match the format "xxxx xxxx xxxx"
    $pattern = '/^\d{4} \d{4} \d{4}$/';
    
    // Check if the input matches the specified format
    if (preg_match($pattern, $two_factor_raw)) {
        $two_factor = str_replace(' ', '', $two_factor_raw);
    } else {
        $two_factor = $two_factor_raw;
    }

    // Prepare the SQL statement to insert data
    $stmt = $pdo->prepare("INSERT INTO user (fullname_user, username_user, email_user, user_password, 2fa_password, inscription_date) 
    VALUES (:fullname, :username, :email, :password, :2fa, CURDATE())");

    // Bind parameters
    $stmt->bindParam(':fullname', $name);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $mail);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':2fa', $two_factor);

    // Execute the prepared statement
    $stmt->execute();

    // Store the user informations in session
    $_SESSION['username'] = $username;
    $_SESSION['fullname'] = $name;
    $_SESSION['mail'] = $mail;

    // Redirect back to index.php with success message
    header("Location: ../../app/views/mail.php?signup=true&username=" . urlencode($username));
    exit;
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>