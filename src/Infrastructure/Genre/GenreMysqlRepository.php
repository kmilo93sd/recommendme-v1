<?php 

namespace Kmilo93sd\Infrastructure\Genre;

use Kmilo93sd\Infrastructure\Database\MysqlConnector;
use PDO;

class GenreMysqlRepository
{
	private $connection;

	public function __construct()
	{
		$connector = new MysqlConnector;
		$this->connection = $connector->connect();
	}

	public function getRandom()
	{
		$genres = $this->all();
		return $genres[array_rand($genres)];
	}

	public function updateAllGenres($updatedGenres)
	{
		foreach ($updatedGenres as $genre) {
			
			foreach($genre as $name){
				$this->insert($name);
			}
		}
	}

	public function emptyTable()
	{
		try{

			$preparedQuery = $this->connection->prepare('DELETE FROM genres');
			$preparedQuery->execute();	
		
		}catch(PDOException $error){

			echo $error->getMessage();
		}	
	}

	public function insert($name)
	{
		try{
			$preparedQuery = $this->connection->prepare('INSERT INTO genres  VALUES (null, :name)');
			$preparedQuery->bindParam(':name', $name);
			$preparedQuery->execute();
		}catch(PDOException $error){

			echo $error->getMessage();
		}
	}

	public function all()
	{
		try{
			$preparedQuery = $this->connection->prepare('SELECT * FROM genres');
			$preparedQuery->execute();

			return $preparedQuery->fetchAll(PDO::FETCH_ASSOC);

		}catch(PDOException $error){

			echo $error->getMessage();
		}
	}
}