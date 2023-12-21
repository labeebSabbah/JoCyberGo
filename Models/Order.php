<?php

namespace App\Models;

class Order extends Model
{
    public $customer_id;
    public $total_price;
    public $created_at;
    public $is_done;
    public $done_at;

    public $priority;

    public $employee_id;

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $stmt = $this->conn->prepare(" SELECT *  FROM  all_order ORDER BY id");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function create($customer_id, $total_price, $priority, $employee_id)
    {
        $this->customer_id = $customer_id;
        $this->total_price = $total_price;
        $this->priority = $priority;
        $this->employee_id = $employee_id;
        $stmt = $this->conn->prepare("INSERT INTO orders (customer_id, total_price, priority, employee_id) VALUE (?, ?, ?, ?)");
        $stmt->bind_param("idsi", $this->customer_id, $this->total_price, $this->priority, $this->employee_id);
        $stmt->execute();
        return $this->conn->insert_id;
    }

    public function find($id)
    {
        $Order = new Order;
        $stmt = $Order->conn->prepare(" SELECT * FROM find_order WHERE id = ?; ");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function complete($id) {
        $stmt = $this->conn->prepare("UPDATE orders SET status='completed', is_done = true WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }



    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM product_orders WHERE order_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt = $this->conn->prepare("DELETE FROM orders WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }


    public function total(){

        $stmt = $this->conn->prepare("SELECT SUM(total_price) AS total_sum FROM orders;");
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();

    }


    public function new_all(){
        $stmt = $this->conn->prepare(" SELECT *  FROM  all_order where is_done = false ORDER BY id");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;

    }


    
}
