<?php 

namespace App\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;

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
        $Customer = new Customer;
        $Product = new Product;
        $customers = $Customer->all();
        $products = $Product->all();
        $this->render("Order/create", "New Order", ["customers" => $customers, "products" => $products]);
    }

    public function store() {
        print_r($_POST['products']);
    }

    public function view()
    {
        $this->render("Order/view", "View Order");
    }

    public function complete()
    {
        header("Location: /orders");
    }

    public function delete()
    {
        $id = $_POST["id"];

        $orders = new Order;
        $orders->delete($id);

        header("Location: /orders");
    }
    
}