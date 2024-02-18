<section>
    <div class="row">
        <div class="col-md-7">
            <div class="card border-primary mb-4">
                <div class="card-header text-bg-primary">Commandes</div>
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-cart text-primary me-2"></i>Commandes à préparer <span class="badge bg-primary"><?= count($ordersPrepare) ?></span></h5>
                    <div class="table-responsive">
                        <table class="table align-middle" id="table-order-prepare">
                            <tbody>
                                <?php
                                foreach($ordersPrepare as $order){
                                    ?>
                                <tr>
                                    <th scope="row">N° <?=$order->id_order?></th>
                                    <th scope="row"><?=$order->firstname?> <?=$order->lastname?></th>
                                    <th>Date de retrait : <?=date('d/m/Y', strtotime($order->withdrawDate))?></th>
                                    <th><a class="btn btn-outline-secondary btn-sm" href="/controllers/dashboard/orders-line/list-ctrl.php?idorder=<?=$order->id_order?>" role="button">Consulter</a></th>
                                </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>

                    <h5 class="card-title"><i class="bi bi-cart text-primary me-2"></i>Commandes à retirer <span class="badge bg-primary"><?= count($ordersReady) ?></span></h5>
                    <div class="table-responsive">
                        <table class="table align-middle" id="table-order-prepare">
                            <tbody>
                                <?php
                                foreach($ordersReady as $order){
                                    ?>
                                <tr>
                                    <th scope="row">N° <?=$order->id_order?></th>
                                    <th scope="row"><?=$order->firstname?> <?=$order->lastname?></th>
                                    <th>Date de retrait : <?=date('d/m/Y', strtotime($order->withdrawDate))?></th>
                                    <th><a class="btn btn-outline-secondary btn-sm" href="/controllers/dashboard/orders-line/list-ctrl.php?idorder=<?=$order->id_order?>" role="button">Consulter</a></th>
                                </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card text-bg-success mb-4">
                <div class="card-header">Produits</div>
                <div class="card-body">
                    <h5 class="card-title"><span class="badge text-bg-light"><?= $nullCount ?></span> Produits à valider <a class="btn btn-sm btn-outline-light ms-2" href="/controllers/dashboard/products/list-ctrl.php" role="button">Consulter la liste</a></h5>
                    <p class="card-text">Total de produits en ligne : <span class="fw-bold"><?= $onlineCount ?></span> </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="bi bi-people text-primary me-2"></i>? Producteurs</h5>
                    <a class="btn btn-sm btn-outline-secondary" href="/controllers/dashboard/producers/list-ctrl.php" role="button">Consulter la liste</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="bi bi-shop-window text-primary me-2"></i><?= count($pickups) ?> Lieux de retrait</h5>
                    <a class="btn btn-sm btn-outline-secondary" href="/controllers/dashboard/pickups/list-ctrl.php" role="button">Consulter la liste</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="bi bi-list-ul text-primary me-2"></i><?= count($types) ?> Types de produits</h5>
                    <a class="btn btn-sm btn-outline-secondary" href="/controllers/dashboard/types/list-ctrl.php" role="button">Consulter la liste</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="bi bi-calendar-range text-primary me-2"></i>? Abonnements</h5>
                    <a class="btn btn-sm btn-outline-secondary" href="/controllers/dashboard/subscriptions/list-ctrl.php" role="button">Consulter la liste</a>
                </div>
            </div>
        </div>
    </div>


</section>