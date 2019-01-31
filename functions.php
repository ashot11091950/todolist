<?php 
	function redirect(String $url, int $statusCode = 301){
		http_response_code($statusCode);
		header('Location: ' . $url);
	}