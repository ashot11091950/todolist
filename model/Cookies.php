<?php
	class Cookies extends Model{
		private $table;
		public function __construct(){
			parent::__construct();
			$this->table = strtolower(get_class($this));
		}


		function set($user_id, String $cookie_key, String $cookie_name, $time = 'false'){
			setcookie($cookie_name, $cookie_key);
			return $this->db->insert($this->table, ['user_id'=>$user_id, 'cookie_key'=>$cookie_key, 'cookie_name'=>$cookie_name, 'time'=>$time]);
		}

		function select(String $field, Array $filter){
			$result = $this->db->select($this->table, $field, $filter)['rows'];
			if($result){
				return $result[0]['user_id'];
			}
		}
	}