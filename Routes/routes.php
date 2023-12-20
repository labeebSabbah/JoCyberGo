<?php

use App\Config\Thingworx;
use App\Routes\Router;
use App\Controllers\UserController;
use App\Controllers\CustomerController;
use App\Controllers\EmployeeController;
use App\Controllers\ProductController;
use App\Controllers\OrderController;
use App\Controllers\ProductionLineController;
use App\Controllers\ThingworxController;
use App\Controllers\SuppliersController;

$router = new Router();

$router->addRoute('/', UserController::class, 'index');
$router->addRoute('/login', UserController::class,'login');
$router->addRoute('/home', UserController::class,'home');
$router->addRoute('/logout', UserController::class,'logout');
$router->addRoute('/profile', UserController::class,'profile');
$router->addRoute('/profile/update', UserController::class, 'update');


$router->addRoute('/employees', EmployeeController::class, 'index');
$router->addRoute('/employee/create', EmployeeController::class, 'create');
$router->addRoute('/employee/store', EmployeeController::class, 'store');
$router->addRoute('/employee', EmployeeController::class, 'view');
$router->addRoute('/employee/delete', EmployeeController::class, 'delete');
$router->addRoute('/employee/update', EmployeeController::class, 'update');





$router->addRoute('/customers', CustomerController::class,'index');
$router->addRoute('/customers/create', CustomerController::class,'create');
$router->addRoute('/customers/store', CustomerController::class,'store');
$router->addRoute('/customer', CustomerController::class,'view');
$router->addRoute('/customer/delete', CustomerController::class,'delete');
$router->addRoute('/customer/update', CustomerController::class,'update');



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

$router->addRoute('/suppliers', SuppliersController::class,'index');
$router->addRoute('/supplier/create', SuppliersController::class,'create');
$router->addRoute('/supplier/store', SuppliersController::class,'store');
$router->addRoute('/supplier/view', SuppliersController::class,'view');
$router->addRoute('/supplier/delete', SuppliersController::class,'delete');
$router->addRoute('/supplier/update', SuppliersController::class,'update');



$router->addRoute('/purchaseOrders', SuppliersController::class,'supplier_orders');
$router->addRoute('/purchaseOrder/create', SuppliersController::class,'supplier_order_create');
$router->addRoute('/purchaseOrder/store', SuppliersController::class,'supplier_order_store');
$router->addRoute('/purchaseOrder/view', SuppliersController::class,'purchase_order_view');
$router->addRoute('/purchaseOrder/update', SuppliersController::class,'purchase_order_store');




$router->addRoute('/stock-control', SuppliersController::class, 'stock_control');
$router->addRoute("/change_status", ProductionLineController::class, "change_status");
$router->addRoute("/order/complete", OrderController::class, "complete");

$router->addRoute("/test", ThingworxController::class, "test");
$router->addRoute("/test1", ThingworxController::class, "test1");

$router->addRoute("/bbr", ThingworxController::class, "BBR");
$router->addRoute("/bbs", ThingworxController::class, "BBS");
$router->addRoute("/bwr", ThingworxController::class, "BWR");
$router->addRoute("/bws", ThingworxController::class, "BWS");
$router->addRoute("/wws", ThingworxController::class, "WWS");
$router->addRoute("/wwr", ThingworxController::class, "WWR");
$router->addRoute("/wbr", ThingworxController::class, "WBR");
$router->addRoute("/wbs", ThingworxController::class, "WBS");

$router->addRoute("/reset", ThingworxController::class, "reset");

$router->addRoute("/api", ThingworxController::class, "api");
$router->addRoute("/api/check_station", ProductionLineController::class, "check_station");

// $router->addRoute("/api/setQueue", ProductionLineController::class, "setQueue");


$router->dispatch($uri);
