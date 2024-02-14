<!-- Section Entête -->
<section class="bg-success">
    <div class="container py-4 py-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
                <div class="text-center text-light">
                    <h1 class="title-lilita mb-3 display-5"><?=$title?></h1>
                    <p class="fs-5">Découvrez nos producteurs locaux passionnés.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section Producers -->
<section class="py-3 py-md-5 py-lg-6">
    <div class="container">
        <div class="row g-3" data-aos="fade-up">
            <!-- Card producer -->
            <?php
            foreach($producers as $producer){ ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card bg-success-subtle rounded-3 border-0 h-100">
                    <a href="/controllers/c-sheet-ctrl.php?idproduct=<?=$producer->id_user?>" class="text-decoration-none">
                    <div class="img-hover-zoom rounded-top-3">
                        <?php
                        if ($producer->company_picture != null) { ?>
                            <img src="<?= '/public/uploads/producers/' . $producer->company_picture ?>" class="img-cover-card-product object-fit-cover rounded-top-3" alt="<?= 'Photo de ' . $producer->company_name ?>">
                        <?php
                        } else { ?>
                            <img src="/public/assets/img/img-off.jpg" class="img-cover-card-product object-fit-cover rounded-top-3" alt="photo localco">
                        <?php
                        } ?>
                    </div>
                    <div class="card-body pb-0">
                        <h5 class="fw-bolder title-lilita mb-1"><?=$producer->company_name?></h5>
                        <p class="text-truncate mb-2"><?=$producer->description?></p>
                    </div>
                    </a>
                    <div class="card-footer border-0 bg-transparent pb-4">
                        <a class="btn btn-sm btn-success icon-link icon-link-hover" href="/controllers/producer-sheet-ctrl.php?idproduct=<?=$producer->id_user?>">
                            En savoir plus
                            <i class="bi bi-chevron-right mb-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php
            } ?>
        </div>
    </div>
</section><!-- FIN section Catalogue -->