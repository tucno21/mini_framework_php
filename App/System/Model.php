<?php

namespace App\System;

class Model
{
    protected static $db;
    protected static $table = '';
    protected static $allowedFields = [];

    protected static $where = null;
    protected static $orderBy = null;
    protected static $columns = null;


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
        //Limpia de codigo dañino
        $data = $this->sanitize($fields);
        return $data;
    }

    //CREAR
    public function create($data)
    {
        $send = $this->allowedFields($data);

        $columns = implode(", ", array_keys($send));
        $values = implode("', '", array_values($send));

        $query = "INSERT INTO " . static::$table . "($columns) VALUES ('$values')";
        $stmt = self::$db->query($query);

        if (self::$db->affected_rows > 0) {
            return "ok";
        } else {
            return "error";
        }
    }


    //ACTUALIZAR
    public function update($id, $data)
    {
        $send = $this->allowedFields($data);
        if (static::$useTimestamps == true) {
            $send[static::$updatedField] = date('Y-m-d H:i:s');
        }

        $cv = [];
        foreach ($send as $key => $value) {
            $cv[] = "{$key}='{$value}'";
        }
        $primaryKey = static::$primaryKey;

        $columValue = join(', ', $cv);
        $query = "UPDATE " . static::$table . " SET $columValue WHERE $primaryKey= '$id'";

        $stmt = self::$db->query($query);

        if (self::$db->affected_rows > 0) {
            return "ok";
        } else {
            return "error";
        }
    }

    //ELIMINAR
    public function delete($id)
    {
        $primaryKey = static::$primaryKey;

        $query = "DELETE FROM " . static::$table . " WHERE $primaryKey='$id'";

        $stmt = self::$db->query($query) === true;
        // dd(self::$db->affected_rows);
        // dd($stmt);
        // if ($stmt) {
        if (self::$db->affected_rows > 0) {
            return "ok";
        } else {
            return "error";
        }
    }

    //LEER TODO TABLA
    public function findAll()
    {
        if (self::$columns != null) {
            $query = "SELECT " . self::$columns . " FROM " . static::$table . self::$where . self::$orderBy;
        } else {
            $query = "SELECT * FROM " . static::$table . self::$where . self::$orderBy;
        }

        // dd($query);
        $stmt = self::$db->query($query);
        $resultadato = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
        $mi_objeto = json_decode(json_encode($resultadato));
        self::$db->close();

        return $mi_objeto;
    }


    //TRAER EL PRIMER REGISTRO
    public function first()
    {
        if (self::$columns != null) {
            $query = "SELECT " . self::$columns . " FROM " . static::$table . self::$where . self::$orderBy;
        } else {
            $query = "SELECT * FROM " . static::$table . self::$where . self::$orderBy;
        }

        $stmt = self::$db->query($query);
        $mi_objeto = mysqli_fetch_assoc($stmt);
        self::$db->close();


        return $mi_objeto;
    }

    public function where($colum, $operator = null, $valueColum = null)
    {
        if ($operator != null && $valueColum != null) {
            self::$where = " WHERE $colum $operator '$valueColum'";
        } else {
            self::$where = " WHERE $colum = '$valueColum'";
        }

        return $this;
    }

    public function columns($columns)
    {
        self::$columns = $columns;
        return $this;
    }

    public function orderBy($colum, $order)
    {
        self::$orderBy = " ORDER BY $colum " . strtoupper($order);
        return $this;
    }

    //BUSCAR UNA FILA POR SU ID
    public static function find($id, $colum = null)
    {
        if ($colum != null) {
            $query = "SELECT * FROM " . static::$table . " WHERE $colum = '$id'";
        } else {
            $primaryKey = static::$primaryKey;
            $query = "SELECT * FROM " . static::$table . " WHERE $primaryKey = '$id'";
        }

        $stmt = self::$db->query($query);
        self::$db->close();

        return $stmt->fetch_object();
    }


    //RECIVE UN QUERY Y ENVIA GRUPOS DE OBJETOS
    public function queryAll($query)
    {
        $stmt = self::$db->query($query);
        $resultadato = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
        $mi_objeto = json_decode(json_encode($resultadato));
        self::$db->close();

        return $mi_objeto;
    }

    //RECIVE UN QUERY Y ENVIA UN OBJETO
    public function queryFirst($query)
    {
        $stmt = self::$db->query($query);
        self::$db->close();

        return $stmt->fetch_object();
    }
}
