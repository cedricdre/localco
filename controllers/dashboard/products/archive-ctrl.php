<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Product.php';

SessionAuth::admin();

try {
    $title = 'Produits supprimés par le producteur';

    $products = Product::getAll(archive: true);


    // Archive
    // Récupération du paramètre d'URL correspondant à l'id
    $id_product = intval(filter_input(INPUT_GET, 'idproduct', FILTER_SANITIZE_NUMBER_INT));

    if ($id_product) {
        // Archive/Ajoute une date à 'delete_at' l'insertion en BD
        $isArchive = Product::unarchive($id_product);

        if($isArchive){
            header('location: /controllers/dashboard/products/list-ctrl.php');
            die;
        }
    }

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/products/archive.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';