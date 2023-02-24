<?php

spl_autoload_register(function ($class){
    include "classes/" . $class . ".php";
});

$user1 = New User("имя", "логин", "пароль");
$user1->showInfo();
$user2 = New User("имя2", "логин2", "пароль2");
$user2->showInfo();
$user3 = New User("им3", "логин3", "пароль3");
$user3->showInfo();
$superuser = new SuperUser("Супер имя", "Супер логин", "Супер пароль", "Супер пользователь");
$superuser->showInfo();
print_r($superuser->getInfo());
echo $superuser->auth("Супер логин", "Супер пароль") . "<br><br>";
echo "Всего обычных пользователей: " . User::$count . "<br><br>";
echo "Всего супер-пользователей: " . SuperUser::$count . "<br>";

