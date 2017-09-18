<?php
define("DUONG_DAN_SANPHAM", '1');


// tính trừu tượng
class DienThoai{
	public $tenSp;
	protected $diemDanhGia;
	private $anhDaiDien;
	var $gia;

	function mua(){
		echo "thuc hien viec mua san pham";
	}

	function layDanhMuc(){
		echo "Thuc hien viec lay ra danh muc cua san pham";
	}

	function luu(){
		echo "thuc hien tao moi 1 san pham trong csdl";
	}
}
// tính kế thừa
class Iphone extends DienThoai{
	public function setDiemDanhGia($diem){
		$this->diemDanhGia = $diem;
	}
	
	public function setAnhDaiDien($url){
		$this->anhDaiDien = $url;
	}

	// biến tĩnh
	public static $tableName = 'users';

	// hằng số trong lớp
	const DUONG_DAN_SANPHAM = 'iphone';

	// hàm tĩnh
	static function where(){
		$model = new Iphone();
		$model->queryBuilder = "select * from " . Iphone::$tableName;
		return $model;
	}

	function get(){

		$servername = '127.0.0.1';
		$dbname = 'php_1706';
		$dbusername = 'root';
		$dbpwd = '123456';
		$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $dbusername, $dbpwd);
		$stmt = $conn->prepare($this->queryBuilder);
		$stmt->execute();
		$result = $stmt->fetchAll();
		
		return $result;

	}

}
// tính đa hình
class Samsung extends DienThoai{
	const DUONG_DAN_SANPHAM = 'sam-sung';
	function layDanhMuc(){
		echo "Minh khong thich lay";
	}
}

$products = Iphone::where()->get();
var_dump($products);

// Hằng số trong lớp 
/*echo "<br>";
echo Iphone::$tableName;
Iphone::$tableName = 'dien-thoai';
echo "<br>";
echo Iphone::$tableName;
echo "<br>";
echo Iphone::$delete;
*/

// $iphone6 = new Iphone();
// $iphone6->tenSp = 'Ai Phôn sáu';
// $iphone6->setDiemDanhGia(3.4);
// $iphone6->setAnhDaiDien('xau trai');
// var_dump($iphone6);


// $iphone6->layDanhMuc();
/*echo "<br>";
$samsungS7 = new Samsung();
$samsungS7->layDanhMuc();*/

/*$oppo = new DienThoai();
$oppo->tenSp = 'OPPO F3';
$oppo->mua();
*/



