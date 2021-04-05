<?php
include_once("DB.php");

class Complain
{
    public $link;

    public function __construct()
    {
        $database = new DB();
        $this->link = $database->dbConnect();
    }

    public function index()
    {
        $stmt = $this->link->prepare("SELECT * FROM complain WHERE status IS NOT NULL");
        $stmt->execute();
        return $stmt->fetchAll();
    }//end
    
    public function create($ary1,$ary2,$ary3,$ary4,$ary5,$ary6)  {
       $stmt = $this->link->prepare("INSERT INTO complain(caseID,orphanage_id,subject,email,message,created_at)  VALUES(?,?,?,?,?,?)");
       $stmt->bindParam(1, 	$ary1);
       $stmt->bindParam(2, 	$ary2);
       $stmt->bindParam(3, 	$ary3);
       $stmt->bindParam(4, 	$ary4);
       $stmt->bindParam(5, 	$ary5);
       $stmt->bindParam(6, 	$ary6);
       $stmt->execute();
       $rowcount = $stmt->rowCount();
       return $rowcount;
    }//end

    public function update($ary1,$ary2){
       $stmt = $this->link->prepare("UPDATE complain SET status=? WHERE id=?");
       $stmt->bindParam(1, $ary1);
       $stmt->bindParam(2, $ary2);
       $stmt->execute();
       $count = $stmt->rowCount();
       return $count;
    }//end

    public function delete($complainID){
       $stmt = $this->link->prepare("DELETE FROM  complain_table WHERE id=?");
       $stmt->bindParam(1, $complainID);
       $stmt->execute();
       $count = $stmt->rowCount();
       return $count;
    }//end
}