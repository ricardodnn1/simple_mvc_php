<?php

namespace App\Core;


use PDO;
class Database extends PDO {

    private $DB_NAME = "tasks_db";
    private $DB_USER = "root";
    private $DB_PWD = "";
    private $DB_HOST = "127.0.0.1";
    private $DB_PORT = "3306";

    private $conn;

    public function __construct() {
        $this->conn = new PDO("mysql:dbname=$this->DB_NAME;host=$this->DB_HOST;port=$this->DB_PORT;user=$this->DB_USER;password=$this->DB_PWD");
    }
    
    /**
     * @param PDOStatement $stmt
     * @param string $key
     * @param string $value
     */
    private function setParameters($stmt, $key, $value) {
        $stmt->bindParam($key, $value);
    }

    /**
     * @param string $query
     * @param string $array
     */
    private function buildQuery($stmt, $parameters) {
        foreach( $parameters as $key => $value) {
            $this->setParameters($stmt, $key, $value);
        }
    }

    /**
     * @param string $query
     * @param array
     * 
     * @return PDOStatement
     */
    public function executeQuery(string $query, array $parameters = []) {
        $stmt = $this->conn->prepare($query);
        $this->buildQuery($stmt, $parameters);
        $stmt->execute();
        return $stmt;
    }
}   