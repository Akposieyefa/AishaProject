<?php
class Complain
{

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->preparedStatement("SELECT * FROM complain WHERE status IS NOT NULL");
        return $stmt->fetchAll();
    }//end
    
    public function create($args)  {
       $stmt = $this->pdo->preparedStatement("INSERT INTO complain(caseID,orphanage_id,subject,email,message,created_at)  VALUES(?,?,?,?,?,?)", [$args]);
       $rowcount = $stmt->rowCount();
       return $rowcount;
    }//end

    public function update($args){
       $stmt = $this->pdo->preparedStatement("UPDATE complain SET status=? WHERE id=?", [$args]);
       $count = $stmt->rowCount();
       return $count;
    }//end

    public function delete($args){
       $stmt = $this->pdo->preparedStatement("DELETE FROM  complain_table WHERE id=?", [$args]);
       $count = $stmt->rowCount();
       return $count;
    }//end
}