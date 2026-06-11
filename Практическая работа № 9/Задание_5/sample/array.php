<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>JSON формат</h1>
	<h2>Ручное создание JSON массива</h2>
	
	<?php
		$array = ["Мастер и Маргарита", "М.Булгаков", 1940, "Мистика", true];
		
		// Ручное JSON-представление (JSON массив)
		$json_manual = '["Мастер и Маргарита","М.Булгаков",1940,"Мистика",true]';
		
		echo "<h3>Исходный массив:</h3>";
		echo "<pre>";
		print_r($array);
		echo "</pre>";
		
		echo "<h3>Ручное JSON представление:</h3>";
		echo "<pre>" . htmlspecialchars($json_manual) . "</pre>";
		
		$decoded = json_decode($json_manual);
		
		echo "<h3>Результат декодирования:</h3>";
		echo "<pre>";
		print_r($decoded);
		echo "</pre>";
	?>
</body>
</html>