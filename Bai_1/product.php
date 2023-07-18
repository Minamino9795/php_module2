<?php
/*
    B1: tao form:post gom 3 o input + name, va 1 nut submit
    B2: Kiem tra nguoi dung da gui du lieu len server
        - In ra du lieu nguoi dung da gui len
    B3: Gan vao cac bien: $_POST, $_REQUEST
    B4: Ap dung cong thuc
    B5: xuat du lieu ra
    */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<pre>';
    print_r($_REQUEST);
    echo '</pre>';
    $mo_ta = $_REQUEST['mo_ta'];
    $gia_niem_yet = $_REQUEST['gia_niem_yet'];
    $chiet_khau = $_REQUEST['chiet_khau'];
    $luong_chiet_khau = $gia_niem_yet * $chiet_khau * 0.1;
    echo $luong_chiet_khau;
}
?>
<form action="" method="post">
    <label for="">
        mô tả:<br>
        <input type="text" name="mo_ta" placeholder="mô tả của sản phẩm"> <br>
    </label>
    <label>
        Giá niêm yết của sản phẩm:<br>
        <input type="text" name="gia_niem_yet" placeholder="Giá niêm yết của sản phẩm"> <br>
    </label>
    <label>
        Tỷ lệ chiết khấu:<br>
        <input type="text" name="chiet_khau" placeholder="Tỷ lệ chiết khấu"> <br>
    </label>
    <input type="submit" value="tính">
</form>