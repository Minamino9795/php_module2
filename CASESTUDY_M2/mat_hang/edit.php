<?php
include_once '../connect.php';

$sql_san_pham = "SELECT * FROM `san_pham`";
$stmt_san_pham = $conn->query($sql_san_pham);
$stmt_san_pham->setFetchMode(PDO::FETCH_ASSOC);
$rows_san_pham = $stmt_san_pham->fetchAll();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

$id = isset($_GET['id']) ? $_GET['id'] : 0;

if (!$id) {
    header("Location: ../index.php");
}

$sql_mat_hangs = "SELECT * FROM `mat_hangs` WHERE MAHANG = $id";
$stmt_mat_hangs = $conn->query($sql_mat_hangs);
$stmt_mat_hangs->setFetchMode(PDO::FETCH_ASSOC);
$row_mat_hangs = $stmt_mat_hangs->fetch();
// var_dump($row_mat_hangs);
// die();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $TENHANG = $_POST['TENHANG'];
    $ID_SP = $_POST['ID_SANPHAM'];
    $SOLUONG = $_POST['SOLUONG'];
    $DONVITINH = $_POST['DONVITINH'];
    $GIA = $_POST['GIA'];




    $img = '';
    $img = $row_mat_hangs['IMG'];
    if (isset($_FILES['IMG']) && $_FILES['IMG']['error'] === 0) {
        $uploadDir = ROOT_DIR . '/public/uploads/';
        $uploadFile = $uploadDir . basename($_FILES['IMG']['name']);

        if (move_uploaded_file($_FILES['IMG']['tmp_name'], $uploadFile)) {
            $img = '/public/uploads/' . $_FILES['IMG']['name'];
        }
    }


    $sql_update = "UPDATE `mat_hangs` SET `TENHANG` = '$TENHANG',`IMG` = '$img', `ID_SANPHAM` = '$ID_SP' ,  `SOLUONG` = '$SOLUONG', `GIA` = '$GIA' , `DONVITINH` = '$DONVITINH' WHERE `MAHANG` = $id";
    $conn->exec($sql_update);

    header("Location:../mat_hang/index.php");
}
?>

<?php
include '../include/header.php';
include '../include/sidebar.php';
?>
<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">
        <style>
            /* Định dạng form chỉnh sửa thông tin */
            .edit-product-form {
                max-width: 500px;
                margin: 20px auto;
                padding: 20px;
                background-color: #f9f9f9;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .edit-product-form h2 {
                color: #673ab7;
                margin-bottom: 10px;
            }

            .edit-product-form label {
                display: block;
                margin-top: 10px;
                font-weight: bold;
                text-align: left;
            }

            .edit-product-form select,
            .edit-product-form input[type="text"],
            .edit-product-form input[type="number"] {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                margin-top: 5px;
            }

            .edit-product-form input[type="submit"] {
                padding: 10px 20px;
                background-color: #673ab7;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.2s ease;
            }

            .edit-product-form input[type="submit"]:hover {
                background-color: #512da8;
            }
        </style>

        <div class="edit-product-form">
            <h2>Chỉnh sửa thông tin</h2>

            <form action="" method="POST" enctype="multipart/form-data">
                <label>Tên hàng</label>
                <input type="text" name="TENHANG" value="<?= $row_mat_hangs['TENHANG']; ?>"><br>
                
                <label for="anh">Ảnh:</label>
                <input type="file" name="IMG" require><br><br>
                <?php if (!empty($row_mat_hangs['IMG'])) : ?>
                    <img src="<?= 'http://localhost/CASESTUDY_M2/' . htmlspecialchars($row_mat_hangs['IMG']); ?>" alt="<?= htmlspecialchars($row_mat_hangs['MAHANG']); ?>" style="max-width: 100px;">
                <?php endif; ?>



                <label>Mã sản phẩm</label>
                <select name="ID_SANPHAM">
                    <?php foreach ($rows_san_pham as $row_san_pham) : ?>
                        <option value="<?php echo $row_san_pham['id']; ?>" <?php if ($row_mat_hangs['ID_SANPHAM'] == $row_san_pham['id']) echo "selected"; ?>>
                            <?php echo $row_san_pham['TENSANPHAM']; ?>
                        </option>
                    <?php endforeach; ?>
                </select><br><br>


                <label>Số lượng</label>
                <input type="number" name="SOLUONG" value="<?= $row_mat_hangs['SOLUONG']; ?>"><br><br>
                <label>Đơn vị tính</label>
                <input type="text" name="DONVITINH" value="<?= $row_mat_hangs['DONVITINH']; ?>"><br><br>
                <label>Giá hàng</label>
                <input type="number" name="GIA" value="<?= $row_mat_hangs['GIA']; ?>"><br><br>

                <input type="submit" value="Submit">
            </form>

            <?php
            include '../include/footer.php';
            ?>