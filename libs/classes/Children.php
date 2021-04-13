<?php 
include_once("DB.php");

class Children
{
       public $link;

       public function __construct()
       {
           $database = new DB();
           $this->link = $database->dbConnect();
       }
   
       public function index()
       {
           $stmt = $this->link->prepare("SELECT * FROM orphans");
           $stmt->execute();
           return $stmt->fetchAll();
       }//end
   
       public function create($name,$dob,$gender,$picture,$date) {
   
          $stmt = $this->link->prepare("INSERT INTO orphans(name,dob,gender,picture,created_at) VALUES(?,?,?,?,?)");
          $stmt->bindParam(1, $name);
          $stmt->bindParam(2, $dob);
          $stmt->bindParam(3, $gender);
          $stmt->bindParam(4, $picture);
          $stmt->bindParam(5, $date);
          $stmt->execute();
          $count = $stmt->rowCount();
          return $count;
      }//end   
}