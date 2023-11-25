<?php 

namespace App\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = new Order;
        $orders = $orders->all();
        $this->render('orders', "Orders",['orders' => $orders]);
    }

    
}