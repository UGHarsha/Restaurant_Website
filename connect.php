<?php

$host = 'localhost';
$db   = 'food_db';
$user = 'root';
$pass = '';

$db_name = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $conn = new PDO($db_name, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("DB Connection failed: " . $e->getMessage());
    die("Something went wrong. Please try again later.");
}

?>











