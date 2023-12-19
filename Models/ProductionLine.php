<?php

namespace App\Models;

class ProductionLine extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $stmt = $this->conn->prepare("SELECT * FROM all_production_line where status = 'not started' ORDER BY priority ASC, created_at ASC ;");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }



    public function status_running(){
        $stmt = $this->conn->prepare("SELECT all_production_line.*, production_line.station FROM all_production_line INNER JOIN production_line ON prod_ord_id = product_order_id where status = 'running'");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;

    }

    // public function queue($q)
    // {
    //     $stmt = $this->conn->prepare("DELETE FROM order_position");
    //     $stmt->execute();
    //     $stmt = $this->conn->prepare("ALTER TABLE order_position AUTO_INCREMENT = 1");
    //     $stmt->execute();
    //     $query = "INSERT INTO order_position (product_order_id) VALUES ";
    //     $params = "";
    //     for ($i = 0; $i < count($q); $i++) {
    //         $query .= "(?)";
    //         $params .= "i";
    //         if ($i == count($q) - 1) {
    //             continue;
    //         }
    //         $query .= ",";
    //     }
    //     $query .= ";";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bind_param($params, ...$q);
    //     $stmt->execute();
    // }

    public function find($RFID)
    {
        $stmt = $this->conn->prepare("SELECT * FROM production_line WHERE rfid = ?");
        $stmt->bind_param("s", $RFID);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }

    public function i_wanna_die($product_order_id, $station, $value)
    {
        if ($this->find($value)) {
            $stmt = $this->conn->prepare("UPDATE production_line SET station = ? WHERE rfid = ?");
            $stmt->bind_param("is", $station, $value);
            $stmt->execute();
            return;
        }
        $stmt = $this->conn->prepare("insert into production_line (product_order_id, station, rfid) values(?, ?, ?) ");
        $stmt->bind_param("iis", $product_order_id, $station, $value);
        $stmt->execute();
        $result = $stmt->get_result();
        // return $result;
    }

    public function changeStatus($id){
        $stmt = $this->conn->prepare("UPDATE orders set  status ='running' where id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();



    }

    public function check_station($id) {
        $stmt = $this->conn->prepare("SELECT station FROM production_line WHERE product_order_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result["station"];
    }



}