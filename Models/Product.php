<?php 

namespace App\Models;

class Product extends Model
{
    public $name;
    public $price;
    public $is_deleted;

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $stmt = $this->conn->prepare("SELECT * FROM products");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}