<?php 

namespace App\Controllers;

use App\Models\ProductionLine;

class ProductionLineController extends Controller {
     /**
     * Views all orders and the production line
     * @return void
     */
    public function index()
    {
        $PL = new ProductionLine;
        $orders = $PL->all();
        $running = $PL ->status_running();
        $this->render('productionLine', "Production Line",['orders' => $orders,'running'=>$running]);
    }

    // public function setQueue()
    // {
    //     $PL = new ProductionLine;
    //     $queue = $_POST['queue'];
    //     $PL->queue($queue);
    // }


    public function change_status(){
        $id = $_POST["id"];

        $pl = new ProductionLine;
        $pl->changeStatus($id); 
    }

    public function check_station() {
        $id = $_POST["id"];
        $PL = new ProductionLine;
        $station = $PL->check_station($id);
        echo $station;
    }

}