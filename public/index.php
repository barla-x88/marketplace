<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\UserController;
use app\controllers\MainController;
use app\Router;

$router = new Router();

// User Pages
$router->get('/user', [UserController::class, 'redirect']);

//actually vaidate user
$router->post('/user/login', [UserController::class, 'login']);

//just redirect to login form
$router->get('/user/login', [UserController::class, 'login']);

//if the session is present redirect to profile page
$router->get('/user/profile', [UserController::class, 'login']);
$router->get('/user/logout', [UserController::class, 'logout']);
$router->post('/user/register', [UserController::class, 'register']);
$router->get('/user/register', [UserController::class, 'register']);
$router->get('/user/addproduct', [UserController::class, 'addProduct']);
$router->post('/user/addproduct', [UserController::class, 'addProduct']);


//Index pages
$router->get('/', [MainController::class, 'index']);
$router->get('/main/marketplace', [MainController::class, 'marketplace']);

$router->resolve();