<?php
	class Cookies extends Model{
		private $table="cookies";

		public function set($user_id, String $cookie_key, String $cookie_name, $time = 'false'){
			setcookie($cookie_name, $cookie_key);
			return $this->db->insert($this->table, ['user_id'=>$user_id, 'cookie_key'=>$cookie_key, 'cookie_name'=>$cookie_name, 'time'=>$time]);
		}

		public function select(String $field, Array $filter){
			$result = $this->db->select($this->table, $field, $filter)['rows'];
			if($result){
				return $result[0]['user_id'];
			}
		}
		public function delete(Array $filter){
			$result = $this->db->delete($this->table, $filter);
			if($result){
				return true;
			}
		}

	}