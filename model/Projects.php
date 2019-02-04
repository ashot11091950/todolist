<?php
	class Projects extends Model{
		private $table = 'projects';

		public function insert($data){
			return $this->db->insert($this->table, $data);
		}
		public function select($fields, $filter){
			return $this->db->select($this->table, $fields, $filter);
		}
	}
