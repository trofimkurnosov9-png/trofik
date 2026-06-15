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
    
    $json_string = '{ ';
    $fields = ['name', 'alias', 'country', 'date', 'style', 'path', 'content', 'note'];
    $count = count($fields);
    
    for ($i = 0; $i < $count; $i++) {
        $field = $fields[$i];
        $value = $_POST[$field];
        $json_string .= '"' . $field . '" : "' . $value . '"';
        if ($i < $count - 1) {
            $json_string .= ', ';
        }
    }
    $json_string .= ' }';
    
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