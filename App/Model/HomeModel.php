<?php

namespace App\Model;

use App\System\Model;

class HomeModel extends Model
{
    protected static $table = 'users';

    protected static $allowedFields = ['username', 'email', 'password', 'name'];

    // Dates
    protected static $useTimestamps   = true;
    protected static $createdField    = 'created_at'; //no sirve
    protected static $updatedField    = 'updated_at';
}
