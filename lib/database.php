<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $databaseName = "demo";
    private $db;

    public function __construct() {
        $this->db = new mysqli($this->host, $this->username, $this->password, $this->databaseName);

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        } 
    }

    public function getDB() {
        return $this->db;
    }

    public function close() {
        $this->db->close();
    }
}

?>
