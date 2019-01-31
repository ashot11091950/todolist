<?php
	$route->addRoute('/login', 'LoginController@index');
	$route->addRoute('/', 'HomeController@index');
	$route->addRoute('/home', 'HomeController@index');
?>