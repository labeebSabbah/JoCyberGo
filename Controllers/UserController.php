<?php 

namespace App\Controllers;

use App\Models\User;

use App\Models\Customer;
use App\Models\Order;

class UserController extends Controller {
     /**
     * Views all users
     * @return void
     */
    public function index() {
        $this->render('index', "Users");
    }
     /**
     * The home function creates instances of the Customer and Order classes, fetches data (total orders, number of customers, and number of orders),
     * and renders a dashboard view with the fetched data, using the title "Dashboard."
     * @return void
     */
    public function home() {
        $Customer = new Customer;
        $Order = new Order;
        $total = $Order->total()["total_sum"];
        $customers = $Customer->all()->num_rows;
        $orders = $Order->new_all()->num_rows;
        $this->render("home","Dashboard", ["customers" => $customers, "orders" => $orders, "total" => $total]);
    }
    /**
     *  handles user authentication by checking the provided username and password ,
     * If the credentials are valid, it sets up a user session and redirects to the home page. 
     * If not, it also redirects to the home page without setting up a session.
     * @return void
     */
    public function login() {
        $user = new User;
        $stmt = $user->conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
        $stmt->bind_param("s", $_POST['username']);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
        if ($user) {
            if (password_verify($_POST['password'], $user['password'])) {
                session_regenerate_id();
                unset($user["password"]);
                $_SESSION['user'] = $user;
            }
            $_SESSION["error"] = "User Or Password Incorrect";
        }
        $_SESSION["error"] = "User Or Password Incorrect.";
        header("Location: /");
    }
     /**
     * logs out the current user by destroying the session and then redirects them to the home page.
     * @return void
     */
    public function logout() {
        session_destroy();
        header("Location: /");
    }
     /**
     * Render and displaying user profile information.
     * @return void
     */
    public function profile(){
        $this->render('profile',"Profile");
    }
     /**
     * Update the information of a specific User and  It performs necessary checks 
     * and provides feedback messages, redirecting the user back to the profile page.

     * @return void
     */
    public function update() {
        $User = new User;
        $stmt = $User->conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
        $stmt->bind_param("s", $_SESSION['user']['username']);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
        if ($user) {
            if (password_verify($_POST['password'], $user['password'])) {
                if ($_POST["new-password"] === $_POST["confirm-new"]) {
                    $password = password_hash($_POST["new-password"], PASSWORD_DEFAULT);
                    $stmt = $User->conn->prepare("UPDATE users SET password = ? WHERE id = ?");
                    $stmt->bind_param("si", $password, $user["id"]);
                    $stmt->execute();
                } else {
                    $error = "New Password and Confirm Password must match";
                }
            }
            else {
                $error = "Entered Password doesn't match our credentials";
            }
        }
        $_SESSION["message"] = $error ?? "Password Updated Successfully";
        header("Location: /profile");
        exit;
    }
}