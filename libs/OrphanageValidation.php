<?php
include_once("classes/Orphanage.php");
    $orphanage = new Orphanage();
    
    if (isset($_POST['create'])) {
        $date = date('Y:m:d');
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['password_confirmation']);
        if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($password) || empty($cpassword)) {
            $error = 'All Field Are Required Thanks';
        } elseif (strlen($name>30) && strlen($email>30) && strlen($address>50) && strlen($phone>11)) {
            $error = 'Maxlength Value Must be considerd thanks';
        } elseif (ctype_alpha($name)===false) {
            $error = 'Name Must Not Contain Numbers';
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Email Must Be Valid Thanks';
        } elseif ($password != $cpassword) {
              $error = 'Sorry password do not match';
        }else {
            $create = $orphanage->create($name,$email,$phone,$address,$password,$date);
            if ($create == 1) {
                $success = 'Orphanage created succesfully';
            } else {
                $error = 'Error ';
            }
        }
    }//end
