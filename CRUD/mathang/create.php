<?php
include_once 'db.php';
if ($_SERVER['REQUEST_METHOD']=="POST"){
    // echo '<pre>';
    // print_r ($_REQUEST);
    // die();
    $TENHANG = $_REQUEST['TENHANG'];
    $MACONGTY = $_REQUEST['MACONGTY'];
    $MALOAIHANG = $_REQUEST['MALOAIHANG'];
    $SOLUONG = $_REQUEST['SOLUONG'];
    $DONVITINH = $_REQUEST['DONVITINH'];
    $GIAHANG = $_REQUEST['GIAHANG'];

    $sql = "INSERT INTO `mat_hangs` 
    ( `TENHANG`, `MACONGTY`, `MALOAIHANG`,`SOLUONG`,`DONVITINH` ,`GIAHANG`) 
    VALUES 
    ('$TENHANG','$MACONGTY','$MALOAIHANG','$SOLUONG','$DONVITINH','$GIAHANG')";
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

<form action="" method="POST">
  <label >tên hàng</label><br>
  <input type="text"  name="TENHANG"><br>
  <label >mã công ty</label><br>
  <input type="number"  name="MACONGTY" ><br><br>
  <label >mã loại hàng</label><br>
  <input type="number"  name="MALOAIHANG" ><br><br>
  <label >số lượng</label><br>
  <input type="number"  name="SOLUONG" ><br><br>
  <label >đơn vị  tính</label><br>
  <input type="text"  name="DONVITINH" ><br><br>
  <label >giá hàng</label><br>
  <input type="text"  name="GIAHANG" ><br><br>

  <input type="submit" value="Submit">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>

