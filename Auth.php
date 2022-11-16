<?php

class Auth
{
    public $isLogged = false;

    public function __construct()
    {
        if (isset($_POST["login"])) {
            $this->login($_POST["login"]);
        }
        if (isset($_GET["odhlas"])) {
            $this->logout();
        }
        if (isset($_SESSION["logged"])) {
            $this->isLogged = true;
        }
    }

    public function login($name)
    {
        if (1) {
            $this->isLogged = true;
            $_SESSION["logged"] = true;
        }
    }

    public function logout()
    {
        $this->isLogged = false;
        unset($_SESSION["logged"]);
    }

    public function register()
    {

    }
}