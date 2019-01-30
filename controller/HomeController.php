<?php
	class HomeController extends Controller{
		public function index(){
			$array['username'] = 'armen';
			$array['email'] = 'armen@armen.armen';
			// $array['password'] = '111111';
			$result = $this->db->delete('users', $array);
			var_dump($result);die;
			
		}
	}
?>