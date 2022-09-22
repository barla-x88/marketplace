<?php

namespace app\models\user;


class User {
    public string $username;
    public string $firstname;
    public string $lastname;
    public string $password;
    public string $phone;
    public string $email;
    public string $address;
    public string $state;
    public string $pin;
    public string $type;

    public function __construct(array $userInfo)
    {
        $this->username = $userInfo['username'];
        $this->firstname = $userInfo['firstname'];
        $this->lastname = $userInfo['lastname'];
        $this->password = password_hash($userInfo['password'], PASSWORD_DEFAULT);
        $this->phone = $userInfo['phone'];
        $this->email = $userInfo['email'];
        $this->address = $userInfo['address'];
        $this->state = $userInfo['state'];
        $this->pin= $userInfo['pin'];
        $this->type = $userInfo['type'];
    }
}