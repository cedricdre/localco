<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark" id="htmlElement">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Localco - <?= $title ?></title>
    <link rel="icon" href="/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="/public/assets/css/dashboard.css" rel="stylesheet">

</head>

<body>
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/controllers/dashboard/home-ctrl.php">
            <img src="/public/assets/img/logo-localco-white.svg" alt="Logo Localco" height="30">
        </a>
        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </li>
        </ul>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">Localco</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/index.php">
                                    <i class="bi bi-box-arrow-right"></i>
                                    Site public
                                </a>
                            </li>
                        </ul>
                        <hr class="my-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/controllers/dashboard/home-ctrl.php">
                                    <i class="bi bi-house"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <i class="bi bi-cart"></i>
                                    Commandes
                                </a>
                                <div class="collapse" id="collapseExample">
                                    <div class="card rounded-0 border-0">
                                        <a class="nav-link d-flex align-items-center gap-2" href="/controllers/dashboard/orders/list-ctrl.php">
                                            <i class="bi bi-cart-fill"></i>
                                            Commandes à préparer
                                        </a>
                                        <a class="nav-link d-flex align-items-center gap-2" href="/controllers/dashboard/orders/list-ready-ctrl.php">
                                            <i class="bi bi-cart-fill"></i>
                                            Commandes à retirer
                                        </a>
                                        <a class="nav-link d-flex align-items-center gap-2" href="/controllers/dashboard/orders/list-delivered-ctrl.php">
                                            <i class="bi bi-cart-fill"></i>
                                            Commandes traitées
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/controllers/dashboard/products/list-ctrl.php">
                                    <i class="bi bi-list-ul"></i>
                                    Produits
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/controllers/dashboard/types/list-ctrl.php">
                                    <i class="bi bi-list-ul"></i>
                                    Types de produits
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/controllers/dashboard/pickups/list-ctrl.php">
                                    <i class="bi bi-shop-window"></i>
                                    Lieux de retrait
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/controllers/dashboard/producers/list-ctrl.php">
                                    <i class="bi bi-people"></i>
                                    Producteurs
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/controllers/dashboard/subscriptions/list-ctrl.php">
                                    <i class="bi bi-calendar-range"></i>
                                    Abonnements
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/controllers/dashboard/reviews/list-ctrl.php">
                                    <i class="bi bi-chat-left-quote"></i>
                                    Avis clients
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/controllers/dashboard/users/list-ctrl.php">
                                    <i class="bi bi-people"></i>
                                    Clients
                                </a>
                            </li>
                        </ul>
                        <hr class="my-3">
                        <ul class="nav flex-column">
                        <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 text-secondary" active>
                                    <i class="bi bi-person"></i>
                                    Compte : <?=$_SESSION['user']->firstname?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/controllers/login/logout-ctrl.php">
                                    <i class="bi bi-door-closed"></i>
                                    Déconnexion
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5 py-md-4">
                <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0 ms-auto">
                        <select class="form-select form-select-sm" id="themeSelector" onchange="changeTheme()">
                            <option value="dark">Dark</option>
                            <option value="light">Light</option>
                        </select>
                    </div>
                </div>