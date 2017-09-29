<?php 
require_once 'models/Product.php';
$id = $_GET['id'];
$model = Product::find($id);
if(!$model){
	echo "<h1>San pham khong ton tai!</h1>";die;
}

$model->delete();
header('location: index.php');


 ?>