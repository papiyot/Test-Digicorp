<?php 
function getRandomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}

$GLOBALS['collToken'] = [];
$GLOBALS['action'] = 'Y';

function generateToken($user)
{
    $cekToken = (isset($GLOBALS['collToken'][$user])) ? count($GLOBALS['collToken'][$user]) : 0;
    $token = getRandomString(10);

    if($cekToken < 10){
        if($cekToken == 0){
            $GLOBALS['collToken'][$user] = array($token);
        }else{
            array_push($GLOBALS['collToken'][$user], $token);
        }
    }else{
        array_push($GLOBALS['collToken'][$user], $token);
        array_splice($GLOBALS['collToken'][$user], 0, 1);
    }

    return $token;
}

function verifyToken($user, $token)
{
    $cekUser = (isset($GLOBALS['collToken'][$user])) ? true : false;
    if($cekUser){
        $result = "FALSE";
        foreach($GLOBALS['collToken'][$user] as $index => $value){
            if($value == $token){
                $result = "TRUE";
                array_splice($GLOBALS['collToken'][$user], $index, 1);
            }
        }
        return $result;
    }
    return "FALSE";
}

echo "Enter User Name : ";
$GLOBALS['username'] = rtrim(fgets(STDIN), "\n\r");

for($x=1; $x<=12; $x++){
    $resulToken = generateToken($GLOBALS['username']);
    print_r("Call Generate Token $x : $resulToken".PHP_EOL);
}
// print_r(getRandomString(10));
print_r($GLOBALS['collToken'][$GLOBALS['username']]);

do{
    echo "Verify User Name : ";
    $GLOBALS['username'] = rtrim(fgets(STDIN), "\n\r");

    echo "Verify User Token : ";
    $GLOBALS['token'] = rtrim(fgets(STDIN), "\n\r");

    $isverify = verifyToken($GLOBALS['username'], $GLOBALS['token']);
    print_r("User is Verify $isverify".PHP_EOL);

    echo "Call Function Verify User (Y/N) : ";
    $GLOBALS['action'] = rtrim(fgets(STDIN), "\n\r");

}while($GLOBALS['action'] == 'Y' || $GLOBALS['action'] == 'y')

?>