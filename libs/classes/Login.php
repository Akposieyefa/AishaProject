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

	/**
	 * orphanage
	 */
	public function orphpanageLogin($ary1,$ary2){
		$stmt = $this->link->prepare('SELECT email,password FROM orphanage WHERE email=? AND password=?');
		$stmt->bindParam(1, $ary1);
		$stmt->bindParam(2, $ary2);
		$stmt->execute();
		$count = $stmt->rowCount();
		return $count;
	}
	/**
	 * orphanage details
	 */
	public function orphanageDetails($email){
		$stmt = $this->link->prepare("SELECT * FROM orphanage WHERE email=?");
		$stmt->bindParam(1, $email);
		$stmt->execute();
		return $stmt->fetchAll();
	}//end


}