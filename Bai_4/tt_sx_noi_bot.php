<?php
function bubbleSort($arr)
{
    $length = count($arr);
    for ($i = 0; $i < $length - 1; $i++) {
        for ($j = 0; $j < $length - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $tmp;
            }
        }
    }
    return $arr;
}
$array = [2, 3, 2, 5, 6, 1, -2, 3, 14, 12];
$x = bubbleSort($array);
print_r($x);
