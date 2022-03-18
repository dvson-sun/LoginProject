<?php

class BaseModel extends Database
{
    protected $connect;

    public function __construct()
    {
        $this->connect = $this->connect();
    }
    
    
    public function all($table, $select = ['*'], $orderBys = [])
    {
        $columns = implode(',', $select);
        $orderByString = implode(' ', $orderBys);   

        if($orderByString){
            $sql = "SELECT ${columns} FROM ${table} ORDER BY ${orderByString} ";
        } else {
            $sql = "SELECT ${columns} FROM ${table}";
        }

        $query = $this->_query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query))
        {
            array_push($data, $row);
        }
        return $data;
    }

    public function findById($table,$select, $id)
    {
        $columns = implode(',', $select);
        $sql = "SELECT ${columns} FROM ${table} WHERE $id LIMIT 1 ";
        $query = $this->_query($sql);        
        return mysqli_fetch_assoc($query);
    }

    public function update($table,$id,$value)
    {
        $sql = "UPDATE ${table} SET ${value} WHERE ${id}";
        $this->_query($sql);
    }

    public function deleteById($table,$item,$id)
    {
        $sql = "DELETE FROM ${table} WHERE $item = $id ";
        $this->_query($sql);
    }

    private function _query($sql){
        return mysqli_query($this->connect, $sql);
    }

}