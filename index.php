<?php
	include 'config.php';
	if(DEBUG){
		ini_set('display_errors', true);
		error_reporting(E_ALL);
	}else{
		ini_set('display_errors', false);
	}
	include 'vendor/startup.php';
