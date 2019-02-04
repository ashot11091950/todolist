<?php
	class Categorys extends Model{
		private $table = "categorys";
        
        function set($user_id, String $title){
			return $this->db->insert($this->table, ['user_id'=>$user_id,'content'=> $title]);
		}

		function select(String $field, Array $filter){
			$result = $this->db->select($this->table, $field, $filter);
			return $result;
		}
}