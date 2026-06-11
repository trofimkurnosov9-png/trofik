<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Отправка данных на сервер (JSON)</h1>
	
	<?php
		include "educations.php";
		
		$json_data = json_encode($educations, JSON_UNESCAPED_UNICODE);
		$encoded_data = urlencode($json_data);
		
		echo "<a href='server.php?data=$encoded_data'>Передать JSON данные об образовании на сервер</a>";
	?>
</body>
</html>