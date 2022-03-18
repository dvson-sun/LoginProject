<?php
session_start();
ob_start();

require './Core/Database.php';
require './Models/BaseModel.php';
require './Controllers/BaseController.php';
require "./Controllers/LoginController.php";
$login = new LoginController();

if(isset($_SESSION['user_mail']) || $login->loginWithCookie()){  
    if(empty($_SESSION['user_mail'])){
        $_SESSION['user_mail'] = $_COOKIE['user_mail'];
    }
    if(isset($_REQUEST['controller'])){
        
        $controllerName = ucfirst(strtolower($_REQUEST['controller']).'Controller');       
        $actionName =  strtolower($_REQUEST['action'] ?? 'index');
        
        if($controllerName == "LoginController"){
            $login->$actionName();
        }   
        else{
            
            require "./Controllers/${controllerName}.php";            
            $controllerObject = new $controllerName;            
            $controllerObject -> $actionName();          
        }     
    }else {
        require_once "./Views/admin.php"; 
    }
}
else {
    $login->login(); 
}
