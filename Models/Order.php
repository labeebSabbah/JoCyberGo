<?php 

namespace App\Models;

class Order extends Model
{
    public $customer_id;
    public $total_price;
    public $created_at;
    public $is_done;
    public $done_at;

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $stmt = $this->conn->prepare("SELECT * FROM orders");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function create($customer_id, $total_price) {
        $this->customer_id = $customer_id;
        $this->total_price = $total_price;
        $stmt = $this->conn->prepare("INSERT INTO products (customer_id, total_price) VALUE (?, ?)");
        $stmt->bind_param("id", $this->customer_id, $this->total_price);
        $stmt->execute();
    }

    public function delete($id) {
        
    }
}