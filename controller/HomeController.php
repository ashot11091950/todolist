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
			$categorys = $this->model('Categorys');
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