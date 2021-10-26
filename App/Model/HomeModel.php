<?php

namespace App\Model;

use App\System\Model;

class HomeModel extends Model
{
    //Required fields
    protected static $table       = 'users';
    protected static $primaryKey  = 'id';
    //fields Table for sync up
    protected static $allowedFields = ['username', 'email', 'password', 'name'];
    //if there is a password field encrypt
    //the field must be the same $allowedFields
    protected static $passEncrypt = true;
    protected static $password = 'password'; //password_hash($password, PASSWORD_BCRYPT)
    //password_verify(Input['password'], $result->password) //true - false;

    // Dates
    protected static $useTimestamps   = true;
    protected static $createdField    = 'created_at'; //no sirve
    protected static $updatedField    = 'updated_at';


    //own function of the model
    public function newQuery()
    {
        // $data = $this->queryFirst('SELECT * FROM users');
        $data = $this->queryAll('SELECT * FROM users');
        return $data;
    }

    //own function of the model
    public function queryNew()
    {
        $data = self::$db->query('SELECT * FROM users');
        return $data;
    }
}
