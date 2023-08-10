<?php
include_once 'db.php';
$sql = "SELECT * FROM `quan_ly_benh_nhans`";

// Truy vấn
$stmt = $conn->query($sql);
// Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC); //array 

// Trả về dữ liệu
$rows = $stmt->fetchAll(); //[]

// echo '<pre>';
// print_r($rows);
// die();
?>

<?php
$sql = "SELECT * FROM `quan_ly_benh_nhans`";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Thực hiện truy vấn tìm kiếm
    $sql = "SELECT * FROM `quan_ly_benh_nhans` WHERE `TENBENHNHAN` LIKE :searchTerm";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll();
}


?>


<!DOCTYPE html>
<html>

<head>
    <!DOCTYPE html>
    <html>

    <head>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th,
            td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            .add-button-container {
                margin-top: 20px;
            }

            .add-button {
                padding: 10px 20px;
                background-color: #007bff;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }

            #search {
                padding: 8px;
                width: 300px;
            }

            input[type="submit"] {
                padding: 8px 15px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .btn {
                padding: 5px 10px;
                border: none;
                border-radius: 3px;
                cursor: pointer;
            }

            .btn-primary {
                background-color: #007bff;
                color: white;
            }

            .btn-danger {
                background-color: #dc3545;
                color: white;
            }
        </style>
    </head>

<body>

</body>

</html>


</head>

<body>

    <h2>DANH SÁCH BỆNH NHÂN </h2>
    <div class="add-button-container">
        <a href="http://localhost/THUC_HANH_M2/create.php" class="add-button">Thêm bệnh nhân</a>
    </div>
    <br><br>

    <!-- Thêm biểu mẫu tìm kiếm -->
    <form action="" method="GET" enctype="multipart/form-data">
        <label for="search">Tìm kiếm bệnh nhân:</label>
        <input type="text" name="search" id="search" placeholder="Nhập tên bệnh nhân">
        <input type="submit" value="Tìm kiếm">
    </form><br>

    <table>

        <tr>
            <th>STT</th>
            <th>Tên bệnh nhân</th>
            <th>Số phòng</th>
            <th>Ngày nhập viện</th>
            <th>Giới tính</th>
            <th>Tình trạng</th>
            <th>Thông tin bệnh nhân</th>
            <th>Tùy chọn</th>
        </tr>



        <?php
        foreach ($rows as $r) :
            // echo '<pre>';
            // print_r($r);
            // die();
        ?>
            <tr>
                <td><?php echo $r['ID']; ?> </td>
                <td><?php echo $r['TENBENHNHAN']; ?> </td>
                <td><?php echo $r['PHONG']; ?> </td>
                <td><?php echo $r['NGAYNHAPVIEN']; ?> </td>
                <td><?php echo $r['GIOITINH']; ?> </td>
                <td><?php echo $r['TINHTRANG']; ?> </td>
                <td><?php echo $r['THONGTINBENHNHAN']; ?> </td>

                <td>
                    <a href="edit.php?id=<?php echo $r['ID']; ?>">
                        <button type="button" class="btn btn-primary">Sửa</button> |
                        <a onclick=" return confirm('Are you sure ?'); " href="delete.php?id=<?php echo $r['ID']; ?>">
                            <button type="button" class="btn btn-danger">Xóa</button>


                </td>
            </tr>


        <?php endforeach; ?>

    </table>