<span><a class="btn btn-sm btn-outline-primary" href="/controllers/dashboard/products/list-ctrl.php" role="button"><i class="bi bi-arrow-left me-2"></i>Retour liste des produits</a></span>
<h2 class="my-4 fw-bold"><i class="bi bi-archive text-primary me-2"></i><?= $title ?></h2>

<section>
    <?php include __DIR__ .'/../templates/message.php'?>

    <div class="table-responsive">
        <table class="table align-middle table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Type</th>
                    <th scope="col">Producteur</th>
                    <th class="text-end" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($products as $product){ ?>
                <tr>
                    <th scope="row"><?=$product->product_name?></th>
                    <th scope="row"><?=$product->type_name?></th>
                    <th scope="row"><?=$product->company_name?></th>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-secondary" href="/controllers/dashboard/products/archive-ctrl.php?idproduct=<?=$product->id_product?>" role="button"><i class="bi bi-archive-fill me-2"></i>Désarchiver</a>
                        <a class="btn btn-sm btn-outline-danger" href="/controllers/dashboard/products/delete-ctrl.php?idproduct=<?=$product->id_product?>" role="button"><i class="bi bi-trash3-fill me-2"></i>Supp.</a>
                    </td>
                </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>


</section>