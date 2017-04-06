<?php error_reporting(E_ALL | E_STRICT);
 phpinfo();
 exit();
// Initialize cURL with given url
$url = 'http://download.bethere.co.uk/images/61859740_3c0c5dbc30_o.jpg';
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, 'Sitepoint Examples (thread 581410; http://www.sitepoint.com/forums/showthread.php?t=581410)');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);

set_time_limit(65);

$execute = curl_exec($ch);
$info = curl_getinfo($ch);

// Time spent downloading, I think
$time = $info['total_time'] 
      - $info['namelookup_time'] 
      - $info['connect_time'] 
      - $info['pretransfer_time'] 
      - $info['starttransfer_time'] 
      - $info['redirect_time'];


// Echo friendly messages
header('Content-Type: text/plain');
printf("Downloaded %d bytes in %0.4f seconds.\n", $info['size_download'], $time);
printf("Which is %0.4f mbps\n", $info['size_download'] * 8 / $time / 1024 / 1024);
printf("CURL said %0.4f mbps\n", $info['speed_download'] * 8 / 1024 / 1024);

echo "\n\ncurl_getinfo() said:\n", str_repeat('-', 31 + strlen($url)), "\n";
foreach ($info as $label => $value)
{
    printf("%-30s %s\n", $label, $value);
}