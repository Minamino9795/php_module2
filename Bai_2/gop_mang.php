<?php
$number1=[23,45,6,7,34,58,67];
$number2=[56,3,34,45,56,23,9];
$number3=[];
for($i=0;$i<count($number1);$i++){
    $number3[]=$number1[$i];
}
for($i=0;$i<count($number2);$i++){
    $number3[]= $number2[$i];
}
 sort($number3);

echo "<pre>";
print_r($number3) ;
echo "</pre>";