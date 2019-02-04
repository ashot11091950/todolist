<?php 

	class Users extends Model{
		private $table;
		public function __construct(){
			parent::__construct();
			$this->table = strtolower(get_class($this));
		}
		public function all(){
			$result = $this->db->select($this->table, ['*']);
			return $result;
		}
		public function login($field, String $username, String $password){
			// $password = md5($password);
			$result = $this->db->select($this->table, $field, ['username' => $username, 'password' => $password]);
			return $result;
		}
	}