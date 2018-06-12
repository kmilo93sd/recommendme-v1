<?php 

namespace Kmilo93sd\Infrastructure\Database;

use PDO;

class MysqlConnector
{
	private $host = DB_CONFIG['host'];
	private $database = DB_CONFIG['database'];
	private $username = DB_CONFIG['username'];
	private $password = DB_CONFIG['password'];

	private $connection;
	
	public function __construct()
	{
		$this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password);
		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	public function connect()
	{
		return $this->connection;
	}
}