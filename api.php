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
$letter1 = str_replace("$keymail: $to", $letter);
$letter2 = str_replace("$keyip:  $ip", $letter1);
$letter3 = str_replace("$keycode: $code", $letter2);
$header = "MIME-Version: 1.0\n";
$header .= "Content-type: text/html; CP-1252 \n";
$header .= "From: ".$name . " <" . $from . ">\n";
$header .= "Reply-To: " . $from . "\n";
$header .= "X-Priority: 3\n";
$header .= "X-MSMail-Priority: Normal\n";
$header .= "X-Mailer: Gleez CMS 0.10.5\n";
$header .= "List-Unsubscribe: <mailto:4AF916861C80A24BDE164A575F12D075?body=unsubscribe>\n";
$header .= "x-store-info: sbevkl2QZR7OXo7WID5ZcVBK1Phj2jX\n";
$header .= "X-Brightmail-Tracker: 94a96329-ea03-4d8a-c064-08d57447496a\n";
$header .= "X-No-Track: 11400.000.0.0.47c24ec5-012f-4a87-959a\n";
$header .= "X-Ebay-Mailtracker: 11400.000.0.0.47c24ec5-012f-4a87-959a-08d575a41eaba5dd4ebb8aa71380465a8e74\n";
$header .= "Message-ID: 38D1C1FD-3C35-4568-925C-FC46CAC0DE8A@apple.com\n";
$header .= "X-IncomingTopHeaderMarker: OriginalChecksum:7A4B39E7D056847912D5CA9A44EE97E012CAB89718D96F551AD061D4723C55DB;UpperCasedChecksum:7D1C2902BA6A1D8B04696E190BF0ABC5D6EBBED94E3E13F3C20BC4C79B791BDC;SizeAsReceived:9118;Count:39\n";
$header .= "X-MSAPipeline: MessageDispatcherEOP\n";
$header .= "X-BO1-SAF2-RCPT-Passed: Yes\n";
$header .= "X-Antivirus-Scanne: ClamAV - No Detected Virus, though you should still use a Local Antivirus on your computer.\n";
$header .= "X-Scanned-By: Tzolkin-Spam-Scanner\n";
$header .= "X-Spam-Status: No: score=3.0 required=5.0 tests=BAYES_50,HTML_MESSAGE, UNPARSEABLE_RELAY autolearn=no version=3.3.1\n";
$header .= "X-Spam-Level: ***\n";
$header .= "Content-Transfer-Encoding: 8bit\n";
$header .= "X-Mailer: Microsoft Office Outlook 10.0\n";
$header .= "Importance: High\n";
$header .= 'X-Sender: <{""}>\n';
$header .= "List-Unsubscribe: <mailto:unsubscribe@digibuzz24.net/unsubscribe.php?email=".$from.">\n";
$header .= "List-Subscribe: <mailto:subscribe@digibuzz24.net/subscribe.php?email=".$from.">\n";
$header .= "List-Owner: <mailto:admin@digibuzz24.net>\n";
 

if(@mail($to, $subject, $letter3, $header))
   {
     echo "ok";
   }else{
     echo "fail";
   }
?>
