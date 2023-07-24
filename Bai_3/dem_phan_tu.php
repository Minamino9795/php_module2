<?php
$number = [4, 5, 7, 7, 8, 9, 7, 3, 1, 10, 18];
$value = 7;
$count = 0;
for ($i = 0; $i < count($number); $i++) {
    
    if ($number[$i] == $value) {
        $count++;
       
    }
    }

echo "Số lần xuất hiện của giá trị ".$value . " là " . $count. " lần";
