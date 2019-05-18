<?php
$ukuran = 5;
$batas = ($ukuran) - 1;
for ($i = 0; $i < ($ukuran); $i++) {
    for ($x = 0; $x < ($ukuran); $x++) {
        if ($i == $x) {
            echo "X ";
        } elseif ($x == $batas) {
            echo "X";
        } else {
            echo "= ";
        }
    };
    $batas--;
    echo "<br>";
}
