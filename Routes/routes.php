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

// $router->addRoute("/bbr", ThingworxController::class, "BBR");
// $router->addRoute("/bbs", ThingworxController::class, "BBS");
// $router->addRoute("/bwr", ThingworxController::class, "BWR");
// $router->addRoute("/bws", ThingworxController::class, "BWS");
// $router->addRoute("/wws", ThingworxController::class, "WWS");
// $router->addRoute("/wwr", ThingworxController::class, "WWR");
// $router->addRoute("/wbr", ThingworxController::class, "WBR");
// $router->addRoute("/wbs", ThingworxController::class, "WBS");

// $router->addRoute("/reset", ThingworxController::class, "reset");

$router->addRoute("/api", ThingworxController::class, "api");


$router->dispatch($uri);
