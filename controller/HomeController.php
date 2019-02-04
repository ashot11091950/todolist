<?php
	class HomeController extends Controller{
		public function index(){
			$cookies = $this->model('Cookies');
			$categorys = $this->model('Categorys');
			$projects = $this->model('Projects');
			if(!isset($_COOKIE['login'])){
				redirect('/login');
			}else if(!$user_id = $cookies->select('user_id', ['cookie_key'=>$_COOKIE['login']])){
					redirect ('/login');
				}else{
					$user_id = $cookies->select('user_id', ['cookie_key'=>$_COOKIE['login']]);
				}
			$filter['user_id'] = $user_id;
			$array = $categorys->select('category_id, content', $filter)['rows'];
			if($array){
				foreach ($array as $e) {
					$data['category_id'][] = $e['category_id'];
					$data['project'][] = $projects->select('project_id, title', ['category_id'=>$e['category_id']])['rows'];
					$data['content'][] = $e['content'];
				}
			}else{
				$data['category_id'] = 0;
			}
			$header = $this->view('header');
			$footer = $this->view('footer');
			$data['header'] = $header;
			$data['footer'] = $footer;
			$this->setOutput('home', $data);
		}
	}
?>