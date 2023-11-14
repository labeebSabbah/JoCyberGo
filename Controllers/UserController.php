<?php 

namespace App\Controllers;

use App\Models\User;

class UserController extends Controller {
    public function index() {
        $this->render('index', "Users");
    }

    public function home() {
        $this->render("home","Home");
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

        $this->render('profile',"profile");
    }
}