<?php
if (!class_exists('Database')) {
    class Database {
        private $host = "localhost";
        private $user = "root";
        private $pass = "";
        private $dbname = "inventario";
        private $conn;

        public function getConnection() {
            if (!$this->conn) {
                $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
                if ($this->conn->connect_error) {
                    die("Conexión fallida: " . $this->conn->connect_error);
                }
            }
            return $this->conn;
        }
    }
}