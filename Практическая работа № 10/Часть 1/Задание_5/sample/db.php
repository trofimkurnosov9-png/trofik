<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Модуль поиска информации</title>
</head>
<body>

<h2>## Модуль поиска информации, согласно пришедшего критерия</h2>

<?php
if (isset($_GET['data']) && !empty($_GET['data'])) {
    
    $jsonString = urldecode($_GET['data']);
    
    $searchCriteria = json_decode($jsonString, true);
    
    if ($searchCriteria !== null) {
        var_dump($searchCriteria);
    } else {
        echo "<p>Ошибка: не удалось декодировать JSON-строку.</p>";
    }
    
} else {
    echo "<p>Ошибка: критерии поиска не переданы. Пожалуйста, вернитесь в <a href='index.php'>форму</a>.</p>";
}
?>

</body>
</html>