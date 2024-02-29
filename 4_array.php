<?php 
$data = array(rand(1,100), rand(1,100), rand(1,100), rand(1,100), rand(1,100));
print_r("Daftar Nilai".PHP_EOL);
print_r($data);
rsort($data);
print_r("Daftar Nilai Tertinggi ke 2 adalah $data[1]".PHP_EOL);
?>