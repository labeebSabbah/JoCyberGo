<?php 

namespace App\Models;

class Model {
    
    public $conn;
    protected $hostname = "localhost";
    protected $username = "root";
    protected $password = null;
    protected $database = "uni";

    public function __construct() {
        $this->conn = new \mysqli($this->hostname, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

}