<?php
include_once 'db.php';
$sql = "SELECT * FROM `quan_ly_benh_nhans`";
// Truy vấn
$stmt = $conn->query($sql);
// Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC); //array

// Trả về dữ liệu
$rows = $stmt->fetchAll();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // echo '<pre>';
    // print_r ($_REQUEST);
    // die();
    $TENBENHNHAN = $_REQUEST['TENBENHNHAN'];
    $PHONG = $_REQUEST['PHONG'];
    $NGAYNHAPVIEN = $_REQUEST['NGAYNHAPVIEN'];
    $GIOITINH = $_REQUEST['GIOITINH'];
    $TINHTRANG = $_REQUEST['TINHTRANG'];
    $THONGTINBENHNHAN = $_REQUEST['THONGTINBENHNHAN'];

    $sql = "INSERT INTO `quan_ly_benh_nhans`
    ( `TENBENHNHAN`, `PHONG`, `NGAYNHAPVIEN`,`GIOITINH`,`TINHTRANG`, `THONGTINBENHNHAN`)
    VALUES
    ('$TENBENHNHAN','$PHONG','$NGAYNHAPVIEN','$GIOITINH','$TINHTRANG','$THONGTINBENHNHAN')";
    //Thuc hien truy van
    $conn->exec($sql);

    // chuyen huong ve trang danh sach
    header("Location: index.php");
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

        input[type="submit"] {
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
<div>
    <div class="container">

        <div id="content">

            <h2>THÊM BỆNH NHÂN</h2>

            <form action="" method="POST">
                <label for="fname">Tên bệnh nhân</label><br>
                <input type="text" name="TENBENHNHAN"><br>

                <label for="lname">Số phòng</label><br>
                <input type="number" name="PHONG"><br><br>

                <label for="lname">Ngày nhập viện</label><br>
                <input type="date" name="NGAYNHAPVIEN"><br><br>

                <label for="lname">Giới tính</label><br>
                <input type="text" name="GIOITINH"><br><br>

                <label for="lname">Tình trạng</label><br>
                <input type="text" name="TINHTRANG"><br><br>

                <label for="lname">Thông tin bệnh nhân</label><br>
                <input type="text" name="THONGTINBENHNHAN"><br><br>

                <input type="submit" value="Submit">
            </form>






        </div>
        </body>

</html>