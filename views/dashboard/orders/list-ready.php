<h2 class="my-4 fw-bold"><i class="bi bi-cart text-primary me-2"></i><?= $title ?></h2>

<section>
    <div class="table-responsive">
    <table class="table table-striped align-middle" id="table-producer-products">
            <thead>
                <tr>
                    <th scope="col">N° Commande</th>
                    <th scope="col">Lieu de retrait</th>
                    <th scope="col">Client</th>
                    <th scope="col">Date de commande</th>
                    <th scope="col">statut</th>
                    <th scope="col">Date de retrait</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($orders as $order){
                    ?>
                <tr>
                    <th scope="row"><?=$order->id_order?></th>
                    <th scope="row"><?=$order->pickup_name?></th>
                    <th scope="row"><?=$order->firstname?> <?=$order->lastname?></th>
                    <th><?=date('d/m/Y', strtotime($order->created_at))?></th>
                    <th>
                    <span class="badge rounded-pill text-bg-success">Commande à retirer</span>
                    </th>
                    <th><?=date('d/m/Y', strtotime($order->withdrawDate))?></th>
                    <th>
                        <a class="btn btn-success btn-sm" href="/controllers/dashboard/orders/list-ready-ctrl.php?idorder=<?=$order->id_order?>" role="button">Valider le retrait</a>
                        <a class="btn btn-outline-secondary btn-sm" href="/controllers/dashboard/orders-line/list-ctrl.php?idorder=<?=$order->id_order?>" role="button">Consulter</a>
                    </th>
                </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>


</section>