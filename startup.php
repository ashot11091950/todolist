<?php
	//include classes
	include 'classes.php';
	
	// get routes
	$route = new Route;
	include 'routes.php';

	//include functions 
	include 'functions.php';

	//sart controllers
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