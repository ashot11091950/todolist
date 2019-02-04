<?php
	class Tasks extends Model{
		private $table = 'tasks';

		public function select($fields, $filter){
			return $this->db->select($this->table, $fields, $filter);
		}
		public function insert($data){
			return $this->db->insert($this->table, $data);
		}

	}