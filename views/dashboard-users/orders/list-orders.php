<?php include __DIR__.'/../../../views/templates/baner-dashboard-users.php' ?>
<!-- section Catalogue -->
<section class="py-4 py-lg-5">
    <div class="container">
        <div class="text-center mb-4">
            <nav aria-label="breadcrumb mb-5">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/controllers/dashboard-users/home-ctrl.php">Tableau de bord</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mes commandes</li>
                </ol>
            </nav>
            <h4 class="title-lilita">Mes commandes</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="table-responsive">
                    <table class="table table-striped align-middle" id="table-producer-products">
                        <thead>
                            <tr>
                                <th scope="col">N° Commande</th>
                                <th scope="col">Date</th>
                                <th scope="col">statut</th>
                                <th scope="col">Prix total TTC</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($orders as $order){ ?>
                            <tr>
                                <th scope="row"><?=$order->id_order?></th>
                                <th><?=$order->created_at?></th>
                                <th>
                                    <?php
                                        if ($product->status == 1) { ?>
                                            <span class="badge rounded-pill text-bg-warning">En préparation...</span>
                                    <?php
                                    } ?>
                                    <?php
                                        if ($product->status == 2) { ?>
                                            <span class="badge rounded-pill text-bg-success"><i class="bi bi-link me-1"></i>À retirer</span>
                                    <?php
                                    } ?>
                                    <?php
                                        if ($product->status == 3) { ?>
                                            <span class="badge rounded-pill text-bg-secondary"><i class="bi bi-link me-1"></i>Retiré</span>
                                    <?php
                                    } ?>
                                </th>
                                <th><?=$order->created_at?></th>
                                <th><a class="btn btn-outline-success btn-sm" href="/controllers/dashboard-users/products/update-ctrl.php?idproduct=<?=$product->id_product?>" role="button"><i class="bi bi-pencil-fill me-2"></i>Modifier</a></th>
                            </tr>
                            <?php
                            } ?>
                            <tr>
                                <th scope="row">1</th>
                                <td>30 janv. 2024</td>
                                <td><span class="badge rounded-pill text-bg-warning">En préparation...</span></td>
                                <td>0,00 <sup>€</sup></td>
                                <th scope="row"><a class="btn btn-outline-success btn-sm" href="#" role="button">Consulter</a></th>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>
</section><!-- FIN section Catalogue -->