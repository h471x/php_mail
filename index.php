<?php
// Get the database connection instance
$basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/";
require_once $basePath . "config/php/connect.php";

// Check if there are any users in the user table
$stmt = $pdo->query("SELECT COUNT(*) FROM user");
$userCount = $stmt->fetchColumn();

// If there are no users, redirect to register.php
if ($userCount === 0) {
    header("Location: ../../php_mail/views/register.php");
    exit;
} else {
    // If there are users, redirect to signin.php
    header("Location: ../../php_mail/views/login.php");
    exit;
}

// Close the connection
$pdo = null;
?>
