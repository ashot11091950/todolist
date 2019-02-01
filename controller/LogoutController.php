<?php
	class LogoutController extends Controller{
		public function index(){
			unset($_COOKIE['login']);
    		setcookie('login', null, -1, '/');
			redirect('/login');
		}
	}