<?php 
require_once 'models/User.php';
require_once 'models/Product.php';

// $user = new User();
// $user->name = 'xyz';
// $user->email = 'xyz@gmail.com';
// $user->password = '123456';
// $user->insert();


$user = User::findOne($id);
$user->password = md5("0987654321");
$user->update();

$user->delete();

// $users = Product::where(['price', ">" , "1500"])->get();
// echo "<pre>";
// var_dump($users);

 ?>