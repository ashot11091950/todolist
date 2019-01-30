<?php 
	class Model{
		public $db;
		public function __construct(){
			$this->db = new DB;
		}
	}
	class Controller{
		private $view;
		protected function model($modelName){
			include 'model/' . $modelName . '.php';
			return new $modelName;
		}
		protected function view($filename){
			$this->view .= file_get_contents('view/'.$filename.'.view.html');
		}
		protected function set_output(){
			echo $this->view;die;
		}
	}
	class DB{
		private $conn;
		public function __construct(){
			$this->conn = mysqli_connect('localhost', 'root', '@,~rXtn3hU5?3sn~', 'todo_bs');
			mysqli_set_charset($this->conn,"utf8");
		}
		public function insert($table, Array $data){

		}
		public function select($table,Array $data, Array $filter = null){
			$sql = 'SELECT ';
			foreach ($data as $field) {
				$sql .= $field . ' ';
			}
			$sql .= "FROM $table";
			if(!is_null($filter)){
				$sql .= " WHERE ";
				$flag = false;
				foreach ($filter as $key => $value) {
					if($flag) $sql .= " AND ";
					$sql .= $key . '=' . $value;
					$flag = true;
				}
			}
			return $this->query($sql);
		}
		public function update($table,Array $data){
			
		}
		public function delete($table,Array $data){
			
		}
		public function query(String $query){
			$ret = mysqli_query($this->conn, $query);
			return $ret;
		} 
	}
	class Route{
		private $routes = array();
		public function addRoute(String $route, String $controller){
			$esiminch = explode('@', $controller);
			$this->routes[] = ['route' => $route, 'controller' => $esiminch[0], 'function' => $esiminch[1]];
		}
		public function getRoute(String $url){
			foreach ($this->routes as $route) {
				if($route['route']==$url){
					return [$route['controller'], $route['function']];
				}
			}
		}
	}
?>

