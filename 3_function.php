<?php 

$GLOBALS['colors'] = array('merah', 'kuning', 'hijau');
$GLOBALS['index'] = 0;
$GLOBALS['action'] = 1;

function generateColor($index){
    $index = $GLOBALS['index'];
    $result = $GLOBALS['colors'][$index ];
    $index = $index + 1;

    if($index>2){
        $index = $index - 3;
    }
    $GLOBALS['index'] = $index;
    return $result;
}

echo "Enter Call Function (1-10) : ";
$GLOBALS['action'] = rtrim(fgets(STDIN), "\n\r");

for($x=1; $x<= $GLOBALS['action']; $x++){
    $color = generateColor($x);
    print_r("Call Function $x : $color".PHP_EOL);
}

?>