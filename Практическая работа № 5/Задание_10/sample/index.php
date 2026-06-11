<?php
$albums = include 'albums.php';
$counter = 1;
$new_albums = array_map(function($item) use (&$counter) {
    if (!isset($item['id'])) {
        $item['id'] = (string)$counter;
    }
    $counter++;
    return $item;
}, $albums);
print_r($new_albums);
?>