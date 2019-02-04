<?php
    class AdminController extends Controller 
    {
        public function index(){
            $cookies = $this->model('Cookies');
            if(isset($this->request->cookies['login'])){
                if($cookies->select('user_id', ['cookie_key'=>$_COOKIE['login']])){
                    goto adminpage;
				}
            }
            if($this->request->method == "POST" && isset($this->request->post['submit']) && $this->request->post['submit']=="Login"){
                if(isset($this->request->post['username']) && isset($this->request->post['password'])){
                    $username = $this->request->post['username'];
                    $password = $this->request->post['password'];
                    $result = $this->model('Users')->login('admin_id', $username, $password, true);
                    if($result['num_rows'] > 0){
                        $cookies->set($result['rows'][0]['admin_id'], generateRandomString(50), 'login');
                        goto adminpage;
                    }else{
                        $data['error'] = 'Password is false';
                    }
                }
            }

            adminlogin:
            $data['header'] = $this->view('header');
            $data['footer'] = $this->view('footer');
            $this->setOutput('adminLogin', $data);
            die;

            adminpage:
            if(isset($this->request->post['submit'])){
                if($this->request->post['submit'] == 'register'){
                    $username = $this->request->post['username'];
                    $name = $this->request->post['name'];
                    $surname = $this->request->post['surname'];
                    $phone = $this->request->post['phone'];
                    $email = $this->request->post['email'];
                    $password = $this->request->post['password'];
                    $result = $this->db->insert('users', ['username'=>$username, 'name'=>$name, 'surname'=>$surname, 'phone'=>$phone, 'email'=>$email, 'password'=>$password]);
                    if($result !== true){
                        echo "Error while inserting to database: " + $result['errormessage'];
                    }else{
                        $data['message'] = 'Registration complete';
                    }
                }elseif($this->request->post['submit'] == 'Logout'){
                    $cookies->clear('login');
                    if(isset($data['error']))unset($data['error']);
                    goto adminlogin;
                }
            }


            $data['header'] = $this->view('header');
            $data['footer'] = $this->view('footer');
            $this->setOutput('admin', $data);
        }
    }
    