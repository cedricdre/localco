<?php include __DIR__.'/../../views/templates/baner-dashboard-users.php' ?>
<!-- section Catalogue -->
<section class="py-4 py-lg-6">
    <div class="container">
        <div class="text-center mb-4">
            <h4 class="title-lilita">Bonjour, <?=$_SESSION['user']->firstname?> !</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="d-grid gap-3">
                    <a class="btn btn-warning btn-lg" href="/controllers/dashboard-users/orders/list-orders-ctrl.php" role="button">Mes commandes</a>
                    <a class="btn btn-warning btn-lg" href="/controllers/dashboard-users/users/update-users-ctrl.php" role="button">Informations personnelles</a>
                    <a class="btn btn-warning btn-lg" href="/controllers/dashboard-users/subscriptions/list-ctrl.php" role="button">Mon abonnement</a>
                </div>
                <?php 
                if (empty($_SESSION['user']->producer != 1)) { ?>
                <div class="border border-1 border-success p-4 mt-5">
                    <div class="text-center">
                        <h5 class="">Espace Pro</h5>
                        <h4 class="title-lilita mb-3"><?=$_SESSION['user']->company_name?></h4>
                    </div>
                    <div class="d-grid gap-3">                    
                        <a class="btn btn-success btn-lg" href="/controllers/dashboard-users/products/list-ctrl.php" role="button">Mes produits</a>
                        <a class="btn btn-success btn-lg position-relative" href="#" role="button">Mes commandes à préparer <span class="ms-2 badge bg-danger">4</span></a>
                        <a class="btn btn-success btn-lg" href="/controllers/dashboard-users/producers-profiles/update-ctrl.php" role="button">Ma fiche producteur</a>
                    </div>
                </div>
                <?php
                } else { ?>
                    <div class="text-center mt-5">
                        <a class="btn btn-sm btn-outline-success" href="" role="button">Devenir Revendeur ?</a>
                    </div>
                <?php
                } ?>
            </div>
        </div>
    </div>
</section><!-- FIN section Catalogue -->