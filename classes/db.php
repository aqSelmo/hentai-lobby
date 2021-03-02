<?php
namespace Hentailobby\Classes;

use \PDO;
use \Exception;

class DbConnection extends PDO {
	private $config;
	private $connection;
	
	public function __construct()
	{
		$this->getIniInformation();
		$this->connection = new PDO("mysql:dbname={$this->config['DATABASE']['database']};host={$this->config['DATABASE']['server']};charset=utf8", $this->config['DATABASE']['username'], $this->config['DATABASE']['password']);
	}
	private function getIniInformation($args=null)
	{
		try {
			if(file_exists(__DIR__ . DIRECTORY_SEPARATOR . "config.ini")) {
				$this->config = parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . "config.ini", true);
			} else {
				throw new Exception("O arquivo de configuração está do site está com erro.");
			}
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	private function setParams($statment, $parameters = array())
	{
		foreach($parameters as $key => $value){
			$this->setParam($statment, $key, $value);
		}
	}
	private function setParam($statment, $key, $value)
	{
		$statment->bindParam($key, $value);
	}
	public function query($rawQuery, $params = array())
	{
		$query = explode(" ", $rawQuery);
		$statment = $this->connection->prepare($rawQuery);
		$this->setParams($statment, $params);
		$statment->execute();
		
		if($query[0] == "INSERT") {
			return $this->connection->lastInsertId();
		}
        
		return $statment;
	}
	
	public function single($rawQuery, $params = array())
	{
		$stmt = $this->query($rawQuery, $params);
		
		return $stmt->fetchColumn();
	}
	public function row($rawQuery, $params = array())
	{
		$stmt = $this->query($rawQuery, $params);
		
		return $stmt->fetch();
	}
	public function select($rawQuery, $params = array())
	{
		$stmt = $this->query($rawQuery, $params);
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}