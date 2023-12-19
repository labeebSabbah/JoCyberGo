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
        $this->render('productionLine', "Production Line",['orders' => $orders]);
    }

    public function setQueue()
    {
        $PL = new ProductionLine;
        $queue = $_POST['queue'];
        $PL->queue($queue);
    }

}