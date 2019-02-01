<?php
	class AddProjectController extends Controller{
		public function index(){
			if($this->request->method == 'POST' && isset($this->request->post['save'])){
				var_dump($this->request->post['add']);die;
			}
		}
	}