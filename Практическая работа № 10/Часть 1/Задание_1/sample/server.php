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
    
    echo "Фамилия: " . $_POST['surname'] . "<br>";
    echo "Имя: " . $_POST['firstname'] . "<br>";
    echo "Отчество: " . $_POST['patronymic'] . "<br>";
    echo "Должность: " . $_POST['post'] . "<br>";
    echo "Уровень образования: " . $_POST['education'] . "<br>";
    echo "Категория: " . $_POST['category'] . "<br>";
    echo "Общий стаж: " . $_POST['total_experience'] . "<br>";
    echo "Стаж в техникуме: " . $_POST['college_experience'] . "<br>";
?>

</body>
</html>