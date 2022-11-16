<?php
include "Auth.php";

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
    <script>
        $(function(){
            $("#navigacia").load("navigacia.html");
        });
    </script>
</head>
<body>
    <div id="navigacia"></div>
    <div class="container-fluid bottom-container">
        <?php if (!$auth->isLogged) { ?>
            <div class="row login-register-row">
                <div class="col-5 border">
                    <h1 class="mt-3">Prihlásiť</h1>
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3 mt-3">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="login-email" placeholder="Zadajte email">
                        </div>
                        <div class="mb-3">
                            <label>Heslo:</label>
                            <input type="password" class="form-control" name="login-password" placeholder="Zadajte heslo">
                        </div>
                        <div class="form-check mb-3">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember">Zapamätať si ma
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary mb-4">Prihlásiť</button>
                    </form>
                </div>
                <div class="col-5 border">
                    <h1 class="mt-3">Registrácia nového účtu v e-shope</h1>
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3 mt-3">
                            <label>Meno:</label>
                            <input type="text" class="form-control" name="login-firstname" placeholder="Zadajte meno">
                        </div>
                        <div class="mb-3 mt-3">
                            <label>Priezvisko:</label>
                            <input type="text" class="form-control" name="login-secondname" placeholder="Zadajte priezvisko">
                        </div>
                        <div class="mb-3 mt-3">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="register-email" placeholder="Zadajte email">
                        </div>
                        <div class="mb-3">
                            <label>Heslo:</label>
                            <input type="password" class="form-control" name="register-password" placeholder="Zadajte heslo">
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Pokračovať</button>
                    </form>
                </div>
            </div>
        <?php }
        else { ?>

        <?php } ?>
    </div>
</body>
</html>