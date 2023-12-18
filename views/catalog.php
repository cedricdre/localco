<!-- Section Entête -->
<section class="bg-success">
    <div class="container py-4 py-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
                <div class="text-center text-light">
                    <h1 class="title-lilita mb-3">Les produits du moment</h1>
                    <p class="fs-5">Les stars de la saison, soigneusement choisies pour vous !</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section Catalogue -->
<section class="py-4 py-lg-5">
    <div class="container">
        <button class="btn btn-sm btn-outline-success rounded-5 icon-link icon-link-hover my-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            Afficher les filtres
            <i class="bi bi-sliders mb-2 me-1"></i>
        </button>
        <!-- offcanvas FILTRES -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fs-4 title-lilita" id="offcanvasExampleLabel"><i class="bi bi-sliders me-2"></i>Filtres</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <a class="btn btn-outline-success rounded-5 mb-2" href="#" role="button"><i class="bi bi-grid-fill me-2"></i>Afficher tous les produits</a>
                <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <button class="btn btn-outline-success btn-toggle d-inline-flex align-items-center rounded-5 collapsed" data-bs-toggle="collapse" data-bs-target="#fruit-collapse" aria-expanded="true">
                            <i class="bi bi-caret-down-fill me-1"></i>Fruits
                        </button>
                        <div class="collapse show" id="fruit-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal p-2 small">
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Fruit 1</a></li>
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Fruit 2</a></li>
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Fruit 3</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-outline-success btn-toggle d-inline-flex align-items-center rounded-5 collapsed" data-bs-toggle="collapse" data-bs-target="#legume-collapse" aria-expanded="false">
                            <i class="bi bi-caret-down-fill me-1"></i>Légumes
                        </button>
                        <div class="collapse" id="legume-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal p-2 small">
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Légumes 1</a></li>
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Légumes 2</a></li>
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Légumes 3</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-outline-success btn-toggle d-inline-flex align-items-center rounded-5 collapsed" data-bs-toggle="collapse" data-bs-target="#exemple-collapse" aria-expanded="false">
                            <i class="bi bi-caret-down-fill me-1"></i>Exemple 3
                        </button>
                        <div class="collapse" id="exemple-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal p-2 small">
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Exemple 1</a></li>
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Exemple 2</a></li>
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Exemple 3</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="border-top my-3"></li>
                    <!-- Liste producteurs -->
                    <li class="mb-1">
                        <button class="btn btn-outline-success btn-toggle d-inline-flex align-items-center rounded-5 collapsed" data-bs-toggle="collapse" data-bs-target="#producteur-collapse" aria-expanded="false">
                            <i class="bi bi-caret-down-fill me-1"></i>Producteurs
                        </button>
                        <div class="collapse" id="producteur-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal p-2 small">
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Producteur 1</a></li>
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Producteur 2</a></li>
                                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Producteur 3</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- FIN offcanvas FILTRES -->

        <!-- Catalogue produits -->
        <div class="py-4">
            <div class="row g-3">
                <!-- Card produit -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card rounded-3 h-100">
                        <a href="/controllers/product-sheet-ctrl.php" class="text-decoration-none">
                        <div class="img-hover-zoom rounded-3">
                            <img src="/public/assets/img/pomme-off.jpg" class="img-cover-card-product object-fit-cover rounded-3" alt="This zooms-in really well and smooth">
                        </div>
                        <div class="card-body text-success text-center pb-0">
                            <h5 class="fw-bolder mb-1 fs-6">Nom du produit <span class="badge rounded-pill text-bg-success">BIO</span></h5>
                            <p class="small fw-light opacity-75 mb-0">500g</p>
                            <p class="small fw-light opacity-75">Nom du producteur</p>
                            <h6 class="card-title fs-5 fw-bolder mb-0">0,00 <sup>€</sup></h6>
                        </div>
                        </a>
                        <div class="card-footer border-0 bg-transparent pb-3">
                            <div class="d-grid">
                                <button class="btn btn-sm btn-warning " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottomPrice" aria-controls="offcanvasBottomPrice">Ajouter au panier</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card rounded-3 h-100">
                        <a href="/controllers/product-sheet-ctrl.php" class="text-decoration-none">
                        <div class="img-hover-zoom rounded-3">
                            <img src="/public/assets/img/salade-off.jpg" class="img-cover-card-product object-fit-cover rounded-3" alt="This zooms-in really well and smooth">
                        </div>
                        <div class="card-body text-success text-center pb-0">
                            <h5 class="fw-bolder mb-1 fs-6">Nom du produit <span class="badge rounded-pill text-bg-success">BIO</span></h5>
                            <p class="small fw-light opacity-75 mb-0">500g</p>
                            <p class="small fw-light opacity-75">Nom du producteur</p>
                            <h6 class="card-title fs-5 fw-bolder mb-0">0,00 <sup>€</sup></h6>
                        </div>
                        </a>
                        <div class="card-footer border-0 bg-transparent pb-3">
                            <div class="d-grid">
                                <button class="btn btn-sm btn-warning " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottomPrice" aria-controls="offcanvasBottomPrice">Ajouter au panier</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card rounded-3 h-100">
                        <img src="/public/assets/img/pomme-off.jpg" class="img-cover-card-product object-fit-cover rounded-3" alt="Photo de Shelley Pauls">
                        <div class="card-body text-success text-center pb-0">
                            <h5 class="fw-bolder mb-1 fs-6"><a href="" class="link-success text-decoration-none">Nom du produit sur 2 lignes <span class="badge rounded-pill text-bg-success">BIO</span></a></h5>
                            <p class="small fw-light opacity-75 mb-0">500g</p>
                            <p class="small fw-light opacity-75">Nom du producteur</p>
                            <h6 class="card-title fs-5 fw-bolder mb-0">0,00 <sup>€</sup></h6>
                        </div>
                        <div class="card-footer border-0 bg-transparent pb-3">
                            <div class="d-grid">
                                <button class="btn btn-sm btn-warning rounded-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottomPrice" aria-controls="offcanvasBottomPrice">Ajouter au panier</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card rounded-3 h-100">
                        <img src="/public/assets/img/salade-off.jpg" class="img-cover-card-product object-fit-cover rounded-3" alt="Photo de Shelley Pauls">
                        <div class="card-body text-success text-center pb-0">
                            <h5 class="fw-bolder mb-1 fs-6"><a href="" class="link-success text-decoration-none">Nom du produit sur 2 lignes <span class="badge rounded-pill text-bg-success">BIO</span></a></h5>
                            <p class="small fw-light opacity-75 mb-0">500g</p>
                            <p class="small fw-light opacity-75">Nom du producteur</p>
                            <h6 class="card-title fs-5 fw-bolder mb-0">0,00 <sup>€</sup></h6>
                        </div>
                        <div class="card-footer border-0 bg-transparent pb-3">
                            <div class="d-grid">
                                <button class="btn btn-sm btn-warning rounded-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottomPrice" aria-controls="offcanvasBottomPrice">Ajouter au panier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- offcanvas choix quantité -->
            <div class="offcanvas offcanvas-bottom" data-bs-scroll="true" tabindex="-1" id="offcanvasBottomPrice" aria-labelledby="offcanvasBottomPriceLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title fw-bolder" id="offcanvasBottomLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body text-success">
                    <h5 class="text-center mb-4 fw-bolder">Nom du produit</h5>
                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="col-auto">
                            <label for="inputQte" class="col-form-label">Choisir une quantité</label>
                        </div>
                        <div class="col-auto">
                            <input type="number" value="1" min="1" max="10" id="inputQte" class="form-control border-success" aria-describedby="passwordHelpInline">
                        </div>
                        <div class="col-auto">
                            <h5 class="m-0 fw-bolder">0,00 <sup>€</sup></h5>
                        </div>
                        <div class="col-12 col-lg-auto">
                            <div class="d-grid">
                                <button class="btn btn-warning rounded-5" type="button">Ajouter au panier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- FIN offcanvas choix quantité -->
        </div>

    </div>
</section><!-- FIN section Catalogue -->