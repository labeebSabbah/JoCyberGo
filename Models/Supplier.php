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
        $stmt = $this->conn->prepare("SELECT * FROM suppliers WHERE is_deleted = false");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }



    public function create( $name, $email, $phone) {
        $this->supplier_name = $name;
        $this->email = $email;
        $this->phone = $phone;

        $stmt = $this->conn->prepare("INSERT INTO suppliers ( name, email,phone) VALUE (?, ?, ?)");
        $stmt->bind_param("sss", $this->supplier_name, $this->email, $this->phone);
        $stmt->execute();
        // echo $this->conn->error;
    }

    public function find($id)
    {
        $supplier = new Supplier;
        $stmt = $supplier->conn->prepare("SELECT * FROM suppliers WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }




    public function update($name,$email,$phone,$id){
        $supplier = new Supplier;
        $stmt = $supplier->conn->prepare("UPDATE suppliers SET name = ?, email = ?, phone = ? WHERE id = ? ");
        $stmt->bind_param("sssi", $name,$email,$phone,$id);
        $stmt->execute();
        $stmt->close();


    }

    public function delete($id){

        $customer = new Supplier;
        $stmt = $customer->conn->prepare("UPDATE suppliers SET is_deleted = TRUE WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

    }

    

}