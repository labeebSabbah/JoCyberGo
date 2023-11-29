<?php 

namespace App\Models;

class Product extends Model
{
    public $name;
    public $price;
    public $is_deleted = false;

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE is_deleted=false");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function create($name, $price) {
        $this->name = $name;
        $this->price = $price;
        $stmt = $this->conn->prepare("INSERT INTO products (name, price) VALUE (?, ?)");
        $stmt->bind_param("sd", $this->name, $this->price);
        $stmt->execute();
    }

    public function find($id) {
        $Product = new Product;
        $stmt = $Product->conn->prepare("SELECT * FROM products WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }

    public function update($id, $name, $price) {
        $Product = new Product;
        $stmt = $Product->conn->prepare("UPDATE products SET name = ?, price = ? WHERE id = ?");
        $stmt->bind_param("sdi", $name, $price, $id);
        $stmt->execute();
    }

    public function delete($id) {
        $Product = new Product;
        $stmt = $Product->conn->prepare("UPDATE products SET is_deleted = TRUE WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}