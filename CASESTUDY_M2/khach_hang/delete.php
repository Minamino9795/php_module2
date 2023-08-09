<?php
// Ket noi CSDL
include_once '../connect.php';
// Lay ID tren url xuong
$id = isset($_GET['id']) ? $_GET['id'] : 0;
// Viet cau SQL
$mysql = "DELETE FROM khach_hangs WHERE MAKHACHHANG = $id";
// Thuc thi SQL
$conn->exec($mysql);
//Chuyen huong ve danh sach
header("Location:../khach_hang/index.php");
die();

      include '../include/header.php';
      include '../include/sidebar.php';
