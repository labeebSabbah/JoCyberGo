<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * view all Products
     * @return void
     */
    public function index()
    {
        $products = new Product;
        $products = $products->all();
        $this->render('Product/index', "Products", ['products' => $products]);
    }
    /**
     * Rnder the Create view
     * @return void
     */
    public function create()
    {
        $this->render("Product/create", "Add Product");
    }
    /**
     * Stores the submited information from the create view in the database and check the picture and the type it is
     * @return void
     */
    public function store()
    {
        $name = $_POST["name"];
        $price = $_POST["price"];
        $img = $_FILES["img"];

        if (!isset($img)) {
            die('No file uploaded.');
        }

        if (filesize($img["tmp_name"]) <= 0) {
            die('Uploaded file has no contents.');
        }

        $image_type = exif_imagetype($img["tmp_name"]);
        if (!$image_type) {
            die('Uploaded file is not an image.');
        }

        $image_extension = image_type_to_extension($image_type, true);

        $image_name = "/src/uploads/" . bin2hex(random_bytes(16)) . $image_extension;

        $dir = $_SERVER["DOCUMENT_ROOT"] . $image_name;

        if (move_uploaded_file($img["tmp_name"], $dir)) {

            $Product = new Product;
            $Product->create($name, $price, $image_name);
        }

        $_SESSION["success"] =  "Product Created Successfuly";
        header("Location: /products");
    }
    /**
     * views information about a specific Product 
     * @return void
     */
    public function view()
    {
        $id = $_POST["id"];

        $Product = new Product;
        $product = $Product->find($id);
        $this->render("Product/view", "View Product", ["product" => $product]);
    }
    /**
     * update information of a specific Product, including processing an uploaded image.
     * @return void
     */
    public function update()
    {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $img = $_FILES["img"];
        $old_img = $_POST["old_img"];
        $image_name = null;

        if (filesize($img["tmp_name"]) <= 0) {
            $img = null;
        }

        if ($img != null) {
            $image_type = exif_imagetype($img["tmp_name"]);
            if (!$image_type) {
                die('Uploaded file is not an image.');
            }

            $image_extension = image_type_to_extension($image_type, true);

            $image_name = "/src/uploads/" . bin2hex(random_bytes(16)) . $image_extension;

            $dir = $_SERVER["DOCUMENT_ROOT"] . $image_name;

            move_uploaded_file($img["tmp_name"], $dir);
            
            unlink($_SERVER["DOCUMENT_ROOT"] . $old_img);
        }

        $Product = new Product;
        $Product->update($id, $name, $price, $image_name);

        $_SESSION["success"] =  "Product Updated Successfuly";
        header("Location: /products");
    }
    /**
     * Soft deletes the order 
     * @return void
     */
    public function delete()
    {
        $id = $_POST["id"];

        $Product = new Product;
        $Product->delete($id);

        $_SESSION["success"] =  "Product Deleted Successfuly";
        header("Location: /products");
    }
}
