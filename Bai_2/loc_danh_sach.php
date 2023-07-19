<form action="" method="get">
    Nhập ngày sinh từ:
    <input type="date" name="from" placeholder="yyyy/mm/dd">
    đến:
    <input type="date" name="to" placeholder="yyyy/mm/dd">
    <input type="submit" value="Lọc">
</form>
<?php
$list = [
    "1" => [
        "name" => "Nguyễn Văn A",
        "date_of_birth" => "1983/08/20",
        "address" => "Hà Nội",
        "anh"=> "anh/anh1.jpg"
    ],
    "2" => [
        "name" => "Nguyễn Văn B",
        "date_of_birth" => "1983/08/21",
        "address" => "Sài Gòn",
        "anh"=> "anh/anh2.jpg"
    ],
    "3" => [
        "name" => "Phan văn D",
        "date_of_birth" => "1983/08/22",
        "address" => "Đà Nẵng",
        "anh"=> "anh/anh3.jpg"
    ],
    "4" => [
        "name" => "võ Văn H",
        "date_of_birth" => "1983/08/17",
        "address" => "Quang Trị",
        "anh"=> "anh/anh4.jpg"
    ],
    "5" => [
        "name" => "Nguyễn Đình Thi",
        "date_of_birth"=> "1983/08/19",
        "address" => "Hà Nội",
        "anh" => "anh/anh5.jpg"
    ],

];
function tim_kiem($danh_sach,$tu_ngay,$den_ngay){
    if(empty($tu_ngay)|| empty($den_ngay)){
        return $danh_sach;
    }
    $number1=[];
foreach ($danh_sach as $thong_tin){
    if(strtotime($thong_tin['date_of_birth'])< strtotime($tu_ngay))
    continue;
    if (strtotime($thong_tin['date_of_birth'])> strtotime($den_ngay))
    continue;
    $number1[]=$thong_tin;
}
return $number1;
}
$tu_ngay=$_REQUEST["from"]?? null;
$den_ngay=$_REQUEST["to"] ?? null;

$number1= tim_kiem($list,$tu_ngay,$den_ngay);
?>
<table border="1">
    <caption><h2>Danh sách khách hàng</h2></caption>
    <tr>
    <th>STT</th>
    <th>Tên</th>
    <th>Ngày sinh</th>
    <th>Địa chỉ</th>
    <th>ảnh</th>
    </tr>
    <?php foreach($number1 as $index => $thong_tin): ?>
        <tr>
            <td><?php echo $index + 1 ;?></td>
            <td><?php echo $thong_tin['name'];?></td>
            <td><?php echo $thong_tin["date_of_birth"];?></td>
            <td><?php echo $thong_tin['address'];?></td>
            <td>
                <div class="anh"><img src="<?php echo $thong_tin["anh"];?>" style="max-width: 50px; max-height: 50px;"/></div>
            </td>
        </tr>
        <?php endforeach ; ?>

</table>