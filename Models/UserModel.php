<?php

class UserModel extends BaseModel
{
    const TABLE = 'users';

    public function getAll($select = ['*'], $orderBy = [])
    {
        return $this->all(self::TABLE, $select, $orderBy);
    }

    public function findUserById($value)
    {
        $sql = "SELECT * FROM users WHERE user_id = $value";

        $query = $this->_query($sql);

        return mysqli_fetch_assoc($query);
    }

    public function store($value)
    {

        $sql = "INSERT INTO users(`user_name`, `user_mail`, `user_pass`) VALUES (${value})";

        return $this->_query($sql);
    }

    public function updateUser($id,$value)
    {

        $this->update(self::TABLE,$id,$value);
    }

    public function deleteUser($item,$id)
    {
        return $this->deleteById(self::TABLE,$item, $id);
        
    }

    public function checkMail($mail){
        $sql = "SELECT * FROM users WHERE user_mail = '${mail}'";
        $query = $this->_query($sql);
        return mysqli_num_rows($query);    
    }

    private function _query($sql){
        return mysqli_query($this->connect, $sql);
    }
}