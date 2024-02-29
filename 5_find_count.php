<?php 
function callCountWord($word)
{
    $split = str_split($word);
    $cast = array_count_values($split);

    $result = [
        'karakter' => null,
        'count' => 0
    ];

    foreach($cast as $key=>$val){
        if($val > $result['count']){
            $result['count'] = $val;
            $result['karakter'] = $key;
        }
    }

    // print_r($result);
    return $result;
}

echo "Masukkan Kata : ";
$GLOBALS['word'] = rtrim(fgets(STDIN), "\n\r");

$count = callCountWord($GLOBALS['word']);
$karakter = $count['karakter'];
$xcount = $count['count'];
$word = $GLOBALS['word'];

print_r("Karakter Terbanyak yang sering muncul di kata $word adalah karakter $karakter sebanyak $xcount".PHP_EOL);
?>