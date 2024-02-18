<?php include __DIR__.'/../../../views/templates/baner-dashboard-users.php' ?>
<!-- section Catalogue -->
<section class="py-4 py-lg-5">
    <div class="container">
        <div class="text-center mb-4">
            <nav aria-label="breadcrumb mb-5">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/controllers/dashboard-users/home-ctrl.php">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="/controllers/dashboard-users/orders/list-orders-ctrl.php">Mes commandes</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
            <h4 class="title-lilita"><?= $title ?></h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3">
                <p class="mb-1">Date de commande : <span class="fw-bold"><?= date('d/m/Y', strtotime($ordersLines[0]->created_at)) ?></span></p>
                <p class="mb-1">Statut de la commande :  
                        <?php
                            if ($ordersLines[0]->status == 1) { ?>
                                <span class="badge rounded-pill text-bg-warning">En préparation...</span>
                        <?php
                        } ?>
                        <?php
                            if ($ordersLines[0]->status == 2) { ?>
                                <span class="badge rounded-pill text-bg-success"><i class="bi bi-link me-1"></i>À retirer</span>
                        <?php
                        } ?>
                        <?php
                            if ($ordersLines[0]->status == 3) { ?>
                                <span class="badge rounded-pill text-bg-secondary"><i class="bi bi-link me-1"></i>Retiré</span>
                        <?php
                        } ?>
                </p>
                <p class="mb-1">Date de retrait :  <span class="fw-bold"><?= date('d/m/Y', strtotime($ordersLines[0]->withdrawDate)) ?></span></p>
                <p class="mb-1">Lieu de retrait :  <span class="fw-bold"><?=$pickup->pickup_name?></span></p>
            </div>
            <div class="col-lg-4">
                <div class="table-responsive">
                    <table class="table table-striped align-middle" id="table-producer-products">
                        <thead>
                            <tr>
                                <th scope="col">Produit</th>
                                <th scope="col">Prix TTC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($ordersLines as $line){
                                $priceCalculQty = $line->quantity * $line->line_price;

                                $total += $priceCalculQty;
                                ?>
                            <tr>
                                <th scope="row"><?=$line->line_name?> x <?=$line->quantity?></th>
                                <th scope="row"><?=$priceCalculQty?> <sup>€</sup></th>
                            </tr>
                            <?php
                            } ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th scope="col" class="text-bg-success">Total</th>
                                <th scope="col" class="text-bg-success fw-bold"><?=$total?> <sup>€</sup></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>



    </div>
</section><!-- FIN section Catalogue -->