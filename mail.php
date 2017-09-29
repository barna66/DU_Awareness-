<?php
	require("PHPMailer/PHPMailerAutoload.php");
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	$mail->Username = "	the.aurors17@gmail.com";
	$mail->Password = "aurors2017";
	$mail->SetFrom("	the.aurors17@gmail.com");
	$mail->AddAttachment('photos/t.jpg');
	$mail->Subject = "Test";
	$mail->Body = "jabena? :(";
	$mail->AddAddress("tisaislamerana@gmail.com");

	 if(!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	 } else {
		echo "Message has been sent";
	 }
 ?>