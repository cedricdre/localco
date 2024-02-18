<?php 
if ($ordersLines[0]->status == 1) { ?>
    <span><a class="btn btn-sm btn-outline-primary" href="/controllers/dashboard/orders/list-ctrl.php" role="button"><i class="bi bi-arrow-left me-2"></i>Retour liste des commandes</a></span>
<?php
}
if ($ordersLines[0]->status == 2) { ?>
    <span><a class="btn btn-sm btn-outline-primary" href="/controllers/dashboard/orders/list-ready-ctrl.php" role="button"><i class="bi bi-arrow-left me-2"></i>Retour liste des commandes</a></span>
<?php
}
if ($ordersLines[0]->status == 3) { ?>
    <span><a class="btn btn-sm btn-outline-primary" href="/controllers/dashboard/orders/list-delivered-ctrl.php" role="button"><i class="bi bi-arrow-left me-2"></i>Retour liste des commandes</a></span>
<?php
}
?>
<h2 class="my-4 fw-bold"><i class="bi bi-shop-window text-primary me-2"></i><?= $title ?></h2>
<?php 
if ($ordersLines[0]->status == 1) { ?>
    <span><a class="btn btn-success mb-3" href="/controllers/dashboard/orders/list-ctrl.php?idorder=<?=$id_order?>" role="button">Envoyer la commande en retrait<i class="bi bi-check ms-2"></i></a></span>
<?php
}
?>

<section>
    <div class="table-responsive">

        <table class="table table-striped align-middle" id="table-producer-products">
            <thead>
                <tr>
                    <th scope="col">Quantité</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Producteur</th>
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
                    <th scope="row">x <?=$line->quantity?></th>
                    <th scope="row"><?=$line->line_name?></th>
                    <th scope="row"><?=$line->line_name?></th>
                    <th scope="row"><?=$priceCalculQty?> <sup>€</sup></th>
                </tr>
                <?php
                } ?>
            </tbody>
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Total</th>
                    <th scope="col"><?=$total?> <sup>€</sup></th>
                </tr>
            </thead>
        </table>

    </div>


</section>