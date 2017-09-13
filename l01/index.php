<?php 
// class Dog{
// 	// var $name;
// 	// var $age;
// 	// var $hairColor;
// 	// 
// 	function __construct($ipName = null, $ipAge = null, $ipHairColor = null){
// 		$this->name = $ipName;
// 		$this->age = $ipAge;
// 		$this->hairColor = $ipHairColor;
// 	}

// 	var $weight = 0; 
// 	function an(){
// 		$this->weight++;
// 	}

// }
// $cauVang = new Dog("Cậu Vàng (đệ lão Hạc)", 3, 'Yellow');
// $cauVang->an();
// var_dump($cauVang);

// $cauDen = new Dog("Cậu Đen", 4, "đen");
// $cauDen->weight = 10;
// $cauDen->an();
// var_dump($cauDen);

require_once 'User.php';
$users = new User();
$allUser = $users->getAll();

echo "<pre>";
var_dump($allUser);
















 ?>