<?php

namespace App\Models;

class ProductionLine extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $stmt = $this->conn->prepare(" SELECT orders.*,order_position.id as order_position , product_orders.id as prod_ord_id ,customers.name, product_orders.product_id, product_orders.amount, products.name as prod_name FROM `orders`
        INNER JOIN ((`product_orders` INNER JOIN `order_position` ON `product_orders`.id = `order_position`.product_order_id) INNER JOIN `products` ON `product_orders`.product_id= `products`.id) ON `orders`.id = `product_orders`.order_id
        INNER JOIN `customers` ON `orders`.customer_id = `customers`.id where `orders`.is_done = FALSE ORDER BY order_position ASC;       
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function queue($q)
    {
        $stmt = $this->conn->prepare("DELETE FROM order_position");
        $stmt->execute();
        $stmt = $this->conn->prepare("ALTER TABLE order_position AUTO_INCREMENT = 1");
        $stmt->execute();
        $query = "INSERT INTO order_position (product_order_id) VALUES ";
        $params = "";
        for ( $i = 0; $i < count($q); $i++ ) {
            $query .= "(?)";
            $params .= "i";
            if ($i == count($q) - 1 ) {
                continue;
            }
            $query .= ",";
        }
        $query .= ";";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param($params, ...$q);
        $stmt->execute();
    }

    public function find($RFID) {
        $stmt = $this->conn->prepare("SELECT * FROM production_line WHERE rfid = ?");
        $stmt->bind_param("s", $RFID);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }

    public function i_wanna_die($product_order_id, $station, $value)
    {
        if ($this->find($value)) {
            $stmt = $this->conn->prepare("UPDATE production_line SET station = ? WHERE rfid = ?");
            $stmt->bind_param("is", $station, $value);
            $stmt->execute();
            return;
        }
        $stmt = $this->conn->prepare("insert into production_line (product_order_id, station, rfid) values(?, ?, ?) ");
        $stmt->bind_param("iis", $product_order_id ,$station, $value);
        $stmt->execute();
        $result = $stmt->get_result();
        // return $result;
    }
}