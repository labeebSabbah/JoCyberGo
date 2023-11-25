<?php 

namespace App\Controllers;

use App\Models\ProductionLine;

class ProductionLineController extends Controller {

    public function index()
    {
        $products = new ProductionLine;
        // $products = $products->all();
        $products = NULL;
        $this->render('productionLine', "Production Line",['products' => $products]);
    }

}