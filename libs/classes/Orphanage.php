<?php
class Orphanage
{
     function __construct($pdo)
      {
          $this->pdo = $pdo;
      }

    public function index($args)
    {
        $stmt = $this->pdo->preparedStatement("SELECT * FROM orphanage WHERE id=?", $args);
        return $stmt->fetch();
    }//end

    /*public function create($name,$email,$phone,$address,$password,$date) {

       $stmt = $this->link->prepare("INSERT INTO orphanage(name,email,phone,address,password,created_at) VALUES(?,?,?,?,?,?)");
       $stmt->bindParam(1, $name);
       $stmt->bindParam(2, $email);
       $stmt->bindParam(3, $phone);
       $stmt->bindParam(4, $address);
       $stmt->bindParam(5, $password);
       $stmt->bindParam(6, $date);
       $stmt->execute();
       $count = $stmt->rowCount();
       return $count;
   }*///end
}