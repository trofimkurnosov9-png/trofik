<?php
include 'person.php';
if (!array_key_exists('category', $person)) {
    $person['category'] = 'Соответствие занимаемой должности';
}
echo "Категория: {$person['category']}<br>";
var_dump($person);
?>