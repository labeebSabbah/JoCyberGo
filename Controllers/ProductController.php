<?php 

namespace App\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = new Product;
        $products = $products->all();
        $this->render('products', "Products",['products' => $products]);
    }
}