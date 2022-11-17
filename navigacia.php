<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "DB.php";
include "Auth.php";
$db = new DB();
$auth = new Auth();
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Striped Deep Guitars</title>
    <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<nav class="navbar top-navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
    <div class="container-fluid justify-content-around">
        <a class="navbar-brand" href="index.php">
            <img src="logo/large_logo.png" alt="Logo">
        </a>
        <form class="d-flex description-form">
            <input class="form-control" type="search" placeholder="Zadajte popis gitary">
            <button class="btn btn-primary" type="button">Hľadať</button>
        </form>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link action-logo" href="zoznamPriani.php">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link action-logo" href="nakupnyKosik.php">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </a>
            </li>
            <li class="nav-item">
                <?php if (isset($_SESSION["isLogged"])) {
                    if ($_SESSION["isLogged"]) { ?>
                        <div class="dropdown">
                            <a class="nav-link action-logo" id="dropdownMenu" type="button" data-bs-toggle="dropdown"  aria-expanded="false" href="#">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                 <?php $user=$db->getUser($_SESSION["userId"]); ?>
                                <u><?php echo $user->firstName[0] . "" . $user->secondName[0]; ?></u>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                <li><a class="dropdown-item" href="osobnyProfil.php">Osobný profil</a></li>
                                <li><a class="dropdown-item" href="#">Hodnotenia</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="?logout=1">Odhlásiť</a></li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <a class="nav-link action-logo" href="prihlasenie.php">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Prihlásenie
                        </a>
                    <?php }
                }
                else { ?>
                    <a class="nav-link action-logo" href="prihlasenie.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        Prihlásenie
                    </a>
                <?php } ?>
            </li>
        </ul>
    </div>
</nav>