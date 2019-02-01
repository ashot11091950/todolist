<?php
	class AddProjectController extends Controller{
		public function index(){
			if($this->request->method == 'POST' && isset($this->request->post['save'])){
				$project = $this->request->post['add'];
			}
		}
	}