<?php
if (isset($_POST["loader"])) {
    
    echo "<!DOCTYPE html>
    <html lang='ru'>
    <head>
        <meta charset='UTF-8'>
        <title>Данные пользователя</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .user-card { 
                border: 2px solid #333; 
                border-radius: 10px; 
                padding: 20px; 
                max-width: 500px;
                margin: 0 auto;
            }
            .user-info { margin: 15px 0; }
            .label { font-weight: bold; color: #555; }
            .avatar { text-align: center; margin-bottom: 20px; }
            .avatar img { max-width: 200px; border-radius: 50%; }
        </style>
    </head>
    <body>
    <div class='user-card'>
        <div class='avatar'>";
    

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {

        if (!is_dir('images')) {
            mkdir('images', 0777, true);
        }
        
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $filename = md5(uniqid()) . '.' . $ext;
        $new_path = __DIR__ . '/images/' . $filename;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $new_path)) {
            echo "<img src='images/" . $filename . "' alt='Фото пользователя'>";
        } else {

            echo "<img src='images/placeholder.png' alt='Нет фото' onerror=\"this.src='https://via.placeholder.com/200?text=No+Photo'\">";
        }
    } else {

        echo "<img src='images/placeholder.png' alt='Нет фото' onerror=\"this.src='https://via.placeholder.com/200?text=No+Photo'\">";
    }
    
    echo "</div>";
    
    echo "<div class='user-info'>
            <p><span class='label'>Фамилия:</span> " . htmlspecialchars($_POST['surname'] ?? 'не указано') . "</p>
            <p><span class='label'>Имя:</span> " . htmlspecialchars($_POST['name'] ?? 'не указано') . "</p>
            <p><span class='label'>Отчество:</span> " . htmlspecialchars($_POST['patronymic'] ?? 'не указано') . "</p>
            <p><span class='label'>Должность:</span> " . htmlspecialchars($_POST['post'] ?? 'не указано') . "</p>
            <p><span class='label'>Категория:</span> " . htmlspecialchars($_POST['category'] ?? 'не указано') . "</p>
            <p><span class='label'>Стаж в техникуме:</span> " . htmlspecialchars($_POST['experience_college'] ?? 'не указано') . " лет</p>
          </div>";
    
    echo "</div></body></html>";
    
} else {
    echo "<h3>Заполните, пожалуйста, форму!</h3>";
}
?>