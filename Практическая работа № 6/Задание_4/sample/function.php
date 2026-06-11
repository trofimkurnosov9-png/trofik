<?php
	// функция получения данных
	function fnGetData () {
		// подключаем файлы из папки dump
		require __DIR__ . '/dump/personnel.php';
		require __DIR__ . '/dump/courses.php';
		require __DIR__ . '/dump/educations.php';
		
		return $data = array(
			'personnel' => $personnel,
			'courses' => $courses,
			'educations' => $educations
		);
	}
?>