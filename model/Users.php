<?php 

	class Users extends Model{
		public function all(){
			$result = $this->db->select('users', ['*']);
			return $result;
		}
		public function insert($table, $data){
			$this->db->insert($table, $data);
		}
	}