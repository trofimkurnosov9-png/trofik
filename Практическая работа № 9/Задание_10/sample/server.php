<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>JSON формат</h1>
	<h2>Информация, полученная из строки JSON GET-параметра</h2>
	
	<?php
		if (isset($_GET['data'])) {
			$decoded = json_decode($_GET['data'], true);
			echo "<pre>";
			print_r($decoded);
			echo "</pre>";
		} else {
			echo "<p>Данные не получены.</p>";
		}
	?>
</body>
</html>