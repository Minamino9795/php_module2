<?php
// Ket noi CSDL
include_once '../connect.php';
// Lay ID tren url xuong
$id = isset($_GET['id']) ? $_GET['id'] : 0;
// Viet cau SQL
$mysql = "DELETE FROM mat_hangs WHERE MAHANG = $id";
// Thuc thi SQL
$conn->exec($mysql);
//Chuyen huong ve danh sach
header("Location:../mat_hang/index.php");
die();

      include '../include/header.php';
      include '../include/sidebar.php';
