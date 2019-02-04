<?php
	class Categorys extends Model{

		private $table = 'categorys';

		public function select($fields, $filter){
			return $this->db->select($this->table, $fields, $filter);
		}
	}