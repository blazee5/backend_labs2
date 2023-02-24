<?php

class SuperUser extends User implements ISuperUser, IAuthorizeUser {
    public $role;
    public static $count = 0;
    function __construct($name, $login, $password, $role) {
        parent::__construct($name, $login, $password);
        $this->role = $role;
        self::$count++;
    }
    function showInfo() {
        echo "Роль: $this->role"."<br>";
        parent::showInfo();
    }
    function getInfo() {
        return [
            "name" => $this->name,
            "login" => $this->login,
            "password" => $this->password
        ];
    }
    function auth($login, $password) {
        if ($login == $this->login && $password == $this->password) {
            return true;
        } else {
            return false;
        }
    }
}