<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "ankieta";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("blad: " . $e->getMessage());
}
