<?php
// Database configuration
$host = 'localhost';
$dbname = 'poll';
$user = 'root';
$password = 'root';

// Connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch (PDOException $e) {
    die("Failed to connect to the database: " . $e->getMessage());
}
