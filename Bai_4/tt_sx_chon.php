<?php
function selectionSort($list) {
    $n = count($list);
    for ($i = 0; $i < $n - 1; $i++) {
        $max= $i;
        for ($j = $i + 1; $j < $n; $j++) {
            // So sánh các phần tử để tìm phần tử lớn nhất
            if ($list[$j] > $list[$max]) {
                $max = $j;
            }
        }
        // Hoán đổi phần tử lớn nhất với phần tử ở vị trí $i
        $temp = $list[$i];
        $list[$i] = $list[$max];
        $list[$max] = $temp;
    }
    return $list;
}
$numbers =[1, 9, 4.5, 6.6, 5.7, -4.5];
$result = selectionSort($numbers);
print_r($result);
