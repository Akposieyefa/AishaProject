<?php
include_once("databaseConnection.php");
class SelectDetails{
    public $link;
    public function __construct(){
        $database = new DatabaseClass();
        $this->link = $database->databaseConnection();
        return $this->link;
    }

   /*
	Admin login method
   */
	public function adminLogin($email,$password){
		$stmt = $this->link->prepare('SELECT email,password FROM admin_table WHERE email=? AND password=?');
		$stmt->bindParam(1, $email);
		$stmt->bindParam(2, $password);
		$stmt->execute();
		$count = $stmt->rowCount();
		return $count;
	}
	public function adminDetails($email){
		$stmt = $this->link->prepare("SELECT * FROM admin_table WHERE email=?");
		$stmt->bindParam(1, $email);
		$stmt->execute();
		return $stmt->fetchAll();
	}//end


	/*
        complain function null
    */
    public function studentComplain(){
        $stmt = $this->link->prepare("SELECT * FROM complain_table WHERE status IS NULL");
        $stmt->execute();
        return $stmt->fetchAll();
    }//end
	/*
        complain function
    */
    public function allComplain(){
        $stmt = $this->link->prepare("SELECT * FROM complain_table WHERE status IS NOT NULL");
        $stmt->execute();
        return $stmt->fetchAll();
    }//end
	   /*
        per-message
    */
    public function individualComplains($complainID){
        $stmt = $this->link->prepare("SELECT * FROM complain_table WHERE id=?");
		$stmt->bindParam(1, $complainID);
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

  /*
     all student status
 */
 public function studentViews($ary1){
     $stmt = $this->link->prepare("SELECT * FROM complain_table WHERE student_id=?");
     $stmt->bindParam(1, $ary1);
     $stmt->execute();
     return $stmt->fetchAll();
 }//end

 public function studentDetails(){
   $stmt = $this->link->prepare("SELECT * FROM student_table
            JOIN
                courses
            ON
                student_table.department_id = courses.id");
   $stmt->execute();
   return $stmt->fetchAll();
 }//


}

?>
