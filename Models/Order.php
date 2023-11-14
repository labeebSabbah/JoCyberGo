<?php 

namespace App\Models;

use App\Models\Model;

class Order extends Model
{
    public $name;
    public $email;

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $stmt = $this->conn->prepare("SELECT * FROM orders");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}