<?php 

namespace App\Models;

class Customer extends Model
{
    public $id;
    public $name;
    public $email;

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $stmt = $this->conn->prepare("SELECT * FROM customers WHERE is_deleted = false ");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function create($name, $email) {
        $this->name = $name;
        $this->email = $email;
        $stmt = $this->conn->prepare("INSERT INTO customers (name, email) VALUE (?, ?)");
        $stmt->bind_param("ss", $this->name, $this->email);
        $stmt->execute();
    }



    public function find($id)
    {
        $customer = new Customer;
        $stmt = $customer->conn->prepare("SELECT * FROM customers WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }



    public function update($id,$name,$email){
        $customer = new Customer;
        $stmt = $customer->conn->prepare("UPDATE customers SET name = ?, email = ? WHERE id = ? ");
        $stmt->bind_param("ssi", $name,$email,$id);
        $stmt->execute();
        $stmt->close();


    }


    public function delete($id){

        $customer = new Customer;
        $stmt = $customer->conn->prepare("UPDATE customers SET is_deleted = TRUE WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

    }
}