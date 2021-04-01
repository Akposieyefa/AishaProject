<?php
include_once("classes/Contact.php");
    $contact = new Contact();
    
    if (isset($_POST['create'])) {
        $date = date('Y:m:d');
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            $error = 'All Field Are Required Thanks';
        } elseif (strlen($name>30) && strlen($email>30) && strlen($subject>50) && strlen($message>100)) {
            $error = 'Maxlength Value Must be considerd thanks';
        } elseif (ctype_alpha($name)===false) {
            $error = 'Name Must Not Contain Numbers';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Email Must Be Valid Thanks';
        } else {
            $contact_message = $contact->create($name, $email, $subject, $message, $date);
            if ($contact_message == 1) {
                $success ='Message sent successfully thanks @ '. $email;
            } else {
                $error = 'Error in sending message';
            }
        }
    }//end
