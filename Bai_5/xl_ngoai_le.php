<form action="" method="post">
    <span>
        Nhập số thư nhất:<br>
        <input type="number" name="number1" placeholder="nhập số thứ nhất" style="width:200px">
    </span><br>

    <span>
        Nhập số thứ hai: <br>
        <input type="number" name="number2" placeholder="A.Phú không cho nhập số 0" style="width:200px">
    </span><br>
    <input type="submit" value="tính">
</form>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = $_REQUEST['number1'];
    $num2 = $_REQUEST['number2'];
    //print_r($num2);
    function calculate($phep_tinh, $num1, $num2)
    {
        switch ($phep_tinh) {
            case '+':
                return $num1 + $num2;
            case '-':
                return $num1 - $num2;
            case '*':
                return $num1 * $num2;
            case '/':
                if ($num2 == 0) {
                    throw new Exception("Không thể chia cho 0.");
                }
                return $num1 / $num2;
            default:
                throw new Exception("Phép tính không hợp lệ.");
        }
    }

    try {
        $phep_tinh = '/';
        $result = calculate($phep_tinh, $num1, $num2);
        echo "Kết quả của phép tính $num1 $phep_tinh $num2 là: $result";
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
