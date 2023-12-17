<?php 

namespace App\Controllers;

use App\Models\ProductionLine;

class ProductionLineController extends Controller {

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
        print_r($queue);
    }

}