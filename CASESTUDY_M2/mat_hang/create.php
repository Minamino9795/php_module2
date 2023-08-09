<?php
include_once '../connect.php';

$sql = "SELECT * FROM `san_pham`";
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
  $TENHANG = $_REQUEST['TENHANG'];
  $ID_SANPHAM = $_REQUEST['ID_SANPHAM'];
  $SOLUONG = $_REQUEST['SOLUONG'];
  $DONVITINH = $_REQUEST['DONVITINH'];
  $GIA = $_REQUEST['GIA'];


  $img = '';

  if (isset($_FILES['IMG']) && $_FILES['IMG']['error'] === 0) {
    $uploadDir = ROOT_DIR . '/public/uploads/';
    $uploadFile = $uploadDir . basename($_FILES['IMG']['name']);

    if (move_uploaded_file($_FILES['IMG']['tmp_name'], $uploadFile)) {
      $img = '/public/uploads/' . $_FILES['IMG']['name'];
    }
  }
  if (empty($TENHANG) || empty($ID_SANPHAM) || empty($SOLUONG) || empty($GIA)) {
    echo '<script>alert("Vui lòng điền đầy đủ thông tin khách hàng!");</script>';
  } else {

    $sql = "INSERT INTO `mat_hangs`
    ( `TENHANG`, `IMG`,`ID_SANPHAM`,`SOLUONG`,`DONVITINH`, `GIA`)
    VALUES
    ('$TENHANG','$img','$ID_SANPHAM','$SOLUONG','$DONVITINH','$GIA')";
    //Thuc hien truy van
    $conn->exec($sql);

    // chuyen huong ve trang danh sach
    header("Location: ../mat_hang/index.php");
  }
}



?>
<?php
include '../include/header.php';
include '../include/sidebar.php';

?>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">
    <style>
      .add-product-form {
        text-align: center;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 500px;
      }

      .add-product-form h2 {
        color: #673ab7;
        margin-bottom: 10px;
      }

      .add-product-form label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
        text-align: left;
      }

      .add-product-form select,
      .add-product-form input[type="text"],
      .add-product-form input[type="number"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-top: 5px;
      }

      .add-product-form input[type="submit"] {
        padding: 10px 20px;
        background-color: #673ab7;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.2s ease;
      }

      .add-product-form input[type="submit"]:hover {
        background-color: #512da8;
      }
    </style>

    <div class="add-product-form">


      <h2>Thêm sản phẩm</h2>

      <form action="" method="POST" enctype="multipart/form-data">

        <label for="name">Tên hàng</label><br>
        <input type="text" name="TENHANG" require><br>

        <label for="anh">Ảnh:</label><br>
        <input type="file" name="IMG" require><br>

        <label for="lname">Mã loại hàng</label><br>
        <select name="ID_SANPHAM">
          <?php foreach ($rows as $row) : ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['TENSANPHAM']; ?></option>
          <?php endforeach; ?>
        </select><br><br>
        <label for="lname">Số lượng</label><br>
        <input type="number" name="SOLUONG" require><br>
        <label for="lname">Đơn vị tính</label><br>
        <input type="text" name="DONVITINH" require><br>
        <label for="lname">Giá hàng</label><br>
        <input type="number" name="GIA" require><br><br>

        <input type="submit" value="Submit">
      </form>






    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php
    include '../include/footer.php';
    ?>
    <!-- End of Footer -->