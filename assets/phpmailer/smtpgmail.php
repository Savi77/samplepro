<?php
	include "classes/class.phpmailer.php"; // include the class name
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	$mail->Username = "testing.ileaf.mailid@gmail.com";
	$mail->Password = "mahesh12345@2014";
	$mail->SetFrom($emailid);
	$mail->Subject = "Technician : Resolution updated. ";
	$mail->Body = "<b>Hi,<br/>Technician resolution has been updated..<br/>by <a href='http://www.asif18.com/7/php/send-mails-using-smtp-in-php-by-gmail-server-or-own-domain-server/'>Asif18</a></b>";
	//$mail->AddAddress("anyaddrees@domain.com");
	 if(!$mail->Send()){
		echo "Mailer Error: " . $mail->ErrorInfo;
	}
	else
	{
		echo "Message has been sent";
	}
?>
