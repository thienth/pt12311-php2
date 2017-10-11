<?php 
namespace Models;

/**
* 
*/
class Product extends BaseModel
{
	
	public $tableName = 'products';

	public function getOwner(){
		$owner = User::find($this->created_by);
		return $owner;
	}
}



 ?>