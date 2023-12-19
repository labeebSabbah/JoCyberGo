<?php 

namespace App\Models;

class PurchaseOrderItems extends Model {




    public function find($id)
    {
        $purchaseorder = new PurchaseOrderItems;
        $stmt = $purchaseorder->conn->prepare("SELECT * FROM all_purchaseorders WHERE order_id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }


    public function create($order_id, $product_id, $quantity){

        $stmt = $this->conn->prepare("INSERT INTO purchase_order_items (purchase_order_id, product_id, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $order_id, $product_id, $quantity);
        $stmt->execute();
        $stmt->close();
    }



    public function update($quantity,$id,$stock_quantity,$old_quantity,$product_id){

        
        $new = $stock_quantity + ($quantity - $old_quantity);

        if($new<0){

            $_SESSION["error"] = "Stock Quantity Error ";
            return "error";

        }

        $stmt = $this->conn->prepare("UPDATE  purchase_order_items SET quantity = ?  WHERE purchase_order_id = ?");
        $stmt->bind_param("ii", $quantity,$id);
        $stmt->execute();
        $stmt->close();



        $stmt = $this->conn->prepare("UPDATE  products SET stock_quantity = ?  WHERE id = ?");
        $stmt->bind_param("ii", $new,$product_id);
        $stmt->execute();
        $stmt->close();


        return $id;




    }
    
}