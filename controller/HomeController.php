<?php
	class HomeController extends Controller{
		public function index(){
			$model = $this->model('HomeModel');
			$result = $model->getTable();
			var_dump(555);
		}
	}
?>