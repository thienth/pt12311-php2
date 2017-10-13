<?php 
namespace App\Controller;
use App\Model\Product;
class HomeController extends BaseController
{
	
	public function index()
	{
		$products = Product::all();
		
		return $this->render('homepage', ['products' => $products]);
	}
}


 ?>