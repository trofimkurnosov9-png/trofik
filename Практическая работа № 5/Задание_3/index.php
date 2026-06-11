<?php
$count = 5; 
$sum = 0;
for ($i = 0; $i < $count; $i++) {
    $roll = rand(1, 6);
    $sum += $roll;
    echo "<img src='sample/cube/$roll.jpg' width='80'>";
}
echo "<h2>Общая сумма: $sum</h2>";
?>
