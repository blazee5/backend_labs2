<?php

class User extends UserAbstract {
    public $name;
    public $login;
    public $password;
    public static $count = 0;
    function __construct($name, $login, $password) {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        self::$count++;
    }
    function __destruct() {
        echo "<br>Пользователь $this->login удален<br>";
    }
    function showInfo() {
        echo "Имя: $this->name"."<br>";
        echo "Логин: $this->login"."<br>";
        echo "Пароль: $this->password"."<br><br>";
    }
}