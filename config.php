<?php
$host = 'localhost';
$db = 'lonely'; // Your database name
$user = 'root'; // Your database username
$password = ''; // Password (leave blank for XAMPP default)

$dsn = "mysql:host=".$host.";dbname=".$db.";charset=UTF8";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
