<?php 
class Children
{
      function __construct($pdo)
      {
          $this->pdo = $pdo;
      }
   
       public function index($args)
       {
           return $this->pdo->preparedStatement("SELECT * FROM orphans WHERE orphanage_id=?", $args)->fetchAll();
       }//end

       public function orphans()
       {
           return $this->pdo->preparedStatement("SELECT * FROM orphans")->fetchAll();
       }//end

       public function orphan($args)
       {
           return $this->pdo->preparedStatement("SELECT * FROM orphans WHERE id=?", $args)->fetchAll();
       }//end
   
       public function create($args) {
   
          $stmt = $this->pdo->preparedStatement("INSERT INTO orphans (orphanage_id,name,dob,gender,picture) VALUES (?,?,?,?,?)", $args);
          $count = $stmt->rowCount();
          return $count;
      }//end 

      public function delete($args) {
        $stmt = $this->pdo->preparedStatement("DELETE FROM orphans WHERE id=?", $args)->rowCount();
        return $stmt;
      } //end

      public function update($args) {
        return $this->pdo->preparedStatement("UPDATE orphans SET name=?, dob=?, gender=?, picture=? WHERE id=?", $args);
      }
}