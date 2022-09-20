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
        if ($_SESSION['username']) {
            return true;
        } else {
            session_destroy();
            return false;
        }
    }
}