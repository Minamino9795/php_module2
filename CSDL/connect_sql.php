<?php
$sever_name= 'localhost';
$user_name='root';
$password="";
$database='ban_hang';
$connect= mysqli_connect($sever_name,$user_name,$password,$database);
if (!$connect){
    echo 'kết nối không thành công';
}
else {
    echo 'kết nối thành công';
}
?>