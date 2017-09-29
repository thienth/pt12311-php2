<?php 
require_once 'models/Product.php';

$id = $_POST['id'];
$model = Product::find($id);

if(!$model){
	echo "<h1>San pham khong ton tai!</h1>";die;
}
$name = $_POST['name'];
$price = $_POST['price'];
$detail = $_POST['detail'];
$created_by = $_POST['created_by'];

$model->name = $name;
$model->price = $price;
$model->detail = $detail;
$model->created_by = $created_by;
$model->update();
header('location: index.php');

 ?>