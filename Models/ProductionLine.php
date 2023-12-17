<?php 

namespace App\Models;

class ProductionLine extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $stmt = $this->conn->prepare(" SELECT orders.*, customers.name, product_orders.product_id, product_orders.amount, products.name as prod_name FROM `orders`
        INNER JOIN (`product_orders` INNER JOIN `products` ON `product_orders`.product_id= `products`.id) ON `orders`.id = `product_orders`.order_id
        INNER JOIN `customers` ON `orders`.customer_id = `customers`.id;       
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }



    public function i_wanna_die($value){
        $stmt = $this->conn->prepare("insert into production_line values(?) ");
        $stmt->bind_param("s", $value);
        $stmt->execute();
        $result = $stmt->get_result();
        // return $result;
    }
}