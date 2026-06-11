<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'bd.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Ошибка удаления: " . $stmt->error;
    }
    $stmt->close();
} else {
    header("Location: admin.php");
    exit();
}

$connect->close();
?>