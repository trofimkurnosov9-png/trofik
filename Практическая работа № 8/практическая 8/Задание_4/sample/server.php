<?php
$uploadDir = 'upload/';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES)) {
    foreach ($_FILES as $fileKey => $fileData) {
        
        if (is_array($fileData['name'])) {
            foreach ($fileData['name'] as $key => $name) {
                if (!empty($name)) {
                    $extension = pathinfo($name, PATHINFO_EXTENSION);
                    
                    $newName = time() . '_' . rand(100, 999) . '.' . $extension;
                    
                    move_uploaded_file($fileData['tmp_name'][$key], $uploadDir . $newName);
                }
            }
        } 

        else {
            if (!empty($fileData['name'])) {
                $extension = pathinfo($fileData['name'], PATHINFO_EXTENSION);
                $newName = time() . '_' . rand(100, 999) . '.' . $extension;
                move_uploaded_file($fileData['tmp_name'], $uploadDir . $newName);
            }
        }
    }
    echo "<p style='color: green;'>Все выбранные файлы успешно переименованы и загружены!</p>";
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <p>Выберите файлы для загрузки:</p>
    <input type="file" name="file1"><br><br>
    <input type="file" name="file2"><br><br>
    <input type="file" name="file3"><br><br>
    <button type="submit">Загрузить файлы</button>
</form>
