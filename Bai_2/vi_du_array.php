<?php
$numbers = array(5, 2, 8, 1, 3);

// sort Sắp xếp mảng theo thứ tự tăng dần
sort($numbers);
print_r($numbers); // Kết quả: Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 5 [4] => 8 )
echo "<br>";


// rsort Sắp xếp mảng theo thứ tự giảm dần
rsort($numbers);
print_r($numbers); // Kết quả: Array ( [0] => 8 [1] => 5 [2] => 3 [3] => 2 [4] => 1 )
echo "<br>";


// asort Sắp xếp mảng tăng dần theo giá trị
$age = ["Peter" => "35", "Ben" => "37", "Joe" => "43"];
asort($age);
print_r($age); // Array ( [Peter] => 35 [Ben] => 37 [Joe] => 43 )
echo "<br>";


//ksort() – Sắp xếp mảng tăng dần theo khóa
$age = ["Peter" => "35", "Ben" => "37", "Joe" => "43"];
ksort($age);
print_r($age); // Array ( [Ben] => 37 [Joe] => 43 [Peter] => 35 )
echo "<br>";


//arsort() – Sắp xếp mảng giảm dần theo giá trị
$age = ["Peter" => "35", "Ben" => "37", "Joe" => "43"];
arsort($age);
print_r($age); // Array ( [Joe] => 43 [Ben] => 37 [Peter] => 35 )
echo "<br>";


//krsort() – Sắp xếp mảng giảm dần theo khóa
$age = ["Peter" => "35", "Ben" => "37", "Joe" => "43"];
krsort($age);
print_r($age); // Array ( [Peter] => 35 [Joe] => 43 [Ben] => 37 )
