<?php 

namespace App\Controllers;

use App\Models\User;

use App\Models\Customer;
use App\Models\Order;

class UserController extends Controller {
    public function index() {
        $this->render('index', "Users");
    }

    public function home() {
        $Customer = new Customer;
        $Order = new Order;
        $total = $Order->total()["total_sum"];
        $customers = $Customer->all()->num_rows;
        $orders = $Order->all()->num_rows;
        $this->render("home","Dashboard", ["customers" => $customers, "orders" => $orders, "total" => $total]);
    }

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
        }
        header("Location: /");
    }

    public function logout() {
        session_destroy();
        header("Location: /");
    }

    public function profile(){
        $this->render('profile',"Profile");
    }

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