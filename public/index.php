<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\UserController;
use app\Router;

$router = new Router();

$router->get('/user', [UserController::class, 'redirect']);

//actually vaidate user
$router->post('/user/login', [UserController::class, 'login']);

//just redirect to login form
$router->get('/user/login', [UserController::class, 'login']);

//if the session is present redirect to profile page
$router->get('/user/profile', [UserController::class, 'login']);
$router->get('/user/logout', [UserController::class, 'logout']);

$router->resolve();