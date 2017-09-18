<?php 
class BaseModel{

	public static function all(){
		$model = new static();
		$sql = "select * from " . static::$tableName;
		$conn = $model->getConnect();
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	public static function where($condition = []){
		$model = new static();
		$model->queryBuilder = "select * from " . static::$tableName;
		$model->queryBuilder .= " where ";
		$model->queryBuilder .= $condition[0] . " ";
		$model->queryBuilder .= $condition[1] . " ";
		$model->queryBuilder .= "'$condition[2]'" ;
		return $model;
	}

	public function get(){
		$conn = $this->getConnect();
		$stmt = $conn->prepare($this->queryBuilder);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}


	function getConnect()
	{
		$servername = '127.0.0.1';
		$dbname = 'pt12312-mvc';
		$dbusername = 'root';
		$dbpwd = '123456';
		$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $dbusername, $dbpwd);
		return $conn;
	}
}



 ?>