<?php 

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User;

class UserController extends Controller {
    public function index() {
        $users = [
            new User("Labeeb Sabbah", "labeeb@example.com"),
            new User("Saed Manna","saed@example.com")
        ];

        $this->render('index', "Users", ['users' => $users]);
    }

    public function create() {
        $this->render('create', "Create User");
    }
}