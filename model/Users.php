<?php 

	class Users extends Model{
		private $table;
		public function __construct(){
			$this->table = strtolower(get_class($this));
		}
		public function all(){
			$result = $this->db->select($this->table, ['*']);
			return $result;
		}
		public function login(String $username, String $password){
			// $password = md5($password);
			$this->db->select($this->table, ['user_id'], ['username' => $username, 'password' => $password]);
		}
	}