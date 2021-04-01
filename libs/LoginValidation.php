<?php
include_once("classes/Login.php");
    $login = new Login();
    if (isset($_POST['login'])) {
        session_start();
        $url = "admin/dashboard.php";
        $url_user = "student/dashboard.php";
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        if (empty($email) || empty($password)) {
            $error = "No field should be left empty...";
        } elseif (strlen($email > 30) && strlen($password > 30)) {
            $error = "Maxlength Value Must be considerd thanks";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Email must be a valid mail";
        } else {
            $adminLogin = $login->adminLogin($email, $password);
       //      $user = $login->userLogin($email, $password);
            if ($adminLogin) {
                $make_session = $login->adminDetails($email);
                foreach ($make_session as $email) {
                    $_SESSION['admin'] = $email;
                    if (isset($_SESSION['admin'])) {
                        header("location:$url");
                    }
                }
            }else {
		$error = "User details do not exist";
	     }
	//     elseif ($user) {
       //          $make_session = $login->userDetails($email);
       //          foreach ($make_session as $email) {
       //              $_SESSION['user'] = $email;
       //              if (isset($_SESSION['user'])) {
       //                  header("location:$url_user");
       //              }
       //          }
       //      } else {
       //          $error = "User details do not exist";
       //      }
        }
    }//end
