<?php 

namespace App\Models;

class Model {
    
    protected $conn;
    protected $hostname = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $database = "uni";

    public function __construct() {
        $this->conn = new \mysqli($this->hostname, $this->username, $this->password, $this->database);
    }

}