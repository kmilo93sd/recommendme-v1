<?php 

namespace Kmilo93sd\Infrastructure\AccessToken;

use Kmilo93sd\Infrastructure\Database\MysqlConnector;
use PDO;

class AccessTokenMysqlRepository
{
	private $connection;

	public function __construct()
	{
		$connector = new MysqlConnector;
		$this->connection = $connector->connect();
	}

	public function save($accessToken)
	{
		try{
			$preparedQuery = $this->connection->prepare('INSERT INTO spotify_token  VALUES (:access_token)');
			$preparedQuery->bindParam(':access_token', $accessToken);
			$preparedQuery->execute();
		}catch(PDOException $error){

			echo $error->getMessage();
		}
	}

	public function get()
	{
		try{
			$preparedQuery = $this->connection->prepare('SELECT * FROM spotify_token');
			$preparedQuery->execute();

			$response = $preparedQuery->fetchAll(PDO::FETCH_ASSOC);
			return $response[0]['access_token'];

		}catch(PDOException $error){
			echo $error->getMessage();
		}
	}

	public function emptyTable()
	{
		try{
			$preparedQuery = $this->connection->prepare('DELETE FROM spotify_token');
			$preparedQuery->execute();
		}catch(PDOException $error){

			echo $error->getMessage();
		}
	}
}