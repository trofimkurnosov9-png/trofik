<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$password = "12345678"; // Для Linux, для Windows оставьте ""
$database = "users_db";

// Создаем подключение
$connect = new mysqli($host, $user, $password);

if ($connect->connect_error) {
    die("Ошибка подключения: " . $connect->connect_error);
}

// Создаем БД если не существует
$connect->query("CREATE DATABASE IF NOT EXISTS $database");
$connect->select_db($database);

// Создаем таблицу если не существует
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    login VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

if (!$connect->query($sql)) {
    echo "Ошибка создания таблицы: " . $connect->error;
}
?>