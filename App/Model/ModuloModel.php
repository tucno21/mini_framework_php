<?php

namespace App\Model;

use App\System\Model;

class ModuloModel extends Model
{
    //Required fields
    protected static $table       = 'modulo';
    protected static $primaryKey  = 'id';
    //fields Table for sync up
    protected static $allowedFields = ['title', 'status'];
    //if there is a password field encrypt
    //the field must be the same $allowedFields

    // Dates
    protected static $useTimestamps   = false;
    protected static $createdField    = 'created_at'; //no sirve
    protected static $updatedField    = 'updated_at';
}
