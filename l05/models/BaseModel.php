<?php 
/**
* 
*/
class BaseModel
{
	public $connect;

	public function fill($arr){
		foreach ($this->columns as $col) {
			if(isset($this->{$col}) && $this->{$col} != null){
				$this->{$col} = $arr[$col];
			}
		}
		return $this;
	}

	public function insert(){

		$this->queryBuilder = "
			insert into $this->tableName 
			(";
		foreach ($this->columns as $col) {
			$this->queryBuilder .= "$col, ";
		}
		$this->queryBuilder = rtrim($this->queryBuilder, ", ");
		$this->queryBuilder.=	") values (";
		
		foreach ($this->columns as $col) {
			$this->queryBuilder .= "'" . $this->{$col} . "', ";
		}
		$this->queryBuilder = rtrim($this->queryBuilder, ", ");
		$this->queryBuilder .= ")";


		$stmt = $this->connect->prepare($this->queryBuilder);
		$stmt->execute();

		return true;
	}

	// Hàm lấy ra kết quả với điều kiện custom
	static function where($arr = []){
		$model = new static();
		$model->queryBuilder = "select * from $model->tableName where ";

		switch (count($arr)) {
			case 2:
				$model->queryBuilder .= " $arr[0] = '$arr[1]' ";
				break;
			case 3:
				$model->queryBuilder .= " $arr[0] $arr[1] '$arr[2]' ";
				break;
			
			default:
				var_dump('error');die;
				break;
		}

		return $model;
	}

	public function andWhere($arr = []){
		$this->queryBuilder .= " and ";
		switch (count($arr)) {
			case 2:
				$this->queryBuilder .= " $arr[0] = '$arr[1]' ";
				break;
			case 3:
				$this->queryBuilder .= " $arr[0] $arr[1] '$arr[2]' ";
				break;
			
			default:
				var_dump('error');die;
				break;
		}

		return $this;
	}

	public function orWhere($arr = []){
		$this->queryBuilder .= " or ";
		switch (count($arr)) {
			case 2:
				$this->queryBuilder .= " $arr[0] = '$arr[1]' ";
				break;
			case 3:
				$this->queryBuilder .= " $arr[0] $arr[1] '$arr[2]' ";
				break;
			
			default:
				var_dump('error');die;
				break;
		}
		return $this;
	}

	public function get(){
		$stmt = $this->connect->prepare($this->queryBuilder);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this)); // trả về đối tượng
		return $rs;
	}

	public function first(){
		$stmt = $this->connect->prepare($this->queryBuilder);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this)); // trả về đối tượng
		if(count($rs) > 0){
			return $rs[0];
		}

		return null;
	}

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
		$this->connect = new PDO("mysql:host=127.0.0.1;dbname=pt12311_php2;charset=utf8", "root", "123456");
	}
}


 ?>