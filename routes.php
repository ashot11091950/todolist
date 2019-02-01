<?php
	$route->addRoute('/login', 'LoginController@index');
	$route->addRoute('/', 'HomeController@index');
	$route->addRoute('/home', 'HomeController@index');
	$route->addRoute('/error404', 'ErrorController@Error404');
?>