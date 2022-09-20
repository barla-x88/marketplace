<?php

namespace app\controllers;

use app\Database;
use app\models\sessions\Sessions;
use app\models\users\User;

class UserController {
    //user validation status
    static public bool $validationStatus = false;

    static public function login(\app\Router $router) {

        //validate username & password
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            self::$validationStatus = $router->dbConnection->validateUser($_POST['username'], $_POST['password']);
        }

        //if user is validated, store information in session
        if (self::$validationStatus) {
            //create a new session
            new Sessions($_POST['username']);

            //get user data
            $userData = $router->dbConnection->getUserData($_SESSION['username']);
            
            // render user profile using received data
            $router->renderView('users/profile', ['userData' => $userData]);

        } else {

            //check if the previous session is present
            $status = Sessions::checkPreviousSession();

            if($status) {
            //get user data
            $userData = $router->dbConnection->getUserData($_SESSION['username']);
 
            // render user profile
            $router->renderView('users/profile', ['userData' => $userData]);
            } else {

                //redirect to login UI
                header('Location: /user');
            }
        }
    }

    //shows login page
    static public function showUI(\app\Router $router) {
        $router->renderView('users/index');
    }

    //redirects logged to profile
    static public function redirect(\app\Router $router) {
        $isLoggedIn = Sessions::checkPreviousSession();
        if ($isLoggedIn) {
            header('Location: /user/login');
        } else {
            self::showUI($router);
        }
    }

    static public function logout() {
        session_start();
        $_SESSION = array();
        session_destroy();
    }
}