<?php 

namespace App\Models;

class User extends Model {
    public $username;
    protected $password;

    public function __construct() {
        parent::__construct();
    }

    public function create($username, $password) {
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $this->username, $this->password);
        $stmt->execute();
    }

    public function all() {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}