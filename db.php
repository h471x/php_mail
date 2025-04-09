<?php
$database = "mysql:host=localhost;dbname=mail";
$username = 'phpmail';
$password = 'mail';

try {
    $pdo = new PDO($database, $username, $password);
    // Set error mode to exception to catch errors properly
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h1>Database connected successfully</h1>";
} catch (PDOException $e) {
    echo "<h1>Error: " . htmlspecialchars($e->getMessage()) . "</h1>";
}
