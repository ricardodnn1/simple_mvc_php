<?php

namespace App\Models;

use PDO; 
use App\core\Database;

class Tasks {

    private $attributes;

    public function __construct()
    { 

    }

    public function __set(string $attribute, $valor)
    {
        $this->attributes[$attribute] = $valor;
        return $this;
    }

    public function __get(string $attribute)
    {
        return $this->attributes[$attribute];
    }

    public function __isset($attribute)
    {
        return isset($this->attributes[$attribute]);
    }
    
    /**
     * @return array
     */
    public static function findAll() {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT * FROM tasks');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }  

    /** 
     * @return boolean
     */
    public function create() {
        $conn = new Database();
        $result = $conn->executeQuery('INSERT INTO tasks(title, category, status, users_id) VALUE (?, ?, ?, ?)', $this->attributes);
        if($result) {
            if($result->rowCount() > 0) {
                return true;
            }
        }

        return false;
    }

}