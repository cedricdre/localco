<!-- Section Entête -->
<section class="bg-success">
    <div class="container py-4 py-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
                <div class="text-center text-light">
                    <h1 class="title-lilita mb-3 display-5"><?=$title?></h1>
                    <p class="fs-5">Découvrez nos lieux, vous offrant un accès facile à la fraîcheur locale.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section Pickups -->
<section class="py-3 py-md-5 py-lg-6">
    <div class="container">
        <div class="row justify-content-center g-3 g-lg-4" data-aos="fade-up">
            <!-- Card pickup -->
            <?php
            foreach($pickups as $pickup){ ?>
            <div class="col-md-6 col-lg-5 col-xl-3">
                <div class="card bg-success-subtle rounded-3 border-0 p-lg-4 h-100">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <h3 class="card-title title-lilita mb-3"><i class="bi bi-shop-window text-danger h3 me-2"></i><?=$pickup->pickup_name?></h3>
                        <p class="mb-0"><i class="bi bi-geo-alt text-danger me-2"></i>Adresse :</p>
                        <p class="fw-bold">
                            <?=$pickup->address?><br>
                            <?=$pickup->zip?> <?=$pickup->city?>
                        </p>
                        <p class="mb-0"><i class="bi bi-clock text-danger me-2"></i>Horaires d'ouverture :</p>
                        <p class="fw-bold"><?=$pickup->opening_hours?></p>
                        <?php
                        if (!empty($_SESSION['user'])) { ?>
                        <a class="btn btn-sm btn-success icon-link icon-link-hover" href="/controllers/dashboard-users/users/update-users-ctrl.php">
                            Choisir ce lieu de retrait
                            <i class="bi bi-chevron-right mb-2"></i>
                        </a>
                        <?php
                        } else { ?>
                        <a class="btn btn-sm btn-success icon-link icon-link-hover" href="/controllers/login/sign-in-ctrl.php">
                            Créer un compte
                            <i class="bi bi-chevron-right mb-2"></i>
                        </a>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
            <?php
            } ?>
            <!-- Card pickup "Prochainement" -->
            <div class="col-md-6 col-lg-5 col-xl-3">
                <div class="card rounded-3 p-lg-4 bg-card h-100">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body text-center">
                        <i class="bi bi-shop-window text-danger fs-1"></i>
                        <h3 class="card-title title-lilita my-3">Prochainement</h3>
                        <h5 class="card-title title-lilita">Un nouveau lieu de retrait proche de chez vous !</h5>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</section><!-- FIN section Catalogue -->