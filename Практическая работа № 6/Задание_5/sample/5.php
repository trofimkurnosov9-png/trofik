<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
</head>
<body>
    
    <h1>Функции</h1>
    <h2>Пользовательские функции</h2>
    
    <?php
        // включаем вывод всех ошибок
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        
        echo "<p>1. Начало загрузки данных...</p>";
        
        // подключаем файлы с массивами
        require 'dump/personnel.php';
        echo "<p>2. personnel.php загружен. Количество записей: " . count($personnel) . "</p>";
        
        require 'dump/educations.php';
        echo "<p>3. educations.php загружен. Количество записей: " . count($educations) . "</p>";
        
        require 'dump/courses.php';
        echo "<p>4. courses.php загружен. Количество записей: " . count($courses) . "</p>";
        
        // получаем GET-параметр id
        $id = isset($_GET['id']) && $_GET['id'] !== '' ? (int)$_GET['id'] : 1;
        echo "<p>5. Ищем преподавателя с ID = $id</p>";
        
        // поиск преподавателя
        $person = null;
        foreach ($personnel as $p) {
            if ($p['id_personnel'] == $id) {
                $person = $p;
                break;
            }
        }
        
        if ($person === null) {
            echo "<p style='color:red'>Преподаватель с ID = $id не найден!</p>";
        } else {
            echo "<h3>Персональные данные</h3>";
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>Фамилия</th><td>" . $person['surname'] . "</td></tr>";
            echo "<tr><th>Имя</th><td>" . $person['name'] . "</td></tr>";
            echo "<tr><th>Отчество</th><td>" . $person['patronymic'] . "</td></tr>";
            echo "<tr><th>Должность</th><td>" . $person['post'] . "</td></tr>";
            echo "</table>";
        }
        
        // поиск образования
        echo "<h3>Образование</h3>";
        $found = false;
        foreach ($educations as $edu) {
            if ($edu['id_personnel'] == $id) {
                echo "<p>- " . $edu['institution'] . " (" . $edu['qualification'] . ")</p>";
                $found = true;
            }
        }
        if (!$found) echo "<p>Нет данных об образовании</p>";
        
        // поиск курсов
        echo "<h3>Курсы</h3>";
        $found = false;
        foreach ($courses as $course) {
            if ($course['id_personnel'] == $id) {
                echo "<p>- " . $course['name'] . " (" . $course['duration'] . " часов, " . $course['price'] . " руб.)</p>";
                $found = true;
            }
        }
        if (!$found) echo "<p>Нет данных о курсах</p>";
    ?>
    
</body>
</html>