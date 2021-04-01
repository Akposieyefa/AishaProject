<?php
include_once("DB.php");

class Login
{
    public $link;

       public function __construct()
       {
              $database = new DB();
              $this->link = $database->dbConnect();
       }


	public function adminLogin($email,$password){
		$stmt = $this->link->prepare('SELECT email,password FROM tbl_admin WHERE email=? AND password=?');
		$stmt->bindParam(1, $email);
		$stmt->bindParam(2, $password);
		$stmt->execute();
		$count = $stmt->rowCount();
		return $count;
	}
	public function adminDetails($email){
		$stmt = $this->link->prepare("SELECT * FROM tbl_admin WHERE email=?");
		$stmt->bindParam(1, $email);
		$stmt->execute();
		return $stmt->fetchAll();
	}//end


        /*
		User login method
   */
	public function userLogin($ary1,$ary2){
		$stmt = $this->link->prepare('SELECT email,password FROM student_table WHERE email=? AND password=?');
		$stmt->bindParam(1, $ary1);
		$stmt->bindParam(2, $ary2);
		$stmt->execute();
		$count = $stmt->rowCount();
		return $count;
	}
	public function userDetails($ary1){
		$stmt = $this->link->prepare("SELECT * FROM student_table
            JOIN
                courses
            ON
                student_table.department_id = courses.id
         WHERE email=?");
		$stmt->bindParam(1, $ary1);
		$stmt->execute();
		return $stmt->fetchAll();
	}//


}