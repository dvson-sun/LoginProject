<?php

class LoginModel extends BaseModel
{

    protected $connect;
    const TABLE = 'users';

    public function __construct()
    {
        $this->connect = $this->connect() ;
    }

    public function check($mail,$password)
    {
        $sql = "SELECT * FROM users WHERE user_mail = '$mail' ";

        $query = $this->_query($sql);

        $row = mysqli_fetch_assoc($query);
        $hash = $row['user_pass'];
        
        if (password_verify($password, $hash)) { 
            return 1;
		} 
        return 0;
    }

    public function checkEmail($mail){
        $sql = "SELECT * FROM users WHERE user_mail = '$mail' ";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }

    public function saveHash($id,$hash)
    {
        $value = "user_hash = '".$hash."'";
        $idString = 'user_id = ' . $id;

        $this->update(self::TABLE,$idString,$value);

    }

    // public function deleteHash($mail){
    //     $mailString = "user_mail = '".$mail."'"; 
    //     $this->update(self::TABLE,$mailString,"");
    // }
    private function _query($sql){
        return mysqli_query($this->connect, $sql);
    }
}