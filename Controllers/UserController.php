<?php

class UserController extends BaseController
{   
    public $UserModel;
    public $userValidate;

    public function __construct()
    {
        $this->loadModel('UserModel');
        $this->userModel = new UserModel;
        require "./Core/Validate.php";
        $this->userValidate = new Validate();
    }

    public function index()
    {
        $selectColumns = [
            'user_id',
            'user_name',
            'user_mail',
        ];
        $orders = [
            'column' => 'user_id',
            'order' => 'desc',
        ];
        $users = $this->userModel->getAll($selectColumns, $orders);

        return $this->view('users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $errors = [];

        if (isset($_REQUEST['sbm'])) {

            $data['user_name'] = $_POST['user_name'];
            $data['user_mail'] =  $_POST['user_mail'];
            $data['user_pass'] =  $_POST['user_pass'];
            $data['user_re_pass'] =  $_POST['user_re_pass'];

            $errors = $this->userValidate->userValidate($data);

            if(count($errors) == 0){
                $errors = $this->userValidate->passValidate($data);
            }

            if (count($errors) == 0 && $this->userModel->checkMail($data['user_mail']) > 0) {
                $errors[] = 'Email đã tồn tại!';
            }

            if (count($errors) == 0) {
                $value = "'" .
                $errors = $this->userValidate->nameFormat($data['user_name'])."','".$data['user_mail']."','".password_hash($data['user_pass'],PASSWORD_BCRYPT)."'";
                $this->userModel->store($value);
                return $this->index();
            } else {
                return $this->view("users.addUser", [
                    "errors" => $errors,
                    "data"   => $data,
                ]);
            }
        }
        return $this->view('users.addUser', [
            "error" => $errors,
        ]);
    }

    public function edit()
    {
        $errors = [];
        $data["user_id"] = $_GET['user_id'];
        $user_info = $this->userModel->findUserById($data["user_id"]);

        if (isset($_REQUEST['sbm'])) {

            $data['user_name'] = $_POST['user_name'];
            $data['user_mail'] =  $_POST['user_mail'];
            $data['user_pass'] =  $_POST['user_pass'];
            $data['user_re_pass'] =  $_POST['user_re_pass'];
 
            $errors = $this->userValidate->userValidate($data);
            
            if(count($errors) == 0 && $data["user_pass"] != ""){
                $errors = $this->userValidate->passValidate($data);  
            }

            if(count($errors) == 0){
                if ($data['user_mail'] != $user_info["user_mail"] && $this->userModel->checkMail($data['user_mail']) > 0) {
                    $errors[] = 'Email đã tồn tại !';
                }
            }

            if (count($errors) == 0) {
                if ($data["user_pass"] == "") {
                    $value = " user_name = '".$this->userValidate->nameFormat($data['user_name'])."',user_mail='".$data['user_mail']."'";
                } else {
                    $value = " user_name = '".$this->userValidate->nameFormat($data['user_name'])."',user_mail='".$data['user_mail']."',user_pass='".password_hash($data['user_pass'],PASSWORD_BCRYPT) . "'";
                }
                $idString = 'user_id = ' . $data['user_id'];
                $this->userModel->updateUser($idString, $value);
                return $this->index();
            } else {
                return $this->view("users.editUser", [
                    "errors"       => $errors,
                    "data"   => $data,
                ]);
            }
        } else {
            return $this->view("users.editUser", [
                'data'  => $user_info,
            ]);;
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['user_id'])) {
            $user_id = $_REQUEST['user_id'];
        }
        $this->userModel->deleteUser("user_id", $user_id);
        return $this->index();
    }
}
