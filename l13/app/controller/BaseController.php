<?php 
namespace App\Controller;
use Jenssegers\Blade\Blade;
class BaseController
{
	
	protected function render($view, $var = [])
	{
		$blade = new Blade('app/views', 'storage');
		echo $blade->make($view, $var);
	}
}


 ?>