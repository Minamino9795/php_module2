<?php
require 'thuc_hanh2_log_in.html';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    $dom = new DOMDocument();
   
    if (strpos($username, ".@gmail.com")==true && $password === "123") {
        echo "<h3>Welcome <span style='color:red'>" . $username . "</span> to website</h3>";
    } else {
        echo "<h3><span style='color:red'>Login Error</span></h3>";
    }
}
