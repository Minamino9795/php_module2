<?php

// function selectionSort($list)
// {
//     $length = count($list);
//     for ($i = 0; $i < $length - 1; $i++) {
//         $min = $i;

//         for ($j = $i + 1; $j < $length; $j++) {
//             if ($list[$max] < $list[$j]) {
//                 $max = $j;
//             }
//         }
//         $tmp = $list[$i];
//         $list[$i] = $list[$max];
//         $list[$max] = $tmp;
//     }
//     return $list;
// }
// $x = [1, 9, 4.5, 6.6, 5.7, -4.5];
// $result = selectionSort($x);
// //print_r($result);
// foreach ($result as $list) {
//     echo $list . "<br>";
// }




function selectionSort($list)
{
    $length = count($list);
    for ($i = 0; $i < $length - 2; $i++) {
        $min = $i;

        for ($j = $i + 1; $j < $length; $j++) {
            if ($list[$min] > $list[$j]) {
                $min = $j;
            }
        }
        $tmp = $list[$i];
        $list[$i] = $list[$min];
        $list[$min] = $tmp;
    }
    return $list;
}
$x = [1, 9, 4.5, 6.6, 5.7, -4.5];
$result = selectionSort($x);
//print_r($result);
foreach ($result as $list) {
    echo $list . "<br>";
}



