<?php

namespace app;
use PDO;
use app\models\users\User;

class Database {
    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=marketplace', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function validateUser($username, $password) {
        $statement = $this->pdo->prepare('SELECT password FROM users WHERE username = :username');
        $statement->bindValue(':username', $username);
        $statement->execute();
        $resultArr = $statement->fetch(PDO::FETCH_ASSOC);
       
        $storedPassword = $resultArr['password'];
        if (password_verify($password, $storedPassword)) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserData($username) {
        $statement = $this->pdo->prepare('SELECT username, phone, email FROM users WHERE username = :username');
        $statement->bindValue(':username', $username);
        $statement->execute();
        $userData = $statement->fetch(PDO::FETCH_ASSOC);
        return $userData;
    }
}