<?php
// Проверяем, что скрипт выполняется как обработчик формы
if (isset($_POST["loader"])) {
    
    echo "<!DOCTYPE html>
    <html lang='ru'>
    <head>
        <meta charset='UTF-8'>
        <title>Результат загрузки</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .error { color: red; font-weight: bold; }
            .success { color: green; font-weight: bold; }
        </style>
    </head>
    <body>
    <h1>Результат загрузки файла</h1>";
    
    // Проверяем наличие файла
    if (isset($_FILES['myfile'])) {
        
        // Выводим информацию об ошибке для диагностики
        echo "<p><strong>Код ошибки:</strong> " . $_FILES['myfile']['error'] . "</p>";
        
        switch ($_FILES['myfile']['error']) {
            case UPLOAD_ERR_OK:
                echo "<p class='success'>Файл успешно загружен!</p>";
                
                // Создаем директорию upload если её нет
                if (!is_dir('upload')) {
                    mkdir('upload', 0777, true);
                }
                
                $filename = basename($_FILES['myfile']['name']);
                $new_path = __DIR__ . '/upload/' . $filename;
                
                if (move_uploaded_file($_FILES['myfile']['tmp_name'], $new_path)) {
                    echo "<p>Файл сохранён как: <strong>" . htmlspecialchars($filename) . "</strong></p>";
                } else {
                    echo "<p class='error'>Ошибка при перемещении файла</p>";
                }
                break;
                
            case UPLOAD_ERR_INI_SIZE:
                echo "<p class='error'>Ошибка 1: Размер файла превышает upload_max_filesize в php.ini</p>";
                break;
                
            case UPLOAD_ERR_FORM_SIZE:
                echo "<p class='error'>Ошибка 2: Размер файла превышает MAX_FILE_SIZE указанный в форме</p>";
                break;
                
            case UPLOAD_ERR_PARTIAL:
                echo "<p class='error'>Ошибка 3: Файл загружен частично</p>";
                break;
                
            case UPLOAD_ERR_NO_FILE:
                echo "<p class='error'>Ошибка 4: Файл не выбран</p>";
                break;
                
            default:
                echo "<p class='error'>Неизвестная ошибка загрузки (код: " . $_FILES['myfile']['error'] . ")</p>";
                break;
        }
    } else {
        echo "<p class='error'>Файл не был отправлен</p>";
    }
    
    echo "</body></html>";
} else {
    echo "<h3>Заполните, пожалуйста, форму!</h3>";
}
?>