<?php
$sum = 0;
for ($i = 0; $i < 3; $i++) {
    $roll = rand(1, 6);
    $sum += $roll;
    echo "<img src='sample/cube/$roll.jpg' width='100' style='margin:5px'>";
}
echo "<h3>Сумма очков: $sum</h3>";
?>
