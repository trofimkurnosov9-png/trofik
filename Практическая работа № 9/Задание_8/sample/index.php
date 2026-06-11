<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Декодирование JSON из файла team.txt</h1>
	
	<?php
		include "team.txt";
		
		$data = json_decode($team, true);
		
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	?>
</body>
</html>