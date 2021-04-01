<?php
include_once("DB.php");
class Insert 
{
    public $link;

    public function __construct() {
        $database = new DB();
        $this->link = $database->dbConnect();
    }
	 /*
        student complain function
    */
		public function complain($ary1,$ary2,$ary3,$ary4,$ary5,$ary6)  {
        $stmt = $this->link->prepare("INSERT INTO complain_table(caseID,student_id,subject,email,complainMessage,caseDate)
            VALUES(?,?,?,?,?,?)");
        $stmt->bindParam(1, 	$ary1);
        $stmt->bindParam(2, 	$ary2);
        $stmt->bindParam(3, 	$ary3);
		$stmt->bindParam(4, 	$ary4);
		$stmt->bindParam(5, 	$ary5);
        $stmt->bindParam(6, 	$ary6);
        $stmt->execute();
        $rowcount = $stmt->rowCount();
        return $rowcount;
	   }//end

		 /*
        respond to contact message
		*/
		public function replyStudentComplain($ary1,$ary2){
			$stmt = $this->link->prepare("UPDATE  complain_table SET status=? WHERE id=?");
			$stmt->bindParam(1, $ary1);
			$stmt->bindParam(2, $ary2);
			$stmt->execute();
			$count = $stmt->rowCount();
			return $count;
		}//end
		/*
			delete contact messages
		*/
		public function deleteStudentComplain($complainID){
			$stmt = $this->link->prepare("DELETE FROM  complain_table WHERE id=?");
			$stmt->bindParam(1, $complainID);
			$stmt->execute();
			$count = $stmt->rowCount();
			return $count;
		}//end

	/*
		register students
	*/
	public function registerStudent($ary1,$ary2,$ary3,$ary4,$ary5,$ary6,$ary7,$ary8){
		$stmt = $this->link->prepare("INSERT INTO student_table(firstName,lastName,matNumber,department_id,email,phone,password,date)
			VALUES(?,?,?,?,?,?,?,?)");
    		$stmt->bindParam(1,   $ary1);
    		$stmt->bindParam(2,   $ary2);
    		$stmt->bindParam(3,   $ary3);
    		$stmt->bindParam(4,   $ary4);
    		$stmt->bindParam(5,   $ary5);
        	$stmt->bindParam(6,   $ary6);
    		$stmt->bindParam(7,   $ary7);
    		$stmt->bindParam(8,   $ary8);
    		$stmt->execute();
    		$count = $stmt->rowCount();
		return $count;
	}//end

  /*
      delete student
  */
  public function deleteStudent($studentID){
    $stmt = $this->link->prepare("DELETE FROM student_table WHERE id=?");
    $stmt->bindParam(1, $studentID);
    $stmt->execute();
    $count = $stmt->rowCount();
    return $count;
  }//end

  /**
   * send bulk mail function
   */
  public function send_mail($ary1,$ary2,$ary3){
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

		$mail->Username   = 'orutu1@gmail.com';
		$mail->Password   = 'Techshark3@gmail.com';

		$mail->SetFrom("orutu1@gmail.com");
		$mail->AddReplyTo('no-reply@orotu1@gmail.com','no-reply');
		$mail->Subject    = $ary2;

		$mail->MsgHTML("
				$ary3
		");
		$mail->AddAddress($ary1 , $ary3);
		if (!$mail->send()) {$msg= "Mailer Error: " . $mail->ErrorInfo;
		}
	}

}

?>
