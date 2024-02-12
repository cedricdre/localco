<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Product.php';

SessionAuth::admin();

try {
    $title = 'Liste des produits';

    $products = Product::getAll();

    // Valider un produit avant affichage site public
    // Récupération du paramètre d'URL correspondant à l'id
    $id_product = intval(filter_input(INPUT_GET, 'idproduct', FILTER_SANITIZE_NUMBER_INT));

    if ($id_product) {
        // Valide/Ajoute une date à 'valid_at' l'insertion en BD
        $isValid = Product::valid($id_product);

        if($isValid){
            header('location: /controllers/dashboard/products/list-ctrl.php');
            die;
        }
    }

    // Archive
    // Récupération du paramètre d'URL correspondant à l'id
    $idProductArchive = intval(filter_input(INPUT_GET, 'idproductarchive', FILTER_SANITIZE_NUMBER_INT));

    if ($idProductArchive) {
        // Archive/Ajoute une date à 'delete_at' l'insertion en BD
        $isArchive = Product::archive($idProductArchive);

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
include __DIR__ . '/../../../views/dashboard/products/list.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';