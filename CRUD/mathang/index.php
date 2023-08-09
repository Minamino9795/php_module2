<?php
include_once 'db.php';
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

<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h2>Liệt kê loại hàng</h2>

    <table>
        <tr>
            <th>Stt</th>
            <th>Tên hàng</th>
            <th>Mã công ty</th>
            <th>Mã loại hàng</th>
            <th>Số lượng</th>
            <th>Đơn vị tính</th>
            <th>Giá hàng</th>
            <th>Hành dộng</th>
        </tr>
        <?php
        foreach($rows as $r) :
            // echo '<pre>';
            // print_r($r);
            // die();
        ?>   
    <tr>
        <td><?php echo $r['MAHANG'];?> </td>
        <td><?php echo $r['TENHANG'];?> </td>
        <td><?php echo $r['MACONGTY'];?> </td>
        <td><?php echo $r['MALOAIHANG'];?> </td>
        <td><?php echo $r['SOLUONG'];?> </td>
        <td><?php echo $r['DONVITINH'];?> </td>
        <td><?php echo $r['GIAHANG'];?> </td>
        <td>
            <a href="edit.php?id=<?php echo $r['MAHANG'];?>">Sua</a> |  
            <a onclick=" return confirm('Are you sure ?'); " href="delete.php?id=<?php echo $r['MAHANG'];?>">Xoa</a> 
        </td>
    </tr>

    <!-- Kết thúc vòng lặp -->
    <?php endforeach; ?>

    </table>

</body>

</html>