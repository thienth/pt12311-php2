<?php 
/**
* 
*/
require_once 'models/Product.php';
class HomeController
{
	
	function index()
	{
		$products = Product::all();
		
		include_once 'views/homepage.php';
	}
}


 ?>