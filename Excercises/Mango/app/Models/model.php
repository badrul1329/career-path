<?php
namespace App\Models;

class Model{ 
	protected PDO $db;
	public function __construct(){
		//load database configuration
		$config = require_once __DIR__."/../../config/database.php";
		
		try{
			$this->db = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}",$config['username'],$config['password']);
			//PDO Error mode
			$this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			//PDO fetch mode to associative array
			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		}catch(\PDOException $e){
			echo $e->getMessage();
		}
	}
}