<?php 

	class HomeModel extends Model{
		public function index(){
			$result = $this->db->select('users', ['user_id', 'username']);
			return $result;
		}
	}

 ?>