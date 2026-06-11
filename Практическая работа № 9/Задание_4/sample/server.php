<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Отправка данных на сервер</h1>	
	<h2>Отправка данных в строке запроса</h2>
	<hr>
	<h2>Информация полученная из строки запроса</h2>
	
	<?php
		if (isset($_GET['id'])) {
			echo "<p><strong>Идентификатор альбома:</strong> " . htmlspecialchars($_GET['id']) . "</p>";
			echo "<p><strong>Название альбома:</strong> " . htmlspecialchars($_GET['album_name']) . "</p>";
			echo "<p><strong>Дата выпуска:</strong> " . htmlspecialchars($_GET['date']) . "</p>";
			echo "<p><strong>Лейбл студии:</strong> " . htmlspecialchars($_GET['label']) . "</p>";
			echo "<p><strong>Формат:</strong> " . htmlspecialchars($_GET['format']) . "</p>";
			echo "<p><strong>Статус:</strong> " . htmlspecialchars($_GET['status']) . "</p>";
		} else {
			echo "<p>Данные не получены.</p>";
		}
	?>
</body>
</html>