<!-- section Fiche produit -->
<section class="py-4 py-lg-6">
    <div class="container">
        <div class="row g-lg-5">
            <div class="col-12 col-lg-5">
                <?php
                if ($producer->company_picture != null) { ?>
                    <img src="<?= '/public/uploads/producers/' . $producer->company_picture ?>" class="img-fluid rounded-3 mb-4" alt="<?=$producer->company_name?>">
                <?php
                } else { ?>
                    <img src="/public/assets/img/img-off.jpg" class="img-fluid rounded-3 mb-4" alt="Photo de Localco">
                <?php
                } ?>
            </div>
            <div class="col-12 col-lg-7">
                <h1 class="title-lilita"><?=$producer->company_name?></h1>
                <h5 class="fw-bold mb-4"><?=$producer->firstname?> <?=$producer->lastname?></h5>
                <p><?=$producer->description?></p>
                <p>Lieu de production <span class="fw-bold h5"><i class="bi bi-geo-alt-fill text-danger me-1"></i><?=$producer->city?> (<?=$producer->zip?>)</span></p>
            </div>
        </div>

        <!-- A découvrir également -->
        <div class="py-5">
            <div class="row justify-content-center g-3">
                <h2 class="text-center title-lilita fs-1 mb-4">Ses <span class="bg-warning p-1">produits</span></h2>

                <!-- Card produit -->
                <?php
                foreach($products as $product){ ?>
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
                        <div class="card-body text-success text-center">
                            <h5 class="fw-bolder mb-3"><?=$product->product_name?>
                                <?php
                                if ($product->bio_production == 1) { ?>
                                    <span class="badge rounded-pill text-bg-success">BIO</span>
                                <?php
                                } ?>
                            </h5>
                            <div>
                                <button class="btn w-100 btn-sm btn-warning " type="button">Voir la fiche produit</button>
                            </div>
                        </div>

                        </a>



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