<?php
require_once dirname(__DIR__) . '/Config/App.php';

$db = mysqli_connect($localhost, $user, $password, $dbName);

if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "error de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}
