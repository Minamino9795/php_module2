<?php

//SẮP XẾP CHÈN


function insertionSort($arr) {
    $n = count($arr);
    for ($i = 1; $i < $n; $i++) {
        $current = $arr[$i];
        $j = $i - 1;
        while ($j >= 0 && $arr[$j] > $current) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }
        $arr[$j + 1] = $current;
    }
    return $arr;
}

// Sử dụng hàm để sắp xếp một mảng
$arr = array(5, 2, 8, 4, 3);
$result = insertionSort($arr);
print_r($result);


/*$x=[8,6,34,22,24,36,5];
for ($i=1;$i<n;$i++){
    $j=$i-1;
    $t=$x[$i];
}*/
