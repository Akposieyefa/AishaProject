<?php

class DB
{
	public $link;
	public $error;

	public $config =  array(
		'host' 		=> 'localhost',
		'user' 		=> 'root',
		'password' 	=> '',
		'dbname' 	=> 'gigs_orphanage'

	 );
	public function dbConnect() {
		try {
			$this->link = new PDO('mysql:host=' .$this->config['host'].'; dbname=' . $this->config['dbname'], $this->config['user'], $this->config['password']);
			$this->link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$this->link->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
			$this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $this->link;
		} catch (PDOException $e) {
			$this->error = "Database connection error: " . $e->getMessage();
            		return $this->error;
		}
	}
}
