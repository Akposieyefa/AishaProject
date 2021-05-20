<?php
/**
 * class Connection
 *
 * @author BobLewis <boblewisu@gmail.com>
 * @package app\config
 *
 */

class Login
{
   function __construct($pdo)
   {
          $this->pdo = $pdo;
   }

	/**
	* orphanage
	*/
	public function orphpanageLogin($args){
		$stmt = $this->pdo->preparedStatement('SELECT email,password FROM orphanage WHERE email=?', [$args])->rowCount();
		return $stmt;
	}
	/**
	* orphanage details
	*/
	public function orphanageDetails($args){
		$stmt = $this->pdo->preparedStatement("SELECT * FROM orphanage WHERE email=? LIMIT 1", [$args])->fetch();
		return $stmt;
	}//end


}