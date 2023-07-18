<?php
/*
    B1: tao form:post gom 3 o input + name, va 1 nut submit
    B2: Kiem tra nguoi dung da gui du lieu len server
        - In ra du lieu nguoi dung da gui len
    B3: Gan vao cac bien: $_POST, $_REQUEST
    B4: Su dung cau truc nhieu dieu kien de xu ly
    B5: Hien thi ra ket qua
*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<pre>';
    print_r($_REQUEST);
    echo '</pre>';
    $so_thu_nhat = $_REQUEST['number1'];
    $so_thu_hai = $_REQUEST['number2'];
    $toan_tu = $_REQUEST['toan_tu'];
    switch ($toan_tu) {
        case 'cong':
            echo $so_thu_nhat + $so_thu_hai;
            break;
        case 'tru':
            echo $so_thu_nhat - $so_thu_hai;
            break;
        case 'nhan':
            echo $so_thu_nhat * $so_thu_hai;
            break;
        case 'chia':
            echo $so_thu_nhat / $so_thu_hai;
            break;
    }
}
?>
<form action="" method="post">
    <label for="">
        số thú nhất:<br>
        <input type="text" name="number1" placeholder="nhập số thứ nhất"> <br>
    </label>
    <select name="toan_tu">
        <option value="cong">cộng</option>
        <option value="tru">trừ</option>
        <option value="nhan">nhân</option>
        <option value="chia">chia</option>
    </select><br>
    <label>
        số thứ hai:<br>
        <input type="text" name="number2" placeholder="nhập số thứ hai"> <br>
    </label>

    <input type="submit" value="tính">
</form>