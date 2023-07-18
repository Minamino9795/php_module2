<?php
 // $_SERVER: thông tin máy chủ
    // $_POST  : nhận dữ liệu gửi lên qua method POST
    // $_GET   : nhận dữ liệu gửi lên qua method GET
    // $_REQUEST : nhận dữ liệu gửi lên qua method GET

    // if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    //     // Xử lý
    //     // Lấy giá trị gửi lên
    //     echo '<pre>';
    //     print_r($_REQUEST);
    //     echo '</pre>';

    //     // Lưu trữ
    //     $ho_va_ten = $_REQUEST['ho_va_ten'];
    //     $mat_khau = $_REQUEST['mat_khau'];

    //     // Xử lý
    //     if( $ho_va_ten == 'admin' && $mat_khau == '123456' ){
    //         echo 'Chao mung admin';
    //     }else{
    //         echo 'Tai khoan khong dung';
    //     }
        
    // }
    // echo '<pre>';
    // print_r($_SERVER);
    // echo '</pre>';
    if($_SERVER['REQUEST_METHOD']== 'POST'){
        echo '<pre>';
        print_r($_REQUEST);
        echo '</pre>';
        $ho_va_ten =$_REQUEST['ho_va_ten'];
        $mat_khau =$_REQUEST['mat_khau'];
        if($ho_va_ten=='admin' && $mat_khau==123){
            echo "chao mung admin";
        }else{
            echo "loi dang nhap";
        }
    }

?>
<form action="" method="post">
    Ten dang nhap: <input type="text" name="ho_va_ten" > <br>
    Mat khau: <input type="password" name="mat_khau" > <br>
    <input type="submit" value="Dang nhap">
</form>