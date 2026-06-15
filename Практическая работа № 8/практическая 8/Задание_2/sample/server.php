<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Отправка данных на сервер</h1>
	<h2>Загрузка файлов</h2>
	<hr>
	<h2>Скрипт-обработчик формы</h2>

	<?php
		if (isset ($_POST["loader"])) {
			if ($_FILES['myfile']["error"] == UPLOAD_ERR_OK) {
				$filename = md5(uniqid());
				$ext = pathinfo($_FILES["myfile"]["name"], PATHINFO_EXTENSION);
				$current_path = $_FILES["myfile"]["tmp_name"];
				$new_path = __DIR__ . '/upload/' . $filename . "." . $ext;
				if (move_uploaded_file($current_path, $new_path)) {
					echo "<h3>Файл успешно загружен на сервер</h3>";

				} else {
					echo "<h3>К сожалению, при сохранении файла что то пошло не так...</h3>";
				};      

			} else {
				switch ($_FILES['myfile']['error']) {
			        case UPLOAD_ERR_INI_SIZE:
			            echo "<h3>Размер принятого файла превысил максимально допустимый размер, который задан директивой upload_max_filesize конфигурационного файла php.ini (код ошибки: 1)</h3>";
						break;
			        case UPLOAD_ERR_PARTIAL:
			            echo "<h3>Загружаемый файл был получен только частично (код ошибки: 3)</h3>";
						break;
			        case UPLOAD_ERR_NO_FILE:
			        	echo "<h3>Файл не был загружен (код ошибки: 4)</h3>";
			        	break;
			        default: 
			        	echo "<h3>Файл по какой-то причине не загружен... :((</h3>";
				}
			}			
		} else {

			echo "<h3>Заполните, пожалуйста, форму</h3>";
		
		};
	?>

</body>
</html>