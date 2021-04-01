<?php 

class Mail 
{
       public function send_mail($ary1,$ary2,$ary3) {
		require_once("PHPMailer/PHPMailerAutoload.php");
		$mail=new PHPMailer();
		$mail->CharSet = 'UTF-8';
		//Recipients

		$mail->IsSMTP();
		//$mail->SMTPDebug = 2;
		$mail->Host       = 'smtp.gmail.com';

		$mail->SMTPSecure = 'tsl';
		$mail->Port       = 587;
		//$mail->SMTPDebug  = 1;
		$mail->SMTPAuth   = true;
		$mail->From     = "NILE";

		$mail->Username   = 'orutu1@gmail.com';
		$mail->Password   = 'Techshark3@gmail.com';

		$mail->SetFrom("orutu1@gmail.com");
		$mail->AddReplyTo('no-reply@aisha@gmail.com','no-reply');
		$mail->Subject    = $ary2;

		$mail->MsgHTML("
				$ary3
		");
		$mail->AddAddress($ary1 , $ary3);
		if (!$mail->send()) {$msg= "Mailer Error: " . $mail->ErrorInfo;
		}
	}
}