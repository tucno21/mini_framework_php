<?php

namespace App\System;

class Model
{
    protected static $db;
    protected static $table = '';
    protected static $allowedFields = [];

    // Definir la conexión a la BD
    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function sanitize($data)
    {
        $sanitize = [];
        foreach ($data as $key => $value) {
            $sanitize[$key] = self::$db->escape_string($value);
        }
        return $sanitize;
    }

    //RELACIONA EL ARRAY DEL MODELO CON LA ENTRADA DE DATOS DEL FRONTED
    public function allowedFields($data)
    {
        $fields = [];
        foreach (static::$allowedFields as $val) {
            if (isset($data[$val])) {
                $fields[$val] = $data[$val];
            }
        }
        // if (static::$useTimestamps == true) {
        //     $atributos[static::$updatedField] = date('Y-m-d H:i:s');
        // }
        //Limpia de codigo dañino
        $data = $this->sanitize($fields);
        return $data;
    }

    //CREAR
    public function save($data)
    {
        $send = $this->allowedFields($data);

        $columns = implode(", ", array_keys($send));
        $values = implode("', '", array_values($send));

        $query = "INSERT INTO " . static::$table . "($columns) VALUES ('$values')";
        $stmt = self::$db->query($query);

        if ($stmt) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt->null;
    }
}
