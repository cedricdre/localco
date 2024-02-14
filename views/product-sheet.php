<!-- section Fiche produit -->
<section class="py-4 py-lg-6">
    <div class="container">
        <div class="row g-lg-5">
            <div class="col-12 col-lg-5">
                <?php
                if ($product->picture != null) { ?>
                    <img src="<?= '/public/uploads/product-sheet/' . $product->picture ?>" class="img-fluid rounded-3 mb-4" alt="<?=$product->product_name?>">
                <?php
                } else { ?>
                    <img src="/public/assets/img/img-off.jpg" class="img-fluid rounded-3 mb-4" alt="Photo de Localco">
                <?php
                } ?>
            </div>
            <div class="col-12 col-lg-7">
                <div class="d-flex align-items-center">
                    <h1><?=$product->product_name?></h1>
                    <?php
                    if ($product->bio_production === 1) { ?>
                        <h5 class="mb-0"><span class="ms-2 badge rounded-pill text-bg-success">BIO</span></h5>
                    <?php
                    } ?>
                    <?php
                    $product_price = $product->product_price;
                    $product_tva = $product->product_tva;
                    // Calculer la TVA
                    $tva = $product_price * ($product_tva / 100);
                    // Calculer le prix TTC
                    $prix_ttc = $product_price + $tva;
                    $prix_ttc = number_format($prix_ttc, 2, ',', ' ');
                    ?>
                    <h3 class="ms-auto"><?=$prix_ttc?> <sup>€</sup></h3>
                </div>
                
                <p class="fw-light"><?=$product->weight?> <?=$product->weight_unit?></p>

                <div class="row">
                    <div class="col-lg-7 col-xl-8">
                        <div class="d-grid mb-4">
                            <button class="btn btn-warning btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottomPrice" aria-controls="offcanvasBottomPrice">Ajouter au panier</button>
                        </div>
                        <h5>Description</h5>
                        <p><?=$product->description?></p>
                        <h5>Origine</h5>
                        <p>Produit à <span class="fw-bolder"><?=$product->city?></span></p>
                        <?php
                        if ($product->certification) { ?>
                            <h5>Certification</h5>
                            <button class="btn btn-sm btn-outline-success" disabled><?=$product->certification?></button>
                        <?php
                        } ?>
                    </div>
                    <div class="col-lg-5 col-xl-4">
                        <div class="card bg-success-subtle rounded-3 border-0">
                            <div class="row g-0 align-items-center">
                            <div class="col-12 col-md-6 col-lg-12">
                                <?php
                                if ($product->company_picture != null) { ?>
                                    <img src="<?= '/public/uploads/producers/' . $product->company_picture ?>" class="img-fluid rounded-3" alt="<?=$product->company_name?>">
                                <?php
                                } else { ?>
                                    <img src="/public/assets/img/img-off.jpg" class="img-fluid rounded-3" alt="Photo de Localco">
                                <?php
                                } ?>
                                </div>
                                <div class="col-12 col-md-6 col-lg-12">
                                    <div class="card-body p-lg-4">
                                        <h5 class="card-title title-lilita">Le Producteur</h5>
                                        <p class="card-text mb-0"><?=$product->firstname?> <?=$product->lastname?></p>
                                        <p class="card-text"><?=$product->company_name?></p>
                                        <a class="btn btn-sm btn-success icon-link icon-link-hover" href="/controllers/producers/producers-sheet-ctrl.php?id=<?=$product->id_user?>">
                                            En savoir plus
                                            <i class="bi bi-chevron-right mb-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                


            </div>
        </div>

        <!-- A découvrir également -->
        <div class="py-6 mt-lg-3">
            <div class="row g-3">
                <h2 class="text-center title-lilita fs-1 mb-4">À <span class="bg-warning p-1">découvrir</span> également</h2>

                <!-- Card produit -->
                <!-- <div class="col-6 col-md-4 col-lg-3">
                    <div class="card rounded-3 h-100">
                        <img src="/public/assets/img/pomme-off.jpg" class="img-cover-card-product object-fit-cover rounded-3" alt="Photo de Shelley Pauls">
                        <div class="card-body text-success text-center pb-0">
                            <h5 class="fw-bolder mb-1 fs-6"><a href="" class="link-success text-decoration-none">Nom du produit <span class="badge rounded-pill text-bg-success">BIO</span></a></h5>
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
                </div> -->

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
                            <p class="small fw-light opacity-75 mb-0"><?=$product->weight?> <?=$product->weight_unit?></p>
                            <p class="small fw-light opacity-75"><?=$product->company_name?></p>
                            <h6 class="card-title fs-5 fw-bolder mb-0"><?=$prix_ttc?> <sup>€</sup></h6>
                        </div>
                        </a>
                        <div class="card-footer border-0 bg-transparent pb-3">
                            <div class="d-grid">
                                <button class="btn btn-sm btn-warning " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottomPrice" aria-controls="offcanvasBottomPrice">Ajouter au panier</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                } ?>




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
</section><!-- FIN Fiche produit -->