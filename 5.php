<?php

function minmax($data)
{
    $alength = count($data);
    $huruf = [];
    for ($x = 0; $x < $alength; $x++) {
        if ($data[$x] == "a") {
            $huruf[] = $data[$x];
        } elseif ($x == ($alength - 1)) {
            $huruf[] = $data[$x];
        }
    }
    echo json_encode($huruf);
}

$data = ["h", "g", "a", "b", "d", "f"];
$datalain = ["a", "b", "c", "d"];
echo minmax($data);
echo "<br>";
echo minmax($datalain);
