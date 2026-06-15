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
    echo "<h3>Мы сформировали список ваших предпочтений и готовы начать поиск!</h3>";
    
    $json_string = json_encode($_POST['search'], JSON_UNESCAPED_UNICODE);
    $encoded_json = urlencode($json_string);
    
    echo "<center><a href='db.php?data=" . $encoded_json . "'>Начать поиск</a></center>";
?>

</body>
</html>