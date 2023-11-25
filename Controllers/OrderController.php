<?php 

namespace App\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = new Order;
        $orders = $orders->all();
        $this->render('ordersList', "Orders",['orders' => $orders]);
    }

    public function create()
    {
        $this->render("orderCreate", "New Order");
    }
    
}