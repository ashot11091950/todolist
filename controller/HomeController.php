<?php

	class HomeController extends Controller{
		public function index(){
			$homemodel = $this->model('HomeModel');
			$homemodel->getTable();
			var_dump($homemodel->getTable());die;
			$this->view($data);
		}
	}


?>