<?php
	include 'classes.php';
	$route = new Route;
	include 'routes.php';

	$url = '/' . $_GET['route'];
	$controller = $route->getRoute($url);
	if(is_file('controller/' . $controller[0] . '.php')){
		include 'controller/' . $controller[0] . '.php';
		$function = $controller[1];
		$controller = new $controller[0];
		$controller->{$function}();
	}else{
		die("Controller doesn't exist");
	}
?>