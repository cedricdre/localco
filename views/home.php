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
                <img src="/public/assets/img/cover.webp" class="img-fluid" alt="Jeune femme jardinier tablier chapeau tenant panier plein legumes tomates pres son oeil souriant">
            </div>
        </div>
    </div>
</section>
<!-- section "Comment ça fonctionne ?" -->
<section class="my-6 text-center">
    <div class="container mb-lg-5">
        <h2 class="title-lilita fs-1">Comment ça fonctionne</h2>
        <p class="text-danger fs-4 fw-bold mb-4">Simple comme bonjour</p>
        <div class="row g-2 g-lg-4" data-aos="fade-up">
            <div class="col-6 col-lg-3">
                <div>
                <img src="/public/assets/img/picto1.webp" class="img-fluid px-3 px-md-6 mb-3 my-lg-4" alt="picto avec chiffre 1 avec fraises">
                    <h4 class="fw-bold"><span class="text-danger fs-3 fw-bolder">. </span>Je commande</h4>
                    <p class="fs-5">Je choisis mon lieu de retrait et sélectionne mes produits.</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div>
                <img src="/public/assets/img/picto2.webp" class="img-fluid px-3 px-md-6 mb-3 my-lg-4" alt="picto avec chiffre 2 avec pommes de terre">
                    <h4 class="fw-bold"><span class="text-danger fs-3 fw-bolder">. </span>La récolte</h4>
                    <p class="fs-5">Nos producteurs récoltent les produits.</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div>
                <img src="/public/assets/img/picto3.webp" class="img-fluid px-3 px-md-6 mb-3 my-lg-4" alt="picto avec chiffre 3 avec tomates">
                    <h4 class="fw-bold"><span class="text-danger fs-3 fw-bolder">. </span>La préparation</h4>
                    <p class="fs-5">Nous préparons avec soins vos commandes !</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div>
                    <img src="/public/assets/img/picto4.webp" class="img-fluid px-3 px-md-6 mb-3 my-lg-4" alt="picto avec chiffre 4 avec brocolis">
                    <h4 class="fw-bold"><span class="text-danger fs-3 fw-bolder">. </span>Le retrait</h4>
                    <p class="fs-5">Vous récupérez votre commande en point retrait !</p>
                </div>
            </div>
        </div>
    </div>
</section><!-- FIN section "Comment ça fonctionne ?" -->
<!-- section "Fruit, légume" renvoie sur le catalogue -->
<?php include __DIR__.'/../views/templates/baner-shop.php' ?>
<!-- section "Abonnez-vous" -->
<?php include __DIR__.'/../views/templates/baner-subscription.php' ?>