<?php
class User {
    public $name;
    public $login;
    public $password;
    function __construct($name, $login, $password) {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }
    function __destruct() {
        echo "Пользователь $this->login удален"."<br>";
    }
    function showInfo() {
        echo "Имя: $this->name"."<br>";
        echo "Логин: $this->login"."<br>";
        echo "Пароль: $this->password"."<br><br>";
    }
}

$user1 = New User("имя", "логин", "пароль");
$user1->showInfo();
$user2 = New User("имя2", "логин2", "пароль2");
$user2->showInfo();
$user3 = New User("им3", "логин3", "пароль3");
$user3->showInfo();