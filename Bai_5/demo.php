<?php
function calculate($operator, $num1, $num2)
{
    switch ($operator) {
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
    $operator = '/';
    $num1 = 10;
    $num2 = 0;

    $result = calculate($operator, $num1, $num2);
    echo "Kết quả của phép tính $num1 $operator $num2 là: $result";
} catch (Exception $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>
