<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["isUpdated"])) {
    unset($_SESSION["isUpdated"]);
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
    <link rel = "icon" href ="logo/small_logo.png" type = "image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fa fa-chevron-up"></i></a>
    <div id="navigation"></div>
    <div class="container-fluid bottom-container">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card">
                    <header class="card-header">
                        <h4 class="title pt-2">Kontaktné údaje:</h4>
                    </header>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3 mt-3">
                                <label>Meno:</label>
                                <input type="text" class="form-control" name="change-firstname" value=<?php echo $db->getUser($_SESSION["userId"])->firstName; ?> >
                            </div>
                            <div class="mb-3 mt-3">
                                <label>Priezvisko:</label>
                                <input type="text" class="form-control" name="change-secondname" value=<?php echo $db->getUser($_SESSION["userId"])->secondName; ?> >
                            </div>
                            <button type="submit" class="btn btn-primary">Upraviť</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <header class="card-header">
                                <h4 class="title pt-2">Zmena e-mailu:</h4>
                            </header>
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="mb-3 mt-3">
                                        <label>Email:</label>
                                        <input type="email" class="form-control" name="change-email" value=<?php echo $db->getUser($_SESSION["userId"])->email; ?> >
                                    </div>
                                    <button type="submit" class="btn btn-primary">Upraviť</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <header class="card-header">
                                <h4 class="title pt-2">Zrušenie konta:</h4>
                            </header>
                            <div class="card-body">
                                <div class="mb-3 mt-3">
                                    <label>Umožňuje vám natrvalo odstrániť svoj účet a informácie.</label>
                                </div>
                                <a type="submit" class="btn btn-danger" href="?delete=1">Vymazať konto</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <header class="card-header">
                        <h4 class="title pt-2">Zmena hesla:</h4>
                    </header>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3 mt-3">
                                <label>Súčasné heslo:</label>
                                <input type="password" class="form-control" name="change-actual-password" placeholder="Zadajte súčasné heslo">
                            </div>
                            <div class="mb-3 mt-3">
                                <label>Nové heslo:</label>
                                <input type="password" class="form-control" name="change-new-password" placeholder="Zadajte nové heslo">
                            </div>
                            <div class="mb-3 mt-3">
                                <label>Potvrdenie hesla:</label>
                                <input type="password" class="form-control" name="change-repeat-password" placeholder="Znova zadajte nové heslo">
                            </div>
                            <button type="submit" class="btn btn-primary">Upraviť</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (isset($_SESSION["isUpdated"])) {
                if ($_SESSION["isUpdated"]) { ?>
                    <h3 class="text-success text-center pt-3">Zmeny boli úspešne vykonané</h3>
                <?php } else { ?>
                    <h3 class="text-danger text-center pt-3">Zadali ste nesprávne údaje!</h3>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</body>
</html>