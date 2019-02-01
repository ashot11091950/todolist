<?php
	class HomeController extends Controller{
		public function index(){
			if(!isset($_COOKIE['login'])){
				redirect('/login');
			}else{
				if(!$user_id = $this->model('Cookies')->select('user_id', ['cookie_key'=>$_COOKIE['login']])){
					redirect ('/login');
				}
			}



			$header = $this->view('header');
			$footer = $this->view('footer');
			$data['header'] = $header;
			$data['footer'] = $footer;
			$data['name'] = 'Armen Jan';
			$this->setOutput('home', $data);
		}
	}
?>