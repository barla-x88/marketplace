<?php

namespace app\controllers;

use app\Database;
use app\models\sessions\Sessions;

class UserController {
    static public bool $validationStatus = false;
    // static public Sessions $currentSession;

    static public function login(\app\Router $router) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Initiates the new connection
            $database = new Database();
            self::$validationStatus = $database->validateUser($_POST['username'], $_POST['password']);
        }

        if (self::$validationStatus) {
            //create a new session
            new Sessions($_POST['username']);
            //render user profile
            $router->renderView('users/profile');
        } else {
            //check if the previous session is present
            $status = Sessions::checkPreviousSession();
            if($status) {
                $router->renderView('users/profile');
            } else {

                //redirect to login UI
                header('Location: /user');
            }
        }
    }

    static public function showUI(\app\Router $router) {
        $router->renderView('users/index');
    }

    static public function redirect(\app\Router $router) {
        $isLoggedIn = Sessions::checkPreviousSession();
        if ($isLoggedIn) {
            header('Location: /user/login');
        } else {
            self::showUI($router);
        }
    }
}