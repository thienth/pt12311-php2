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

	public function delete(){
		$sql = "delete from $this->tableName where id = $this->id";
		$stmt = $this->connect->prepare($sql);
		$stmt->execute();
		return true;
	}

	public function insert(){

		$sql = "insert into $this->tableName ";
		$sql .= "(";
		foreach ($this->columns as $col) {
			if(isset($this->{$col})){
				$sql .= " $col, ";
			}
			
		}
		$sql = rtrim($sql, ", ");
		$sql .= ")";
		$sql .= " values ";
		$sql .= "(";
		foreach ($this->columns as $col) {
			if(isset($this->{$col})){
				$sql .= "'".$this->{$col}. "', ";
			}
		}
		$sql = rtrim($sql, ", ");
		$sql .= ")";
		// var_dump($sql);die;
		$conn = $this->getConnect();
		
		$conn->beginTransaction(); 
		
		try{
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$this->id = $conn->lastInsertId(); 
			$conn->commit(); 
			if($this->id > 0){
				return $this;
			}
			return false;
		}
		catch(PDOException $ex){
			$conn->rollback(); 
			return false;
		}
	}

	function update(){
		$sql = "update $this->tableName ";
		$sql .= " set ";
		foreach ($this->columns as $col) {
			$sql .= " $col = '" . $this->{$col} ."', ";
		}
		$sql = rtrim($sql, ", ");
		
		$sql .= " where id = '" . $this->id ."' ";
		$conn = $this->getConnect();
		$conn->beginTransaction(); 
		
		try{
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$conn->commit(); 
			return $this;
		}
		catch(PDOException $ex){
			$conn->rollback(); 
			return false;
		}
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
		$this->connect = new PDO("mysql:host=127.0.0.1;dbname=pt12311_php2;charset=utf8", "root", "");
		$this->connect->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
	}
}


 ?>