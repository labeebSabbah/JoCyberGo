<?php

namespace App\Models;

class Order extends Model
{
    public $customer_id;
    public $total_price;
    public $created_at;
    public $is_done;
    public $done_at;

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $stmt = $this->conn->prepare("
        SELECT orders.*, customers.name FROM `orders`
        INNER JOIN `customers` ON `orders`.customer_id = `customers`.id
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function create($customer_id, $total_price)
    {
        $this->customer_id = $customer_id;
        $this->total_price = $total_price;
        $stmt = $this->conn->prepare("INSERT INTO orders (customer_id, total_price) VALUE (?, ?)");
        $stmt->bind_param("id", $this->customer_id, $this->total_price);
        $stmt->execute();
        return $this->conn->insert_id;
    }

    public function find($id)
    {
        $Order = new Order;
        $stmt = $Order->conn->prepare("
        SELECT orders.*, customers.name, customers.email,customers.id as customer_id, product_orders.product_id, product_orders.amount, products.name as prod_name, products.price FROM `orders`
        INNER JOIN (`product_orders` INNER JOIN `products` ON `product_orders`.product_id= `products`.id) ON `orders`.id = `product_orders`.order_id
        INNER JOIN `customers` ON `orders`.customer_id = `customers`.id
        WHERE `orders`.id = ?;        
        ");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM product_orders WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt = $this->conn->prepare("DELETE FROM orders WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
