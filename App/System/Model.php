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

    protected static $passEncrypt = false;
    protected static $password =  null;

    // Dates
    protected static $useTimestamps   = false;
    protected static $updatedField    = null;


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
        $this->passEncrypt();

        $send = $this->allowedFields($data);

        if (self::$passEncrypt === true) {
            $send['password'] = password_hash($send['password'], PASSWORD_BCRYPT);
        }

        $columns = implode(", ", array_keys($send));
        $values = implode("', '", array_values($send));

        $query = "INSERT INTO " . static::$table . "($columns) VALUES ('$values')";
        $stmt = self::$db->query($query);

        if (self::$db->affected_rows > 0 || $stmt) {
            return [
                'result' =>  'ok',
                'id' => self::$db->insert_id
            ];
        } else {
            return "error";
        }
    }


    //ACTUALIZAR
    public function update($id, $data)
    {
        $this->passEncrypt();
        $this->useTimestamps();

        $send = $this->allowedFields($data);

        if (self::$useTimestamps == true) {
            $send[static::$updatedField] = date('Y-m-d H:i:s');
        }

        if (self::$passEncrypt === true) {
            $send['password'] = password_hash($send['password'], PASSWORD_BCRYPT);
        }

        $cv = [];
        foreach ($send as $key => $value) {
            $cv[] = "{$key}='{$value}'";
        }
        $primaryKey = static::$primaryKey;

        $columValue = join(', ', $cv);
        $query = "UPDATE " . static::$table . " SET $columValue WHERE $primaryKey= '" . self::$db->escape_string($id) . "'";

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

        $query = "DELETE FROM " . static::$table . " WHERE $primaryKey= '" . self::$db->escape_string($id) . "'";

        $stmt = self::$db->query($query);
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
    public function findAll($limit = null)
    {
        $limit = self::$db->escape_string($limit);
        if ($limit != null) {
            if (self::$columns != null) {
                $query = "SELECT " . self::$columns . " FROM " . static::$table . self::$where . self::$orderBy . " LIMIT $limit";
            } else {
                $query = "SELECT * FROM " . static::$table . self::$where . self::$orderBy . " LIMIT $limit";
            }
        } else {
            if (self::$columns != null) {
                $query = "SELECT " . self::$columns . " FROM " . static::$table . self::$where . self::$orderBy;
            } else {
                $query = "SELECT * FROM " . static::$table . self::$where . self::$orderBy;
            }
        }

        $result = $this->readDB($query);
        return $result;
    }


    //TRAER EL PRIMER REGISTRO
    public function first()
    {
        if (self::$columns != null) {
            $query = "SELECT " . self::$columns . " FROM " . static::$table . self::$where . self::$orderBy;
        } else {
            $query = "SELECT * FROM " . static::$table . self::$where . self::$orderBy;
        }

        $result = $this->readDB($query);
        return $result[0];
    }

    public function where($colum, $operator = null, $valueColum = null)
    {
        $colum = self::$db->escape_string($colum);
        $operator = self::$db->escape_string($operator);
        $valueColum = self::$db->escape_string($valueColum);

        if ($operator != null && $valueColum != null) {
            self::$where = " WHERE $colum $operator '$valueColum'";
        } else {
            self::$where = " WHERE $colum = '$operator'";
        }

        return $this;
    }

    public function columns($columns)
    {
        $columns = self::$db->escape_string($columns);

        self::$columns = $columns;
        return $this;
    }

    public function orderBy($colum, $order)
    {
        $colum = self::$db->escape_string($colum);
        $order = self::$db->escape_string($order);

        self::$orderBy = " ORDER BY $colum " . strtoupper($order);
        return $this;
    }

    //BUSCAR UNA FILA POR SU ID
    public function find($id, $colum = null)
    {
        $colum = self::$db->escape_string($colum);

        if ($colum != null) {
            $query = "SELECT * FROM " . static::$table . " WHERE $colum = '$id'";
        } else {
            $primaryKey = static::$primaryKey;
            $query = "SELECT * FROM " . static::$table . " WHERE $primaryKey= '" . self::$db->escape_string($id) . "'";
        }

        $result = $this->readDB($query);
        return $result[0];
    }


    //RECIVE UN QUERY Y ENVIA GRUPOS DE OBJETOS
    public function queryAll($query)
    {
        $query = self::$db->escape_string($query);

        $result = $this->readDB($query);
        return $result;
    }

    //RECIVE UN QUERY Y ENVIA UN OBJETO
    public function queryFirst($query)
    {
        $query = self::$db->escape_string($query);

        $result = $this->readDB($query);
        return $result[0];
    }

    private function readDB($query)
    {
        $stmt = self::$db->query($query);
        // self::$db->close();

        $array = [];
        while ($object = $stmt->fetch_object()) {
            $array[] = $object;
        }

        return  $array;
    }

    private function passEncrypt()
    {
        if (property_exists(static::class, 'passEncrypt')) {
            self::$passEncrypt = static::$passEncrypt;
            self::$password = static::$password;
        }
    }

    private function useTimestamps()
    {
        if (property_exists(static::class, 'useTimestamps')) {
            self::$useTimestamps = static::$useTimestamps;
            self::$updatedField = static::$updatedField;
        }
    }
}
