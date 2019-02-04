<?php
	class AddProjectController extends Controller{
		public function index(){
			$projects = $this->model('Projects');
			$cookies = $this->model('Cookies');
			if($this->request->method == 'POST' && isset($this->request->post['save'])){
				$array['user_id'] = $cookies->select('user_id', ['cookie_key'=>$_COOKIE['login']]);
				$array['title'] = $this->request->post['title'];
				$array['category_id'] = $this->request->post['category_id'];
				$result = $projects->insert($array);
				if($result){
					echo 1;
				}else{
					echo 0;
				}
			}
		}
	}