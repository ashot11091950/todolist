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

		public function clear($cookie_name){
			if(isset($_COOKIE[$cookie_name])){
				$this->db->delete($this->table, ['cookie_key'=>$this->request->cookies['login']]);
				unset($_COOKIE[$cookie_name]);
				setcookie($cookie_name, '', time()-3600);
			}else{
				return false;
			}
		}
	}