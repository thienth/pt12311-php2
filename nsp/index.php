<?php 
require_once 'Mongo/Product.php';
require_once 'Mysql/Product.php';

use Mysql\Product;
$model = new Product();
var_dump($model);
use Mongo\Product as MongoProduct;
$model2 = new MongoProduct();
var_dump($model2);

 ?>