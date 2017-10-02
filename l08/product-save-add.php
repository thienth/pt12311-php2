<?php 
require_once 'models/Product.php';


$name = $_POST['name'];
$price = $_POST['price'];
$detail = $_POST['detail'];
$created_by = $_POST['created_by'];
$model = new Product();
$model->name = $name;
$model->price = $price;
$model->detail = $detail;
$model->created_by = $created_by;
$model->insert();
header('location: index.php');

 ?>