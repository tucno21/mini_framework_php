<?php

namespace App\Model;

use App\System\Model;

class RolModel extends Model
{
    //Required fields
    protected static $table       = 'roles';
    protected static $primaryKey  = 'id';
    //fields Table for sync up
    protected static $allowedFields = ['name', 'description', 'status'];
    //if there is a password field encrypt

    // Dates
    protected static $useTimestamps   = false;
    protected static $createdField    = 'created_at'; //no sirve
    protected static $updatedField    = 'updated_at';
}
