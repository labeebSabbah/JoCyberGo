<?php 

namespace App\Models;

class Employee extends Model
{
    public $id;
    public $name;
    public $email;

    public $id_deleted;

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $stmt = $this->conn->prepare("SELECT * FROM employees WHERE is_deleted = false ");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function create($name, $email) {
        $this->name = $name;
        $this->email = $email;
        $stmt = $this->conn->prepare("INSERT INTO employees (name, email) VALUE (?, ?)");
        $stmt->bind_param("ss", $this->name, $this->email);
        $stmt->execute();
        $stmt->close();

    }



    public function find($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM employees WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }



    public function update($id,$name,$email){
        $stmt = $this->conn->prepare("UPDATE employees SET name = ?, email = ? WHERE id = ? ");
        $stmt->bind_param("ssi", $name,$email,$id);
        $stmt->execute();
        $stmt->close();


    }


    public function delete($id){
        $stmt = $this->conn->prepare("UPDATE employees SET is_deleted = TRUE WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();


    }
}