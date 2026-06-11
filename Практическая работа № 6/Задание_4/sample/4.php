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
        // подключаем функцию fnGetData()
        require 'function.php';
        // получаем возвращаемый функцией массив
        $data = fnGetData();
        
        // забираем данные по категории
        $person = $data["personnel"];
        $courses = $data["courses"];
        $educations = $data["educations"];
        
        /**
         * Функция вывода персональных данных преподавателя
         */
        function getPersonData($data) {
            $out = "<div>";
            $out .= "<h3>Персональные данные</h3>";
            $out .= "<table border='1' cellpadding='5' cellspacing='0'>";
            $out .= "<table><th>Поле</th><th>Значение</th></tr>";
            $out .= "<tr><td>ID</td><td>" . $data['id_personnel'] . "</td></tr>";
            $out .= "<tr><td>Фамилия</td><td>" . $data['surname'] . "</td></tr>";
            $out .= "<tr><td>Имя</td><td>" . $data['name'] . "</td></tr>";
            $out .= "<tr><td>Отчество</td><td>" . $data['patronymic'] . "</td></tr>";
            $out .= "<tr><td>Должность</td><td>" . $data['post'] . "</td></tr>";
            $out .= "<tr><td>Категория</td><td>" . $data['category'] . "</td></tr>";
            $out .= "<tr><td>Уровень образования</td><td>" . $data['level_edu'] . "</td></tr>";
            $out .= "<tr><td>Общий стаж</td><td>" . $data['experience_total'] . " лет</td></tr>";
            $out .= "<tr><td>Стаж в колледже</td><td>" . $data['experience_college'] . " лет</td></tr>";
            $out .= "<tr><td>Подразделение</td><td>" . $data['unit'] . "</td></tr>";
            $out .= "</table></div>";
            return $out;
        };
        
        /**
         * Функция вывода данных об образовании
         */
        function getPersonEdu($data) {
            $out = "<div>";
            $out .= "<h3>Образование</h3>";
            $out .= "<table border='1' cellpadding='5' cellspacing='0'>";
            $out .= "<tr><th>№</th><th>Учебное заведение</th><th>Квалификация</th><th>Специальность</th><th>Год поступления</th><th>Год окончания</th></tr>";
            
            $i = 1;
            foreach ($data as $edu) {
                $out .= "<tr>";
                $out .= "<td>" . $i++ . "</td>";
                $out .= "<td>" . htmlspecialchars($edu['institution']) . "</td>";
                $out .= "<td>" . htmlspecialchars($edu['qualification']) . "</td>";
                $out .= "<td>" . htmlspecialchars($edu['specialty']) . "</td>";
                $out .= "<td>" . $edu['year_receipts'] . "</td>";
                $out .= "<td>" . $edu['year_release'] . "</td>";
                $out .= "</tr>";
            }
            
            $out .= "</table></div>";
            return $out;
        };
        
        /**
         * Функция вывода данных о курсах
         */
        function getPersonCours($data) {
            $out = "<div>";
            $out .= "<h3>Преподаваемые курсы</h3>";
            $out .= "<table border='1' cellpadding='5' cellspacing='0'>";
            $out .= "<tr><th>ID курса</th><th>Название курса</th><th>Длительность (часов)</th><th>Цена (руб.)</th></tr>";
            
            foreach ($data as $course) {
                $out .= "<tr>";
                $out .= "<td>" . $course['id_courses'] . "</td>";
                $out .= "<td>" . htmlspecialchars($course['name']) . "</td>";
                $out .= "<td>" . $course['duration'] . "</td>";
                $out .= "<td>" . number_format((float)$course['price'], 0, '.', ' ') . "</td>";
                $out .= "</tr>";
            }
            
            $out .= "</table></div>";
            return $out;
        }
        
        // выводим персональные данные
        echo getPersonData($person);
        // выводим данные об образовании
        echo getPersonEdu($educations);
        // выводим данные о курсах
        echo getPersonCours($courses);
    ?>
    
</body>
</html>