<?php
// error_reporting(0);
include_once('Mail.php');
  

$subject = 'Local Email- Shashank' ;
$body = "hello";
$usermail = 'randhir.s@aviktechnosoft.com';
$from = "donotreply@volts.com";
    
        $host = "ssl://smtp.gmail.com";
        $port = "465";
        $username =  "noreply.volts@gmail.com"; //<> give errors
        $password = "saurabhlew";

        $headers = array ('From' => $from,
          'To' => $usermail,
          'Subject' => $subject);
        $smtp = @Mail::factory('smtp',
          array ('host' => $host,
            'port' => $port,
            'auth' => true,
            'username' => $username,
            'password' => $password));
       $mail = $smtp->send($usermail, $headers, $body);
 
   if (@PEAR::isError($mail)) {
          echo ("<p>" . $mail->getMessage() . "</p>");
         } else {
         echo ("<p>Message successfully sent!</p>");
         }

?>