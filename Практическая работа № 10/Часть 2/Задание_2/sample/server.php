<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Отправка данных на сервер</h1>
	<h2>Еще о формах</h2>
	<hr>
	<h2>Оформление заказа</h2>
	
	<?php
		
		echo "<h3>Данные заказчика:</h3>";
		echo "<pre>";
		echo "Фамилия: " . $_POST['surname'] . "\n";
		echo "Имя: " . $_POST['name'] . "\n";
		echo "E-mail: " . $_POST['email'] . "\n";
		echo "</pre>";
		
		echo "<h3>Данные заказа:</h3>";
		echo "<pre>";
		print_r($_POST["order"]);
		echo "</pre>";
		
	?>

omsk
</body>
</html>