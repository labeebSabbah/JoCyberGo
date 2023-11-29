<?php

namespace App\Models;

class Product extends Model
{
    public $name;
    public $price;
    public $img;
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
        $stmt = $this->conn->prepare("INSERT INTO products (name, price, img) VALUE (?, ?, ?)");
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
}
