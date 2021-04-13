<?php
include_once("classes/Children.php");
    $children = new Children();
    
    if (isset($_POST['create'])) {
        $date = date('Y:m:d');
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];

       $filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];	
	$folder = "image/".$filename;

        if (empty($name) || empty($dob) || empty($gender)) {
            $error = 'All Field Are Required Thanks';
        } elseif (strlen($name>50)) {
            $error = 'Maxlength Value Must be considerd thanks';
        }else {
            $create = $children->create($name,$dob,$gender,$filename,$date);
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
