<?php
// Создаем ассоциативный массив с данными преподавателя
$teacher = [
    "surname" => "Иванов",
    "name" => "Иван",
    "patronymic" => "Иванович",
    "birth_date" => "15.05.1985",
    "position" => "Учитель математики",
    "category" => "Высшая",
    "education_level" => "Высшее (магистратура)",
    "university" => "МГУ им. М.В. Ломоносова",
    "qualification" => "Математик, преподаватель",
    "specialization" => "Математика и информатика",
    "experience_current" => "5 лет",
    "experience_total" => "12 лет",
    "email" => "ivanov_i@example.com"
];

// Выводим массив в браузер через print_r
echo "<pre>";
print_r($teacher);
echo "</pre>";
?>