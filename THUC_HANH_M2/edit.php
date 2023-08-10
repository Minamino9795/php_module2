<?php
include_once 'db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

$id = isset($_GET['id']) ? $_GET['id'] : 0;

if (!$id) {
    header("Location: index.php");
}
$sql = "SELECT * FROM `quan_ly_benh_nhans` WHERE ID = $id";
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
    $TENBENHNHAN = $_REQUEST['TENBENHNHAN'];
    $PHONG = $_REQUEST['PHONG'];
    $NGAYNHAPVIEN = $_REQUEST['NGAYNHAPVIEN'];
    $GIOITINH = $_REQUEST['GIOITINH'];
    $TINHTRANG = $_REQUEST['TINHTRANG'];
    $THONGTINBENHNHAN = $_REQUEST['THONGTINBENHNHAN'];


    $sql = "UPDATE `quan_ly_benh_nhans` SET `TENBENHNHAN` = '$TENBENHNHAN',  `PHONG` = '$PHONG',`NGAYNHAPVIEN` = '$NGAYNHAPVIEN',`GIOITINH` = '$GIOITINH',`TINHTRANG` = '$TINHTRANG',`THONGTINBENHNHAN` = '$THONGTINBENHNHAN' WHERE `ID` = $id";
    //Thuc hien truy van
    $conn->exec($sql);

    // chuyen huong ve trang danh sach
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h2 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>CHỈNH SỬA THÔNG TIN BỆNH NHÂN</h2>

        <form action="" method="POST">
            <label for="fname">Tên bệnh nhân:</label><br>
            <input type="text" name="TENBENHNHAN" value="<?= $row['TENBENHNHAN']; ?>"><br>

            <label for="lname">Số phòng:</label><br>
            <input type="number" name="PHONG" value="<?= $row['PHONG']; ?>"><br><br>

            <label for="lname">Ngày nhập viện:</label><br>
            <input type="date" name="NGAYNHAPVIEN" value="<?= $row['NGAYNHAPVIEN']; ?>"><br><br>

            <label for="lname">Giới tính:</label><br>
            <input type="text" name="GIOITINH" value="<?= $row['GIOITINH']; ?>"><br><br>

            <label for="lname">Tình trạng:</label><br>
            <input type="text" name="TINHTRANG" value="<?= $row['TINHTRANG']; ?>"><br><br>

            <label for="lname">Thông tin bệnh nhân:</label><br>
            <input type="text" name="THONGTINBENHNHAN" value="<?= $row['THONGTINBENHNHAN']; ?>"><br><br>


            <button type="submit">submit</button>

        </form>
    </div>

</body>

</html>