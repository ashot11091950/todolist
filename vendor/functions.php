<?php 

	function redirect(String $url, int $statusCode = 302){
		http_response_code($statusCode);
		header('Location: ' . $url);
	}

	function error500(){
		if(is_file('view/'.ERR500.'.view.html')){
			include 'view/'.ERR500.'.view.html';
		}else{
			die("Error GetView: File view/".ERR500.".view.html doesn't exist");
		}
		exit;
	}

	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}