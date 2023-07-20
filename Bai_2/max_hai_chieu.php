<?php
$so_nguyen = [
    [5, 6, 8, 9, 3, 4],
    [24, 34, 5, 7, 9,3]
];
$max = $so_nguyen[0][0];
for ($i = 0; $i < count($so_nguyen); $i++) {
    for ($j = 0; $j < count($so_nguyen[$i]); $j++) {
        if ($max < $so_nguyen[$i][$j]) {
            $max = $so_nguyen[$i][$j];
        }
    }
}
echo $max;
