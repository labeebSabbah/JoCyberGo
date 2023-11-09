<?php 

namespace App\Models;

class Model {
    
    public $conn;
    protected $hostname = "localhost";
    protected $username = "admin";
    protected $pass = "jocybergo@3566";
    protected $database = "server";

    public function __construct() {
        $this->conn = new \mysqli($this->hostname, $this->username, $this->pass, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

}