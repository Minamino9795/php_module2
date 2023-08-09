<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS cho hình ảnh và văn bản */
        .image-container {
            text-align: center; /* Canh giữa hình ảnh và văn bản */
            margin: 125px; /* Khoảng cách với nội dung xung quanh */
        }

        .image-container img {
            max-width: 100%; /* Kích thước tối đa của hình ảnh là 100% chiều rộng của phần tử cha */
            height: auto; /* Đảm bảo tỷ lệ hình ảnh không bị méo */
        }

        .image-container p {
            margin-top: 10px; /* Khoảng cách từ hình ảnh đến văn bản */
            font-size: 40px; /* Kích thước chữ của văn bản */
            color: #333; /* Màu chữ */
        }
       
    </style>
</head>
<body>
    <?php 
    include 'connect.php';
    ?>

    <?php
    include 'include/header.php';
    include 'include/sidebar.php';
    ?>

    <!-- Nội dung trang chủ của mọi người -->
    <div class="image-container">
        <img src="https://iweb.tatthanh.com.vn/pic/3/blog/logo-shop-quan-ao-nam.jpg" alt="">
        <p>Lựa chọn tuyệt vời cho phái mạnh</p>
    </div>

    <?php 
    include 'include/footer.php';
    ?>
</body>
</html>
