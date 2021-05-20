<?php 

class Mail 
{
       function __construct($pdo) {
		    $this->db = $pdo;
		}

  public function send_mail($email,$subject,$name,$text) {
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

		$mail->Username   = '';
		$mail->Password   = '';

		$mail->SetFrom("");
		$mail->AddReplyTo('no-reply@','no-reply');
		$mail->Subject    = $subject;

		$mail->MsgHTML("
				$text
		");
		$mail->AddAddress($email , $name);
		if (!$mail->send()) {$msg= "Mailer Error: " . $mail->ErrorInfo;
		}
	}
}