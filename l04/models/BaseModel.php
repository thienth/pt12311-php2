<?php 
/**
* 
*/
class BaseModel
{
	public $connect;

	static function all()
	{
		$model = new static();
		$model->queryBuilder = "select * from $model->tableName";
		$stmt = $model->connect->prepare($model->queryBuilder);
		$stmt->execute();
		$rs = $stmt->fetchAll();
		return $rs;
	}

	// Khi new Base model o dau thi lap tuc doi tuong moi se co ket noi den csdl luon
	function __construct()
	{
		$this->connect = new PDO("mysql:servername=localhost;dbname=lab2;charset=utf8", "root", "");
	}
}


 ?>