<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo '<pre>';
    print_r($_REQUEST);
    echo '</pre>';
    $usd=$_REQUEST['usd'];
    $vnd=$usd * 23000;
    echo "số tiền bạn đổi ". " = " . $vnd . " VND";
}

?>
<form action="" method="post">
    <label>
       Nhập số tiền USD:<br>
        <input type="number" name="usd" placeholder="nhập số tiền USD"><br>
    </label>
    <input type="submit" value="chuyển đổi">
</form>