<?php

namespace app;

use app\models\user\User;
use PDO;

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

    public function getUserData(string $username) : array {
        $statement = $this->pdo->prepare('SELECT username, phone, email, firstname, lastname, address, state, pin, type FROM users WHERE username = :username');
        $statement->bindValue(':username', $username);
        $statement->execute();
        $userData = $statement->fetch(PDO::FETCH_ASSOC);
       
        return $userData;
    }

    public function addUser(User $newUser) {

        $statement = $this->pdo->prepare("INSERT INTO users (username, firstname, lastname, password, phone, email, address, state, pin, type) VALUES (:username, :firstname, :lastname, :password, :phone, :email, :address, :state, :pin, :type)");

        $statement->bindValue(':username', $newUser->username);
        $statement->bindValue(':firstname', $newUser->firstname);
        $statement->bindValue(':lastname', $newUser->lastname);
        $statement->bindValue(':password', $newUser->password);
        $statement->bindValue(':phone', $newUser->phone);
        $statement->bindValue(':email', $newUser->email);
        $statement->bindValue(':address', $newUser->address);
        $statement->bindValue(':state', $newUser->state);
        $statement->bindValue(':pin', $newUser->pin);
        $statement->bindValue(':type', $newUser->type);

        // Execute the prepared statement.
        $statement->execute();
    }
}