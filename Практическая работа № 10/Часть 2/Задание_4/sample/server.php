<?php
session_start();

if (!isset($_SESSION['surname']) || !isset($_SESSION['firstname'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
    
</head>
<body>
    
    <h1>Отправка данных на сервер</h1>
    <h2>Еще о формах</h2>
    <hr>
    
    <div class="result-container">
        <h2>Поздравляем с успешной регистрацией в школе разведчиков</h2>
        
        <h3>Ваши регистрационные данные:</h3>
        
        <div class="result-item">
            <span class="result-label">Фамилия:</span> 
            <?php echo htmlspecialchars($_SESSION['surname'] ?? ''); ?>
        </div>
        <div class="result-item">
            <span class="result-label">Имя:</span> 
            <?php echo htmlspecialchars($_SESSION['firstname'] ?? ''); ?>
        </div>
        <div class="result-item">
            <span class="result-label">Отчество:</span> 
            <?php echo htmlspecialchars($_SESSION['patronymic'] ?? ''); ?>
        </div>
        <div class="result-item">
            <span class="result-label">Должность:</span> 
            <?php echo htmlspecialchars($_SESSION['post'] ?? ''); ?>
        </div>
        <div class="result-item">
            <span class="result-label">Категория:</span> 
            <?php echo htmlspecialchars($_SESSION['category'] ?? ''); ?>
        </div>
        <div class="result-item">
            <span class="result-label">Стаж:</span> 
            <?php echo htmlspecialchars($_SESSION['experience'] ?? ''); ?> лет
        </div>
        
    </div>

    <footer align="center">
    </footer>
    
    <?php
    ?>
    
</body>
</html>