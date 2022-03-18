<?php

class LoginController extends BaseController{
    
    public $loginModel;
    public $loginValidate;
    public $cookie;

    public function __construct()
    {
        $this->loadModel('LoginModel');
        $this->loginModel = new LoginModel();

        require "./Core/Cookie.php";
        $this->cookie = new Cookie();

    }

    public function login()
    {
        if(isset($_COOKIE['user_mail'])){
            $_SESSION['user_mail'] = $_COOKIE['user_mail'];
            $this->view('admin');
        }else{
            require "./Core/Validate.php";
            $this->loginValidate = new Validate();

            if(isset($_REQUEST['sbm'])){

                $data['user_mail'] = $_POST['mail'];
                $data['user_pass'] = $_POST['password'];

                $errors = $this->loginValidate->accountValidate($data);

                if(count($errors) > 0){
                    return $this->view('login', [
                        'errors' => $errors,
                        ]); 
                }else{
                    $checkUser = $this->loginModel->check($data['user_mail'],$data['user_pass']);
                    
                    if($checkUser == 1 ){
                        $_SESSION['user_mail'] = $data['user_mail'];                    
                        if(!empty($_POST["remember"])) {
                            $this->cookie->put("user_mail",$data['user_mail'],time()+ (10 * 365 * 24 * 60 * 60));

                            
                            $user = $this->loginModel->checkEmail($data['user_mail']);
                            
                            $hash = password_hash(openssl_random_pseudo_bytes(16),PASSWORD_BCRYPT);
                            $this->cookie->put("hash", $hash, time()+ (10 * 365 * 24 * 60 * 60));
                            
                            $this->loginModel->saveHash($user['user_id'],$hash);
                        }
                        $this->view('admin');
                        
                    }
                    else
                    {
                        $errors[] = 'Tài khoản hoặc mật khẩu không chính xác! ' ;                   
                        return $this->view('login', [
                            'errors' => $errors,
                            'old'   => $data,
                            ] ); 
                    }
                }
            }
            else
            {
                return $this->view('login',[ 

                ]);
            }
        }
    }

    public function loginWithCookie()
    {
        if(isset($_COOKIE['user_mail'])){
            $user = $this->loginModel->checkEmail($_COOKIE['user_mail']);
            if($user != 0) {
                if($user['user_hash'] == $_COOKIE['hash']) return true;
            }
        }
        return false;
    }
}