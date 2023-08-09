<?php
include_once '../connect.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $id = 0;
}

$id = isset($_GET['id']) ? $_GET['id'] : 0;

if (!$id) {
  header("Location: index.php");
}
$sql = "SELECT * FROM `khach_hangs` WHERE MAKHACHHANG = $id";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC); //array 
// Lay ve du lieu duy nhat
$row = $stmt->fetch();
// echo '<pre>';
// print_r($row);
// die();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // in du lieu nguoi dung gui len
  // echo '<pre>';
  // print_r( $_REQUEST );
  // die();
  // 
  $TENKHACHHANG = $_REQUEST['TENKHACHHANG'];
  $DIACHI = $_REQUEST['DIACHI'];
  $EMAIL = $_REQUEST['EMAIL'];
  $SDT = $_REQUEST['SODIENTHOAI'];
  if (empty($TENKHACHHANG) || empty($DIACHI) || empty($SDT)) {
    echo '<script>alert("Vui lòng điền đầy đủ thông tin khách hàng!");</script>';
  } else {
    $existingEmailCheckSql = "SELECT COUNT(*) FROM `khach_hangs` WHERE `EMAIL` = :email";
    $existingEmailCheckStmt = $conn->prepare($existingEmailCheckSql);
    $existingEmailCheckStmt->bindParam(':email', $EMAIL);
    $existingEmailCheckStmt->execute();

    $emailExists = $existingEmailCheckStmt->fetchColumn();

    if ($emailExists) {
      echo '<script>alert("Email đã tồn tại!");</script>';

    } else {

      $sql = "UPDATE `khach_hangs` SET `TENKHACHHANG` = '$TENKHACHHANG',  `DIACHI` = '$DIACHI',`EMAIL` = '$EMAIL',`SODIENTHOAI` = '$SDT' WHERE `MAKHACHHANG` = $id";
      //Thuc hien truy van
      $conn->exec($sql);

      // chuyen huong ve trang danh sach
      header("Location:../khach_hang/index.php");
    }
  }
}

?>
<?php
include '../include/header.php';
include '../include/sidebar.php';

?>
<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      display: flex;
      justify-content: flex-start;
      align-items: center;
      height: 100vh;

      background-color: #e7e7e7;
      position: relative;
    }

    .container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 360px;
      height: 100%;
      /* Thêm thuộc tính height */
      padding: 20px;
      border-radius: 8px;
      background-color: #fff;
      /* Đổi màu nền thành trắng */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #333;
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 60px;
    }

    label {
      font-weight: bold;
      color: #555;
      display: block;
      margin-bottom: 5px;
    }

    input {
      width: 95%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      transition: border-color 0.3s ease;
    }

    button[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
      padding: 10px;
      transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
      background-color: #45a049;
    }

    input:focus {
      border-color: #4CAF50;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Sửa thông tin khách hàng</h2>

    <form action="" method="POST">
      <label for="fname">Tên khách hàng:</label><br>
      <input type="text" name="TENKHACHHANG" value="<?= $row['TENKHACHHANG']; ?>"><br>
      <label for="lname">Địa chỉ:</label><br>
      <input type="text" name="DIACHI" value="<?= $row['DIACHI']; ?>"><br><br>
      <label for="lname">Email:</label><br>
      <input type="email" name="EMAIL" value="<?= $row['EMAIL']; ?>"><br><br>
      <label for="lname">Số điện thoại:</label><br>
      <input type="tel" name="SODIENTHOAI" value="<?= $row['SODIENTHOAI']; ?>"><br><br>


      <button type="submit">submit</button>
      <link rel="stylesheet" href="style.css">
    </form>
  </div>

</body>

</html>