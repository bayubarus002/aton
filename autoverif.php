<?php
function get_link($url){
$ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // follow redirects
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1); // set referer on redirect
    curl_exec($ch);
    $target = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    return $target;
    }
echo "MASUKAN NAMA FILE = ";
$file = trim(fgets(STDIN));
$contents = file_get_contents($file);
$lines = explode("\n", $contents); // ARRAY DARI SEBUAH TXT
$a=0;
$newLines = array();
foreach($lines as $url) {
$a++;
    //mencari kata sesuai separator
   
$vercode2 = substr(get_link(trim($url)),strpos(get_link(trim($url)), "code=") + 5);
$vercode = strtok(trim($vercode2), "&");
$email = substr(get_link(trim($url)), strpos(get_link(trim($url)), "email=") + 6);
 
    //POST
$post = "email=".urlencode($email)."&verification_code=$vercode";
 
    //HEADER
$arr = array("\r"," ");
    $headers = array();
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    $headers[] = "Accept-Encoding: gzip, deflate";
$headers[] = "Accept-Language: en-US,en;q=0.5";
$headers[] = "Upgrade-Insecure-Requests: 0";
    $headers[] = "Host: api.bigtoken.com";
    $headers[] = "X-Client-ID: WW1GelpUWTBPbnBFY1hBMFVrTnNWbUZ4VTNsbFVHSnVlV3BTWm1rd1JrWkhlbHBxWm5OaFVsWjJhM3BhUkhocloyczk=";
    $headers[] = "Host: api.bigtoken.com";
   $headers[] = "User-Agent: BIGtoken/1.0.6.2 Dalvik/2.1.0 Linux; U; Android 7.1.1; d9afb717c461e487 Build/25";
    $headers[] = "Accept: application/json";
    $headers[] = "Content-Length: ".strlen($post);
    $headers[] = "Connection: Keep-Alive";
    $api = "https://api.bigtoken.com/signup/email-verification";
    $h = explode("\n",str_replace($headers,"",""));
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $obj = json_encode($result);
    echo ". ".$email." = ".$obj."\n";
    if($a>=count($lines)){
    unlink($file);
    echo "SUKSES MEMERIKSA SEMUA";
}
    sleep(1);
    curl_close($ch);
}
?>