<nav class="navbar navbar-expand-lg header header-hide fixed-top">
    <div class="container py-1">
        <a class="navbar-brand order-lg-1" href="/index.php">
            <img src="/public/assets/img/logo-localco.svg" alt="Logo Localco" height="35">
        </a>
        <div class="d-flex align-items-center order-lg-3">
            <!-- <a class="nav-link link-success fs-3 mx-1 position-relative" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBasket" aria-controls="offcanvasBasket"><i class="bi bi-bag-fill"></i> -->
            <a class="nav-link link-success fs-3 mx-1 position-relative" href="/controllers/baskets/baskets-ctrl.php"><i class="bi bi-bag-fill"></i>
            <?php
            if (isset($_COOKIE['basket'])) { ?>
                <span id="pointBasket" class="position-absolute top-0 start-100 translate-middle-x p-2 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">Article dans le panier</span>
                </span>
                <?php
            } ?>
            </a>
            
            <?php
            if (empty($_SESSION['user'])) { ?>
                <a class="btn btn-outline-success btn-sm ms-2 d-none d-lg-block" href="/controllers/login/sign-in-ctrl.php"><i class="bi bi-person-fill me-1"></i>Connexion</a>
            <?php
            } else { ?>
                <div class="dropdown">
                    <button class="btn btn-outline-success btn-sm ms-2 d-none d-lg-block dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Mon compte">
                        <i class="bi bi-sun-fill me-1"></i><?= $_SESSION['user']->firstname ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/controllers/dashboard-users/home-ctrl.php"><i class="bi bi-person-fill me-1"></i>Mon compte</a></li>
                        <?php
                        if (!empty($_SESSION['user']) && $_SESSION['user']->admin == 1) { ?>
                            <li><a class="dropdown-item" href="/controllers/dashboard/home-ctrl.php"><i class="bi bi-gear-fill me-1"></i>Dashboard</a></li>
                        <?php
                        } ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/controllers/login/logout-ctrl.php"><i class="bi bi-door-closed-fill me-1"></i>Déconnexion</a></li>
                    </ul>
                </div>
            <?php
            } ?>
            <button class="btn btn-outline-primary d-lg-none px-2 py-1 ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuOffcanvas" aria-controls="menuOffcanvas" aria-label="Menu">
            <i class="bi bi-list h5"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse order-lg-2 justify-content-end" id="navbarNav">
            <ul class="navbar-nav text-center">
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/project-ctrl.php">Le Projet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/catalog-ctrl.php">Catalogue</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/subscription-ctrl.php">Abonnement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/pickups-ctrl.php">Lieux de retrait</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/producers/producers-ctrl.php">Les Producteurs</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-end" tabindex="-1" id="menuOffcanvas" aria-labelledby="menuOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title title-lilita h5" id="menuOffcanvasLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul id="offcanvasMenu" class="navbar-nav mb-4">
            <li class="nav-item">
                <a class="nav-link" href="/controllers/project-ctrl.php">Le Projet</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/controllers/catalog-ctrl.php">Catalogue</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/controllers/subscription-ctrl.php">Abonnement</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/controllers/pickups-ctrl.php">Lieux de retrait</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/controllers/producers/producers-ctrl.php">Les Producteurs</a>
            </li>

            <?php
            if (empty($_SESSION['user'])) { ?>
                <li class="nav-item">
                    <a class="nav-link fw-light" href="/controllers/login/sign-in-ctrl.php"><i class="bi bi-person me-2 text-danger"></i>Connexion</a>
                </li>
            <?php
            } else { ?>
                <li class="nav-item">
                    <a class="nav-link fw-light" href="/controllers/dashboard-users/home-ctrl.php"><i class="bi bi-person me-2 text-danger"></i>Mon compte</a>
                </li>
                <?php
                if (!empty($_SESSION['user']) && $_SESSION['user']->admin == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link fw-light" href="/controllers/dashboard-users/home-ctrl.php"><i class="bi bi-gear me-2 text-danger"></i>Dashboard</a>
                    </li>
                <?php
                } ?>
                <li class="nav-item">
                    <a class="nav-link fw-light" href="/controllers/login/logout-ctrl.php"><i class="bi bi-door-closed me-2 text-danger"></i>Déconnexion</a>
                </li>
            <?php
            } ?>
        </ul>

    </div>
</div>