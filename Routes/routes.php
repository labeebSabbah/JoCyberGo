<?php 

use App\Routes\Router;
use App\Controllers\UserController;
use App\Controllers\CustomerController;
use App\Controllers\ProductController;
use App\Controllers\OrderController;

$router = new Router();

$router->addRoute('/', UserController::class, 'index');
$router->addRoute('/login', UserController::class,'login');
$router->addRoute('/home', UserController::class,'home');
$router->addRoute('/logout', UserController::class,'logout');
$router->addRoute('/profile', UserController::class,'profile');

$router->addRoute('/customers', CustomerController::class,'index');

$router->addRoute('/products', ProductController::class,'index');

$router->addRoute('/orders', OrderController::class,'index');



$router->dispatch($uri);
