<?php
$username   = 'root';
$password   = '';
$database   = 'web_ban_hang';
define('ROOT_DIR', dirname(__FILE__));
try {
    $conn = new PDO('mysql:host=localhost;dbname=' . $database, $username, $password);
} catch (Exception $e) {
    // echo $e->getMessage();
    echo '<h1>Khong the ket noi CSDL</h1>';
}
