<?php 

namespace App\Models;

use App\Config\DB;

class Model {
    
    public $conn;

    public function __construct() {
        $this->conn = new \mysqli(DB::$hostname, DB::$username, DB::$pass, DB::$database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

}