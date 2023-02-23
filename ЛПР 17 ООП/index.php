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

class SuperUser extends User {
    public $role;
    function __construct($name, $login, $password, $role)
    {
        parent::__construct($name, $login, $password);
        $this->role = $role;
    }
    function showInfo()
    {
        echo "Роль: $this->role"."<br>";
        parent::showInfo();
    }
}

$user1 = New User("имя", "логин", "пароль");
$user1->showInfo();
$user2 = New User("имя2", "логин2", "пароль2");
$user2->showInfo();
$user3 = New User("им3", "логин3", "пароль3");
$user3->showInfo();
$superuser = new SuperUser("Супер имя", "Супер логин", "Супер пароль", "Супер пользователь");
$superuser->showInfo();