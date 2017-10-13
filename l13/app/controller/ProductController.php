<?php 
namespace App\Controller;
use App\Model\Product;
class ProductController
{
	
	public function detail($id)
	{
		$product = Product::find($id);
		include_once 'app/views/detail.php';
	}
	public function delete(){
		$id = $_GET['id'];
		$product = Product::find($id);
		$product->delete();
		header('location: index.php');		
	}
}

 ?>