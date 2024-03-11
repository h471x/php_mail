<?php

// Database credentials
// Here we don't specify the database name
// so we will use a custom one for our own
$database = "mysql:host=localhost";
$username = 'root';
$password = '';

// Set PDO options
$options = [
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_EMULATE_PREPARES => false,
];

// Set the Sql files for tables
/* $sql = file_get_contents(__DIR__ . '/sql/tables.sql'); */

?>
