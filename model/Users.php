<?php 

	class Users extends Model{
		private $table="users";
		private $tableAdmin="administrators";
		public function all(){
			$result = $this->db->select($this->table, ['*']);
			return $result;
		}
		public function login($field, String $username, String $password, bool $admin = false){
			// $password = md5($password);
			$table = $admin ? $this->tableAdmin : $this->table;
			$result = $this->db->select($table, $field, ['username' => $username, 'password' => $password]);
			return $result;
		}
	}