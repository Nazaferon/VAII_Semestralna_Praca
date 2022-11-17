<?php

include "User.php";

class Auth
{
    public function __construct()
    {
        if (isset($_POST["register-firstname"]) && isset($_POST["register-secondname"]) && isset($_POST["register-email"]) && isset($_POST["register-password"])) {
            $this->register($_POST["register-firstname"], $_POST["register-secondname"], $_POST["register-email"], $_POST["register-password"]);
        }
        if (isset($_POST["login-email"]) && isset($_POST["login-password"])) {
            $this->login($_POST["login-email"], $_POST["login-password"]);
        }
        if (isset($_GET["logout"])) {
            $this->logout();
        }
        if (isset($_GET["delete"])) {
            $this->delete();
        }
        if (isset($_POST["change-firstname"])) {
            $this->changeFirstName($_POST["change-firstname"]);
        }
        if (isset($_POST["change-secondname"])) {
            $this->changeSecondName($_POST["change-secondname"]);
        }
        if (isset($_POST["change-email"])) {
            $this->changeEmail($_POST["change-email"]);
        }
        if (isset($_POST["change-actual-password"]) && isset($_POST["change-new-password"]) && isset($_POST["change-repeat-password"])) {
            $this->changePassword($_POST["change-actual-password"], $_POST["change-new-password"], $_POST["change-repeat-password"]);
        }
    }

    public function login($email, $password)
    {
        $db = new DB();
        foreach ($db->getAllUsers() as $user) {
            if ($user->email == $email && $user->password == $password) {
                $_SESSION["isLogged"] = true;
                $_SESSION["userId"] = $user->id;
                header("location: index.php");
                die();
            }
        }
        $_SESSION["isLogged"] = false;
    }

    public function logout()
    {
        unset($_SESSION["isLogged"]);
        unset($_SESSION["userId"]);
        header("Location: ?");
    }

    public function delete()
    {
        $db = new DB();
        $db->removeUser($_SESSION["userId"]);
        $this->logout();
        header("location: index.php");
        die();
    }

    public function register($firstname, $secondname, $email, $password)
    {
        $db = new DB();
        foreach ($db->getAllUsers() as $user) {
            if ($user->email == $email) {
                $_SESSION["isRegistered"] = false;
                return;
            }
        }
        $user = new User();
        $user->firstName = $firstname;
        $user->secondName = $secondname;
        $user->email = $email;
        $user->password = $password;
        $db->storeUser($user);
        $_SESSION["isRegistered"] = true;
    }

    public function changeFirstName($firstName)
    {
        $db = new DB();
        $user = $db->getUser($_SESSION["userId"]);
        $user->firstName = $firstName;
        $db->storeUser($user);
        $_SESSION["isUpdated"] = true;
    }

    public function changeSecondName($secondName)
    {
        $db = new DB();
        $user = $db->getUser($_SESSION["userId"]);
        $user->secondName = $secondName;
        $db->storeUser($user);
        $_SESSION["isUpdated"] = true;
    }

    public function changeEmail($email)
    {
        $db = new DB();
        $user = $db->getUser($_SESSION["userId"]);
        $user->email = $email;
        $db->storeUser($user);
        $_SESSION["isUpdated"] = true;
    }

    public function changePassword($actualPassword, $newPassword, $repeatPassword)
    {
        $db = new DB();
        $user = $db->getUser($_SESSION["userId"]);
        if ($user->password == $actualPassword && $newPassword == $repeatPassword) {
            $user->password = $newPassword;
            $db->storeUser($user);
            $_SESSION["isUpdated"] = true;
        } else {
            $_SESSION["isUpdated"] = false;
        }
    }
}