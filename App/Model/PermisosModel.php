<?php

namespace App\Model;

use App\System\Model;

class PermisosModel extends Model
{
    //Required fields
    protected static $table       = 'permisos';
    protected static $primaryKey  = 'id';
    //fields Table for sync up
    protected static $allowedFields = ['rol_id', 'modulo_id', 'create', 'read', 'update', 'delete'];


    // Dates
    protected static $useTimestamps   = false;
    protected static $createdField    = 'created_at'; //no sirve
    protected static $updatedField    = 'updated_at';


    //own function of the model
    public function TPermiso($id)
    {
        $data = $this->queryAll('SELECT P.*, m.title FROM permisos as P INNER JOIN modulo as M ON p.modulo_id=m.id WHERE P.rol_id = ' . $id);
        return $data;
    }
}
