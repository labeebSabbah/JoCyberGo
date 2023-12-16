<?php 

namespace App\Controllers;

use App\Models\ProductionLine;

class ProductionLineController extends Controller {

    public function index()
    {
        $orders1 = new ProductionLine;
        $orders1 = $orders1->all();
        $this->render('productionLine', "Production Line",['orders1' => $orders1]);
    }

}