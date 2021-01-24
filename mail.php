<?php	

	$fn = fopen("mailing_list.txt","r");
		
         require('PHPMailer/class.phpmailer.php');
		require('PHPMailer/class.smtp.php');
	
		$message_body = 'your message';
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 1;
		$mail->SMTPAuth = TRUE;
		$mail->SMTPSecure = 'ssl'; // tls or ssl
		$mail->Port     = "465";
		$mail->Username = "your email";
		$mail->Password = "your password";
		$mail->Host     = "smtp.gmail.com";
		$mail->Mailer   = "smtp";
		$mail->SetFrom("your gmail", "some name");
		  while(! feof($fn))  {
	$email = fgets($fn);
		$mail->AddAddress($email);
		}
		$mail->Subject = "email subject";
		$mail->MsgHTML($message_body);
		$mail->IsHTML(true);		
		$result = $mail->Send();
		
		return $result;
	
?>
