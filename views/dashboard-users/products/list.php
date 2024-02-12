<?php include __DIR__.'/../../../views/templates/baner-dashboard-users.php' ?>
<!-- section Catalogue -->
<section class="py-4 py-lg-5">
    <div class="container">
        <div class="text-center mb-4">
            <nav aria-label="breadcrumb mb-5">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/controllers/dashboard-users/home-ctrl.php">Tableau de bord</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mes produits</li>
                </ol>
            </nav>
            <h4 class="title-lilita">Mes produits</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="d-grid mb-4">
                    <a class="btn btn-warning" href="/controllers/dashboard-users/products/add-ctrl.php" role="button">Ajouter un produit<i class="bi bi-plus-circle-fill ms-2"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped align-middle" id="table-producer-products">
                        <thead>
                            <tr>
                                <th scope="col">Nom du produit</th>
                                <th scope="col"></th>
                                <th scope="col">En ligne</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($products as $product){ ?>
                            <tr>
                                <th scope="row"><?=$product->product_name?></th>
                                <th><a class="btn btn-outline-success btn-sm" href="/controllers/dashboard-users/products/update-ctrl.php?idproduct=<?=$product->id_product?>" role="button"><i class="bi bi-pencil-fill me-2"></i>Modifier</a></th>
                                <th>
                                    <?php
                                        if ($product->valid_at == NULL) { ?>
                                            <span class="badge rounded-pill text-bg-warning">En attente de validation</span>
                                    <?php
                                    } ?>
                                    <?php
                                        if ($product->valid_at != NULL && $product->online == 1) { ?>
                                            <span><i class="bi bi-link me-1"></i>En ligne</span>
                                    <?php
                                    } ?>
                                    <?php
                                        if ($product->valid_at != NULL && $product->online == 0) { ?>
                                            <span class="text-danger"><i class="bi bi-link me-1"></i>Hors ligne</span>
                                    <?php
                                    } ?>
                                </th>
                                <th scope="row"><a href="/controllers/dashboard-users/products/delete-ctrl.php?idproduct=<?=$product->id_product?>" class="text-danger"><i class="bi bi-trash3-fill"></i></a></th>
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