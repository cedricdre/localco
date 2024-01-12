<!-- Section Entête -->
<section class="bg-success">
    <div class="container py-4 py-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
                <div class="text-center text-light">
                    <h1 class="title-lilita">Mon tableau de bord</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section Catalogue -->
<section class="py-4 py-lg-6">
    <div class="container">
        <div class="text-center mb-4">
            <h4 class="title-lilita">Bonjour, Prénom !</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="d-grid gap-3">
                    <a class="btn btn-warning btn-lg" href="/controllers/dashboard-users/orders/list-ctrl.php" role="button">Mes commandes</a>
                    <a class="btn btn-warning btn-lg" href="/controllers/dashboard-users/subscriptions/list-ctrl.php" role="button">Informations personnelles</a>
                    <a class="btn btn-warning btn-lg" href="/controllers/dashboard-users/subscriptions/list-ctrl.php" role="button">Mon abonnement</a>
                </div>
                <div class="border border-1 border-success p-4 mt-5">
                    <div class="text-center">
                        <h5 class="">Espace Pro</h5>
                        <h4 class="title-lilita mb-3">Mon entreprise</h4>
                    </div>
                    <div class="d-grid gap-3">                    
                        <a class="btn btn-success btn-lg" href="/controllers/dashboard-users/products/list-ctrl.php" role="button">Mes produits</a>
                        <a class="btn btn-success btn-lg position-relative" href="/controllers/dashboard-users/products/list-ctrl.php" role="button">Mes commandes à préparer <span class="ms-2 badge bg-danger">4</span></a>
                        <a class="btn btn-success btn-lg" href="/controllers/dashboard-users/producers-profiles/list-ctrl.php" role="button">Ma fiche producteur</a>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="text-center">
                        <p><a class="btn btn-outline-danger" href="/controllers/dashboard-users/users/delete-ctrl.php" role="button">Supprimer mon compte</a></p>
                        <p class="small">Nous sommes navrés de vous voir partir. Après la confirmation de la suppression de votre compte, vous n’aurez plus accès à votre espace et vos commandes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- FIN section Catalogue -->