<?php
require "teams.php";

if (isset($_GET['id']) && $_GET['id'] !== '') {
    $found = false;
    foreach ($content as $group) {
        if ($group['id'] == $_GET['id']) {
            echo "<h3>Группа: {$group['name']}</h3>";
            echo "<p>Страна: {$group['country']}<br>Год: {$group['date']}<br>Стиль: {$group['style']}</p>";
            $found = true;
            break;
        }
    }
    if (!$found) echo "<p>Группа не найдена</p>";
} else {
    echo "<h3>Список всех групп</h3><ul>";
    foreach ($content as $group) {
        echo "<li>{$group['name']} ({$group['country']}, {$group['date']})</li>";
    }
    echo "</ul>";
}
?>