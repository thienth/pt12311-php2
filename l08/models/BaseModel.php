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

	// xay dung cau lenh insert into table (ten cot, ten cot,..) values ('gia tri', 'gia tri',....)
	// ten cot dc config trong static $columns trong model tuong ung
	// gia tri thi no la gia tri duoc set tuong ung
	public function insert(){

		$sql = "insert into $this->tableName ";
		$sql .= "(";
		foreach ($this->columns as $col) {
			if(isset($this->{$col}) && $this->{$col} != null){
				$sql .= " $col, ";
			}
			
		}
		$sql = rtrim($sql, ", ");
		$sql .= ")";
		$sql .= " values ";
		$sql .= "(";
		foreach ($this->columns as $col) {
			if(isset($this->{$col}) && $this->{$col} != null){
				$sql .= "'".$this->{$col}. "', ";
			}
		}
		$sql = rtrim($sql, ", ");
		$sql .= ")";
		
		$conn->beginTransaction(); 
		
		try{
			$stmt = $this->connect->prepare($sql);
			$stmt->execute();
			$this->id = $this->connect->lastInsertId(); 
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

	// xay dung cau lenh update table set ten cot = gia tri where id = gia tri thuoc tinh id
	// ten cot dc confix trong static $columns trong model tuong ung
	// gia tri thi no la gia tri duoc set tuong ung
	function update(){
		$sql = "update $this->tableName ";
		$sql .= " set ";
		foreach ($this->columns as $col) {
			if($this->{$col} == null){
				continue;
			}
			$sql .= " $col = '" . $this->{$col} ."', ";
		}
		$sql = rtrim($sql, ", ");
		
		$sql .= " where id = '" . $this->id ."' ";
		
		$conn->beginTransaction(); // bat luu lai trang thai tai thoi diem nay cua db
		
		try{
			$stmt = $this->connect->prepare($sql);
			$stmt->execute();
			$conn->commit();  // neu thuc hien execute thanh cong thi se ap dung cho db
			return $this;
		}
		catch(PDOException $ex){
			$conn->rollback(); // neu thuc hien execute khong thanh cong thi tra loi trang thai luc beginTransaction()
			return false;
		}
	}

	// Hàm lấy ra kết quả với điều kiện custom Product::where(['ten cot', 'phep so sanh', 'gia tri'])
	// => hinh thanh cau lenh select * from ten bang where 'ten cot' 'phep so sanh' 'gia tri'
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

	// noi tiep cau lenh selec tu ::where(['ten cot', 'phep so sanh', 'gia tri'])
	// select * from where (cau lenh ::where) and 'ten cot' 'phep so sanh' 'gia tri'
	// Product::where([])->andWhere([]);
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

	// noi tiep cau lenh selec tu ::where(['ten cot', 'phep so sanh', 'gia tri'])
	// select * from where (cau lenh ::where) or 'ten cot' 'phep so sanh' 'gia tri'
	// Product::where([])->orWhere([]);
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

	// thuc thi cau lenh select trong querybuilder va lay ra toan bo ket qua (doi tuong)
	// Product::where([])->get();
	public function get(){
		$stmt = $this->connect->prepare($this->queryBuilder);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this)); // trả về đối tượng
		return $rs;
	}

	// thuc thi cau lenh select trong querybuilder va lay ra ket qua dau tien (doi tuong)
	// Product::where([])->first();
	public function first(){
		$stmt = $this->connect->prepare($this->queryBuilder);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this)); // trả về đối tượng
		if(count($rs) > 0){
			return $rs[0];
		}

		return null;
	}

	// hàm lấy ra tất cả bản ghi trong bảng Product::all()
	static function all()
	{
		$model = new static();
		$model->queryBuilder = "select * from $model->tableName";
		$stmt = $model->connect->prepare($model->queryBuilder);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model)); // trả về đối tượng
		return $rs;
	}

	// hàm lấy ra 1 đối tượng có id truyền vào Product::find($id)
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
		$this->connect->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
	}
}


 ?>