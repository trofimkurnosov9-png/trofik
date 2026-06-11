<?php
// 1. Подключите файл с массивом
require_once 'team.php';

// 2. Определите функцию вывода данных массива
function printTeamData($arr) {
    foreach ($arr as $group) {
        echo "Группа: " . $group['name'] . " (id = " . $group['id_team'] . ")<br/>";
        echo "Страна: " . $group['country'] . "<br/>";
        echo "Дата основания: " . $group['date'] . "<br/>";
        echo "Стиль: " . $group['style'] . "<br/>";
        echo "<hr/>";
    }
}

// 3. Вызовите функцию вывода
printTeamData($team);
?>