<?php
$so_nguyen=[19,7,8,3,3,1,9,4,5];
$min=$so_nguyen[0];
$vi_tri=0;
for ($i=1;$i<count($so_nguyen);$i++){
    if($so_nguyen[$i]<$min){
        $min=$so_nguyen[$i];
        $vi_tri=$i;
    }
}
echo "Giá trị nhỏ nhất = ".$min ."<br>";
echo "Vị trí của giá trị đó trong mảng là ". "$"."so_nguyen = " . "[" . $vi_tri . "]";