<?php
    include_once("classes/DB.php");
    include_once("classes/Complain.php");
    $pdo = new DB();
    $complain = new Complain($pdo);
    
    if (isset($_POST['complain'])) {
        $date	 = date('Y:m:d');
        $rand = rand(1000, 9000);
        $caseID = 'case'.$rand;

        $subject = $_POST['subject'];
        $info = $_POST['info'];
        $email = $_POST['email'];
        $orphange_id = $_POST['orphange_id'];

        if (empty($subject) || empty($info) || empty($email)) {
            $error  = "No field must be empty";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Email must be valid...';
        } else {
            $send = $complian->create($caseID, $orphange_id, $subject, $email, $info);
            if ($create == 1) {
                $success = "Complain made successfully check your mail";
            } else {
                $error = "Error in complain process thanks";
            }
        }
    }//end
