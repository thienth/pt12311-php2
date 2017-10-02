<?php 
/**
* 
*/
require_once 'models/Product.php';
class ProductController
{
	
	function detail()
	{
		$id = $_GET['id'];
		$product = Product::find($id);
		echo "chi tiet san pham $product->name";
	}
	function delete(){
		$id = $_GET['id'];
		$product = Product::find($id);
		$product->delete();
		header('location: index.php');		
	}
}

 ?>