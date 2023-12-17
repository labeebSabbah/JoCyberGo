<?php

namespace App\Controllers;

use App\Models\Supplier;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItems;

class SuppliersController extends Controller {

    public function index() {
        $Supplier = new Supplier;
        $suppliers = $Supplier->all();
        $this->render("Supplier/index", "Suppliers", ["suppliers" => $suppliers]);
    }

    public function create() {
        $this->render("Supplier/create", "Add a supplier");
    }

    public function store() {
        $Supplier = new Supplier;
        $Supplier->create($_POST["name"], $_POST["email"], $_POST["phone"]);
        header("Location: /suppliers");
    }

    public function supplier_orders() {
        $SO = new PurchaseOrder;
        $orders = $SO->all();
        $this->render("Supplier/orders", "Supplyment Orders", ["orders" => $orders]);
    }

    public function supplier_order_create() {
        $this->render("Suppliers/orderCreate", "Order supplyment");
    }

}