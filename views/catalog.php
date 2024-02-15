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
                <h5 class="offcanvas-title fs-4 title-lilita" id="offcanvasExampleLabel"><i class="bi bi-sliders me-2"></i>Filtres</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form>
                    <input class="form-control me-2 rounded-5 mb-3" name="search" type="search" placeholder="Rechercher un produit" value="<?= $search ?? '' ?>" aria-label="Search">
                    <!-- <a class="btn btn-outline-success rounded-5 mb-2" href="#" role="button"><i class="bi bi-grid-fill me-2"></i>Afficher tous les produits</a> -->
                    <div class="mb-2">
                    <label for="type" class="form-label">Type de produit</label>
                    <select id="type" name="type" class="form-select rounded-5">
                        <option value="">Sélectionner un type</option>
                        <?php
                        foreach ($types as $key => $type) {
                            $isSelected = ($type->id_type == $selectedType) ? 'selected ' : '';
                            echo '<option ' . $isSelected . ' value="' . $type->id_type . '">' . $type->type_name . '</option>';
                        }
                        ?>
                    </select>
                    </div>

                    <div class="mb-2">
                    <label for="certification" class="form-label">Certification</label>
                        <select id="certification" name="certification" class="form-select rounded-5">
                            <option value="">Sélectionner une certification</option>
                            <?php
                            foreach (CERTIFICATIONS as $certif) { ?>
                                <option value="<?= $certif ?>" <?= ($certif == $selectedCertif) ? 'selected' : '' ?>><?= $certif ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                    <label for="producer" class="form-label">Producteurs</label>
                    <select id="producer" name="producer" class="form-select rounded-5">
                        <option value="">Sélectionner un producteur</option>
                        <?php
                        foreach ($producers as $key => $producer) {
                            $isSelected = ($producer->id_user == $selectedProducer) ? 'selected ' : '';
                            echo '<option ' . $isSelected . ' value="' . $producer->id_user . '">' . $producer->company_name . '</option>';
                        }
                        ?>
                    </select>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Afficher seulement les produits BIO (A faire !)
                        </label>
                    </div>  
                    <button type="submit" class="btn btn-success rounded-5 icon-link icon-link-hover my-5 me-2">
                        Valider
                        <i class="bi bi-chevron-right mb-2"></i>
                    </button>   
                </form>
            </div>
        </div><!-- FIN offcanvas FILTRES -->

        <!-- Catalogue produits -->
        <div class="py-4">
            <div class="row g-3" data-aos="fade-up">
                <!-- Card produit -->
                <?php
                foreach($products as $product){ 
                    $product_price = $product->product_price;
                    $product_tva = $product->product_tva;
                    // Calculer la TVA
                    $tva = $product_price * ($product_tva / 100);
                    // Calculer le prix TTC
                    $prix_ttc = $product_price + $tva;
                    $prix_ttc = number_format($prix_ttc, 2, '.', ' ');
                    ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card rounded-3 h-100 bg-card">
                        <a href="/controllers/product-sheet-ctrl.php?idproduct=<?=$product->id_product?>" class="text-decoration-none">
                        <div class="img-hover-zoom rounded-3">
                            <?php
                            if ($product->picture != null) { ?>
                                <img src="<?= '/public/uploads/product-sheet/' . $product->picture ?>" class="img-cover-card-product object-fit-cover rounded-3" alt="Photo de <?=$product->product_name?>">
                            <?php
                            } else { ?>
                                <img src="/public/assets/img/img-off.jpg" class="img-cover-card-product object-fit-cover rounded-3" alt="photo localco">
                            <?php
                            } ?>
                        </div>
                        <div class="card-body text-success text-center pb-0">
                            <h5 class="fw-bolder mb-1 fs-6"><?=$product->product_name?>
                                <?php
                                if ($product->bio_production == 1) { ?>
                                    <span class="badge rounded-pill text-bg-success">BIO</span>
                                <?php
                                } ?>
                            </h5>
                            <p class="small fw-light mb-0"><?=$product->weight?> <?=$product->weight_unit?></p>
                            <p class="small fw-light"><?=$product->company_name?></p>
                            <h6 class="card-title fs-5 fw-bolder mb-0"><?=$prix_ttc?> <sup>€</sup></h6>
                        </div>
                        </a>
                        <div class="card-footer border-0 bg-transparent pb-3">
                            <div class="input-group">
                                <select class="form-select rounded-start-5 border-warning" id="inputSelectQte<?=$product->id_product?>">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                                <button class="btn btn-warning addBasket" type="button" data-productid="<?=$product->id_product?>">Ajouter au panier</button>
                            </div>
                            <!-- <div>
                                <button class="btn w-100 btn-sm btn-warning " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottomPrice" aria-controls="offcanvasBottomPrice">Ajouter au panier</button>
                            </div> -->
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
                            for ($page=1; $page <= $nbPages; $page++) { 
                                $isActive = ($currentPage == $page) ? 'active' : '';
                                ?>
                                <li class="page-item <?=$isActive?>"><a class="page-link" href="?search=<?=$search?>&type=<?=$selectedType?>&certification=<?=$selectedCertif?>&producer=<?=$selectedProducer?>&page=<?=$page?>"><?=$page?></a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>

            </div>

            <!-- offcanvas choix quantité -->
            <!-- <div class="offcanvas offcanvas-bottom" data-bs-scroll="true" tabindex="-1" id="offcanvasBottomPrice" aria-labelledby="offcanvasBottomPriceLabel">
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
            </div> -->
            <!-- FIN offcanvas choix quantité -->
        </div>

    </div>
</section><!-- FIN section Catalogue -->