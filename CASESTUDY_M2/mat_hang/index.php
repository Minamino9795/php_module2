<?php
include_once '../connect.php';
$sql = "SELECT * FROM `mat_hangs`";

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
include '../include/header.php';
include '../include/sidebar.php';

?>
<?php


$sql = "SELECT * FROM `mat_hangs`";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Thực hiện truy vấn tìm kiếm
    $sql = "SELECT * FROM `mat_hangs` WHERE `TENHANG` LIKE :searchTerm";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll();
}


?>


<!DOCTYPE html>
<html>

<head>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }


        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #673ab7;
            color: #fff;
        }

        td {
            background-color: #f1e3ff;
        }


        a {
            color: #673ab7;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #673ab7;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        .button:hover {
            background-color: #512da8;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(103, 58, 183, 0.3);
        }


        .button-vibrant {
            box-shadow: 0 4px 8px rgba(103, 58, 183, 0.3);
        }

        th {
            background: linear-gradient(to right, #512da8, #673ab7);
        }



        /* Style for the "Thêm khách hàng" button */
        .add-button-container {
            text-align: center;
            margin-top: 20px;
        }

        .add-button {
            display: inline-block;
            padding: 5px 10px;
            background-color: #3daf04;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.2s ease;
            float: left;
        }

        .add-button:hover {
            background-color: #f6976b;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(255, 64, 129, 0.3);
        }
    </style>
</head>

<body>

    <h2>Thông tin sản phẩm:</h2>
    <div class="add-button-container">
        <a href="../mat_hang/create.php" class="add-button">Thêm sản phẩm</a>
    </div>
    <br><br>
    <!-- Thêm biểu mẫu tìm kiếm -->
    <form action="" method="GET" enctype="multipart/form-data">
        <label for="search">Tìm kiếm sản phẩm:</label>
        <input type="text" name="search" id="search" placeholder="Nhập tên sản phẩm">
        <input type="submit" value="Tìm kiếm">
    </form>

    <table>

        <tr>
            <th>STT</th>
            <th>Tên hàng</th>
            <th>Ảnh sản phẩm</th>
            <th>Mã Sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn vị tính</th>
            <th>Giá</th>
            <th>Tùy chọn</th>
        </tr>



        <?php
        foreach ($rows as $r) :
            // echo '<pre>';
            // print_r($r);
            // die();
        ?>
            <tr>
                <td><?php echo $r['MAHANG']; ?> </td>
                <td><?php echo $r['TENHANG']; ?> </td>
                <td><img width="100" src="<?php echo 'http://localhost/CASESTUDY_M2/' . $r['IMG']; ?>" alt=""></td>

                <td><?php echo $r['ID_SANPHAM']; ?> </td>
                <td><?php echo $r['SOLUONG']; ?> </td>
                <td><?php echo $r['DONVITINH']; ?> </td>
                <td><?php echo $r['GIA']; ?> </td>

                <td>
                    <a href="../mat_hang/edit.php?id=<?php echo $r['MAHANG']; ?>">
                        <button type="button" class="btn btn-primary">Sửa</button> |
                        <a onclick=" return confirm('Are you sure ?'); " href="../mat_hang/delete.php?id=<?php echo $r['MAHANG']; ?>">
                            <button type="button" class="btn btn-danger">Xóa</button>


                </td>
            </tr>


        <?php endforeach; ?>

    </table>


    <?php
    include '../include/footer.php';
