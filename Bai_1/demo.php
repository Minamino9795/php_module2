<?php

function hcn($width, $height) {
    for ($i = 1; $i <= 4; $i++) {
        for ($j = 1; $j <= 12; $j++) {
            echo "*";
        }
        echo "<br>";
    }
}
hcn(12,4);