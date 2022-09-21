<?php

namespace app\controllers;

use app\Database;
use app\models\sessions\Sessions;
use app\models\user\User;

class UserController {
    static public bool $validationStatus = false;
    // static public Sessions $currentSession;

    static public function login(\app\Router $router) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            self::$validationStatus = $router->dbConnection->validateUser($_POST['username'], $_POST['password']);
        }

        if (self::$validationStatus) {
            //create a new session
            new Sessions($_POST['username']);

            //get user data
            $userData = $router->dbConnection->getUserData($_SESSION['username']);

            //render user profile
            $router->renderView('users/profile', ['userData' => $userData]);
        } else {
            //check if the previous session is present
            $status = Sessions::checkPreviousSession();
            if($status) {
            //get user data
            $userData = $router->dbConnection->getUserData($_SESSION['username']);

            //render user profile
            $router->renderView('users/profile', ['userData' => $userData]);
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

    static public function logout() {
        session_start();
        $_SESSION = array();
        setcookie("PHPSESSID", "", 0);
        session_destroy();
    }

    static public function register(\app\Router $router) {
        $userInfo = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userInfo['firstname'] = $_POST['firstname'];
            $userInfo['username'] = $_POST['username'];
            $userInfo['lastname'] = $_POST['lastname'];
            $userInfo['password'] = $_POST['password'];
            $userInfo['phone'] = $_POST['phone'];
            $userInfo['email'] = $_POST['email'];
            $userInfo['address'] = $_POST['address'];
            $userInfo['state'] = $_POST['state'];
            $userInfo['pin'] = $_POST['pin'];
            $userInfo['type'] = $_POST['type'] ?? 'USER';
        
            $user = new User($userInfo);
            $router->dbConnection->addUser($user);
            // header('Location: /user');

        }
        $router->renderView('users/register');
    }
}