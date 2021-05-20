<?php
include_once("classes/DB.php");
include_once("classes/Children.php");
    $pdo = new DB();
    $children = new Children($pdo);
    
    if (isset($_POST['create'])) {
        $orphanage_id = $_SESSION['user']->id;
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];

       $filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];	
	$folder = "image/".$filename;

        if (empty($name) || empty($dob) || empty($gender)) {
            $error = 'All Field Are Required Thanks';
        }else {
            $create = $children->create([$orphanage_id,$name,$dob,$gender,$filename]);
            if ($create == 1) {
              if (move_uploaded_file($tempname, $folder)) {
                  $success = 'Orphanage created succesfully';
              }else{
			$msg = "Failed to upload image";
	       }
            } else {
                $error = 'Error ';
            }
        }
    }//end


    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];

       $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];  
    $folder = "image/".$filename;

        if (empty($name) || empty($dob) || empty($gender)) {
            $error = 'All Field Are Required Thanks';
        }else {
            $create = $children->update([$name,$dob,$gender,$filename]);
            if ($create == 1) {
              if (move_uploaded_file($tempname, $folder)) {
                  $success = 'Orphan updated succesfully';
              }else{
            $msg = "Failed to upload image";
           }
            } else {
                $error = 'Error ';
            }
        }
    }//end
