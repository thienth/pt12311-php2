<?php 
namespace Controllers;
/**
* 
*/
use Models\Product;
class HomeController
{
	
	function index()
	{
		$products = Product::all();
		
		include_once 'views/homepage.php';
	}
}


 ?>