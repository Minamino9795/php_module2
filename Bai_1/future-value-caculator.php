<?php
/*
    B1: tao form:post gom 3 o input + name, va 1 nut submit
    B2: Kiem tra nguoi dung da gui du lieu len server
        - In ra du lieu nguoi dung da gui len
    B3: Gan vao cac bien: $_POST, $_REQUEST
    B4: Ap dung cong thuc
        - Ap dung cong thuc cho 1 nam
        - Tinh toan dua vao so nam
    B5: xuat du lieu ra
    */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<pre>';
    print_r($_REQUEST);
    echo '</pre>';
    $luong_tien_dau_tu=$_REQUEST['luong_tien_dau_tu'];
    $lai_suat= $_REQUEST['lai_suat'];
    $so_nam= $_REQUEST['so_nam'];
    $gttl= $luong_tien_dau_tu +($luong_tien_dau_tu * $lai_suat);
    // gttl=Giá trị Hiện tại + (Giá trị Hiện tại * Lãi suất)
    echo $gttl;
}

?>
<form action="" method="post">
    <label for="">
        Lượng tiền đầu tư ban đầu:<br>
        <input type="text" name="luong_tien_dau_tu" placeholder="nhập lượng tiền đầu tư"> <br>
    </label>
    <label>
        Lãi suất năm:<br>
        <input type="text" name="lai_suat" placeholder="nhập lãi suất"> <br>
    </label>
    <label>
        Số năm đầu tư:<br>
        <input type="text" name="so_nam" placeholder="nhập số năm đầu tư"> <br>
    </label>
    <input type="submit" value="Calculate">
</form>