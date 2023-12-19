<?php 

namespace App\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Views all customers 
     * @return void
     */
    public function index()
    {
        $customers = new Customer;
        $customers = $customers->all();
        $this->render('/Customer/index', "Customers",['customers' => $customers]);
    }

    /**
     * Render the Create view
     * @return void
     */
    public function create(){    
        $this->render("Customer/create", "New Customer", );
    }

    /**
     * Stores the submited information from the Create view in the database
     * @return void
     */
    public function store(){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $customer = new Customer;
        $customer->create($name,$email);

        $_SESSION["success"] =  "Customer Created Successfuly";
        header("Location: /customers");
    }

    /**
     * Views information about a specific customer
     * @return void
     */
    public function view(){

        $id = $_POST["id"];

        $customer = new Customer;
        $customer = $customer->find($id);
        $this->render("Customer/view", "View Product", ["customer" => $customer]);


    }

    /**
     * Update the information of a specific Customer
     * @return void
     */
    public function update(){
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];

        $customer = new Customer;
        $customer->update($id,$name,$email);

        $_SESSION["success"] =  "Customer Updated Successfuly";

        header("Location: /customers");

    }

    /**
     * Soft deletes the Customer
     * @return void
     */
    public function delete(){

        $id = $_POST["id"];
        $customer = new Customer;
        $customer->delete($id);

        $_SESSION["success"] =  "Customer Deleted Successfuly";

        header("Location: /customers");

    }

    
    
}