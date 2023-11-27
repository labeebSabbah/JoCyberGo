<?php 

namespace App\Models;

class Customer extends Model
{
    public $name;
    public $email;

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $stmt = $this->conn->prepare("SELECT * FROM customers");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function create($name, $email) {
        $this->name = $name;
        $this->email = $email;
        $stmt = $this->conn->prepare("INSERT INTO products (name, email) VALUE (?, ?)");
        $stmt->bind_param("ss", $this->name, $this->email);
        $stmt->execute();
    }
}