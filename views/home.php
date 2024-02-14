<!-- Section Entête -->
<section class="bg-success">
    <div class="container pt-4 pt-lg-0 text-light">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="px-2 px-lg-0 text-center text-lg-start">
                    <h1 class="d-none">Localco</h1>
                    <h3 class="fs-1 fw-bolder mb-4 lh-base">Explorez une nouvelle façon de consommer des <span class="text-bg-warning fw-bolder p-1">produits de saison !</span></h3>
                    <p class="mb-4 fs-4 d-none d-lg-block">Avec <span class="title-lilita fs-2">Localco</span> soutenez les producteurs locaux</p>
                    <div>
                        <a class="btn btn-light icon-link icon-link-hover my-2 me-2" href="#">
                            En savoir plus
                            <i class="bi bi-chevron-right mb-2"></i>
                        </a>
                        <a class="btn btn-outline-light icon-link icon-link-hover my-2" href="/controllers/catalog-ctrl.php">
                            Commencer mon marché
                            <i class="bi bi-chevron-right mb-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-5">
                <img src="/public/assets/img/cover.png" class="img-fluid" alt="This zooms-in really well and smooth">
            </div>
        </div>
    </div>
</section>
<!-- section "Comment ça fonctionne ?" -->
<section class="my-6 text-center">
    <div class="container">
        <h2 class="title-lilita fs-1">Comment ça fonctionne</h2>
        <p class="text-danger fs-4 fw-bold mb-4">Simple comme bonjour</p>
        <div class="row g-4">
            <div class="col-6 col-lg-3">
                <div>
                    <img src="/public/assets/img/picto-off.svg" class="img-fluid p-lg-5 mb-3 mb-lg-0" alt="picto de ...">
                    <h5 class="fw-bold"><span class="text-danger fs-3 fw-bolder">1. </span>Je commande</h5>
                    <p>Je choisis mon lieu de retrait et sélectionne mes produits.</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div>
                    <img src="/public/assets/img/picto-off.svg" class="img-fluid p-lg-5 mb-3 mb-lg-0" alt="picto de ...">
                    <h5 class="fw-bold"><span class="text-danger fs-3 fw-bolder">2. </span>La récolte</h5>
                    <p>Nos producteurs récoltent les produits.</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div>
                    <img src="/public/assets/img/picto-off.svg" class="img-fluid p-lg-5 mb-3 mb-lg-0" alt="picto de ...">
                    <h5 class="fw-bold"><span class="text-danger fs-3 fw-bolder">3. </span>Le transport et la préparation</h5>
                    <p>Nous préparons vos commandes !</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div>
                    <img src="/public/assets/img/picto-off.svg" class="img-fluid p-lg-5 mb-3 mb-lg-0" alt="picto de ...">
                    <h5 class="fw-bold"><span class="text-danger fs-3 fw-bolder">4. </span>Le retrait</h5>
                    <p>Vous récupérez votre commande en point retrait !</p>
                </div>
            </div>
        </div>
    </div>
</section><!-- FIN section "Comment ça fonctionne ?" -->
<!-- section "Fruit, légume" renvoie sur le catalogue -->
<?php include __DIR__.'/../views/templates/baner-shop.php' ?>
<!-- section "Abonnez-vous" -->
<?php include __DIR__.'/../views/templates/baner-subscription.php' ?>