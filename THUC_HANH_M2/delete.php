<?php
// Ket noi CSDL
// Lay ID tren url xuong
// Viet cau SQL
// Thuc thi SQL
include_once 'db.php';
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$mysql = "DELETE FROM quan_ly_benh_nhans WHERE ID = $id";
$conn->exec($mysql);
//Chuyen huong ve danh sach
header("Location:index.php");
die();
