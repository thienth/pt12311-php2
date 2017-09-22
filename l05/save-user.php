<?php 
require_once 'models/User.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
// $arr = compact('name', 'email', 'password');
$user = new User();
$user->email = $email;
$user->name =  $name;
$user->password = md5($password);
$user->insert();

header('location: users.php');

 ?>