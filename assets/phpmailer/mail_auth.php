<?php  
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
//$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "mail.ileaf.in";
$mail->Port = 25; // or 587
$mail->IsHTML(true);  
$mail->Username="kedar@ileaf.in";
$mail->Password="ileaf@@2017";
// From :(user name and user mail id)
$mail->FromName = "Referer";
$mail->From="kedar@ileaf.in";
?>