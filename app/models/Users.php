<?php
namespace App\Models;

use App\core\Database;
use PDO;
class Users {

     /**
     * @return array
     */
    public static function findAll() {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT * FROM users');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

}