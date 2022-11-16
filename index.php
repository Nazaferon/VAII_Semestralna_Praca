<?php
session_start();
include "DB.php";
include "Item.php";
$db = new DB();
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
            $("#navigation").load("navigacia.html");
        });
    </script>
    <script src="script.js"></script>
</head>
<body>
    <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fa fa-chevron-up"></i></a>
    <div id="navigation"></div>
    <div class="container-fluid bottom-container">
        <nav class="navbar left-side-navbar bg-light">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item title">
                    <li class="nav-item title">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#categories" aria-expanded="false" href="#">Kategórie</a>
                    </li>
                    <li class="collapse" id="categories">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Akustické gitary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Elektroakustické gitary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Basgitary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Elektrické gitary</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item title">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#brands" aria-expanded="false" href="#">Značky</a>
                    </li>
                    <li class="collapse" id="brands">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Gibson</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Fender</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">PRS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Ibanez</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">ESP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Jackson</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid guitars">
            <h3>Elektrické gitary</h3>
            <div class="card-group">
                <div class="card">
                    <header class="card-header">
                        <h6 class="title">Cena:</h6>
                        <div class="card-body" style="padding-bottom: 0px; padding-top: 0px;">
                            <div class="row">
                                <div class="col">
                                    <label>Od</label>
                                    <input type="number" class="form-control" id="inputEmail4" placeholder="0 EUR">
                                </div>
                                <div class="col">
                                    <label>Do</label>
                                    <input type="number" class="form-control" placeholder="10,000 EUR">
                                </div>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="card">
                    <header class="card-header h-100">
                        <div class="card-body" style="padding-bottom: 0px; padding-top: 0px;">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="Check1">
                                <label class="custom-control-label" for="Check1">Skladom</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="Check2">
                                <label class="custom-control-label" for="Check2">Novinka</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="Check3">
                                <label class="custom-control-label" for="Check3">Akcia</label>
                            </div>
                        </div>
                    </header>
                </div>
            </div>
            <div class="card">
                <header class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active sorting-tabs" href="#" role="tab" aria-controls="najpopulárnejšie" aria-selected="true">Najpopulárnejšie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sorting-tabs" href="#" role="tab" aria-controls="najlacnejšie" aria-selected="false">Najlacnejšie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sorting-tabs" href="#" role="tab" aria-controls="najdrahšie" aria-selected="false">Najdrahšie</a>
                        </li>
                    </ul>
                </header>
            </div>
            <div class="row pt-3 px-1">
                <?php
                /** @var Item[] $data */
                foreach ($db->getAllItems() as $item) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pb-3 px-2">
                        <a class="card text-decoration-none h-100" href="popisGitary.php?id=<?php echo $item->id ?>" style="overflow: hidden;">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <?php if ($item->image) { ?>
                                            <img src="data:image/png;base64, <?php echo base64_encode($item->image) ?>" class="card-img-top pb-3" alt="Image"/>
                                        <?php } ?>
                                        <h5><span class="badge bg-primary" style="position: absolute; top: 244px;">Novinka</span></h5>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="card-title"><?php echo $item->brand . " " . $item->model ?></h6>
                                        <p class="mb-2"><?php echo $item->category ?></p>
                                        <h6><strong>€<?php echo $item->price ?></strong></h6>
                                        <div class="d-flex justify-content-between mb-2">
                                            <p class="mb-0">Na sklade: <span class="fw-bold"><?php echo $item->amount ?></span></p>
                                            <div class="ms-auto text-warning">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>

            <button type="button" class="btn button-1 btn-primary rounded-pill mx-auto d-block">
                <div style="font-size: 20px">Načítať ďalšie produkty</div>
            </button>
        </div>
    </div>
</body>
</html>