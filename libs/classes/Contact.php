<?php
include_once("DB.php");

class Contact
{
    public $link;

    public function __construct()
    {
        $database = new DB();
        $this->link = $database->dbConnect();
    }

	public function index() {
		$stmt = $this->link->prepare("SELECT * FROM contact");
		$stmt->execute();
		return $stmt->fetchAll();
	}//end

    
    public function create($name, $email, $subject, $message, $date) {

        $stmt = $this->link->prepare("INSERT INTO contact(name,email,subject,message,created_at) VALUES(?,?,?,?,?)");
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $subject);
        $stmt->bindParam(4, $message);
        $stmt->bindParam(5, $date);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }//end

	public function update($reply,$messageID) {
		$stmt = $this->link->prepare("UPDATE contact_us_table SET status=? WHERE id=?");
		$stmt->bindParam(1, $reply);
		$stmt->bindParam(2, $messageID);
		$stmt->execute();
		$count = $stmt->rowCount();
		return $count;
	}//end

       public function delete($messageID) {
              $stmt = $this->link->prepare("DELETE FROM contact_us_table WHERE id=?");
              $stmt->bindParam(1, $messageID);
              $stmt->execute();
              $count = $stmt->rowCount();
              return $count;
       }//end


}