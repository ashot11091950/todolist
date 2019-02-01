<?php 
	function redirect(String $url, int $statusCode = 302){
		http_response_code($statusCode);
		header('Location: ' . $url);
	}