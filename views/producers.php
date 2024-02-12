<!-- Section Entête -->
<section class="bg-success">
    <div class="container py-4 py-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
                <div class="text-center text-light">
                    <h1 class="title-lilita mb-3 display-5">Les Producteurs</h1>
                    <p class="fs-5">Phrase d'accroche</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section Catalogue -->
<section class="py-4 py-lg-5">
    <div class="container">
        <!-- <button class="btn btn-outline-success rounded-5 icon-link icon-link-hover my-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            Afficher les filtres
            <i class="bi bi-sliders mb-2 me-1"></i>
        </button> -->

        <!-- Catalogue produits -->
        <div class="py-4">
            <div class="row g-3" data-aos="fade-up">
                <!-- Card produit -->
                <?php
                foreach($producers as $producer){ ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card bg-success-subtle rounded-3 border-0 h-100">
                        <a href="/controllers/c-sheet-ctrl.php?idproduct=<?=$producer->id_user?>" class="text-decoration-none">
                        <div class="img-hover-zoom rounded-top-3">
                            <?php
                            if ($producer->company_picture != null) { ?>
                                <img src="<?= '/public/uploads/producers/' . $producer->company_picture ?>" class="img-cover-card-product object-fit-cover rounded-top-3" alt="Photo de <?=$product->product_name?>">
                            <?php
                            } else { ?>
                                <img src="/public/assets/img/img-off.jpg" class="img-cover-card-product object-fit-cover rounded-top-3" alt="photo localco">
                            <?php
                            } ?>
                        </div>
                        <div class="card-body  pb-0">
                            <h5 class="fw-bolder mb-1 fs-6"><?=$producer->company_name?></h5>
                            <p class="mb-0 text-truncate"><?=$producer->description?></p>
                        </div>
                        </a>
                        <div class="card-footer border-0 bg-transparent pb-3">
                            <a href="/controllers/producer-sheet-ctrl.php?idproduct=<?=$producer->id_user?>" class="btn btn-sm btn-success">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <?php
                } ?>

            </div>

        </div>

    </div>
</section><!-- FIN section Catalogue -->