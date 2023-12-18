<nav class="navbar navbar-expand-lg">
    <div class="container py-1">
        <a class="navbar-brand order-lg-1" href="/index.php">
            <img src="/public/assets/img/logo-localco.svg" alt="Logo Localco" height="35">
        </a>
        <div class="d-flex align-items-center order-lg-3">
            <a class="nav-link link-success fs-4 mx-1 position-relative" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-bag-fill"></i>
                <!-- A afficher quand un article dans le panier -->
                <span class="position-absolute top-0 start-100 translate-middle-x p-2 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">Article dans le panier</span>
                </span>
            </a>
            <a class="btn btn-outline-success btn-sm ms-2 d-none d-lg-block" href="/controllers/login/sign-in-ctrl.php"><i class="bi bi-person-fill me-1"></i>Mon compte</a>
            <button class="navbar-toggler border-0 pe-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse order-lg-2 justify-content-end" id="navbarNav">
            <ul class="navbar-nav text-center">
                <li class="nav-item">
                    <a class="nav-link" href="#">Le Projet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/catalog-ctrl.php">Catalogue</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/subscription-ctrl.php">Abonnement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Lieu de retrait</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Les Producteurs</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Le Blog</a>
                </li> -->
            </ul>
            <div class="text-center pb-4 d-lg-none">
                <a class="nav-link link-success text-uppercase" href="/controllers/login/sign-in-ctrl.php"><i class="bi bi-person-circle me-1"></i>Mon compte</a>
            </div>
        </div>
    </div>
</nav>