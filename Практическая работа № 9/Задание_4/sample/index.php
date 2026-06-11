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
		require "albums.php";
		
		$id = 2;
		
		$album = array();
		
		foreach ($albums as $item){
			if ($item["id"] == $id) {
				$album[] = "id={$item['id']}";
				$album[] = "album_name={$item['album_name']}";
				$album[] = "date={$item['date']}";
				$album[] = "label=" . urlencode(implode(", ", $item["label"]));
				$album[] = "format=" . urlencode(implode(", ", $item["format"]));
				$album[] = "status=" . urlencode(implode(", ", $item["status"]));
				break;
			}
		}
		
		$query_string = implode("&", $album);
		
		echo "<a href='server.php?$query_string'>Передать данные об альбоме</a>";
	?>
</body>
</html>