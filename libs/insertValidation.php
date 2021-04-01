<?php
include_once("insert.php");
include_once("selectClass.php");
	$insert = new Insert();
	$validCheck = new SelectDetails();

	/*
    student complain validation
    */
	if(isset($_POST['complain']))
    {
		$date	 = date('Y:m:d');
		$rand = rand(1000,9000);
		$caseID = 'case'.$rand;

		$subject = $_POST['subject'];
		$info = $_POST['info'];
		$email = $_POST['email'];
		$student_id = $_POST['student_id'];

		if(empty($subject) || empty($info) || empty($email))
        {

			$error  = "No field must be empty";
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
			$error = 'Email must be valid...';
		}
		else{
			$complain = $insert-> complain($caseID,$student_id,$subject,$email,$info,$date);
			if($complain == 1)
            {
					$success = "Complain made successfully check your mail";
			}
            else
            {
				$error = "Error in complain process thanks";
			}
		}
	}//end

	/**
	 * validation of ao page
	 */
	if(isset($_POST['register'])){
		$date	 = date('Y:m:d');

		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$matNumber = $_POST['matNumber'];
		$department = $_POST['department'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];

		if(empty($firstName) || empty($lastName)  || empty($matNumber) || empty($department) || empty($email) || empty($phone) || empty($password) || empty($cpassword)  ){
			$error  = "No field must be empty";
		}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = "Email must be a valid one";
		}else if (strlen($password < 6) || strlen($cpassword < 6)){
			$error = "Password too short";
		}else if ($password != $cpassword){
			$error = "Passwords do not match";
		}
		else{
			$registerUser = $insert->registerStudent($firstName,$lastName,$matNumber,$department,$email,$phone,$password,$date);
			if($registerUser == 1){
					$success = "Registration sucessfull";
			}else{
				$error = "Error in registration process";
			}
		}
	}//end


?>
