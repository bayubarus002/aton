<?php
function generateRandomString($length = 11) {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$ug=array("8.1.0; 4b0e5fe4484d2ea6 Build/25","8.0.0; SM-G960F Build/R16NW","6.0.1; SM-G920V Build/MMB29K","5.1.1; SM-G928X Build/LMY47X","6.0.1; Nexus 6P Build/MMB29P","6.0.1; E6653 Build/32.2.A.0.253","6.0; HTC One M9 Build/MRA58K","7.1.2; 8f8415e0495ca617 Build/25","6.0; 4b2897bdd595f6a9 Build/25");
$random = rand(0,8);
$reff = "0BM6NNM60";
$mail = array ("gagawgagas");
$rand = rand(0,3);
for($a=0;$a< 50 ;$a++){

    // $email = "gagawgagas+".generateRandomString(7)."@hotmail.com";
    $email = "gagawgagas+".generateRandomString(5)."@code-mail.com";
    $post = "email=".urlencode($email)."&password=Agunk123%40&referral_id=$reff&monetize=1";
 
    $arr = array("\r"," ");
    $headers = array();
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    $headers[] = "Accept-Encoding: gzip, deflate";
    $headers[] = "Accept-Language: en-US,en;q=0.5";
    $headers[] = "Upgrade-Insecure-Requests: 0";
    $headers[] = "Host: api.bigtoken.com";
    $headers[] = "X-Client-ID: WW1GelpUWTBPbnBFY1hBMFVrTnNWbUZ4VTNsbFVHSnVlV3BTWm1rd1JrWkhlbHBxWm5OaFVsWjJhM3BhUkhocloyczk=";
    $headers[] = "Host: api.bigtoken.com";
    $headers[] = "User-Agent: BIGtoken/1.0.6.2 Dalvik/2.1.0 Linux; U; Android ".$ug[$random];
    $headers[] = "Accept: application/json";
    $headers[] = "Content-Length: ".strlen($post);
    $headers[] = "Connection: Keep-Alive";
    $url = "https://api.bigtoken.com/signup";
    $h = explode("\n",str_replace($headers,"",""));
 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   
    $result = curl_exec($ch);
    $obj = json_encode($result);
    echo "\e[1;92m$a. Done Register Email => $email\e[0m\n";
    print_r($obj);
 
    echo "\n";
    curl_close($ch);
    sleep(1);
    clearstatcache();
    sleep(5);
    }
?>