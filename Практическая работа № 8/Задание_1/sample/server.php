<?php
// Проверяем, что скрипт выполняется как обработчик формы
if (isset($_POST["loader"])) {
    echo "<!DOCTYPE html>
    <html lang='ru'>
    <head>
        <meta charset='UTF-8'>
        <title>Результаты формы</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .data-block { margin: 20px 0; padding: 15px; border: 1px solid #ccc; border-radius: 5px; }
            .image { max-width: 300px; margin-top: 10px; }
        </style>
    </head>
    <body>
    <h1>Информация о группе</h1>
    <div class='data-block'>
        <h2>Данные из формы:</h2>";
    
    // Вывод данных из $_POST
    echo "<ul>";
    echo "<li><strong>Название:</strong> " . htmlspecialchars($_POST['name'] ?? 'не указано') . "</li>";
    echo "<li><strong>Алиас:</strong> " . htmlspecialchars($_POST['alias'] ?? 'не указано') . "</li>";
    echo "<li><strong>Страна:</strong> " . htmlspecialchars($_POST['country'] ?? 'не указано') . "</li>";
    echo "<li><strong>Дата основания:</strong> " . htmlspecialchars($_POST['date'] ?? 'не указано') . "</li>";
    echo "<li><strong>Стиль:</strong> " . htmlspecialchars($_POST['style'] ?? 'не указано') . "</li>";
    echo "<li><strong>Контент:</strong> " . htmlspecialchars($_POST['content'] ?? 'не указано') . "</li>";
    echo "</ul>";
    
    // Обработка изображения
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        // Создаем директорию images если её нет
        if (!is_dir('images')) {
            mkdir('images', 0777, true);
        }
        
        // Генерируем уникальное имя файла
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $filename = md5(uniqid()) . '.' . $ext;
        $new_path = __DIR__ . '/images/' . $filename;
        
        // Перемещаем файл
        if (move_uploaded_file($_FILES['image']['tmp_name'], $new_path)) {
            echo "<div class='data-block'>
                    <h2>Файл изображения:</h2>
                    <ul>
                        <li><strong>Оригинальное имя:</strong> " . htmlspecialchars($_FILES['image']['name']) . "</li>
                        <li><strong>Тип файла:</strong> " . htmlspecialchars($_FILES['image']['type']) . "</li>
                        <li><strong>Размер:</strong> " . round($_FILES['image']['size'] / 1024, 2) . " Кб</li>
                    </ul>
                    <img src='images/" . $filename . "' alt='Изображение группы' class='image'>
                  </div>";
        } else {
            echo "<p style='color: red'>Ошибка при сохранении изображения</p>";
        }
    }
    
    echo "</div></body></html>";
} else {
    echo "<h3>Заполните, пожалуйста, форму!</h3>";
}
?>