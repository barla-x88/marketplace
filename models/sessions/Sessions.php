<?php

namespace app\models\sessions;

class Sessions {
    public function __construct($username)
    {
        session_start(['cookie_lifetime' => 3600,]);
        $_SESSION['username'] = $username;
    }

    public static function checkPreviousSession() {
        session_start();
        if (!empty($_SESSION) && $_SESSION['username']) {
            return true;
        } else {
            setcookie("PHPSESSID", "", 0);
            session_destroy();
            return false;
        }
    }
}