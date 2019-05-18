<?php
function cetak($isi)
{
    return md5($isi);
}
function arrayContainsDuplicate($isi)
{
    return count($isi) != count(array_unique($isi));
}

echo cetak(2);
