<?php 

namespace App\Models;

class User extends Model {
    public $name;
    protected $password;

    public function __construct() {
        parent::__construct();
    }

    public function create($name, $password) {
        $this->name = $name;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $this->name, $this->password);
        $stmt->execute();
    }

    public function all() {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}