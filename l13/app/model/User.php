<?php 
namespace App\Model;

class User extends BaseModel
{
	
	public $tableName = 'users';
	public $columns = ['name', 'email', 'password'];

	public function getCountProduct(){
		$products = Product::where(['created_by', $this->id])->get();
		return count($products);
	}
}



 ?>