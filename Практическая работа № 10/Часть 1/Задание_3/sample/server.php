<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
</head>
<body>

<h1>Отправка данных на сервер</h1>
<h2>Отправка форм</h2>
<hr>

<?php
    echo "<h2>Обработчик формы</h2>";
    echo "<h3>Сервер получил следующие данные</h3>";
    
    $data_array = [];
    
    foreach ($_POST as $key => $value) {
        $data_array[$key] = $value;
    }
    
    $json_string = json_encode($data_array, JSON_UNESCAPED_UNICODE);
    
    echo "<h2>JSON строка</h2>";
    echo $json_string . "<br><br>";
    
    $decoded_array = json_decode($json_string, true);
    
    echo "<h2>PHP массив</h2>";
    echo "<pre>";
    print_r($decoded_array);
    echo "</pre>";
?>

</body>
</html>