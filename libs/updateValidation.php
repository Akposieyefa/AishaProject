<?php
include_once("insertClass.php");
include_once("selectClass.php");
	$insert = new InsertDetails();
	$student = new SelectDetails();
	$students = $student->studentDetails();

	/*
        respond to user comments
    */
    if (isset($_POST['updateM'])) {
		$messageID = $_POST['messageID'];
		$reply = "Responded";
			$update = $insert->replyUsersComent($reply,$messageID);
	}//end
		/*
        delete user comments
    */
	if (isset($_POST['deleteM'])) {
		$messageID = $_POST['messageID'];
			$delete = $insert->deleteUsersComent($messageID);

	}//end

		/*
        respond to complains
    */
    if (isset($_POST['updateC'])) {

				$complainID = $_POST['complainID'];
				$complain = "Acknowledege";
        		$email = $_POST['email'];
                require_once("PHPMailer/PHPMailerAutoload.php");
                $mail=new PHPMailer();
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
                $mail->From     = "NAITES";

				$mail->Username   = 'kdjunior4@gmail.com';
				$mail->Password   = 'kd26694880';
		
                $mail->SetFrom("naites@gmail.com");
                $mail->AddReplyTo('no-reply@orotu1@gmail.com','no-reply');
                $mail->Subject    = " <h2>Respond to Complain</h2>";

                $mail->MsgHTML("
                    Thanks for your complain  $email  we will definately reach out
                    to you and action would be taken regarding this.
                ");

                $mail->AddAddress($email , $complainID);

                if (!$mail->send()) {$msg= "Mailer Error: " . $mail->ErrorInfo;
                }else{

                    $update = $insert->replyStudentComplain($complain,$complainID);
			         if($update){
                         echo "
                            <script>
                                alert('Responded');
                            </script>
				        ";
                     }
                }

	}//end

		/*
        delete  complains
    */
	if (isset($_POST['deleteC'])) {
		$complainID = $_POST['complainID'];
			$delete = $insert->deleteStudentComplain($complainID);
			if($delete){
				echo "
					<script>
						alert('Deleted');
					</script>
				";
			}
	}//end

    /*
        action on complain
    */
    if (isset($_POST['action'])) {

                $complainID = $_POST['complainID'];
                $email = $_POST['email'];
                $message = $_POST['message'];

                require_once("PHPMailer/PHPMailerAutoload.php");
                $mail=new PHPMailer();
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
                $mail->From     = "NAITES";

                $mail->Username   = 'kdjunior4@gmail.com';
				$mail->Password   = 'kd26694880';

                $mail->SetFrom("naites@gmail.com");
                $mail->AddReplyTo('no-reply@orotu1@gmail.com','no-reply');
                $mail->Subject    = " <h2>Respond to Complain</h2>";

                $mail->MsgHTML("
                     $message
                ");

                $mail->AddAddress($email , $message);

				if (!$mail->send()) {$msg= "Mailer Error: " . $mail->ErrorInfo;
				}else{
					$update = $insert->replyStudentComplain($$message,$complainID);
					if($update){
						echo "
							<script>
									alert('Complain attended to successfully');
							</script>
						";
					}
				}

	}//end

	/*
			delete student
	*/
if (isset($_POST['deleteS'])) {
		$studentID = $_POST['studentID'];
		$delete = $insert->deleteStudent($studentID);
		if($delete){
			echo "
				<script>
					alert('Student Deleted');
				</script>
			";
		}
}//end

	/*
			send mails
	*/
	if (isset($_POST['send_mail'])) {
			
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	if (empty($subject) || empty($message)) {
		echo "
			<script>
				alert('No field must be empty');
			</script>
		";
	}else{
		foreach($students as $student) {
			$email = $student['email'];
			$send = $insert->send_mail($email,$subject,$message);
			if ($send) {
				echo "
					<script>
						alert('Email sent');
					</script>
				";
			}else{
				echo "
				<script>
					alert('Error');
				</script>
			";
			}
		}

	}
}//end


?>
