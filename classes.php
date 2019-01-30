<?php 
	class Model{
		
	}
	class Controller{
		
	}
	class DB{
		public function __contruct(){
			$con = mysqli_connect('localhost', 'root', '@,~rXtn3hU5?3sn~', 'todo_bs');
			mysqli_set_charset($connect,"utf8");
			return $con;
		}
		protected function insert($table,Array $data){

		}
		protected function select($table,Array $data){
			
		}
		protected function update($table,Array $data){
			
		}
		protected function delete($table,Array $data){
			
		}
	}
?>