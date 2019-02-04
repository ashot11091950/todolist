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
			if(isset($this->request->post['title'])){
				$title = $this->request->post['title'];
				$categorys->set($user_id, $title);
				$ar = $categorys->select('content',['user_id' => $user_id]);
				print_r(json_encode($ar));die;
			}
				$new = $categorys->select('content',['user_id' => $user_id]);
				$new_count = count($new['rows']);
				$cont = [];
				for($i = 0; $i < $new_count; $i++){
					$cont[] = $new['rows'][$i]['content'];
				}

				
				
				
			$header = $this->view('header');
			$footer = $this->view('footer');
			$data['cont'] = $cont;
			$data['header'] = $header;
			$data['footer'] = $footer;
			$this->setOutput('home', $data);
		}
	}
?>