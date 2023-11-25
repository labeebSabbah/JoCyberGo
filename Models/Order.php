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
        return $result->fetch_assoc();
    }
}