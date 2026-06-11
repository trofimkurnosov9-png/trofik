<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Отправка данных на сервер</h1>
	<h2>Отправка данных в строке запроса</h2>
	
	<?php
		$course = [
			[
				"Основы программирования", 
				["Введение в PHP", "Переменные", "Константы", "Типы данных", "Строки"]
			],		
			[
				"Функции",
				["Встроенные функции", "Пользовательские функции", "Область видимости переменных"]
			],
			[
				"Управляющие конструкции",
				["Условные операторы", "Циклы", "Конструкции"]
			]
		];

		if (isset($_GET['user']) && isset($_GET['topic']) && isset($_GET['lesson'])) {
			$user = htmlspecialchars($_GET['user']);
			$topic_num = (int)$_GET['topic'];
			$lesson_num = (int)$_GET['lesson'];
			
			if ($topic_num >= 1 && $topic_num <= count($course)) {
				$topic_index = $topic_num - 1;
				$topic_name = $course[$topic_index][0];
				$lessons = $course[$topic_index][1];
				
				if ($lesson_num >= 1 && $lesson_num <= count($lessons)) {
					$lesson_name = $lessons[$lesson_num - 1];
					echo "<h3>Пользователь: $user</h3>";
					echo "<p><strong>Тема:</strong> $topic_name</p>";
					echo "<p><strong>Урок:</strong> $lesson_name</p>";
				} else {
					echo "<p>Ошибка: неверный номер урока.</p>";
				}
			} else {
				echo "<p>Ошибка: неверный номер темы.</p>";
			}
		} else {
			echo "<p>Не указаны все GET-параметры (user, topic, lesson).</p>";
		}
	?>
</body>
</html>