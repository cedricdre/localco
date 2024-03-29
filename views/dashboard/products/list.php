<h2 class="my-4 fw-bold"><i class="bi bi-shop-window text-primary me-2"></i><?= $title ?></h2>

<section>
    <?php include __DIR__ .'/../templates/message.php'?>

    <a class="btn btn-primary mb-3" href="/controllers/dashboard/products/add-ctrl.php" role="button"><i class="bi bi-plus-circle me-2"></i>Créer un produit</a>
    <a class="btn btn-outline-secondary mb-3 ms-2" href="/controllers/dashboard/products/archive-ctrl.php" role="button"><i class="bi bi-archive me-2"></i>Produits supprimés</a>
    <div class="table-responsive">
        <table class="table align-middle table-striped">
            <thead>
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Type</th>
                    <th scope="col">Producteur</th>
                    <!-- <th scope="col">Prix HT</th>
                    <th scope="col">Prix TVA</th> -->
                    <th scope="col">Prix TTC</th>
                    <th scope="col">En ligne</th>
                    <th scope="col">A valider</th>
                    <th class="text-end" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($products as $product){ 
                    $prix_ttc = CalculatePrice::TVA($product);
                    ?>
                <tr>
                    <th scope="row"><img src="<?= '/public/uploads/product-sheet/' . $product->picture ?>" class="object-fit-cover img-thumbnail" width="60"></th>
                    <th scope="row"><?=$product->product_name?> <br> <span class="fw-light"><?=$product->weight?> <?=$product->weight_unit?></span></th>
                    <th scope="row"><?=$product->type_name?></th>
                    <th scope="row"><?=$product->company_name?></th>
                    <!-- <th scope="row"><?=$product_price?> <sup>€</sup></th>
                    <th scope="row"><?=$tva?> <sup>€</sup> <br><sup><?=$product_tva?>%</sup></th> -->
                    <th scope="row"><?=$prix_ttc?> <sup>€</sup></th>
                    <th scope="row">
                        <?php
                        if ($product->online == 1) { ?>
                            <span class="badge rounded-pill text-bg-success">En ligne</span>
                        <?php
                        } else { ?>
                            <span class="badge rounded-pill text-bg-danger">Hors ligne</span>
                        <?php
                        } ?>
                    </th>
                    <th scope="row">
                        <?php
                        if ($product->valid_at == NULL) { ?>
                            <a class="btn btn-sm btn-success me-2" href="/controllers/dashboard/products/list-ctrl.php?idproduct=<?=$product->id_product?>" role="button">Valider</a>
                        <?php
                        } else { ?>
                            Validé <i class="bi bi-check-circle-fill"></i>
                        <?php
                        } ?>                
                    </th>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-secondary my-1" href="/controllers/dashboard/products/update-ctrl.php?idproduct=<?=$product->id_product?>" role="button"><i class="bi bi-pencil-fill"></i></a>
                        <a class="btn btn-sm btn-outline-danger my-1" href="/controllers/dashboard/products/list-ctrl.php?idproductarchive=<?=$product->id_product?>" role="button"><i class="bi bi-archive-fill"></i></a>
                    </td>
                </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>


</section>