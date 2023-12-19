<?php

namespace App\Controllers;

use App\Models\Supplier;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItems;
use App\Models\Product;


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
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        $Supplier = new Supplier;
        $Supplier->create($name, $email,$phone);

        $_SESSION["success"] =  "Supplier Created Successfuly"; 
        header("Location: /suppliers");
    }

    public function supplier_orders() {
        $SO = new PurchaseOrder;
        $orders = $SO->all();
        $this->render("PurchaseOrder/index", "Perchase Orders List", ["orders" => $orders]);
    }

    public function supplier_order_create() {
        
            $Supplier = new Supplier;
            $product = new product;
            $suppliers = $Supplier->all();
            $products = $product->all();


        $this->render("PurchaseOrder/create", "Purchase Order Create", ["suppliers" => $suppliers,"products"=>$products]);
    }


    public function supplier_order_store(){

       $supplier_id= $_POST["supplier"];
       $product_id= $_POST["product"];
       $quantity = $_POST["quantity"];

       if ($quantity <= 0) {
        $_SESSION["error"] = "Quantity must be more than 0.";
        header("Location: /purchaseOrder/create");
        exit;
       }

        
        $purchaseOrder = new PurchaseOrder;
        
        $order_id = $purchaseOrder->create($supplier_id);

        $purchesOrderItems = new PurchaseOrderItems;
        $purchesOrderItems->create($order_id,$product_id,$quantity);


        $product = new product;
        $product ->update_quantity($quantity,$product_id);

        $_SESSION["success"] =  "Order Created Successfuly";
        header("Location: /purchaseOrders");

    }

    public function stock_control() {
        $Product = new Product;
        $products = $Product->all();
        $this->render("/stock-control", "Stock Control", ["products" => $products]);
    }



    public function view(){

        $id = $_POST["id"];

        $supplier = new Supplier;
        $supplier = $supplier->find($id);
        $this->render("Supplier/view", "View Supplier", ["supplier" => $supplier]);


    }


    public function update(){
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        $supplier = new Supplier;
        $supplier->update($name,$email,$phone,$id);

        $_SESSION["success"] =  "Supplier Updated Successfuly";
        header("Location: /suppliers");

    }


    public function delete(){

        $id = $_POST["id"];
        $customer = new Supplier;
        $customer->delete($id);

        $_SESSION["success"] =  "Supplier Deleted Successfuly";
        header("Location: /suppliers");

    }



    public function purchase_order_view(){

        
        $id = $_POST["id"];
        $product_id = $_POST["product_id"];

        
        $purchesOrderItems = new PurchaseOrderItems;
        $purchesOrderItems = $purchesOrderItems->find($id);

        $product = new Product;
        $product = $product->find($product_id);
        
        $this->render("PurchaseOrder/view", "View purchase Order", ["purchesOrderItems" => $purchesOrderItems,"product" => $product]);
    }



    public function purchase_order_store(){
        $id = $_POST["id"];
        $product_id = $_POST["product_id"];

        $stock_quantity = $_POST["stock_quantity"];
        $old_quantity = $_POST["old_quantity"];
        $quantity = $_POST["quantity"];

        if ($quantity <= 0) {
            $_SESSION["error"] = "Quantity must be more than 0.";
            header("Location: /purchaseOrders");
            exit;
           }



        $purchaseOrder = new PurchaseOrderItems;
        $status = $purchaseOrder->update($quantity,$id,$stock_quantity,$old_quantity,$product_id);

        if ($status != "error")
            $_SESSION["success"] =  "Order Updated Successfuly";
        header("Location: /purchaseOrders");



    }

}