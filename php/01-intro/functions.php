<?php

function sum($nums) {
    $total = 0;
    foreach($nums as $num) {
        $total += $num;
    }
    return $total;
}


$values = [4, 5, 6, 7, 8, 9, 10];
echo("<p>Total of [4, 5, 6, 7, 8, 9, 10] = ");
echo(sum($values));
echo("</p>");

