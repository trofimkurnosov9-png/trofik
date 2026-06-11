<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Функции</h1>
	<h2>Встроенные функции, часть 1</h2>
	
	<?php
	 $array = [
		'id' => '1',
		'album_name' => 'atom heart mother',
		'date' => '10 октября 1970',
		'labe' => 'EMI, harvest, kfjskl',
		'status' => 'золотой'
	 ].
[
		'id' => '1',
		'album_name' => 'atom heart mother',
		'date' => '10 октября 1970',
		'labe' => 'EMI, harvest, kfjskl',
		'status' => 'золотой'
];


			foreach ($content as $group) {
				if ($group['id'] == $requested_id) {
					echo '<h3>Информация о группе</h3>';
					echo '<p><strong>ID:</strong> ' . htmlspecialchars($group['id']) . '</p>';
					echo '<p><strong>Название:</strong> ' . htmlspecialchars($group['name']) . '</p>';
					echo '<p><strong>Страна:</strong> ' . htmlspecialchars($group['country']) . '</p>';
					echo '<p><strong>Год основания:</strong> ' . htmlspecialchars($group['date']) . '</p>';
					echo '<p><strong>Стиль:</strong> ' . htmlspecialchars($group['style']) . '</p>';
					$found = true;
					break;
				}
			}
			if (!$found) {
				echo '<p style="color:red;">Группа с ID = ' . htmlspecialchars($requested_id) . ' не найдена.</p>';
			}
		else {
			echo '<h3>Список всех групп</h3>';
			echo '<table border="1" cellpadding="8">';
			echo '<tr><th>ID</th><th>Название</th><th>Страна</th><th>Год основания</th><th>Стиль</th></tr>';
			foreach ($content as $group) {
				echo '<tr>';
				echo '<td>' . htmlspecialchars($group['id']) . '</td>';
				echo '<td>' . htmlspecialchars($group['name']) . '</td>';
				echo '<td>' . htmlspecialchars($group['country']) . '</td>';
				echo '<td>' . htmlspecialchars($group['date']) . '</td>';
				echo '<td>' . htmlspecialchars($group['style']) . '</td>';
				echo '</tr>';
			}
			echo '</table>';
		}
	?>
</body>
</html>