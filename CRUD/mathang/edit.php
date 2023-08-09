<?php
include_once 'db.php';
if( isset( $_GET['id'] ) ){
    $id = $_GET['id'];
}else{
    $id = 0;
}

$id = isset( $_GET['id'] ) ? $_GET['id'] : 0;

if( !$id ){
    header("Location: index.php");
}
$sql = "SELECT * FROM `mat_hangs` WHERE MAHANG = $id";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);//array 
// Lay ve du lieu duy nhat
$row = $stmt->fetch();
// echo '<pre>';
// print_r($row);
// die();

if( $_SERVER['REQUEST_METHOD'] == "POST" ){
    // in du lieu nguoi dung gui len
    // echo '<pre>';
    // print_r( $_REQUEST );
    // die();
    // 
    $TENHANG = $_REQUEST['TENHANG'];
    $MACONGTY = $_REQUEST['MACONGTY'];
    $MALOAIHANG = $_REQUEST['MALOAIHANG'];
    $SOLUONG = $_REQUEST['SOLUONG'];
    $DONVITINH = $_REQUEST['DONVITINH'];
    $GIAHANG = $_REQUEST['GIAHANG'];

    $sql = "UPDATE `mat_hangs` SET `TENHANG` = '$TENHANG',  `MACONGTY` = '$MACONGTY',`MALOAIHANG` = '$MALOAIHANG',`SOLUONG` = '$SOLUONG',`DONVITINH` = '$DONVITINH',`GIAHANG` = '$GIAHANG' WHERE `MAHANG` = $id";
     //Thuc hien truy van
     $conn->exec($sql);

     // chuyen huong ve trang danh sach
     header("Location: index.php");
}


?>
<!DOCTYPE html>
<html>
<body>

<h2>thêm mặt hàng</h2>

<form action="" method="POST" >
  <label for="fname">Tên hàng</label><br>
  <input type="text"  name="TENHANG" value="<?= $row['TENHANG'];?>"><br>
  <label for="lname">Mã Công ty</label><br>
  <input type="number"  name="MACONGTY" value="<?= $row['MACONGTY'];?>" ><br><br>
  <label for="lname">Mã loại hàng</label><br>
  <input type="text"  name="MALOAIHANG" value="<?= $row['MALOAIHANG'];?>"><br><br>
  <label for="lname">Số lượng</label><br>
  <input type="number"  name="SOLUONG" value="<?= $row['SOLUONG'];?>"><br><br>
  <label for="lname">Đơn vị tính</label><br>
  <input type="text"  name="DONVITINH" value="<?= $row['DONVITINH'];?>"><br><br>
  <label for="lname">Gía hàng</label><br>
  <input type="number"  name="GIAHANG" value="<?= $row['GIAHANG'];?>"><br><br>
 
  <input type="submit" value="Submit">
</form> 


</body>
</html>