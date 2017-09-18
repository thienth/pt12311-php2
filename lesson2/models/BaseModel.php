<?php 
/**
* 
*/
class BaseModel
{
	public $connect;

	// Khi new Base model o dau thi lap tuc doi tuong moi se co ket noi den csdl luon
	function __construct()
	{
		$this->connect = new PDO("mysql:servername=localhost;dbname=lab1;charset=utf8", "root", "");
	}
}


 ?>