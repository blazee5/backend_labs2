<?php
class User {
    public $name;
    public $login;
    public $password;
    function showInfo() {
        echo "Имя: $this->name"."<br>";
        echo "Логин: $this->login"."<br>";
        echo "Пароль: $this->password"."<br><br>";
    }
}

$user1 = New User();
$user1->name = "имя";
$user1->login = "логин";
$user1->password = "пароль";
$user1->showInfo();
$user2 = New User();
$user2->name = "имя2";
$user2->login = "логин2";
$user2->password = "пароль2";
$user2->showInfo();
$user3 = New User();
$user3->name = "имя3";
$user3->login = "логин3";
$user3->password = "пароль3";
$user3->showInfo();