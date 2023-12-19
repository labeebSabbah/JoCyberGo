<?php

namespace App\Models;

class Product extends Model
{
    public $name;
    public $price;
    public $img;
    // public $quantity;
    public $is_deleted = false;

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE is_deleted=false");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function create($name, $price, $img)
    {
        $this->name = $name;
        $this->price = $price;
        $this->img = $img;
        // $this->quantity = $quantity;
        $stmt = $this->conn->prepare("INSERT INTO products (name, price, img ) VALUE (?, ?, ?)");
        $stmt->bind_param("sds", $this->name, $this->price, $this->img);
        $stmt->execute();
    }

    public function find($id)
    {
        $Product = new Product;
        $stmt = $Product->conn->prepare("SELECT * FROM products WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }


    // public function find_q($id)
    // {
    //     $Order = new Product;
    //     $stmt = $Order->conn->prepare(" SELECT * FROM products WHERE id = ?; ");
    //     $stmt->bind_param("i", $id);
    //     $stmt->execute();
    //     $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    //     return $result;
    // }

    public function update($id, $name, $price, $img = null)
    {
        $Product = new Product;
        if ($img == null) {
            $stmt = $Product->conn->prepare("UPDATE products SET name = ?, price = ? WHERE id = ?");
            $stmt->bind_param("sdi", $name, $price, $id);
        } else {
            $stmt = $Product->conn->prepare("UPDATE products SET name = ?, price = ?, img = ? WHERE id = ?");
            $stmt->bind_param("sdsi", $name, $price, $img, $id);
        }
        $stmt->execute();
    }

    public function delete($id)
    {
        $Product = new Product;
        $stmt = $Product->conn->prepare("UPDATE products SET is_deleted = TRUE WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function update_quantity($quantity, $product_id){

        $stmt = $this->conn->prepare("UPDATE products SET stock_quantity = stock_quantity + ? WHERE id = ?");
        $stmt->bind_param("ii", $quantity, $product_id);
        $stmt->execute();
        $stmt->close();
    }


    // public function quantity_update($products){
    //     foreach($products as $product_id => $amount){

    //         $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = ?");
    //         $stmt->bind_param("i", $product_id);
    //         $stmt->execute();
            
            

    //     }




    // }

    public function quantity_update($products) {
        // Iterate through each product in the order
        foreach ($products as $product_id => $amount) {
            // Retrieve the current stock quantity from the database
            $current_quantity = $this->get_stock_quantity_from_storage($product_id);
    
            // Check if there is sufficient stock for the order
            if ($amount <= $current_quantity) {
                // Update the stock quantity in the storage
                $new_quantity = $current_quantity - $amount;
                $this->update_stock_quantity_in_storage($product_id, $new_quantity);
    
                // Proceed with the order or other actions
                return true;
            } else {
                    return false ;               
            }
        }
    }
    
    private function get_stock_quantity_from_storage($product_id) {
        $Product = new Product;
        $stmt = $Product->conn->prepare("SELECT stock_quantity FROM products WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result["stock_quantity"];
        
    }
    
    private function update_stock_quantity_in_storage($product_id, $new_quantity) {
        $stmt = $this->conn->prepare("UPDATE products SET stock_quantity = ? WHERE id = ?");
        $stmt->bind_param("ii",$new_quantity, $product_id);
        $stmt->execute();
        $stmt->close();
    }
    


}
