<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once 'connect_sql.php';
    ?>
<?php
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $ma_kh=$_REQUEST['mkh'];
    $ten_kh=$_REQUEST['name'];
    $dia_chi=$_REQUEST['address'];
    $sdt=$_REQUEST['phone'];

    if($connect -> query("INSERT INTO khach_hang (ID , TEN_KHACH_HANG , DIA_CHI , SO_DIEN_THOAI) VALUES (N'$ma_kh' , N'$ten_kh' , N'$dia_chi' , N'$sdt')")){
        echo "<script> alert ('Thêm thành công!')</script>";
    } else {
        echo "<script> alert ('Thêm thất bại!')</script>";
    }
}
$connect -> close();
?>


    <form action="" method="post">
        <div>
            Nhập mã khách hàng:<br>
            <input type="number" name="mkh" placeholder="1">
        </div><br>
        <div>
            Nhập tên khách hàng:<br>
            <input type="text" name="name" placeholder="1">
        </div><br>
        <div>
            Nhập địa chỉ:<br>
            <input type="text" name="address" placeholder="1">
        </div><br>
        <div>
            Nhập số điện thoại:<br>
            <input type="text" name="phone" placeholder="1">
        </div><br>
        <div>
            <input type="submit" name="add" value="Add" placeholder="1">
        </div>
    </form>
</body>

</html>
