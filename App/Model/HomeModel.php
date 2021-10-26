<?php

namespace App\Model;

use App\System\Model;

class HomeModel extends Model
{
    //Required fields
    protected static $table       = 'users';
    protected static $primaryKey  = 'id';

    protected static $allowedFields = ['username', 'email', 'password', 'name'];

    // Dates
    protected static $useTimestamps   = true;
    protected static $createdField    = 'created_at'; //no sirve
    protected static $updatedField    = 'updated_at';
}
