<?php 

use App\Routes\Router;
use App\Controllers\UserController;

$router = new Router();

$router->addRoute('/', UserController::class, 'index');
$router->addRoute('/login', UserController::class,'login');
$router->addRoute('/home', UserController::class,'home');
$router->addRoute('/logout', UserController::class,'logout');

$router->dispatch($uri);
