<?php 

	class Model{
		public $db;
		public function __construct(){
			$this->db = new DB;
		}
	}

	class Controller{
		public $request;
		public $db;
		public function __construct(){
			$this->db = new DB;
			$this->request = new Request;
		}
		protected function model($modelName){
			include 'model/' . $modelName . '.php';
			return new $modelName;
		}
		protected function view(String $filename, Array $data = null){
            if(is_file('view/'.$filename.'.view.html')){
                ob_start();
                include 'view/'.$filename.'.view.html';
                return ob_get_clean();
            }else{
                die("Error GetView: File view/$filename.view.html doesn't exist");
            }
            // $this->view .= file_get_contents('view/'.$filename.'.view.html');
        }
		protected function setOutput(String $filename, Array $data = null){
			if(is_file('view/'.$filename.'.view.html')){
                include 'view/'.$filename.'.view.html';
            }else{
                die("Error GetView: File view/$filename.view.html doesn't exist");
            }
		}
	}

	class DB{
		private $conn;
		public function __construct(){
			$this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
			mysqli_set_charset($this->conn,"utf8");
		}
		public function insert(String $table, Array $data){
		    $ins = "INSERT INTO $table ";
            $set = "(";
            $val = "(";
            $flag = false;
            foreach ($data as $key => $value){
                if($flag){
                    $set .= ', ';
                    $val .= ', ';
                }
                $set .= $key;
                $val .= '"'.$value.'"';
                $flag = true;
            }
            $set .= ")";
            $val .= ")";
            $ins .= $set . " VALUES " . $val;
            return $this->query($ins, false);
		}
		public function select($table,String $data, Array $filter = null){
			$sql = "SELECT $data FROM $table";
			if(!is_null($filter)){
				$sql .= " WHERE ";
				$flag = false;
				foreach ($filter as $key => $value) {
					if($flag) $sql .= " AND ";
					$sql .= $key . '=' ."'". $value ."'";
					$flag = true;
				}
			}
			return $this->query($sql);
		}
		public function update($table, Array $data, Array $filter){
            $sql = "UPDATE $table SET ";
            $flag = false;
            foreach ($data as $key => $value){
                if($flag){
                    $sql .= ', ';
                }
                $sql .= $key . '='."'". $value."'";
                $flag = true;
            }
            if(!is_null($filter)){
                $sql .= " WHERE ";
                $flag1 = false;
                foreach ($filter as $key1 => $value1){
                    if($flag1){
                        $sql .= " AND ";
                    }
                    $sql .= $key1 . '=' ."'".$value1."'";
                    $flag1 = true;
                }
                return $this->query($sql, false);
            }
		}
		public function delete($table, Array $filter){
			$sql="DELETE FROM $table WHERE ";
			foreach ($filter as $value=>$k) {
				$sql.=$value;
				$sql.= " = ";
				$sql.= "'".$k."'";
				$sql.=" AND ";
			}
			$sql = rtrim($sql," AND");
			return $this->query($sql, false);

		}
		private function fetchAssoc($data){
			$return = array();
			$num_rows = $data->num_rows;
			while ($row = $data->fetch_assoc()) {
				$return[] = $row;
			}
			return ['rows' => $return, 'num_rows' => $num_rows];
		}
		public function query(String $query, bool $fetch = true){
			if(!$query = mysqli_query($this->conn, $query)){
				$return['error'] = true;
				$return['errormessage'] = mysqli_error($this->conn);
				return $return;
			};
			if($fetch){
				return $this->fetchAssoc($query);
			}else{
				return true;
			}
		}
	}

	class Route{
		private $routes = array();
		public function addRoute(String $route, String $controller){
			$esiminch = explode('@', $controller);
			$this->routes[] = ['route' => $route, 'controller' => $esiminch[0], 'function' => $esiminch[1]];
		}
		public function getRoute(String $url){
			routeStart:
			foreach ($this->routes as $route) {
				if($route['route']==$url){
					return [$route['controller'], $route['function']];
				}
			}
			$url = '/error404';
			goto routeStart;
		}
	}

	class Request{
		public $post;
		public $get;
		public $method;
		public function __construct(){
			$this->post = $_POST;
			$this->get = $_GET;
			$this->method = $_SERVER['REQUEST_METHOD'];
		}
	}
