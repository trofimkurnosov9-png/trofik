<?php
if (isset($_GET['a'], $_GET['b'], $_GET['c']) && $_GET['a'] != 0) {
    $a = $_GET['a']; $b = $_GET['b']; $c = $_GET['c'];
    $d = pow($b, 2) - 4 * $a * $c;
    
    if ($d > 0) {
        $x1 = (-$b + sqrt($d)) / (2 * $a);
        $x2 = (-$b - sqrt($d)) / (2 * $a);
        echo "x1 = $x1, x2 = $x2";
    } 
    elseif ($d == 0) {
        $x = -$b / (2 * $a);
        echo "x = $x";
    } 
    else {
        echo "Нет действительных корней";
    }} 
    else {
    echo "Передайте коэффициенты a, b, c через GET";
}
?>