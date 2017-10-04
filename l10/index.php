<?php 

$url = isset($_GET['url']) == true ? $_GET['url'] : "/";

function dd($var){
	echo "<pre>";
	var_dump($var);
	die;
}

// lấy ra url gốc của project
function getUrl($path = ""){
	$currentUrlpath = $GLOBALS['url'];
	$absoluteUrl = strtok("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",'?');
	if($currentUrlpath != "/"){
		$absoluteUrl = str_replace("$currentUrlpath", "", $absoluteUrl);
	}
	return $path == "/" ? $absoluteUrl : $absoluteUrl.$path;
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
	case 'admin/detail':
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