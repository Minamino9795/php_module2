<form action="" method="post">
    <label for="">
        Tên người dùng:<br>
        <input type="text" name="name" placeholder="Nhập tên">
    </label><br>
    <label for="">
        Email:<br>
        <input type="mail" name="mail" placeholder="Nhập mail">
    </label><br>
    <label for="">
        Số điện thoại:<br>
        <input type="number" name="sdt" placeholder="Nhập số điện thoại">
    </label><br>
    <input type="submit" value="Đăng ký">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $a=[ $name = $_REQUEST['name'],
    $mail = $_REQUEST['mail'],
    $phone = $_REQUEST['sdt']
    ];
}


switch ($a) {
    case empty($name):
        echo "Bạn chưa nhập tên!";
        break;
        case empty($mail):
           
            echo "Bạn chưa nhập mail!";
            break;
            case empty($phone):
                echo "Bạn chưa nhập số điện thoại!";
                break;
   
}
function saveDataJSON( $name, $mail, $phone){

}
?>

<table border="1">
<caption><h2>Danh sách khách hàng</h2></caption>
    <tr>
   
    <th>tên</th>
    <th>mail</th>
    <th>sdt</th>
    </tr>
    <tr>
            
            <td><?php echo $name;?></td>
            <td><?php echo $mail;?></td>
            <td><?php echo $phone;?></td>
         
        </tr>
</table>