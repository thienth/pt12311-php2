<?php 
namespace Routes;
/**
* 
*/
use \Phroute\Phroute\RouteCollector;
use \Phroute\Phroute\Dispatcher;
class CustomRoute
{
	
	public static function init($url){


		$router = new RouteCollector();

		$router->get('/', ["App\Controller\HomeController", "index"]);
		$router->get('/detail/{id}', ["App\Controller\ProductController", "detail"]);

		$dispatcher = new \Phroute\Phroute\Dispatcher($router->getData());

		$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
		    
		// Print out the value returned from the dispatched function
		echo $response;
	}
}

 ?>