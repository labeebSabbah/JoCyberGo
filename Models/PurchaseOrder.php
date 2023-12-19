<?php 

namespace App\Models;

class PurchaseOrder extends Model {

    public function all() {

        $stmt = $this->conn->prepare("SELECT * FROM all_purchaseorders ORDER BY order_id");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
        
    }

    public function create($supplier_id){
        
        $stmt = $this->conn->prepare("INSERT INTO purchase_orders (supplier_id) VALUES (?)");
        $stmt->bind_param("i", $supplier_id);
        $stmt->execute();
        return $this->conn->insert_id;
    }


}