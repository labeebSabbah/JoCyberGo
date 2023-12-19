<?php 
namespace App\Controllers;

use App\Models\Customer;
use App\Models\Employee;

class EmployeeController extends Controller
{


    public function index()
    {
        $employees = new Employee;
        $employees = $employees->all();
        $this->render('/Employee/index', "Employees",['employees' => $employees]);
    }

    /**
     * Render the Create view
     * @return void
     */
    public function create(){    
        $this->render("Employee/create", "New Employee", );
    }

    /**
     * Stores the submited information from the Create view in the database
     * @return void
     */
    public function store(){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $employee = new Employee;
        $employee->create($name,$email);

        $_SESSION["success"] =  "Employee Created Successfuly";
        header("Location: /employees");
    }

    /**
     * Views information about a specific employee
     * @return void
     */
    public function view(){

        $id = $_POST["id"];

        $employee = new Employee;
        $employee = $employee->find($id);
        $this->render("Employee/view", "View Employee", ["employee" => $employee]);


    }

    /**
     * Update the information of a specific employee
     * @return void
     */
    public function update(){
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];

        $employee = new Employee;
        $employee->update($id,$name,$email);

        $_SESSION["success"] =  "Employee Updated Successfuly";

        header("Location: /employees");

    }

    /**
     * Soft deletes the employee
     * @return void
     */
    public function delete(){

        $id = $_POST["id"];
        $employee = new Employee;
        $employee->delete($id);

        $_SESSION["success"] =  "Employee Deleted Successfuly";

        header("Location: /employees");

    }







}