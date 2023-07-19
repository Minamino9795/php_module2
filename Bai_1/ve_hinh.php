<form action="" method="post">
    <select name="chon_hinh" id="">
        <option value="hinh_chu_nhat">hình chữ nhật</option>
        <option value="tam_giac_vuong">tam giác vuông</option>
        <option value="tam_giac_can">tam giác cân</option>
    </select>
    <input type="submit" value="in">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $chon_hinh = $_REQUEST['chon_hinh'];
    switch ($chon_hinh) {
        case 'hinh_chu_nhat':
            function hcn($width, $height)
            {
                for ($i = 1; $i <= 4; $i++) {
                    for ($j = 1; $j <= 12; $j++) {
                        echo "*";
                    }
                    echo "<br>";
                }
            }
            hcn(12, 4);
            break;
        case 'tam_giac_vuong':
            function tgv($size)
            {
                for ($i = 1; $i <= $size; $i++) {
                    for ($j = 1; $j <= $i; $j++) {
                        echo "*";
                    }
                    echo "<br>";
                }
            }
            tgv(5);
            break;
        case 'tam_giac_can':
            function tgc($height)
            {
                for ($i = 1; $i <= $height; $i++) {
                    for ($j = 1; $j <= $height - $i; $j++) {
                        echo "&nbsp;&nbsp";
                    }
                    for ($j = 1; $j <= 2 * $i - 1; $j++) {
                        echo "*";
                    }
                    echo "<br>";
                }
            }

            // Vẽ tam giác cân có chiều cao 5
            tgc(5);



    }
}
?>