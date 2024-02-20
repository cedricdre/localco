<!-- Section Entête -->
<section class="bg-success">
    <div class="container py-4 py-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
                <div class="text-center text-light">
                    <h1 class="title-lilita mb-3 display-5">Les produits du moment</h1>
                    <p class="fs-5">Les stars de la saison, soigneusement choisies pour vous !</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section Catalogue -->
<section class="py-4 py-lg-5">
    <div class="container">
        <button class="btn btn-outline-success rounded-5 icon-link icon-link-hover my-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            Afficher les filtres
            <i class="bi bi-sliders mb-2 me-1"></i>
        </button>
        <!-- offcanvas FILTRES -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fs-4 title-lilita" id="offcanvasExampleLabel">
                    <i class="bi bi-sliders me-2"></i>Filtres
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form>
                    <input class="form-control me-2 rounded-5 mb-3" name="search" type="search" placeholder="Rechercher un produit" value="<?= htmlspecialchars($search ?? '') ?>" aria-label="Search">

                    <div class="mb-2">
                        <label for="type" class="form-label">Type de produit</label>
                        <select id="type" name="type" class="form-select rounded-5">
                            <option value="">Sélectionner un type</option>
                            <?php foreach ($types as $type) { ?>
                                <option value="<?= $type->id_type ?>" <?= ($type->id_type == $selectedType) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($type->type_name) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="certification" class="form-label">Certification</label>
                        <select id="certification" name="certification" class="form-select rounded-5">
                            <option value="">Sélectionner une certification</option>
                            <?php foreach (CERTIFICATIONS as $certif) { ?>
                                <option value="<?= $certif ?>" <?= ($certif == $selectedCertif) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($certif) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="producer" class="form-label">Producteurs</label>
                        <select id="producer" name="producer" class="form-select rounded-5">
                            <option value="">Sélectionner un producteur</option>
                            <?php foreach ($producers as $producer) { ?>
                                <option value="<?= $producer->id_user ?>" <?= ($producer->id_user == $selectedProducer) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($producer->company_name) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success rounded-5 icon-link icon-link-hover my-5 me-2">
                        Valider
                        <i class="bi bi-chevron-right mb-2"></i>
                    </button>
                </form>
            </div>
        </div>


        <!-- Catalogue produits -->
        <div class="py-4">
            <div class="row g-3" data-aos="fade-up">
                <!-- Card produit -->
                <?php
                foreach ($products as $product) {
                    $prix_ttc = CalculatePrice::TVA($product);
                ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card rounded-3 h-100 bg-card">
                            <a href="/controllers/product-sheet-ctrl.php?idproduct=<?= $product->id_product ?>" class="text-decoration-none">
                                <div class="img-hover-zoom rounded-3">
                                    <?php
                                    if ($product->picture != null) { ?>
                                        <img src="<?= '/public/uploads/product-sheet/' . $product->picture ?>" class="img-cover-card-product object-fit-cover rounded-3" alt="Photo de <?= $product->product_name ?>">
                                    <?php
                                    } else { ?>
                                        <img src="/public/assets/img/img-off.jpg" class="img-cover-card-product object-fit-cover rounded-3" alt="photo localco">
                                    <?php
                                    } ?>
                                </div>
                                <div class="card-body text-success text-center pb-0">
                                    <h5 class="fw-bolder mb-1 fs-6"><?= $product->product_name ?>
                                        <?php
                                        if ($product->bio_production == 1) { ?>
                                            <span class="badge rounded-pill text-bg-success">BIO</span>
                                        <?php
                                        } ?>
                                    </h5>
                                    <p class="small fw-light mb-0"><?= $product->weight ?> <?= $product->weight_unit ?></p>
                                    <p class="small fw-light"><?= $product->company_name ?></p>
                                    <h6 class="card-title fs-5 fw-bolder mb-0"><?= $prix_ttc ?> <sup>€</sup></h6>
                                </div>
                            </a>
                            <div class="card-footer border-0 bg-transparent pb-3">
                                <div class="row g-2">
                                    <div class="col-md-5">
                                        <select class="form-select rounded-5 border-warning" id="inputSelectQte<?= $product->id_product ?>">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-7">
                                        <button class="btn btn-warning addBasket w-100" type="button" data-productid="<?= $product->id_product ?>">Panier<i class="ms-1 bi bi-bag-fill"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } ?>
                <!-- Pagination -->
                <div id="pagination" class="pt-lg-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php
                            $queryParams = [
                                'search' => $search,
                                'type' => $selectedType,
                                'certification' => $selectedCertif,
                                'producer' => $selectedProducer,
                            ];

                            for ($page = 1; $page <= $nbPages; $page++) {
                                $isActive = ($currentPage == $page) ? 'active' : '';
                            ?>
                                <li class="page-item <?= $isActive ?>">
                                    <a class="page-link" href="?<?= http_build_query(array_merge($queryParams, ['page' => $page])) ?>">
                                        <?= $page ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>


            </div>


            <!-- Modal -->
            <div class="modal fade" id="basketModal" tabindex="-1" aria-labelledby="basketModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success-subtle">
                            <h5 class="modal-title fw-bold" id="basketModalLabel"><i class="bi bi-bag-fill me-2"></i>Panier</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body border-0">
                            <h5>Le produit a été ajouté au panier ! <i class="bi bi-emoji-smile-fill"></i></h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- FIN section Catalogue -->