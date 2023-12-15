<?php

use App\Config\Thingworx;
use App\Routes\Router;
use App\Controllers\UserController;
use App\Controllers\CustomerController;
use App\Controllers\ProductController;
use App\Controllers\OrderController;
use App\Controllers\ProductionLineController;
use App\Controllers\ThingworxController;

$router = new Router();

$router->addRoute('/', UserController::class, 'index');
$router->addRoute('/login', UserController::class,'login');
$router->addRoute('/home', UserController::class,'home');
$router->addRoute('/logout', UserController::class,'logout');
$router->addRoute('/profile', UserController::class,'profile');
$router->addRoute('/profile/update', UserController::class, 'update');

$router->addRoute('/customers', CustomerController::class,'index');

$router->addRoute('/products', ProductController::class,'index');
$router->addRoute('/product/create', ProductController::class, 'create');
$router->addRoute('/product/store', ProductController::class, 'store');
$router->addRoute('/product', ProductController::class,'view');
$router->addRoute('/product/update', ProductController::class, 'update');
$router->addRoute('/product/delete', ProductController::class, 'delete');


$router->addRoute('/orders', OrderController::class,'index');
$router->addRoute('/order/create', OrderController::class, "create");
$router->addRoute('/order/store', OrderController::class, 'store');
$router->addRoute('/order/view', OrderController::class, "view");
$router->addRoute('/order/delete', OrderController::class, "delete");

$router->addRoute('/productionline', ProductionLineController::class,'index');

// $router->addRoute("/test", ThingworxController::class, "test");
// $router->addRoute("/test1", ThingworxController::class, "test1");
// $router->addRoute("/fw", ThingworxController::class, "full_white");
// $router->addRoute("/fb", ThingworxController::class, "full_black");
// $router->addRoute("/reset", ThingworxController::class, "reset");


$router->dispatch($uri);
