<?php

interface IAuthorizeUser {
    function auth($login, $password);
}