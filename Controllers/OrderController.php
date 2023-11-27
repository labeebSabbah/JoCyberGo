<?php 

namespace App\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = new Order;
        $orders = $orders->all();
        $this->render('Order/index', "Orders",['orders' => $orders]);
    }

    public function create()
    {
        $this->render("Order/create", "New Order");
    }

    public function view()
    {
        $this->render("Order/view", "View Order");
    }

    public function complete()
    {
        header("Location: /orders");
    }
    
}