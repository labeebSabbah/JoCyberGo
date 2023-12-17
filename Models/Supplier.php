<?php 

namespace App\Models;

class Supplier extends Model
{
    public $supplier_name;
    public $email;
    public $phone;

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $stmt = $this->conn->prepare("SELECT * FROM suppliers");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }



    public function create( $supplier_name, $email, $phone) {
        $this->supplier_name = $supplier_name;
        $this->email = $email;
        $this->phone = $phone;

        $stmt = $this->conn->prepare("INSERT INTO suppliers ( supplier_name, email,phone) VALUE (?, ?, ?)");
        $stmt->bind_param("sss", $this->supplier_name, $this->email, $this->phone);
        $stmt->execute();
        echo $this->conn->error;
    }



    

}