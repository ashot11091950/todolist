<?php
	include 'config.php';

	//error handling
	if(DEBUG){
		ini_set('display_errors', true);
		error_reporting(E_ALL);
	}else{
		ini_set('display_errors', false);
	}

	//start engine
	include 'vendor/startup.php';
