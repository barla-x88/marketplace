<?php

namespace app\models\users;


class User {
    public string $username;
    public string $phone;
    public string $email;

    public function __construct(string $username, string $phone, string $email)
    {
        $this->username = $username;
        $this->phone = $phone;
        $this->email = $email;
    }

}