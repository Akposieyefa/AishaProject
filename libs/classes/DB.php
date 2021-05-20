<?php
/**
 * class DB
 *
 * @author Lewis Uzoma <boblewisu@gmail.com>
 * @package libs\classes
 *
 */

class DB
{
	private $pdo;
	private $dsn;

	public $config =  array(
		'host' 		=> 'localhost',
		'user' 		=> 'root',
		'password' 	=> '',
		'dbname' 	=> 'gigs_orphanage',
		'charset' => 'utf8'

	 );
	
	function __construct() {
		$this->dsn = "mysql:host=".$this->config['host'].";dbname=".$this->config['dbname'].";charset=".$this->config['charset']."";
		$this->dbConnect();
	}

	 /**
     * Run a database connection.
     *
     * @return PDO
     */


	public function dbConnect() {
		$opt = [
		    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
		    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
		    \PDO::ATTR_EMULATE_PREPARES   => false,
		];
		$this->pdo = new \PDO($this->dsn, $this->config['user'], $this->config['password'], $opt);
		if(!$this->pdo){
			echo "Problem in database connection! Contact administrator!";
			exit();
		}
		return $this->pdo;
	}

	/**
     * Run a raw query statement against the database.
     *
     * @param  string  $query
     * @return bool
     */

	public function query($sql="") 
	{
		return $this->pdo->query($sql);
	}

	/**
     * Run a prepared query statement against the database.
     *
     * @param  string  $sql
     * @param  array  $args
     * @return array
     */

	public function preparedStatement($sql, $args = NULL)
	{
	    if (!$args)
	    {
	         return $this->query($sql);
	    }
	    $stmt = $this->pdo->prepare($sql);
	    $stmt->execute($args);
	    return $stmt;
	}

}
