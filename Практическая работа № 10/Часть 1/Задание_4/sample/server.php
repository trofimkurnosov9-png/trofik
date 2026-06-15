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
    
    if ($_GET['view'] == 'dump') {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    } elseif ($_GET['view'] == 'json') {
        $json_string = json_encode($_POST, JSON_UNESCAPED_UNICODE);
        echo $json_string;
    }
?>

</body>
</html>