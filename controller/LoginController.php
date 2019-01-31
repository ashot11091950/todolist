<?php 
	class LoginController extends Controller{
		public function index(){
			//check login.
			$result = $this->db->select('users', ['*']);
			var_dump($result['rows']);die;
			if($this->request->method() == "POST" && isset($this->request->post['submit'])){

			}
			$header = $this->view('header');
			$footer = $this->view('footer');
			$data['title'] = 'Ashot';
			$data['header'] = $header;
			$data['footer'] = $footer;
			$this->setOutput('login', $data);
		}
	}
?>