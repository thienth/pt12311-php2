<?php 

$url = isset($_GET['r']) == true ? $_GET['r'] : "/";

function dd($var){
	echo "<pre>";
	var_dump($var);
	die;
}

require_once 'controllers/HomeController.php';
require_once 'controllers/ProductController.php';
switch ($url) {
	case '/':
		$ctl = new HomeController();
		$ctl->index();
		break;
	case 'detail':
		$ctl = new ProductController();
		$ctl->detail();
		break;
	case 'delete-product':
		$ctl = new ProductController();
		$ctl->delete();
		break;
	case 'users': // hien thi danh sach nguoi dung

		break;	
	case 'user-detail': // hien thi chi tiet thong tin 1 user 
						// dua vao id tren url
		break;
	
	default:
		echo "<h1>Khong tim thay!</h1>";
		break;
}







 ?>