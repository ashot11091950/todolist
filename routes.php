<?php
	$route->addRoute('/', 'HomeController@index');
	$route->addRoute('/login', 'LoginController@index');
	$route->addRoute('/home', 'HomeController@index');
	$route->addRoute('/error404', 'ErrorController@Error404');
	$route->addRoute('/logout', 'LogoutController@index');
	$route->addRoute('/addproject', 'AddProjectController@index');
?>