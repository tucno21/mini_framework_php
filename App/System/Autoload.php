<?php

require 'functions.php';
require 'Database.php';

require_once dirname(__DIR__) . '/../vendor/autoload.php';

use App\System\Model;

Model::setDB($db);
