<?php
 
mysql_connect("localhost", "chence", "MRTH3tRT3xWp") or die(mysql_error());
mysql_select_db("chence_plesson") or die(mysql_error());
 
// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
$value = urlencode(stripslashes($value));
$req .= "&$key=$value";
}
// post back to PayPal system to validate
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
 
$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
 
 
if (!$fp) {
// HTTP ERROR
} else {
fputs ($fp, $header . $req);
while (!feof($fp)) {
$res = fgets ($fp, 1024);
if (strcmp ($res, "VERIFIED") == 0) {
 
// PAYMENT VALIDATED & VERIFIED!
  $item_name = $_POST['item_name'];
  $item_number = $_POST['item_number'];
  $payment_status = $_POST['payment_status'];
  $payment_amount = $_POST['mc_gross'];
  $payment_currency = $_POST['mc_currency'];
  $txn_id = $_POST['txn_id'];
  $receiver_email = $_POST['custom'];
  $payer_email = $_POST['payer_email'];
  
mysql_query("UPDATE lessonsTeacherStudent SET paid = '1' WHERE emailTeacher = $receiver_email AND emailStudent = 'iris.spivak@gmail.com' AND price = $payment_amount");
}
}
fclose ($fp);
}
?>