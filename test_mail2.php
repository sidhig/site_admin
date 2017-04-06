<?php

$to = "shashank.r@aviktechnosoft.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";

$check=mail($to,$subject,$txt,$headers);
print_r($check);
if($check)
{
  echo "ok";
}

?>