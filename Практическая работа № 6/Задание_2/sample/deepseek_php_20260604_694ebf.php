<?php
// включение файла album.php
require "album.php";

function fnOutAlbum($arr) {
    // формируем строку для вывода
    $out = "<table border='1' cellpadding='5' cellspacing='0'>";
    $out .= "<tr><th>ID</th><th>Альбом</th><th>Дата выпуска</th><th>Страна</th></tr>";
    
    foreach ($arr as $album) {
        $out .= "<tr>";
        $out .= "<td>" . $album['id_album'] . "</td>";
        $out .= "<td>" . $album['title'] . "</td>";
        $out .= "<td>" . $album['date'] . "</td>";
        $out .= "<td>" . $album['country'] . "</td>";
        $out .= "</tr>";
    }
    
    $out .= "</table>";
    
    return $out;
}

// вывод альбомов из массива album
echo fnOutAlbum($album);
?>