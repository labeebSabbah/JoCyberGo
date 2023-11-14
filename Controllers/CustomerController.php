<?php 

namespace App\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = new Customer;
        $customers = $customers->all();
        $this->render('customers', "Customers",['customers' => $customers]);
    }
    
}