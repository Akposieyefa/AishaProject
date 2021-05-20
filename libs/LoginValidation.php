<?php
session_start();
require_once("classes/DB.php");
include_once("classes/Login.php");
    $pdo = new DB();
    $login = new Login($pdo);
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        if (empty($email) || empty($password)) {
            $error = "No field should be left empty...";
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Email must be a valid mail";
        } else {
            $orphanageLogin = $login->orphpanageLogin($email, $password);
            if ($orphanageLogin > 0) {
                $make_session = $login->orphanageDetails($email);
                if ($make_session != NULL) {
                    $_SESSION['user'] = $make_session;
                        header("location:orphanage/dashboard.php");
                        exit;
                    }
            } else {
                $error = "User details do not exist";
            }
        }
    }//end
