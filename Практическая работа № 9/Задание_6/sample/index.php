<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>JSON формат</h1>
	<h2>Ручное создание JSON объекта</h2>
	
	<?php
		$assoc_array = [ 
			"name" => "Мастер и Маргарита",
			"author" => "М.Булгаков",
			"year" => 1940,
			"genre" => "Мистика",
			"bestseller" => true
		];
		

		$json_manual = '{"name":"Мастер и Маргарита","author":"М.Булгаков","year":1940,"genre":"Мистика","bestseller":true}';
		
		echo "<h3>Исходный массив:</h3>";
		echo "<pre>";
		print_r($assoc_array);
		echo "</pre>";
		
		echo "<h3>Ручное JSON представление:</h3>";
		echo "<pre>" . htmlspecialchars($json_manual) . "</pre>";
		
		$decoded = json_decode($json_manual, true);
		
		echo "<h3>Результат декодирования (ассоциативный массив):</h3>";
		echo "<pre>";
		print_r($decoded);
		echo "</pre>";
	?>
</body>
</html>