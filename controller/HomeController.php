<?php
	class HomeController extends Controller{
		public function index(){
			$model = $this->model('Users');
			$result = $model->all();
			var_dump($result);die;
		}
	}
?>