<?php 
	class LoginController extends Controller{
		public function index(){
			$cookies = $this->model('Cookies');
			if(isset($_COOKIE['login'])){
				if($user_id = $cookies->select('user_id', ['cookie_key'=>$_COOKIE['login']])){
					redirect('/home');
				}
			}			
			$data['title'] = 'To Do List';
			$data['error'] = '';

			//check login.
			if($this->request->method == "POST" && isset($this->request->post['submit'])){
				$result = $this->model('Users')->login('user_id, username, password', $this->request->post['username'], $this->request->post['password']);
				if($result['num_rows'] == 1){
					$cookies->set($result['rows'][0]['user_id'], generateRandomString(50), 'login');
					redirect('/home');
				}else{
					$data['error'] = 'Wrong username or password';
				}
			}
			$this->setOutput('layout', $data);
		}
	}
?>