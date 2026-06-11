<?php
// включение файла track.php
include "track.php";

// подключение файла с функцией
include "function.php";

// идентификатор альбома (можно менять для проверки)
$id = 10;

// вывод треков указанного альбома ($id) из массива $track
fnOutTrack($track, $id);
?>