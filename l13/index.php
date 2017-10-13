<?php 
session_start();
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

require_once 'vendor/autoload.php';
use Routes\CustomRoute;
CustomRoute::init($url);



// switch ($url) {
// 	case '/':
// 		$ctl = new HomeController();
// 		$ctl->index();
// 		break;
// 	case 'clear-cart':
// 		unset($_SESSION['CART']);
// 		header('location: '.getUrl('/'));
// 		break;
// 	case 'add-to-cart':
// 		$id = $_GET['id'];
// 		$product = Product::find($id);
// 		if(!isset($_SESSION['CART']) || count($_SESSION['CART']) == null){
// 			$_SESSION['CART'] = [];
// 		}

// 		$cartArr = $_SESSION['CART'];
// 		$existed = false;
// 		for ($i=0; $i < count($cartArr); $i++) { 
// 			if($cartArr[$i]['id'] == $product->id){
// 				$cartArr[$i]['quantity']++;
// 				$existed = true;
// 			}
// 		}


// 		if($existed == false){
// 			$proItem = [
// 				'id' => $product->id,
// 				'name' => $product->name,
// 				'price' => $product->price,
// 				'quantity' => 1
// 			];
// 			array_push($cartArr, $proItem);
// 		}
// 		$_SESSION['CART'] = $cartArr;
// 		// dd($_SESSION['CART']);
// 		header('location: '.getUrl('/'));
// 		break;
// 	case 'detail':
// 		$ctl = new ProductController();
// 		$ctl->detail();
// 		break;
// 	case 'admin/detail':
// 		$ctl = new ProductController();
// 		$ctl->detail();
// 		break;
// 	case 'delete-product':
// 		$ctl = new ProductController();
// 		$ctl->delete();
// 		break;
// 	case 'users': // hien thi danh sach nguoi dung

// 		break;	
// 	case 'user-detail': // hien thi chi tiet thong tin 1 user 
// 						// dua vao id tren url
// 		break;
	
// 	default:
// 		echo "<h1>Khong tim thay!</h1>";
// 		break;
// }







 ?>