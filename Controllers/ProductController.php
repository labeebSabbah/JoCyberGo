<?php 

namespace App\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = new Product;
        $products = $products->all();
        $this->render('Product/index', "Products",['products' => $products]);
    }

    public function create()
    {
        $this->render("Product/create", "Add Product");
    }

    public function store()
    {
        $name = $_POST["name"];
        $price = $_POST["price"];

        $Product = new Product;
        $Product->create($name, $price);

        header("Location: /products");
    }

    public function view()
    {
        $id = $_GET["id"];

        $Product = new Product;
        $product = $Product->find($id);
        $this->render("Product/view", "View Product", ["product" => $product]);
    }

    public function update()
    {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];

        $Product = new Product;
        $Product->update($id, $name, $price);

        header("Location: /product/{$id}");
    }

    public function delete()
    {
        $id = $_POST["id"];

        $Product = new Product;
        $Product->delete($id);

        header("Location: /products");
    }
}