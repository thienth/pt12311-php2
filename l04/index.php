<?php 

require_once 'models/BaseModel.php';
require_once 'models/Product.php';
require_once 'models/User.php';

$products = User::all();
echo "<pre>";
var_dump($products);




 ?>