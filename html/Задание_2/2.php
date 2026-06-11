<?php
echo "Введите количество вспомненных строк: ";
$lines = trim(fgets(STDIN));

switch ($lines) {
    case 2:
        echo "Беда.\n";
        break;
    case 4:
        echo "Плохо.\n";
        break;
    case 6:
        echo "Кажется, что вы где-то учились.\n";
        break;
    case 8:
        echo "Вы среднестатистический человек.\n";
        break;
    case 10:
        echo "Нормально.\n";
        break;
    case 12:
        echo "Хорошо.\n";
        break;
    case 14:
        echo "Отлично.\n";
        break;
    default:
        echo "Некорректное количество строк или уровень не определен.\n";
        break;
}
?>