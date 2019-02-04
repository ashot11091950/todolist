<?php
	class LogoutController extends Controller{
		public function index(){
			$cookies = $this->model('Cookies');
			$key['cookie_key'] = $_COOKIE['login'];
			if($cookies->delete($key)){
				unset($_COOKIE['login']);
	    		setcookie('login', null, -1, '/');
				redirect('/login');
			}
		}
	}