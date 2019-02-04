<?php
	class AddTaskController extends Controller{
		public function print(){
			$tasks = $this->model('Tasks');
			$result = $tasks->select('task_id, title', ['project_id'=>$this->request->post['project_id']]);
			if($result['num_rows'] == 0){
				echo 0; die;
			}else{
				echo json_encode($result['rows']); die;
			}
		}
		public function add(){
			$cookies = $this->model('Cookies');
			$tasks = $this->model('Tasks');
			$data['user_id'] = $cookies->select('user_id', ['cookie_key'=>$_COOKIE['login']]);
			$data['project_id'] = $this->request->post['project_id'];
			$data['title'] = $this->request->post['title'];
			$data['description'] = '';
			$data['deadline'] = '';
			$data['priority'] = '0';
			$result = $tasks->insert($data);
			if($result){
				echo 1;
			}else{
				echo 0;
			}
		}
	}