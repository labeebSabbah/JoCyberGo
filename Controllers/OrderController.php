<?php 

namespace App\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductOrder;

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
        $Order = new Order;
        $ProductOrder = new ProductOrder;
        $order_id = $Order->create($_POST["customer"], $_POST["total"]);
        $temp = explode(",", $_POST['products']);
        $products  = [];
        foreach ($temp as $id) {
            if (array_key_exists($id, $products)) {
                $products[$id] += 1;
                continue;
            }
            $products[$id] = 1;
        }
        print_r($products);
        foreach ($products as $product_id => $amount) {
            $ProductOrder->create($order_id, $product_id, $amount);
        }
        header("Location: /orders");
    }

    public function view()
    {
        $Order = new Order;
        $order = $Order->find($_POST['id']);
        $this->render("Order/view", "View Order", ['order' => $order]);
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