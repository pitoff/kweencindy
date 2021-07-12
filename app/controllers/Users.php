<?php
    class Users extends Controller{

        public function __construct(){
            $this->userModel = $this->model('User');
            $this->bookingModel = $this->model('Booking');
        }

        public function signup(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'phone' => trim($_POST['phone']),
                    'password' => trim($_POST['password']),
                    'Cpass' => trim($_POST['Cpass']),
                    'name_err' => '',
                    'email_err' => '',
                    'phone_err' => '',
                    'password_err' => '',
                    'Cpass_err' => ''
                ];

                if(empty($data['name'])){
                    $data['name_err'] = 'name field is missing';
                }
                if(empty($data['email'])){
                    $data['email_err'] = 'please input email';
                }elseif($this->userModel->findUserByEmail($data['email'])) {
					$data['email_err'] = 'Email is already taken';
				}

                if(empty($data['phone'])){
                    $data['phone_err'] = 'type in a phone number';
                }
                if(empty($data['password'])){
                    $data['password_err'] = 'type in a password';
                }elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must not be less than 6 characters';
                }elseif($data['password'] != $data['Cpass']){
                    $data['Cpass_err'] = 'Password does not match';
                }
                if(empty($data['Cpass'])){
                    $data['Cpass_err'] = 'confirm your password';
                }
                
                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['phone_err']) && empty($data['password_err']) && empty($data['Cpass_err'])){
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    if($this->userModel->signUp($data)){
                        flash('signupSuccess', 'Sign up was successfull you can now login');
                        redirect('users/login');
                    }else{
                        die('something went wrong');
                    }
                }else{
                    $this->view('pages/signup', $data);
                }
                
            }else{
                $data = [
                    'name' => '',
                    'email' => '',
                    'phone' => '',
                    'password' => '',
                    'Cpass' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'phone_err' => '',
                    'password_err' => '',
                    'Cpass_err' => '' 
                ];
                $this->view('pages/signup', $data);
            }
        }

        public function login(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data = [
					'email' => trim($_POST['email']),
					'password' => trim($_POST['password']),
					'email_err' => '',
					'password_err' => ''
				];

				if (empty($data['email'])) {
					$data['email_err'] = 'please enter email address';
				}
				if (empty($data['password'])) {
					$data['password_err'] = 'please enter password';
				}

				if (empty($data['email_err']) && empty($data['password_err'])) {
					$loggedInUser = $this->userModel->login($data['email'], $data['password']);
                    
                        if ($loggedInUser) {
                            $this->createUserSession($loggedInUser);
                        }else{
                            flash2('failed', 'Oops! details does not match any user');
                            redirect('users/login');
                        }
					
				}else{
					$this->view('pages/login', $data);
				}
			}else{
				$data = [
					'email' => '',
					'password' => '',
					'email_err' => '',
					'password_err' => ''
				];
				$this->view('pages/login', $data);
			}
		}

        public function createUserSession($user){
			$_SESSION['user_id'] = $user->id;
			$_SESSION['email'] = $user->email;
			$_SESSION['fullname'] = $user->name;
			$_SESSION['role'] = $user->role;
           
            redirect('users/dashboard');	
		}

        public function logout(){
            unset($_SESSION['user_id']);
			unset($_SESSION['email']);
			unset($_SESSION['fullname']);
			unset($_SESSION['role']);
			session_destroy();
			redirect('users/login');
        }

        public function dashboard(){
            $allbookings = $this->bookingModel->allBookings();
            $data = [
                'allbookings' => $allbookings
            ];
            $this->view('users/dashboard', $data);
        }

        public function updatePay($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'id' => $id,
                    'status' => $_POST['status']
                ];
                if($this->bookingModel->updatePay($data)){
                    redirect('users/dashboard');
                }else{
                    die('something went wrong');
                }
            }else{
                redirect('users/dashboard');
            }
        }

        public function updateDate($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'id' => $id,
                    'status' => $_POST['status']
                ];
                if($this->bookingModel->updateDate($data)){
                    redirect('users/dashboard');
                }else{
                    die('something went wrong');
                }
            }else{
                redirect('users/dashboard');
            }
        }

        public function forgotpass(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $token  = rand(100000,900000);
                $data = [
                   'email' => trim($_POST['email']),
                   'token' => $token,
                   'email_err' => ''
                ];
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter an email address';
                }

                if(empty($data['email_err'])){
                    $setToken = $this->userModel->setToken($data);
                    if($setToken){
                        redirect('users/newpass');
                    }else{
                        flash2('failed', 'an error occured');
                        redirect('users/forgotpass');
                    }
                }else{
                    $this->view('users/forgotpass',$data);
                }
            }else{
                $data = [
                   'email' => '',
                   'email_err' => '' 
                ];
                $this->view('users/forgotpass', $data);
            }
        }

        public function newpass(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                   'email' => trim($_POST['email']),
                   'token' => $_POST['token'],
                   'New_password' => $_POST['New_password'],
                   'Confirm_password' => $_POST['Confirm_password'],
                   'email_err' => '',
                   'token_err' => '',
                   'New_password_err' => '',
                   'Confirm_password_err' => ''
                ];
                $getToken = $this->userModel->getMyToken($data['email']);
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter an email address';
                }

                if(empty($data['token'])){
                    $data['token_err'] = 'token must not be empty';
                }elseif($getToken->token != $data['token']){
                    $data['token_err'] = 'Token does not match';
                }

                if(empty($data['New_password'])){
                    $data['New_password_err'] = 'New password must not be empty';
                }elseif(strlen($data['New_password']) < 6){
                    $data['New_password_err'] = 'Password should be more than 6 xters';
                }elseif($data['New_password'] != $data['Confirm_password']){
                    $data['Confirm_password_err'] = 'Passwords does not match';
                }

                if(empty($data['Confirm_password'])){
                    $data['Confirm_password_err'] = 'Confirm your password';
                }

                if(empty($data['email_err']) && empty($data['token_err']) && empty($data['New_password_err']) && empty($data['Confirm_password_err'])){
                    $data['New_password'] = password_hash($data['New_password'], PASSWORD_DEFAULT);
                    $changePass = $this->userModel->changePass($data);
                    if($changePass){
                        flash('password_reset', 'password reset was successfull, you can now login');
                        redirect('users/login');
                    }else{
                        flash2('failed', 'an error occured');
                        redirect('users/newpass');
                    }
                }else{
                    $this->view('users/newpass', $data);
                }
            }else{
                $data = [
                    'email' => '',
                    'token' => '',
                    'New_password' => '',
                    'Confirm_password' => '',
                    'email_err' => '',
                    'token_err' => '',
                    'New_password_err' => '',
                    'Confirm_password_err' => '' 
                ];
                $this->view('users/newpass', $data);
            }
        }

    }
