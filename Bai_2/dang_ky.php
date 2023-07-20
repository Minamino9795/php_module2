<?php

    function saveDataJSON($filename, $name, $email, $phone){
        $saved = true;

        // Tạo mảng $contact chứa thông tin $name, $email, $phone.
        $contact = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        ];

        // Lấy giá trị cũ

        // Lấy giá trị từ file: chuỗi json
        $dataJson = file_get_contents($filename);

        // CHuyển chuỗi json sang mảng
        $dataArr = json_decode($dataJson,true);

        // Đưa phần tử vào mảng
        array_push($dataArr,$contact);


        // echo "<pre>";
        // print_r($dataArr);
        // echo "</pre>";
        // die();


        // Sử dụng hàm json_encode(): chuyển đổi từ mảng dữ liệu sang dạng json
        $json = json_encode($dataArr);

        // Sử dụng hàm file_put_contents(): lưu dữ liệu dạng json vào file
        file_put_contents($filename, $json);

        return $saved;
    }

    $error = array();

    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        // echo "<pre>";
        // print_r($_REQUEST);
        // echo "</pre>";
        $ten_nguoi_dung = $_REQUEST['ten_nguoi_dung'];
        $email = $_REQUEST['email'];
        $dien_thoai = $_REQUEST['dien_thoai'];
        // xu ly
        if (empty($ten_nguoi_dung)) {
            $error['ten_nguoi_dung'] = 'Bạn chưa nhập tên';
        }
        if (empty($email)) {
           $error['email'] = 'Bạn chưa nhập email';
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = 'Email không hợp lệ';
            }
        }
        if (empty($dien_thoai)) {
           $error['dien_thoai'] = 'Bạn chưa nhập số điện thoại';
        }

        // Khong co lỗi
        if( count($error) == 0 ){
            $saved = saveDataJSON('users.json', $ten_nguoi_dung, $email, $dien_thoai);
            if( $saved ){
                echo 'Luu thanh cong';
            }else{
                echo 'Luu that bai';
            }
        }

        // echo "<pre>";
        // print_r($error);
        // echo "</pre>";
    }

    // if( isset($error['ten_nguoi_dung']) ){
    //     echo $error['ten_nguoi_dung'];
    // }else{
    //     echo '';
    // }

    
?>
<form action="" method="post">
    <p>
        Ten nguoi dung:<br>
         <input type="text" name="ten_nguoi_dung"> <br>
        <span style="color:red;">
            <?php echo isset($error['ten_nguoi_dung']) ? $error['ten_nguoi_dung'] : ''; ?>
        </span>
    </p>
    <p>
        Email:<br>
         <input type="text" name="email"> <br>
        <span style="color:red;">
            <?php echo isset($error['email']) ? $error['email'] : ''; ?>
        </span>
    </p>
    <p>
        Dien thoai:<br>
        <input type="text" name="dien_thoai"> <br>
        <span style="color:red;">
            <?php echo isset($error['dien_thoai']) ? $error['dien_thoai'] : ''; ?>
        </span>
    </p>
    <input type="submit" value="nhap vao">
</form>
<?php
    $dataJson = file_get_contents('users.json');
    $dataArr  = json_decode($dataJson,true);
//     echo "<pre>";
//     print_r($dataArr);
//     echo "</pre>";
// ?>

<table border="1" width="100%">
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    
    <?php foreach( $dataArr as $key => $user ): ?>
    <tr>
        <td><?php echo $key + 1; ?></td>
        <td><?php echo $user['name']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['phone']; ?></td>
        
    </tr>
    <?php endforeach; ?>
</table>
