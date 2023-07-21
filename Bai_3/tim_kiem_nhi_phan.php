<?php
//tìm kiếm tuyến tính
// function linearSearch($arr, $target) {
//     for ($i = 0; $i < count($arr); $i++) {
//         if ($arr[$i] == $target) {
//             return $i; // Trả về vị trí của phần tử nếu tìm thấy
//         }
//     }

//     return -1; // Trả về -1 nếu không tìm thấy
// }

// // Mảng cần tìm kiếm
// $array = array(2, 4, 6, 8, 10, 12, 14, 16, 18);
// $targetElement = 20;

// $result = linearSearch($array, $targetElement);

// if ($result != -1) {
//     echo "Tìm thấy phần tử tại vị trí $result";
// } else {
//     echo "Không tìm thấy phần tử trong mảng";
// }



//tìm kiếm nhị phân
function binarySearch($arr, $target) {
    $left = 0;
    $right = count($arr) - 1;

    while ($left <= $right) {
        $mid = floor(($left + $right) / 2);

        if ($arr[$mid] == $target) {
            return $mid; // Trả về vị trí của phần tử nếu tìm thấy
        } elseif ($arr[$mid] < $target) {
            $left = $mid + 1; // Tìm phần tử phía bên phải của mảng con
        } else {
            $right = $mid - 1; // Tìm phần tử phía bên trái của mảng con
        }
    }

    return -1; // Trả về -1 nếu không tìm thấy
}

// Mảng đã được sắp xếp
$sortedArray = array(2, 4, 6, 8, 10, 12, 14, 16, 18);
$targetElement = 12;

$result = binarySearch($sortedArray, $targetElement);

if ($result != -1) {
    echo "Tìm thấy phần tử tại vị trí $result";
} else {
    echo "Không tìm thấy phần tử trong mảng";
}

