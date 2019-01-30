<?php 

	class Users extends Model{
		public function all(){
			$result = $this->db->select('users', ['*']);
			return $result;
		}
	}