<?php
function fnOutTrack($arr, $albumId) {
    // формируем строку для вывода
    $out = "<table border='1' cellpadding='5' cellspacing='0'>";
    $out .= "<tr><th>ID трека</th><th>Название трека</th><th>Примечание</th><th>Альбом</th></tr>";
    
    $hasTracks = false;
    
    foreach ($arr as $track) {
        if ($track['id_album'] == $albumId) {
            $hasTracks = true;
            $out .= "<tr>";
            $out .= "<td>" . $track['id_track'] . "</td>";
            $out .= "<td>" . htmlspecialchars($track['name']) . "</td>";
            $out .= "<td>" . ($track['note'] ?: "—") . "</td>";
            $out .= "<td>" . $track['id_album'] . "</td>";
            $out .= "</tr>";
        }
    }
    
    if (!$hasTracks) {
        $out .= "<tr><td colspan='4' align='center'>Треки для альбома с ID = $albumId не найдены</td></tr>";
    }
    
    $out .= "</table>";
    
    echo $out;
}
?>