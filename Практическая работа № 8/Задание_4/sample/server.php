<?php

if (isset($_POST["loader"])) {
    
    echo "<!DOCTYPE html>
    <html lang='ru'>
    <head>
        <meta charset='UTF-8'>
        <title>Результат множественной загрузки</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .success { color: green; }
            .gallery { display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px; }
            .gallery-item { border: 1px solid #ccc; padding: 10px; border-radius: 5px; text-align: center; }
            .gallery-item img { max-width: 200px; max-height: 150px; }
        </style>
    </head>
    <body>
    <h1>Результат загрузки файлов</h1>";
    

    if (!is_dir('upload')) {
        mkdir('upload', 0777, true);
    }
    
    $uploaded_files = [];
    
    if (isset($_FILES['myfile'])) {
        
        $file_count = count($_FILES['myfile']['name']);
        
        for ($i = 0; $i < $file_count; $i++) {

            if ($_FILES['myfile']['error'][$i] == UPLOAD_ERR_OK && $_FILES['myfile']['size'][$i] > 0) {
                
                $original_name = $_FILES['myfile']['name'][$i];
                $tmp_path = $_FILES['myfile']['tmp_name'][$i];

                $ext = pathinfo($original_name, PATHINFO_EXTENSION);
                $new_filename = md5(uniqid() . $original_name) . '.' . $ext;
                $new_path = __DIR__ . '/upload/' . $new_filename;
                
  
                if (move_uploaded_file($tmp_path, $new_path)) {
                    $uploaded_files[] = [
                        'original' => $original_name,
                        'saved_as' => $new_filename,
                        'size' => $_FILES['myfile']['size'][$i]
                    ];
                    echo "<p class='success'>✓ Файл '" . htmlspecialchars($original_name) . "' успешно загружен</p>";
                } else {
                    echo "<p style='color: red'>✗ Ошибка при сохранении файла '" . htmlspecialchars($original_name) . "'</p>";
                }
            } elseif ($_FILES['myfile']['error'][$i] != UPLOAD_ERR_NO_FILE) {
                echo "<p style='color: red'>✗ Ошибка загрузки файла #" . ($i+1) . " (код: " . $_FILES['myfile']['error'][$i] . ")</p>";
            }
        }
 
        if (count($uploaded_files) > 0) {
            echo "<h2>Галерея загруженных изображений:</h2>";
            echo "<div class='gallery'>";
            foreach ($uploaded_files as $file) {

                $ext = strtolower(pathinfo($file['saved_as'], PATHINFO_EXTENSION));
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    echo "<div class='gallery-item'>
                            <img src='upload/" . $file['saved_as'] . "' alt='" . htmlspecialchars($file['original']) . "'>
                            <p>" . htmlspecialchars($file['original']) . "</p>
                          </div>";
                } else {
                    echo "<div class='gallery-item'>
                            <p>📄 " . htmlspecialchars($file['original']) . "</p>
                            <small>(" . round($file['size'] / 1024, 2) . " Кб)</small>
                          </div>";
                }
            }
            echo "</div>";
        }
        
        echo "<p><strong>Всего загружено файлов:</strong> " . count($uploaded_files) . "</p>";
        
    } else {
        echo "<p>Файлы не были загружены</p>";
    }
    
    echo "</body></html>";
    
} else {
    echo "<h3>Заполните, пожалуйста, форму!</h3>";
}
?>