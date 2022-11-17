<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "DB.php";
include "Item.php";
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
    <?php $item = $db->getItem($_GET["id"]) ?>
    <div class="container-fluid bottom-container">
        <div class="row">
            <div class="col-7">
                <?php if ($item->image) { ?>
                    <img src="data:image/png;base64, <?php echo base64_encode($item->image) ?>" alt="Image" class="d-block m-auto" style="width:50%"/>
                <?php } ?>
            </div>
            <div class="col-5">
                <h2><strong><?php echo $item->brand . " " . $item->model ?></strong></h2>
                <h5><span class="badge bg-primary" >Novinka</span></h5>
                <p class="text-muted" style="font-size: 18px"><?php echo $item->category ?></p>
                <div class="card">
                    <div class="card-body">
                        <h2><strong>€<?php echo $item->price ?></strong></h2>
                        <p class="text-success pt-1" style="font-size: 18px"><i class="fa fa-check" aria-hidden="true"></i><u>Doprava zdarma</u></p>
                        <h4 class="text-success"><strong>Na sklade pre e-shop <?php echo $item->amount ?> ks</strong></h4>
                        <div class="row pb-3 pt-3">
                            <div class="col">
                                <button type="button" class="btn btn-success rounded-pill" style="text-align: center;">
                                    <h5><i class="fa fa-shopping-cart pt-2" aria-hidden="true"></i> Vlož do košíka</h5>
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-danger rounded-pill " style="text-align: center;">
                                    <h5><i class="fa fa-heart pt-2" aria-hidden="true"></i> Pridať do zoznamu prianí</h5>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <header class="card-header">
                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active sorting-tabs" href="#" role="tab" aria-controls="popis" aria-selected="true">Popis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link sorting-tabs" href="#" role="tab" aria-controls="hodnotenie" aria-selected="false">Hodnotenie</a>
                    </li>
                </ul>
            </header>
        </div>
    </div>
</body>
</html>