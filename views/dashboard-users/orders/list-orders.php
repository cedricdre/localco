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
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table class="table table-striped align-middle" id="table-producer-products">
                        <thead>
                            <tr>
                                <th scope="col">N° Commande</th>
                                <th scope="col">Date de commande</th>
                                <th scope="col">statut</th>
                                <th scope="col">Date de retrait</th>
                                <th scope="col">Prix total TTC</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($orders as $order){
                                $total = 0;
                                $ordersLines = OrderLine::getAll($order->id_order);
                                foreach ($ordersLines as $line) {
                                    $priceCalculQty = $line->quantity * $line->line_price;
                                    $total += $priceCalculQty;
                                }
                                ?>
                            <tr>
                                <th scope="row"><?=$order->id_order?></th>
                                <th><?=date('d/m/Y', strtotime($order->created_at))?></th>
                                <th>
                                    <?php
                                        if ($order->status == 1) { ?>
                                            <span class="badge rounded-pill text-bg-warning">En préparation ...</span>
                                    <?php
                                    } ?>
                                    <?php
                                        if ($order->status == 2) { ?>
                                            <span class="badge rounded-pill text-bg-success"><i class="bi bi-caret-right-fill me-1"></i>À retirer</span>
                                    <?php
                                    } ?>
                                    <?php
                                        if ($order->status == 3) { ?>
                                            <span class="badge rounded-pill text-bg-secondary"><i class="bi bi-check me-1"></i>Retiré</span>
                                    <?php
                                    } ?>
                                </th>
                                <th><?=date('d/m/Y', strtotime($order->withdrawDate))?></th>
                                <th><?= $total ?> <sup>€</sup></th>
                                <th><a class="btn btn-outline-success btn-sm" href="/controllers/dashboard-users/orders-line/list-ctrl.php?idorder=<?=$order->id_order?>" role="button" aria-label="Consulter">Consulter</a></th>
                            </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>
</section><!-- FIN section Catalogue -->