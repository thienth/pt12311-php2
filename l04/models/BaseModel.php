<?php 
/**
* 
*/
class BaseModel
{
	public $connect;

	// hàm lấy ra tất cả bản ghi trong bảng
	static function all()
	{
		$model = new static();
		$model->queryBuilder = "select * from $model->tableName";
		$stmt = $model->connect->prepare($model->queryBuilder);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model)); // trả về đối tượng
		return $rs;
	}

	// hàm lấy ra 1 đối tượng có id truyền vào
	static function find($id)
	{
		$model = new static();
		$model->queryBuilder = "select * from $model->tableName where id = $id";
		$stmt = $model->connect->prepare($model->queryBuilder);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
		if(count($rs) > 0){

			return $rs[0];
		}

		return null;
	}

	// Khi new Base model o dau thi lap tuc doi tuong moi se co ket noi den csdl luon
	function __construct()
	{
		$this->connect = new PDO("mysql:servername=localhost;dbname=lab2;charset=utf8", "root", "");
	}
}


 ?>