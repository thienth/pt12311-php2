<?php 
/**
* 
*/
class User
{
	var $servername = '127.0.0.1';
	var $dbname = 'pt12312-mvc';
	var $dbusername = 'root';
	var $dbpwd = '123456';
	var $conn = null;

	function getConnect()
	{
		$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname;charset=utf8", $this->dbusername, $this->dbpwd);
	}

	function getAll(){
		$this->getConnect();
		$sql = "select * from users";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
		return $result;
	}
}



 ?>