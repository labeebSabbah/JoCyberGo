<?php 

namespace App\Models;

class ProductOrder extends Model
{
    public $order_id;
    public $product_id;
    public $amount;

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $stmt = $this->conn->prepare("SELECT * FROM product_orders");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function create($order_id, $product_id, $amount) {
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->amount = $amount;
        $stmt = $this->conn->prepare("INSERT INTO product_orders (order_id, product_id, amount) VALUE (?, ?, ?)");
        $stmt->bind_param("ddd", $this->order_id, $this->product_id, $this->amount);
        $stmt->execute();
        echo $this->conn->error;
    }

    public function delete($id) {
        
    }
}