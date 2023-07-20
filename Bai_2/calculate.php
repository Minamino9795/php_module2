<form action="" method="post">
    <span>
        Nhập vào số x:<br>
        <input type="number" name="numberx" placeholder="Nhập vào x">
    </span><br>

    Nhập vào số y:<br>
    <input type="number" name="numbery" placeholder="Nhập vào y">
    </span><br>
    <input type="submit" value="tính">


</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $so_x = $_REQUEST['numberx'];
    $so_y = $_REQUEST['numbery'];
    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";
    if ($so_y == 0 || ($so_x == 0 && $so_y == 0)) {
        echo "xảy ra  ngoại lệ : / by zero";
    } else {
        echo "Tổng x+y=" . $so_x + $so_y . "<br>";
        echo "Hiệu x-y=" . $so_x - $so_y . "<br>";
        echo "Tích x*y=" . $so_x * $so_y . "<br>";
        echo "thương x/y=" . $so_x / $so_y;
    }
}
