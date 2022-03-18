<?php

class BaseController
{
    public $validate;
    // public function __construct()
    // {
    //     require "./Core/Validate.php";
    //     $this->validate = new Validate();
    // }

    protected function view($viewPath, array $data = [])
    {     
        foreach($data as $key => $value){
            $$key = $value;
        }   
        require ( 'Views/'. str_replace(".","/", $viewPath). '.php');
    }

    protected function loadModel($modelPath)
    {
        require('Models/'.$modelPath.'.php');
    }



}