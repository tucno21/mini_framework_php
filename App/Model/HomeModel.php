<?php

namespace App\Model;

use App\System\Model;

class HomeModel extends Model
{
    //Required fields
    protected static $table       = 'users';
    protected static $primaryKey  = 'id';
    //fields Table for sync up
    protected static $allowedFields = ['dni', 'name', 'surnames', 'phone', 'email', 'password', 'nit', 'nombrefiscal', 'direccionfiscal', 'token', 'rol_id', 'status'];
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
    public function permisos($data)
    {
        // $dataM = $this->queryMod("SELECT U.name,U.surnames,U.email,U.status,U.dni,P.* FROM users as U CROSS JOIN permisos as P ON U.rol_id=P.rol_id WHERE $colum = '$data'");
        // $dataM = $this->queryMod("SELECT * FROM permisos WHERE rol_id = '$data'");

        $dataM = $this->queryMod('SELECT P.*, m.title FROM permisos as P INNER JOIN modulo as M ON p.modulo_id=m.id WHERE P.rol_id = ' . $data);

        $data = array();

        foreach ($dataM as $key => $value) {
            $data[$value->title] =  $value;
        }

        return $data;
    }
}
