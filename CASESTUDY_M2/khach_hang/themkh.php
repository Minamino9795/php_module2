<?php
include_once '../connect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $TENKHACHHANG = $_REQUEST['TENKHACHHANG'];
  $DIACHI = $_REQUEST['DIACHI'];
  $EMAIL = $_REQUEST['EMAIL'];
  $SDT = $_REQUEST['SODIENTHOAI'];

  if (empty($TENKHACHHANG) || empty($DIACHI) || empty($EMAIL) || empty($SDT)) {
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
      $sql = "INSERT INTO `khach_hangs` (`TENKHACHHANG`, `DIACHI`, `EMAIL`, `SODIENTHOAI`) 
                      VALUES ('$TENKHACHHANG', '$DIACHI', '$EMAIL', '$SDT')";
      $conn->exec($sql);

      // Chuyển hướng về trang danh sách
      header("Location: ../khach_hang/index.php");
    }
  }
}
?>

<?php
include '../include/header.php';
include '../include/sidebar.php';

include '../include/footer.php';

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
    <h2>Thêm thông tin khách hàng:</h2>

    <form action="" method="POST">
      <label>Tên khách hàng:</label><br>
      <input type="text" name="TENKHACHHANG" id="TENKHACHHANG" require><br><br>
      <label>Địa chỉ: </label><br>
      <input type="text" name="DIACHI" id="DIACHI" require><br><br>
      <label for="email">Email:</label><br>
      <input type="email" name="EMAIL"><br><br>
      <label>Số điện thoai:</label><br>
      <input type="tel" name="SODIENTHOAI" id="SODIENTHOAI"><br><br>


      <button type="submit">submit</button>
      

      
          
      </div>


  </div>
  </form>
  </div>



</body>

</html>