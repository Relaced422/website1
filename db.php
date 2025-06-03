<?php
$host = 'db'; // Docker servicenaam
$dbname = 'menukaart';
$username = 'admin';
$password = 'admin123';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Verbinding geslaagd!";
} catch (PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}
?>