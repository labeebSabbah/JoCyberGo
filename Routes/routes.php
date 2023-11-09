<?php 

use App\Routes\Router;
use App\Controllers\UserController;

$router = new Router();

$router->addRoute('/', UserController::class, 'index');
$router->addRoute("/create", UserController::class, "create");

$router->dispatch($uri);
